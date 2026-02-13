@php
    $products = [
        [
            'title' => 'Plan Básico de Ventas',
            'price' => '$49',
            'price_period' => '/mes',
            'description' => 'Ideal para equipos pequeños que buscan optimizar su proceso de ventas.',
            'features' => [
                ['icon' => 'fa-solid fa-chart-line', 'text' => 'Gestión de Leads'],
                ['icon' => 'fa-solid fa-users', 'text' => 'CRM Básico'],
                ['icon' => 'fa-solid fa-envelope', 'text' => 'Email Marketing Integrado'],
                ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Estándar'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Empezar Ahora',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Plan Pro de Ventas',
            'price' => '$99',
            'price_period' => '/mes',
            'description' => 'Solución completa para equipos de ventas en crecimiento con funciones avanzadas.',
            'features' => [
                ['icon' => 'fa-solid fa-rocket', 'text' => 'Automatización de Ventas'],
                ['icon' => 'fa-solid fa-user-tie', 'text' => 'CRM Avanzado'],
                ['icon' => 'fa-solid fa-chart-pie', 'text' => 'Análisis de Rendimiento'],
                ['icon' => 'fa-solid fa-phone-volume', 'text' => 'Integración de Telefonía'],
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
            'description' => 'Diseñado para grandes empresas con necesidades específicas y escalabilidad ilimitada.',
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
