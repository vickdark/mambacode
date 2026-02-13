@php
    $products = [
        [
            'title' => 'ITAM Básico',
            'price' => '$79',
            'price_period' => '/mes',
            'description' => 'Gestión esencial de activos de TI para pequeñas y medianas empresas.',
            'features' => [
                ['icon' => 'fa-solid fa-desktop', 'text' => 'Inventario de Hardware y Software'],
                ['icon' => 'fa-solid fa-file-contract', 'text' => 'Gestión de Licencias Básica'],
                ['icon' => 'fa-solid fa-chart-pie', 'text' => 'Informes de Cumplimiento'],
                ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Estándar'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Empezar Ahora',
            'delay' => '0.1s',
        ],
        [
            'title' => 'ITAM Pro',
            'price' => '$149',
            'price_period' => '/mes',
            'description' => 'Solución avanzada de ITAM con automatización y análisis predictivo.',
            'features' => [
                ['icon' => 'fa-solid fa-robot', 'text' => 'Descubrimiento Automatizado de Activos'],
                ['icon' => 'fa-solid fa-sitemap', 'text' => 'Gestión de Relaciones de Activos'],
                ['icon' => 'fa-solid fa-shield-alt', 'text' => 'Análisis de Vulnerabilidades'],
                ['icon' => 'fa-solid fa-cloud', 'text' => 'Gestión de Activos en la Nube'],
                ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Prioritario'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Solicitar Demo',
            'featured' => true,
            'badge' => 'Recomendado',
            'delay' => '0.2s',
        ],
        [
            'title' => 'ITAM Empresarial',
            'price' => 'Personalizado',
            'price_period' => '',
            'description' => 'Plataforma ITAM escalable para grandes organizaciones con requisitos complejos.',
            'features' => [
                ['icon' => 'fa-solid fa-building', 'text' => 'Integración con CMDB Existente'],
                ['icon' => 'fa-solid fa-handshake', 'text' => 'Consultoría y Implementación'],
                ['icon' => 'fa-solid fa-cogs', 'text' => 'Personalización Extensa'],
                ['icon' => 'fa-solid fa-lock', 'text' => 'Seguridad y Auditoría Avanzada'],
                ['icon' => 'fa-solid fa-star', 'text' => 'Soporte 24/7 Dedicado'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Contactar Ventas',
            'delay' => '0.3s',
        ],
    ];
@endphp

<x-products.pricing :products="$products" />
