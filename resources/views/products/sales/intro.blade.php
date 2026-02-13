@php
    $carouselImages = [
        [
            'src' => 'https://picsum.photos/1200/675?random=10',
            'alt' => 'Dashboard Sales',
            'caption_title' => 'Visión General',
            'caption_text' => 'Control total de ingresos y rendimiento de productos en tiempo real.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=11',
            'alt' => 'POS',
            'caption_title' => 'Interfaz POS',
            'caption_text' => 'Punto de venta intuitivo para transacciones rápidas y sin errores.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=12',
            'alt' => 'Inventario',
            'caption_title' => 'Inventario Inteligente',
            'caption_text' => 'Seguimiento preciso de existencias y actualizaciones automáticas.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-file-invoice',
            'title' => 'Facturación Fiscal',
            'description' => 'Genera facturas electrónicas válidas al instante.'
        ],
        [
            'icon' => 'fa-solid fa-chart-line',
            'title' => 'Reportes Detallados',
            'description' => 'Análisis de tendencias de ventas y productos más vendidos.'
        ],
        [
            'icon' => 'fa-solid fa-boxes-stacked',
            'title' => 'Control Multi-Sucursal',
            'description' => 'Gestiona todas tus ubicaciones desde un solo panel.'
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
        Olvídate de las hojas de cálculo y los cuadernos. Nuestro sistema centraliza toda tu operación comercial, desde la apertura de caja hasta el cierre fiscal, permitiéndote enfocarte en tus clientes.
    </p>
</x-products.intro>
