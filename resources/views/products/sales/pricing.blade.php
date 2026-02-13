@php
    $products = [
        [
            'title' => 'Plan Básico POS',
            'price' => '$49',
            'price_period' => '/mes',
            'description' => 'Ideal para pequeños comercios que inician con un sistema de punto de venta.',
            'features' => [
                ['icon' => 'fa-solid fa-cash-register', 'text' => 'Terminal POS (1 usuario)'],
                ['icon' => 'fa-solid fa-boxes-stacked', 'text' => 'Gestión de Inventario Básico'],
                ['icon' => 'fa-solid fa-receipt', 'text' => 'Facturación Simple'],
                ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Estándar'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Empezar Ahora',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Plan Pro POS',
            'price' => '$99',
            'price_period' => '/mes',
            'description' => 'Solución completa para comercios en crecimiento con múltiples funcionalidades.',
            'features' => [
                ['icon' => 'fa-solid fa-cash-register', 'text' => 'Terminal POS (5 usuarios)'],
                ['icon' => 'fa-solid fa-boxes-stacked', 'text' => 'Gestión de Inventario Avanzado'],
                ['icon' => 'fa-solid fa-file-invoice-dollar', 'text' => 'Facturación Electrónica'],
                ['icon' => 'fa-solid fa-chart-line', 'text' => 'Reportes de Ventas Detallados'],
                ['icon' => 'fa-solid fa-shield-alt', 'text' => 'Soporte Prioritario'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Solicitar Demo',
            'featured' => true,
            'badge' => 'Más Popular',
            'delay' => '0.2s',
        ],
        [
            'title' => 'Plan Empresarial POS',
            'price' => 'Personalizado',
            'price_period' => '',
            'description' => 'Diseñado para grandes cadenas y franquicias con necesidades específicas y escalabilidad.',
            'features' => [
                ['icon' => 'fa-solid fa-building', 'text' => 'Soluciones Multi-Sucursal'],
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
