@props([
    'id',
    'product',
    'icon',
    'eyebrow',
    'title',
    'highlight',
    'lead',
    'description',
    'accessUrl',
    'accessLabel',
    'secondaryLabel',
    'image',
    'imageAlt',
    'capabilitiesEyebrow',
    'capabilitiesTitle',
    'capabilitiesText',
    'cards',
    'footerTitle',
    'footerText',
    'footerLabel',
])

{{-- Product page for systems that live on their own platform (hero + capabilities + CTA). --}}
<main class="text-fg">
    <section class="pt-6 pb-16 sm:pt-10 lg:pb-20" aria-labelledby="{{ $id }}-title">
        <div class="container-page">
            <a class="mb-8 inline-flex items-center gap-2.5 text-sm text-muted transition hover:text-secondary sm:mb-10" href="{{ route('home') }}#productos">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Nuestro portafolio
            </a>

            <div class="grid items-center gap-8 lg:grid-cols-[1fr_1.05fr] lg:gap-12 xl:gap-20">
                <div class="min-w-0">
                    <span class="inline-flex items-center gap-2.5 text-xs font-bold tracking-widest text-secondary uppercase">
                        <i class="fa-solid {{ $icon }}" aria-hidden="true"></i> {{ $eyebrow }}
                    </span>
                    <h1 id="{{ $id }}-title" class="mt-5 mb-6 text-[clamp(2.4rem,4.5vw,4.5rem)] leading-[1.08] font-bold tracking-[-0.055em]">
                        {{ $title }}<br><span class="text-primary">{{ $highlight }}</span>
                    </h1>
                    <p class="mb-3 text-lg leading-relaxed font-semibold">{{ $lead }}</p>
                    <p class="max-w-xl leading-loose text-muted">{{ $description }}</p>
                    <p class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-secondary">
                        <i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> En migración · el acceso actual sigue disponible.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                        <a href="{{ $accessUrl }}" class="inline-flex min-h-12 items-center justify-center gap-3 rounded-xl bg-primary px-5 py-3 text-sm font-bold text-on-accent transition hover:shadow-soft" target="_blank" rel="noopener noreferrer">
                            {{ $accessLabel }} <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            <span class="sr-only">(se abre en una pestaña nueva)</span>
                        </a>
                        <a href="{{ route('contact', ['asunto' => $product]) }}" class="inline-flex min-h-12 items-center justify-center gap-3 rounded-xl border border-btn-border bg-btn px-5 py-3 text-sm font-bold text-fg transition hover:border-secondary hover:text-secondary">
                            {{ $secondaryLabel }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="max-w-3xl overflow-hidden rounded-3xl border border-card-border bg-surface shadow-hero lg:max-w-none">
                    <x-responsive-img :src="$image" :alt="$imageAlt" sizes="(min-width: 1024px) 50vw, 100vw" fetchpriority="high" class="block h-auto w-full" />
                </div>
            </div>
        </div>
    </section>

    <section class="pt-4 pb-20" aria-labelledby="{{ $id }}-capabilities-title">
        <div class="container-page">
            <div class="mx-auto mb-10 max-w-3xl text-center">
                <span class="text-xs font-bold tracking-widest text-secondary uppercase">{{ $capabilitiesEyebrow }}</span>
                <h2 id="{{ $id }}-capabilities-title" class="my-3 text-[clamp(1.65rem,3vw,2.5rem)] font-bold tracking-tight">{{ $capabilitiesTitle }}</h2>
                <p class="leading-loose text-muted">{{ $capabilitiesText }}</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($cards as $card)
                    <article class="rounded-2xl border border-glass bg-surface p-6">
                        <span class="mb-5 grid size-12 place-items-center rounded-xl bg-popular text-xl text-primary">
                            <i class="fa-solid {{ $card['icon'] }}" aria-hidden="true"></i>
                        </span>
                        <h3 class="mb-2 font-bold">{{ $card['title'] }}</h3>
                        <p class="text-sm leading-relaxed text-muted">{{ $card['text'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-10 flex flex-col items-start justify-between gap-6 rounded-2xl border border-glass bg-surface p-6 sm:p-8 md:flex-row md:items-center">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight">{{ $footerTitle }}</h2>
                    <p class="leading-loose text-muted">{{ $footerText }}</p>
                </div>
                <a href="{{ route('contact', ['asunto' => $product]) }}" class="inline-flex min-h-12 w-full shrink-0 items-center justify-center gap-3 rounded-xl bg-primary px-5 py-3 text-sm font-bold text-on-accent transition hover:shadow-soft sm:w-auto">
                    {{ $footerLabel }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
</main>
