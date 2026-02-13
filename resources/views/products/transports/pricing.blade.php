@php
    $products = [
        [
            'title' => 'Plan Básico de Transporte',
            'price' => '$79',
            'price_period' => '/mes',
            'description' => 'Ideal para pequeñas flotas que buscan optimizar sus operaciones diarias.',
            'features' => [
                ['icon' => 'fa-solid fa-route', 'text' => 'Planificación de Rutas Básica'],
                ['icon' => 'fa-solid fa-car-side', 'text' => 'Seguimiento GPS (10 vehículos)'],
                ['icon' => 'fa-solid fa-calendar-check', 'text' => 'Gestión de 50 Reservas/mes'],
                ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Estándar'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Empezar Ahora',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Plan Pro de Transporte',
            'price' => '$149',
            'price_period' => '/mes',
            'description' => 'Solución completa para flotas en crecimiento con necesidades avanzadas de gestión.',
            'features' => [
                ['icon' => 'fa-solid fa-route', 'text' => 'Planificación de Rutas Avanzada'],
                ['icon' => 'fa-solid fa-car-side', 'text' => 'Seguimiento GPS Ilimitado'],
                ['icon' => 'fa-solid fa-calendar-check', 'text' => 'Gestión de Reservas Ilimitadas'],
                ['icon' => 'fa-solid fa-screwdriver-wrench', 'text' => 'Gestión de Mantenimiento'],
                ['icon' => 'fa-solid fa-shield-alt', 'text' => 'Soporte Prioritario'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Solicitar Demo',
            'featured' => true,
            'badge' => 'Más Popular',
            'delay' => '0.2s',
        ],
        [
            'title' => 'Plan Empresarial',
            'price' => 'Personalizado',
            'price_period' => '',
            'description' => 'Diseñado para grandes operadores de transporte con requisitos específicos y escalabilidad.',
            'features' => [
                ['icon' => 'fa-solid fa-building', 'text' => 'Soluciones a Medida'],
                ['icon' => 'fa-solid fa-handshake', 'text' => 'Gestor de Cuenta Dedicado'],
                ['icon' => 'fa-solid fa-cogs', 'text' => 'Integraciones Personalizadas'],
                ['icon' => 'fa-solid fa-lock', 'text' => 'Seguridad Empresarial'],
                ['icon' => 'fa-solid fa-star', 'text' => 'Soporte 24/7'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Contactar Ventas',
            'delay' => '0.3s',
        ],
    ];
@endphp

<x-products.pricing :products="$products" />