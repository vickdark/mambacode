@props(['title', 'subtitle', 'badge', 'features', 'carouselImages', 'accessUrl' => null])

<section class="mt-8 py-12 lg:mt-12" id="intro">
    <div class="container-page">
        <div class="mb-10 text-center lg:mb-14">
            <span class="mb-3 inline-block rounded-full bg-primary/10 px-3 py-2 text-sm font-semibold text-primary">{{ $badge }}</span>
            <h1 class="text-gradient mb-4 text-4xl font-extrabold tracking-tight sm:text-5xl xl:text-6xl">{{ $title }}</h1>
            <p class="mx-auto max-w-2xl text-lg text-muted sm:text-xl">{{ $subtitle }}</p>
        </div>

        <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
            {{-- Screenshot carousel --}}
            <div
                class="lg:col-span-7"
                x-data="carousel(@js($carouselImages))"
                @mouseenter="pause()"
                @mouseleave="lightbox || play()"
            >
                <div
                    class="relative overflow-hidden rounded-2xl border border-card-border bg-card"
                    @touchstart.passive="touchStart($event)"
                    @touchend="touchEnd($event)"
                    role="region"
                    aria-roledescription="carrusel"
                    aria-label="Capturas de {{ $title }}"
                >
                    <div class="flex transition-transform duration-500 ease-out" :style="`transform: translateX(-${index * 100}%)`">
                        @foreach ($carouselImages as $image)
                            <figure class="relative w-full shrink-0" aria-roledescription="diapositiva" aria-label="{{ $loop->iteration }} de {{ $loop->count }}">
                                <button type="button" class="block w-full cursor-zoom-in" @click="open({{ $loop->index }})" aria-label="Ampliar: {{ $image['alt'] }}">
                                    <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="h-56 w-full object-cover sm:h-80 lg:h-96 2xl:h-[28rem] 3xl:h-[34rem]" @if (! $loop->first) loading="lazy" @endif decoding="async">
                                </button>
                                <figcaption class="absolute inset-x-[15%] bottom-12 hidden rounded-xl bg-surface px-4 py-3 text-center md:block">
                                    <p class="text-lg font-semibold text-fg">{{ $image['caption_title'] }}</p>
                                    <p class="text-sm text-muted">{{ $image['caption_text'] }}</p>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>

                    <button type="button" class="absolute inset-y-0 left-0 grid w-12 place-items-center text-2xl text-white opacity-70 drop-shadow transition hover:opacity-100 sm:w-16" @click="prev()" aria-label="Anterior">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="absolute inset-y-0 right-0 grid w-12 place-items-center text-2xl text-white opacity-70 drop-shadow transition hover:opacity-100 sm:w-16" @click="next()" aria-label="Siguiente">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    </button>

                    <div class="absolute inset-x-0 bottom-3 flex flex-wrap justify-center gap-1.5 px-12">
                        @foreach ($carouselImages as $image)
                            <button
                                type="button"
                                class="h-1 w-3 rounded-full transition sm:w-7"
                                :class="index === {{ $loop->index }} ? 'bg-primary' : 'bg-muted/70'"
                                :aria-current="index === {{ $loop->index }}"
                                @click="go({{ $loop->index }})"
                                aria-label="Imagen {{ $loop->iteration }}"
                            ></button>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 flex justify-center">
                    <span class="inline-flex items-center gap-2 rounded-full border border-highlight bg-gradient-brand px-4 py-3 text-xs font-bold tracking-wide text-white uppercase shadow-[0_18px_36px_rgba(59,130,246,0.24)] sm:text-sm">
                        <i class="fa-solid fa-magnifying-glass-plus" aria-hidden="true"></i>
                        Dar clic para ampliar imagen
                    </span>
                </div>

                {{-- Lightbox --}}
                <template x-teleport="body">
                    <div
                        x-show="lightbox"
                        x-cloak
                        x-transition.opacity
                        x-trap.noscroll="lightbox"
                        @keydown.escape.window="lightbox = false"
                        @keydown.arrow-left.window="lightbox && prev()"
                        @keydown.arrow-right.window="lightbox && next()"
                        class="fixed inset-0 z-[2000] flex items-center justify-center bg-black/80 p-2 sm:p-6"
                        role="dialog"
                        aria-modal="true"
                        :aria-label="current.caption_title"
                        @click.self="lightbox = false"
                    >
                        <div class="flex max-h-full w-full max-w-7xl flex-col overflow-hidden rounded-2xl border border-glass bg-surface text-fg">
                            <div class="flex items-start gap-3 p-4">
                                <div class="min-w-0">
                                    <h2 class="text-lg font-semibold" x-text="current.caption_title"></h2>
                                    <p class="text-sm text-muted" x-text="current.caption_text"></p>
                                </div>
                                <div class="ms-auto flex shrink-0 items-center gap-2">
                                    <button type="button" class="grid size-9 place-items-center rounded-lg border border-secondary text-secondary transition hover:bg-secondary hover:text-white" @click="prev()" aria-label="Anterior imagen">
                                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="grid size-9 place-items-center rounded-lg border border-secondary text-secondary transition hover:bg-secondary hover:text-white" @click="next()" aria-label="Siguiente imagen">
                                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="grid size-9 place-items-center rounded-lg text-xl text-fg hover:bg-hover" @click="lightbox = false" aria-label="Cerrar">
                                        <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex min-h-0 flex-1 items-center justify-center" @touchstart.passive="touchStart($event)" @touchend="touchEnd($event)">
                                <img :src="current.src" :alt="current.alt" class="max-h-[calc(100svh-9rem)] w-auto max-w-full object-contain">
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Description & demo --}}
            <div class="lg:col-span-5 lg:ps-4">
                {{ $slot }}

                <div class="mb-10 flex flex-col gap-4">
                    @foreach ($features as $feature)
                        <div class="flex items-center gap-4">
                            <div class="grid size-11 shrink-0 place-items-center rounded-full border border-feature-border bg-feature text-primary">
                                <i class="{{ $feature['icon'] }} fa-lg" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-fg">{{ $feature['title'] }}</h3>
                                <p class="text-sm text-muted">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('contact') }}" class="btn-cyber w-full">
                    <i class="fa-solid fa-laptop-code" aria-hidden="true"></i> Solicitar Demo en Vivo
                </a>
                @if ($accessUrl)
                    <a href="{{ $accessUrl }}" class="mt-4 inline-flex items-center gap-2 font-semibold text-secondary transition hover:text-primary" target="_blank" rel="noopener noreferrer">
                        Ingresar al sistema <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                        <span class="sr-only">(se abre en una pestaña nueva)</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
