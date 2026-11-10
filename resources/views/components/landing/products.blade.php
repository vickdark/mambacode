@php
    $products = [
        ['route' => 'products.transports', 'icon' => 'fa-taxi', 'title' => 'Transporte Privado', 'cta' => 'Explorar Solución', 'description' => 'Sistema de gestión integral para flotas de transporte. Control de conductores, asignación de rutas y monitoreo en tiempo real para optimizar tu logística.'],
        ['route' => 'products.sales', 'icon' => 'fa-cash-register', 'title' => 'Sistema de Ventas', 'cta' => 'Conocer Más', 'description' => 'Punto de venta versátil con facturación, control de inventarios muti-almacén y reportes financieros detallados para escalar tu comercio.'],
        ['route' => 'products.hospitality', 'icon' => 'fa-mug-saucer', 'title' => 'POS Cafeterías y Bares', 'cta' => 'Conocer Más', 'description' => 'Punto de venta para cafeterías, bares, licoreras y negocios relacionados. Una solución para acompañar la operación comercial de tu negocio.'],
        ['route' => 'products.aloja360', 'icon' => 'fa-hotel', 'title' => 'Aloja360', 'cta' => 'Conocer Aloja360', 'badge' => 'En migración', 'description' => 'Administra alojamientos turísticos con herramientas para disponibilidad, tarifas, huéspedes, reservas y operación diaria.'],
        ['route' => 'products.medicos', 'icon' => 'fa-heart-pulse', 'title' => 'Médicos Integrados', 'cta' => 'Conocer el sistema', 'badge' => 'En migración', 'description' => 'Conecta pacientes y profesionales de la salud con herramientas para citas, historia clínica, diagnósticos, recetas y pagos.'],
        ['route' => 'products.itam', 'icon' => 'fa-server', 'title' => 'Gestión ITAM', 'cta' => 'Ver Detalles', 'description' => 'Estrategia integral para el ciclo de vida de tus activos de TI. Inventaria, despliega, mantén y retira hardware y software maximizando el valor.'],
        ['route' => null, 'icon' => 'fa-dumbbell', 'title' => 'SysGym', 'badge' => 'Próximamente', 'description' => 'La solución definitiva para la administración de gimnasios. Gestión de membresías, control de accesos biométrico y seguimiento de progreso de clientes.'],
        ['route' => null, 'icon' => 'fa-calendar-days', 'title' => 'Turnos y Reservas', 'badge' => 'Próximamente', 'description' => 'Sistema para gestionar turnos, reservas y agendas con notificaciones y asignación automática.'],
        ['route' => null, 'icon' => 'fa-city', 'title' => 'Gestión Inmobiliaria', 'badge' => 'En Desarrollo', 'description' => 'Plataforma de gestión inmobiliaria para propiedades, contratos y operaciones, diseñada para crecer con tu cartera.'],
    ];
@endphp

<section class="py-20 lg:py-32" id="productos">
    <x-section-heading badge="Portafolio" title="Productos Recientes">
        Soluciones tecnológicas desarrolladas para potenciar sectores específicos.
    </x-section-heading>

    <div class="container-page grid gap-6 md:grid-cols-2 lg:gap-8 2xl:grid-cols-3">
        {{-- Highlighted: custom development --}}
        <div x-glow x-reveal="0.05" class="group relative mx-auto w-full max-w-3xl rounded-[1.25rem] border border-secondary bg-popular p-8 shadow-[0_30px_80px_var(--shadow-color)] backdrop-blur-md md:col-span-full sm:p-12">
            <span class="badge-warm mb-6 inline-flex tracking-wide uppercase">Propuesta Estelar</span>
            <div x-gradient-icon class="mb-8 grid size-20 place-items-center rounded-full text-white transition-transform duration-500 group-hover:scale-110 group-hover:rotate-[10deg] sm:size-[90px]">
                <i class="fa-solid fa-briefcase fa-2x" aria-hidden="true"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-fg sm:text-3xl">Tu Producto</h3>
            <p class="mb-8 text-base leading-relaxed text-muted sm:text-lg">
                Desarrollamos a la medida soluciones personalizadas que se adaptan 100% a los procesos y objetivos de tu empresa o negocio.
            </p>
            <a href="{{ route('products.custom') }}" class="static inline-flex items-center gap-2 font-semibold text-secondary transition after:absolute after:inset-0 after:z-10 hover:text-primary">
                Contáctanos <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
            </a>
        </div>

        @foreach ($products as $product)
            <div x-glow x-reveal="{{ 0.1 * ($loop->index % 3 + 1) }}" @class([
                'group relative flex h-full flex-col rounded-[1.25rem] border border-feature-border bg-feature p-7 backdrop-blur-md sm:p-10',
                'opacity-80' => ! $product['route'],
            ])>
                @isset($product['badge'])
                    <span class="badge-warm absolute top-5 right-5">{{ $product['badge'] }}</span>
                @endisset
                <div x-gradient-icon class="mb-6 grid size-16 place-items-center rounded-full text-white transition-transform duration-500 group-hover:scale-110 group-hover:rotate-[10deg] sm:size-20">
                    <i class="fa-solid {{ $product['icon'] }} fa-2x" aria-hidden="true"></i>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-fg sm:text-[1.75rem]">{{ $product['title'] }}</h3>
                <p class="mb-6 grow text-base leading-relaxed text-muted sm:text-lg">{{ $product['description'] }}</p>

                @if ($product['route'])
                    <a href="{{ route($product['route']) }}" class="static mt-auto inline-flex w-fit items-center gap-2 font-semibold text-secondary transition after:absolute after:inset-0 after:z-10 hover:text-primary">
                        {{ $product['cta'] }} <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                    </a>
                @else
                    <span class="mt-auto inline-flex w-fit items-center gap-2 font-semibold text-muted">
                        En Desarrollo <i class="fa-solid fa-hammer" aria-hidden="true"></i>
                    </span>
                @endif
            </div>
        @endforeach
    </div>
</section>
