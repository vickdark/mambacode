@php
    $onHome = request()->routeIs('home');
    $onProduct = request()->routeIs('products.*');
    $quoteLabel = request()->routeIs('products.hospitality') ? 'Cotización' : 'Precios';

    $portfolio = [
        ['route' => 'products.sales', 'label' => 'Sistema de Ventas POS'],
        ['route' => 'products.hospitality', 'label' => 'POS Cafeterías y Bares'],
        ['route' => 'products.itam', 'label' => 'Gestión de Activos ITAM'],
        ['route' => 'products.transports', 'label' => 'Sistema de Transporte Privado'],
    ];

    $links = array_values(array_filter([
        ['href' => route('home') . '#inicio', 'section' => 'inicio', 'icon' => 'fa-house', 'label' => 'Inicio', 'title' => 'Volver al inicio'],
        $onHome
            ? ['href' => route('home') . '#caracteristicas', 'section' => 'caracteristicas', 'icon' => 'fa-star', 'label' => 'Servicios', 'title' => 'Conoce nuestros servicios']
            : ['href' => '#features', 'section' => 'features', 'icon' => 'fa-star', 'label' => 'Funcionalidades', 'title' => 'Conoce nuestras funcionalidades'],
        ['portfolio' => true],
        $onProduct ? ['href' => '#pricing', 'section' => 'pricing', 'icon' => 'fa-tag', 'label' => $quoteLabel, 'title' => $quoteLabel] : null,
        $onProduct ? null : ['href' => route('home') . '#testimonios', 'section' => 'testimonios', 'icon' => 'fa-comments', 'label' => 'Testimonios', 'title' => 'Qué opinan nuestros clientes'],
        ['href' => ($onHome ? route('home') : '') . '#contacto', 'section' => 'contacto', 'icon' => 'fa-envelope', 'label' => 'Contacto', 'title' => 'Ponte en contacto con nuestro equipo técnico'],
    ]));

    $underline = "relative py-1 font-medium text-fg after:absolute after:-bottom-1 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-primary after:to-secondary after:transition-all hover:after:w-full";
@endphp

<div x-data="navbar" @scroll.window.throttle.50ms="onScroll()" @keydown.escape.window="menuOpen = false">
    <nav
        class="fixed inset-x-0 top-0 z-[999] animate-fade-down border-b backdrop-blur-xl transition-all duration-300"
        :class="scrolled ? 'border-subtle bg-nav-scrolled py-3' : 'border-glass bg-nav py-4'"
        aria-label="Principal"
    >
        <div class="container-page flex items-center justify-between gap-3">
            {{-- Mobile / tablet: hamburger on the left --}}
            <button
                type="button"
                class="grid size-10 place-items-center text-2xl text-fg transition hover:scale-110 hover:text-secondary lg:hidden"
                @click="menuOpen = true"
                :aria-expanded="menuOpen"
                aria-controls="mobile-sidebar"
                aria-label="Abrir menú"
            >
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>

            {{-- Desktop links --}}
            <div class="hidden items-center gap-6 lg:flex xl:gap-8">
                @foreach ($links as $link)
                    @isset($link['portfolio'])
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @keydown.escape="open = false">
                            <button type="button" class="{{ $underline }} flex items-center gap-2" @click="open = !open" :aria-expanded="open" aria-haspopup="true" title="Conoce nuestro portafolio">
                                Portafolio <i class="fa-solid fa-chevron-down text-xs transition-transform" :class="open && 'rotate-180'" aria-hidden="true"></i>
                            </button>
                            <ul
                                x-show="open"
                                x-cloak
                                x-transition.origin.top.left
                                class="absolute top-full left-0 mt-3 w-72 rounded-xl border border-glass bg-dropdown py-2 shadow-soft backdrop-blur-lg"
                            >
                                @foreach ($portfolio as $item)
                                    <li><a href="{{ route($item['route']) }}" class="block px-6 py-3 text-sm text-fg transition hover:bg-hover">{{ $item['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="{{ $underline }}" :class="isActive('{{ $link['section'] }}') && 'after:w-full'" title="{{ $link['title'] }}">{{ $link['label'] }}</a>
                    @endisset
                @endforeach

                <a href="{{ route('access.index') }}" class="{{ $underline }}" title="Portal de accesos" aria-label="Acceso Admin: portal de productos">
                    <i class="fa-solid fa-fingerprint" aria-hidden="true"></i>
                </a>
                <x-theme-toggle />
            </div>

            {{-- Logo (right) --}}
            <a href="{{ route('home') }}#inicio" class="flex min-w-0 items-center gap-3" aria-label="Mamba Code, inicio">
                <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code Logo - Consultoría y Software" width="1280" height="1280" class="aspect-square h-10 w-auto shrink-0 rounded-md object-cover shadow-[0_0_15px_rgba(130,87,229,0.2)] sm:h-11">
                <span class="hidden text-2xl font-bold whitespace-nowrap text-fg sm:block">Mamba<span class="text-secondary">Code</span></span>
            </a>
        </div>

        {{-- Reading progress --}}
        <div class="absolute inset-x-0 bottom-0 h-0.5 bg-subtle">
            <div class="h-full bg-linear-to-r from-secondary to-primary shadow-[0_0_10px_var(--mamba-primary)] transition-[width] duration-100" :style="`width: ${progress}%`"></div>
        </div>
    </nav>

    {{-- Mobile / tablet drawer --}}
    <div x-show="menuOpen" x-cloak class="fixed inset-0 z-[1000] lg:hidden">
        <div x-show="menuOpen" x-transition.opacity class="absolute inset-0 bg-black/50" @click="menuOpen = false"></div>

        <aside
            id="mobile-sidebar"
            x-show="menuOpen"
            x-transition:enter="transition duration-300 ease-out"
            x-transition:enter-start="-translate-x-full"
            x-transition:leave="transition duration-200 ease-in"
            x-transition:leave-end="-translate-x-full"
            x-trap.noscroll="menuOpen"
            class="absolute inset-y-0 left-0 flex w-[min(88vw,340px)] flex-col border-r border-glass bg-offcanvas backdrop-blur-xl"
            aria-label="Menú móvil"
        >
            <div class="flex items-center justify-between border-b border-glass p-4">
                <x-brand />
                <button type="button" class="grid size-9 place-items-center rounded-full text-xl text-fg hover:bg-hover" @click="menuOpen = false" aria-label="Cerrar menú">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>

            <nav class="flex flex-1 flex-col gap-1 overflow-y-auto p-4" @click="$event.target.closest('a') && (menuOpen = false)">
                @foreach ($links as $link)
                    @isset($link['portfolio'])
                        <div x-data="{ open: false }">
                            <button type="button" class="flex w-full items-center rounded-lg px-4 py-3 text-fg transition-all hover:bg-hover hover:pl-6" @click="open = !open" :aria-expanded="open">
                                <i class="fa-solid fa-briefcase w-5 text-secondary" aria-hidden="true"></i>
                                <span class="ms-2">Portafolio</span>
                                <i class="fa-solid fa-chevron-down ms-auto text-xs transition-transform" :class="open && 'rotate-180'" aria-hidden="true"></i>
                            </button>
                            <ul x-show="open" x-collapse class="ps-4">
                                @foreach ($portfolio as $item)
                                    <li>
                                        <a href="{{ route($item['route']) }}" class="flex items-center rounded-lg px-6 py-2 text-sm text-fg transition-all hover:bg-hover hover:pl-8">
                                            <i class="fa-regular fa-circle me-2 text-[0.5rem] text-secondary" aria-hidden="true"></i> {{ $item['label'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="flex items-center rounded-lg px-4 py-3 text-fg transition-all hover:bg-hover hover:pl-6">
                            <i class="fa-solid {{ $link['icon'] }} w-5 text-secondary" aria-hidden="true"></i>
                            <span class="ms-2">{{ $link['label'] }}</span>
                        </a>
                    @endisset
                @endforeach

                <hr class="my-2 border-glass">

                <a href="{{ route('access.index') }}" class="flex items-center rounded-lg px-4 py-3 text-fg transition-all hover:bg-hover hover:pl-6">
                    <i class="fa-solid fa-fingerprint w-5 text-secondary" aria-hidden="true"></i>
                    <span class="ms-2">Acceso Admin</span>
                </a>
                <x-theme-toggle label="Tema" class="mt-2 w-full px-4 py-3" />
            </nav>
        </aside>
    </div>
</div>
