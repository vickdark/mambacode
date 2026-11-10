@php
    $featured = [
        [
            'route' => 'products.sales',
            'icon' => 'fa-cart-shopping',
            'title' => 'Sistema de Ventas POS',
            'description' => 'Punto de venta con facturación, control de inventarios y reportes financieros para escalar tu comercio.',
            'image' => 'img/products/sales/ventas_1.png',
            'highlights' => [
                ['icon' => 'fa-cash-register', 'text' => 'Terminal POS para ventas, devoluciones y cambios'],
                ['icon' => 'fa-boxes-stacked', 'text' => 'Inventario multi-almacén centralizado'],
                ['icon' => 'fa-chart-line', 'text' => 'Reportes de ventas y rentabilidad en tiempo real'],
            ],
        ],
        [
            'route' => 'products.transports',
            'icon' => 'fa-taxi',
            'title' => 'Transporte Privado',
            'description' => 'Sistema de gestión integral para flotas: control de conductores, asignación de rutas y monitoreo en tiempo real.',
            'image' => 'img/products/transports/trans_1.png',
            'highlights' => [
                ['icon' => 'fa-route', 'text' => 'Planificación y optimización de rutas'],
                ['icon' => 'fa-car-side', 'text' => 'Seguimiento GPS de vehículos en tiempo real'],
                ['icon' => 'fa-calendar-check', 'text' => 'Gestión y asignación de reservas'],
            ],
        ],
    ];

    $products = [
        ['route' => 'products.hospitality', 'icon' => 'fa-mug-saucer', 'title' => 'POS Cafeterías y Bares', 'status' => 'disponible', 'description' => 'Punto de venta para cafeterías, bares, licoreras y negocios relacionados.'],
        ['route' => 'products.aloja360', 'icon' => 'fa-hotel', 'title' => 'Aloja360', 'status' => 'en migración', 'description' => 'Disponibilidad, tarifas, huéspedes, reservas y operación diaria de alojamientos.'],
        ['route' => 'products.medicos', 'icon' => 'fa-heart-pulse', 'title' => 'Médicos Integrados', 'status' => 'en migración', 'description' => 'Citas, historia clínica, diagnósticos, recetas y pagos entre pacientes y médicos.'],
        ['route' => 'products.itam', 'icon' => 'fa-server', 'title' => 'Gestión ITAM', 'status' => null, 'description' => 'Ciclo de vida de tus activos de TI: inventario, despliegue, mantenimiento y retiro.'],
    ];

    $upcoming = ['SysGym', 'Turnos y Reservas', 'Gestión Inmobiliaria'];

    // Cards cycle through the logo tones (see .icon-tile in components.css); the grid continues after the featured pair
    $tones = ['tone-magenta', 'tone-sky', 'tone-purple', 'tone-indigo'];
@endphp

<section class="border-t border-glass bg-elevated" id="productos">
    <div class="container-page py-20 lg:py-28">
        <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-end lg:mb-12">
            <div>
                <span class="eyebrow">/ portafolio</span>
                <h2 class="section-title mt-3.5">Productos en producción</h2>
            </div>
            <p class="max-w-md leading-relaxed text-muted">Soluciones tecnológicas desarrolladas para potenciar sectores específicos.</p>
        </div>

        {{-- Featured products: text beside a screenshot, alternating sides on desktop --}}
        <div class="flex flex-col gap-4">
            @foreach ($featured as $product)
                <a href="{{ route($product['route']) }}" x-reveal class="group {{ $tones[$loop->index % count($tones)] }} grid overflow-hidden rounded-[1.25rem] border border-glass bg-surface transition-colors duration-300 hover:border-highlight {{ $loop->even ? 'lg:grid-cols-[3fr_2fr]' : 'lg:grid-cols-[2fr_3fr]' }}">
                    <div @class(['flex flex-col p-7 sm:p-9', 'lg:order-2' => $loop->even])>
                        <div class="mb-5 flex items-center justify-between">
                            <span class="icon-tile"><i class="fa-solid {{ $product['icon'] }}" aria-hidden="true"></i></span>
                            <span class="status text-ok">● disponible</span>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold tracking-tight text-fg sm:text-3xl">{{ $product['title'] }}</h3>
                        <p class="mb-6 leading-relaxed text-muted">{{ $product['description'] }}</p>
                        <ul class="mb-7 space-y-3">
                            @foreach ($product['highlights'] as $highlight)
                                <li class="flex items-center gap-3 text-[15px] text-fg">
                                    <i class="fa-solid {{ $highlight['icon'] }} w-4 text-center text-sm text-(--tone)" aria-hidden="true"></i>
                                    {{ $highlight['text'] }}
                                </li>
                            @endforeach
                        </ul>
                        <span class="mt-auto inline-flex items-center gap-2 font-semibold text-primary">
                            Conocer más <i class="fa-solid fa-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div @class([
                        'border-glass bg-bg p-4 max-lg:border-t lg:p-6',
                        'lg:order-1 lg:border-e' => $loop->even,
                        'lg:border-s' => $loop->odd,
                    ])>
                        <x-responsive-img :src="$product['image']" alt="Captura de {{ $product['title'] }}" sizes="(min-width: 1024px) 55vw, 100vw" loading="lazy" class="block h-full w-full rounded-lg border border-glass object-cover object-left-top" />
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Rest of the portfolio --}}
        <div class="mt-4 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($products as $product)
                <a href="{{ route($product['route']) }}" x-reveal="{{ 0.06 * $loop->index }}" class="group {{ $tones[($loop->index + count($featured)) % count($tones)] }} flex flex-col rounded-[1.1rem] border border-glass bg-surface p-7 transition-colors duration-300 hover:border-highlight">
                    <div class="mb-6 flex items-start justify-between">
                        <span class="icon-tile">
                            <i class="fa-solid {{ $product['icon'] }}" aria-hidden="true"></i>
                        </span>
                        @if ($product['status'])
                            <span @class(['status', 'text-ok' => $product['status'] === 'disponible', 'text-warn' => $product['status'] !== 'disponible'])>● {{ $product['status'] }}</span>
                        @endif
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-fg">{{ $product['title'] }}</h3>
                    <p class="mb-6 leading-relaxed text-muted">{{ $product['description'] }}</p>
                    <span class="mt-auto inline-flex items-center gap-2 text-sm font-semibold text-primary">
                        Ver producto <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                    </span>
                </a>
            @endforeach
        </div>

        <div class="mt-4 grid gap-4 lg:grid-cols-2">
            <div x-reveal class="flex flex-col gap-4 rounded-[1.1rem] border border-dashed border-highlight p-7 sm:flex-row sm:items-center">
                <span class="grid size-12 shrink-0 place-items-center rounded-xl border border-dashed border-highlight text-lg text-faint">
                    <i class="fa-solid fa-hammer" aria-hidden="true"></i>
                </span>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-fg">Próximamente</h3>
                    <ul class="flex flex-wrap gap-2">
                        @foreach ($upcoming as $name)
                            <li class="rounded-full border border-glass bg-surface px-3 py-1 font-mono text-xs text-muted">{{ $name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <a href="{{ route('contact', ['asunto' => 'Producto a la medida']) }}" x-reveal="0.06" class="group flex flex-col gap-4 rounded-[1.1rem] border border-glass bg-surface p-7 transition-colors hover:border-primary sm:flex-row sm:items-center">
                <span class="grid size-12 shrink-0 place-items-center rounded-xl bg-primary text-lg text-on-accent"><i class="fa-solid fa-briefcase" aria-hidden="true"></i></span>
                <span class="flex-1">
                    <strong class="block font-display text-lg font-semibold text-fg">¿No está lo que buscas? Tu producto, a la medida.</strong>
                    <span class="text-muted">Soluciones que se adaptan 100% a tu empresa.</span>
                </span>
                <span class="inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-primary">Contáctanos <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i></span>
            </a>
        </div>
    </div>
</section>
