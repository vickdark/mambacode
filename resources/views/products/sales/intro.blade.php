@php
    $carouselImages = [
        [
            'src' => asset('img/products/sales/ventas_1.png'),
            'alt' => 'Dashboard Ventas',
            'caption_title' => 'Visión General de Ventas',
            'caption_text' => 'Panel de control intuitivo para monitorear tus ventas en tiempo real.'
        ],
        [
            'src' => asset('img/products/sales/ventas_2.png'),
            'alt' => 'Punto de Venta',
            'caption_title' => 'Punto de Venta Ágil',
            'caption_text' => 'Interfaz optimizada para transacciones rápidas y eficientes en tu comercio.'
        ],
        [
            'src' => asset('img/products/sales/ventas_3.png'),
            'alt' => 'Gestión de Inventario',
            'caption_title' => 'Control de Inventario Inteligente',
            'caption_text' => 'Automatiza el seguimiento de existencias y recibe alertas de bajo stock.'
        ],
        [
            'src' => asset('img/products/sales/ventas_4.png'),
            'alt' => 'Dashboard Ventas',
            'caption_title' => 'Visión General de Ventas',
            'caption_text' => 'Panel de control intuitivo para monitorear tus ventas en tiempo real.'
        ],
        [
            'src' => asset('img/products/sales/ventas_5.png'),
            'alt' => 'Punto de Venta',
            'caption_title' => 'Punto de Venta Ágil',
            'caption_text' => 'Interfaz optimizada para transacciones rápidas y eficientes en tu comercio.'
        ],
        [
            'src' => asset('img/products/sales/ventas_6.png'),
            'alt' => 'Gestión de Inventario',
            'caption_title' => 'Control de Inventario Inteligente',
            'caption_text' => 'Automatiza el seguimiento de existencias y recibe alertas de bajo stock.'
        ],
        [
            'src' => asset('img/products/sales/ventas_7.png'),
            'alt' => 'Punto de Venta',
            'caption_title' => 'Punto de Venta Ágil',
            'caption_text' => 'Interfaz optimizada para transacciones rápidas y eficientes en tu comercio.'
        ],
        [
            'src' => asset('img/products/sales/ventas_8.png'),
            'alt' => 'Gestión de Inventario',
            'caption_title' => 'Control de Inventario Inteligente',
            'caption_text' => 'Automatiza el seguimiento de existencias y recibe alertas de bajo stock.'
        ],
        [
            'src' => asset('img/products/sales/ventas_9.png'),
            'alt' => 'Punto de Venta',
            'caption_title' => 'Punto de Venta Ágil',
            'caption_text' => 'Interfaz optimizada para transacciones rápidas y eficientes en tu comercio.'
        ],
        [
            'src' => asset('img/products/sales/ventas_10.png'),
            'alt' => 'Gestión de Inventario',
            'caption_title' => 'Control de Inventario Inteligente',
            'caption_text' => 'Automatiza el seguimiento de existencias y recibe alertas de bajo stock.'
        ],
        [
            'src' => asset('img/products/sales/ventas_11.png'),
            'alt' => 'Punto de Venta',
            'caption_title' => 'Punto de Venta Ágil',
            'caption_text' => 'Interfaz optimizada para transacciones rápidas y eficientes en tu comercio.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-cash-register',
            'title' => 'Terminal POS Intuitiva',
            'description' => 'Realiza ventas, devoluciones y cambios con una interfaz fácil de usar.'
        ],
        [
            'icon' => 'fa-solid fa-boxes-stacked',
            'title' => 'Gestión de Inventario',
            'description' => 'Controla tus productos, categorías y almacenes de forma centralizada.'
        ],
        [
            'icon' => 'fa-solid fa-chart-line',
            'title' => 'Reportes de Ventas Detallados',
            'description' => 'Analiza el rendimiento de tus productos y vendedores con informes completos.'
        ]
    ];
@endphp

<x-products.intro 
    title="Sistema de Ventas POS"
    subtitle="La solución definitiva para comercios que buscan agilidad, control y crecimiento escalable."
    badge="Gestión Comercial"
    :carouselImages="$carouselImages"
    :features="$features"
>
    <h3 class="fw-bold mb-4 text-white">Vende más, gestiona mejor</h3>
    
    <p class="text-muted mb-4" style="line-height: 1.8;">
        Optimiza cada aspecto de tu operación comercial, desde la gestión de inventario hasta la facturación electrónica y el análisis de ventas, todo en una plataforma robusta y fácil de usar.
    </p>
</x-products.intro>
