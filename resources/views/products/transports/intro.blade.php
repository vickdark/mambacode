@php
    $carouselImages = [
        [
            'src' => 'https://picsum.photos/1200/675?random=13',
            'alt' => 'Dashboard Transportes',
            'caption_title' => 'Gestión de Flota',
            'caption_text' => 'Control y monitoreo en tiempo real de todos tus vehículos.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=14',
            'alt' => 'Rutas Optimizadas',
            'caption_title' => 'Optimización de Rutas',
            'caption_text' => 'Planificación eficiente para reducir tiempos y costos.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=15',
            'alt' => 'Reservas',
            'caption_title' => 'Sistema de Reservas',
            'caption_text' => 'Gestión sencilla de viajes y asignación de conductores.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-route',
            'title' => 'Planificación de Rutas',
            'description' => 'Crea y optimiza rutas para maximizar la eficiencia.'
        ],
        [
            'icon' => 'fa-solid fa-car-side',
            'title' => 'Seguimiento GPS',
            'description' => 'Monitorea la ubicación de tus vehículos en tiempo real.'
        ],
        [
            'icon' => 'fa-solid fa-calendar-check',
            'title' => 'Gestión de Reservas',
            'description' => 'Administra y asigna viajes de forma intuitiva.'
        ]
    ];
@endphp

<x-products.intro 
    title="Sistema de Transporte Privado"
    subtitle="La plataforma integral para optimizar la gestión de tu flota y mejorar la experiencia de tus clientes."
    badge="Logística y Movilidad"
    :carouselImages="$carouselImages"
    :features="$features"
>
    <h3 class="fw-bold mb-4 text-white">Moviliza tu negocio con eficiencia</h3>
    
    <p class="text-muted mb-4" style="line-height: 1.8;">
        Desde la planificación de rutas hasta el seguimiento en tiempo real y la gestión de conductores, nuestro sistema te brinda las herramientas para operar con máxima eficiencia y ofrecer un servicio excepcional.
    </p>
</x-products.intro>