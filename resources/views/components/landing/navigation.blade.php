@php
    $onHome = request()->routeIs('home');
    $onProduct = request()->routeIs('products.*');
    $onAccess = request()->routeIs('access.index');
    $home = $onHome ? '' : route('home');
    $quoteLabel = request()->routeIs('products.hospitality') ? 'Cotización' : 'Precios';

    $portfolio = [
        ['route' => 'products.sales', 'label' => 'Sistema de Ventas POS'],
        ['route' => 'products.hospitality', 'label' => 'POS Cafeterías y Bares'],
        ['route' => 'products.transports', 'label' => 'Transporte Privado'],
        ['route' => 'products.aloja360', 'label' => 'Aloja360'],
        ['route' => 'products.medicos', 'label' => 'Médicos Integrados'],
        ['route' => 'products.itam', 'label' => 'Gestión de Activos ITAM'],
    ];

    $links = array_values(array_filter([
        $onProduct
            ? ['href' => '#features', 'section' => 'features', 'label' => 'Funcionalidades']
            : ['href' => $home . '#servicios', 'section' => 'servicios', 'label' => 'Servicios'],
        ['portfolio' => true],
        $onProduct ? ['href' => '#pricing', 'section' => 'pricing', 'label' => $quoteLabel] : null,
        $onProduct ? null : ['href' => $home . '#proceso', 'section' => 'proceso', 'label' => 'Cómo trabajamos'],
        ['href' => route('contact'), 'section' => 'formulario', 'label' => 'Contacto'],
    ]));

    $linkClass = 'py-2 text-sm font-medium transition hover:text-fg';
@endphp

<div x-data="navbar" @scroll.window.throttle.50ms="onScroll()" @keydown.escape.window="menuOpen = false">
    <header
        class="fixed inset-x-0 top-0 z-[999] border-b backdrop-blur-xl transition-colors duration-300 [view-transition-name:site-header]"
        :class="scrolled ? 'border-glass bg-nav-scrolled' : 'border-glass bg-nav'"
    >
        <div class="container-page flex h-[4.5rem] items-center justify-between gap-6">
            <a href="{{ route('home') }}" aria-label="Mamba Code, inicio">
                <x-brand size="lg" />
            </a>

            {{-- Desktop --}}
            <nav class="hidden items-center gap-7 lg:flex" aria-label="Principal">
                @foreach ($links as $link)
                    @isset($link['portfolio'])
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @keydown.escape="open = false">
                            <button type="button" class="{{ $linkClass }} flex items-center gap-1.5 text-muted" :class="open && 'text-fg'" @click="open = !open" :aria-expanded="open" aria-haspopup="true">
                                Portafolio <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open && 'rotate-180'" aria-hidden="true"></i>
                            </button>
                            <ul
                                x-show="open"
                                x-cloak
                                x-transition.origin.top.left
                                class="absolute top-full left-0 mt-3 w-64 rounded-xl border border-glass bg-dropdown p-1.5 shadow-soft"
                            >
                                @foreach ($portfolio as $item)
                                    <li><a href="{{ route($item['route']) }}" class="block rounded-lg px-4 py-2.5 text-sm text-fg transition hover:bg-hover">{{ $item['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="{{ $linkClass }}" :class="isActive('{{ $link['section'] }}') ? 'text-fg' : 'text-muted'">{{ $link['label'] }}</a>
                    @endisset
                @endforeach
            </nav>

            <div class="hidden items-center gap-2 lg:flex">
                <x-theme-toggle class="size-11 border-0! bg-transparent!" />
                <a
                    href="{{ route('access.index') }}"
                    @if ($onAccess) aria-current="page" @endif
                    @class([
                        'inline-flex min-h-11 items-center rounded-xl border px-4 text-sm font-medium transition hover:border-primary hover:text-primary',
                        'border-primary text-primary' => $onAccess,
                        'border-btn-border text-fg' => ! $onAccess,
                    ])
                >Portal de accesos</a>
            </div>

            {{-- Mobile / tablet --}}
            <button
                type="button"
                class="grid size-11 place-items-center rounded-lg text-xl text-fg transition hover:bg-hover lg:hidden"
                @click="menuOpen = true"
                :aria-expanded="menuOpen"
                aria-controls="mobile-sidebar"
                aria-label="Abrir menú"
            >
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>
        </div>

        {{-- Reading progress --}}
        <div class="absolute inset-x-0 -bottom-px h-px">
            <div class="h-full bg-primary transition-[width] duration-100" :style="`width: ${progress}%`"></div>
        </div>
    </header>

    <div x-show="menuOpen" x-cloak class="fixed inset-0 z-[1000] lg:hidden">
        <div x-show="menuOpen" x-transition.opacity class="absolute inset-0 bg-black/60" @click="menuOpen = false"></div>

        <aside
            id="mobile-sidebar"
            x-show="menuOpen"
            x-transition:enter="transition duration-300 ease-out"
            x-transition:enter-start="translate-x-full"
            x-transition:leave="transition duration-200 ease-in"
            x-transition:leave-end="translate-x-full"
            x-trap.noscroll="menuOpen"
            class="absolute inset-y-0 right-0 flex w-[min(88vw,340px)] flex-col border-l border-glass bg-offcanvas"
            aria-label="Menú móvil"
        >
            <div class="flex h-[4.5rem] items-center justify-between border-b border-glass px-4">
                <x-brand />
                <button type="button" class="grid size-11 place-items-center rounded-lg text-xl text-fg hover:bg-hover" @click="menuOpen = false" aria-label="Cerrar menú">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>

            <nav class="flex flex-1 flex-col gap-1 overflow-y-auto p-3" @click="$event.target.closest('a') && (menuOpen = false)">
                <a href="{{ route('home') }}" class="flex min-h-12 items-center rounded-lg px-4 text-fg transition hover:bg-hover">Inicio</a>
                @foreach ($links as $link)
                    @isset($link['portfolio'])
                        <div x-data="{ open: false }">
                            <button type="button" class="flex min-h-12 w-full items-center rounded-lg px-4 text-fg transition hover:bg-hover" @click="open = !open" :aria-expanded="open">
                                Portafolio
                                <i class="fa-solid fa-chevron-down ms-auto text-xs transition-transform" :class="open && 'rotate-180'" aria-hidden="true"></i>
                            </button>
                            <ul x-show="open" x-collapse class="ms-4 border-s border-glass ps-2">
                                @foreach ($portfolio as $item)
                                    <li><a href="{{ route($item['route']) }}" class="flex min-h-11 items-center rounded-lg px-4 text-sm text-muted transition hover:bg-hover hover:text-fg">{{ $item['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="flex min-h-12 items-center rounded-lg px-4 text-fg transition hover:bg-hover">{{ $link['label'] }}</a>
                    @endisset
                @endforeach

                <hr class="my-2 border-glass">

                <a href="{{ route('access.index') }}" class="flex min-h-12 items-center rounded-lg px-4 text-fg transition hover:bg-hover">Portal de accesos</a>
                <x-theme-toggle label="Tema" class="mt-2 min-h-12 w-full px-4" />
            </nav>
        </aside>
    </div>
</div>
