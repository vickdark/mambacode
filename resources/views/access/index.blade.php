@extends('layouts.landing')

@section('title', 'Portal de Accesos | Mamba Code')
@section('meta_description', 'Directorio de accesos del equipo Mamba Code a sus productos publicados.')
@section('meta_robots', 'noindex, nofollow')

@section('content')
    <x-landing.navigation />

    <main class="container-page pt-[clamp(3rem,6vw,5.5rem)]" id="inicio">
        <div class="mb-14 max-w-3xl">
            <span class="eyebrow">/ espacio del equipo</span>
            <h1 class="mt-4 mb-6 text-[clamp(2.25rem,5vw,3.75rem)] leading-[1.12] font-bold tracking-[-0.045em] text-fg">Todos tus accesos,<br><span class="text-primary">en un solo lugar.</span></h1>
            <p class="max-w-xl text-lg leading-loose text-muted">Elige el producto que necesitas administrar. Cada enlace abre su plataforma y conserva su propio inicio de sesión.</p>
        </div>

        <section aria-labelledby="access-products-title">
            <div class="mb-6 flex items-center justify-between gap-4">
                <h2 id="access-products-title" class="text-xl font-bold text-fg">Productos disponibles</h2>
                <span class="text-sm text-muted">{{ $products->count() }} {{ $products->count() === 1 ? 'acceso' : 'accesos' }}</span>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 3xl:grid-cols-4">
                @forelse ($products as $product)
                    <article class="flex min-w-0 flex-col overflow-hidden rounded-[1.25rem] border border-glass bg-surface transition hover:border-primary hover:shadow-[0_12px_30px_var(--shadow-color)]">
                        <div class="aspect-video overflow-hidden bg-popular">
                            <x-responsive-img :src="$product['cover']" alt="Vista previa de {{ $product['name'] }}" sizes="(min-width: 1024px) 33vw, (min-width: 640px) 50vw, 100vw" loading="lazy" class="block size-full object-cover object-top" />
                        </div>
                        <div class="flex flex-1 flex-col p-5 sm:p-6">
                            <div class="mb-7 flex items-start justify-between gap-4">
                                <span class="grid size-13 shrink-0 place-items-center rounded-2xl bg-popular text-xl text-primary"><i class="{{ $product['icon'] }}" aria-hidden="true"></i></span>
                                <span class="max-w-36 text-end text-[0.7rem] leading-relaxed text-muted">{{ $product['category'] }}</span>
                            </div>
                            <h3 class="text-xl font-bold tracking-tight text-fg">{{ $product['name'] }}</h3>
                            <p class="mt-2 mb-5 text-sm leading-relaxed text-muted">{{ $product['description'] }}</p>
                            @isset($product['note'])
                                <p class="text-xs font-semibold text-secondary"><i class="fa-solid fa-arrows-rotate me-1" aria-hidden="true"></i> {{ $product['note'] }}</p>
                            @endisset
                            <p class="mt-auto pt-4 text-xs break-all text-muted">{{ parse_url($product['url'], PHP_URL_HOST) }}<span class="mt-1 block text-fg">{{ parse_url($product['url'], PHP_URL_PATH) }}</span></p>
                            <a href="{{ $product['url'] }}" class="mt-4 flex items-center justify-between gap-3 rounded-xl bg-primary px-4 py-3.5 text-sm font-semibold text-on-accent transition hover:brightness-110" target="_blank" rel="noopener noreferrer">
                                {{ $product['access_label'] }}
                                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                <span class="sr-only">(se abre en una pestaña nueva)</span>
                            </a>
                            <a href="{{ route($product['route']) }}" class="mt-4 self-center text-sm text-muted transition hover:text-secondary">Ver producto <i class="fa-solid fa-arrow-right ms-1" aria-hidden="true"></i></a>
                        </div>
                    </article>
                @empty
                    <p class="col-span-full rounded-2xl bg-surface p-8 text-muted">Aún no hay accesos disponibles. <a href="{{ route('contact') }}" class="text-secondary underline">Contacta al equipo Mamba Code.</a></p>
                @endforelse
            </div>
        </section>

        <footer class="mt-14 flex flex-col gap-3 border-t border-glass py-7 text-sm text-muted sm:flex-row sm:items-center sm:justify-between">
            <span>Mamba Code · Portal del equipo</span>
            <a href="{{ route('contact') }}" class="transition hover:text-secondary">Contactar al equipo <i class="fa-solid fa-arrow-right ms-1" aria-hidden="true"></i></a>
        </footer>
    </main>
@endsection
