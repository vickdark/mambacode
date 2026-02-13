@php
    $features = [
        [
            'title' => 'Gestión de Flota',
            'description' => 'Controla y monitorea todos tus vehículos, su estado y disponibilidad en tiempo real.',
            'icon' => 'fa-solid fa-truck-fast'
        ],
        [
            'title' => 'Optimización de Rutas',
            'description' => 'Planifica las rutas más eficientes, considerando tráfico, distancias y puntos de entrega.',
            'icon' => 'fa-solid fa-route'
        ],
        [
            'title' => 'Asignación de Conductores',
            'description' => 'Asigna viajes y conductores de forma inteligente, optimizando tiempos y recursos.',
            'icon' => 'fa-solid fa-user-tie'
        ],
        [
            'title' => 'Seguimiento GPS en Vivo',
            'description' => 'Visualiza la ubicación exacta de cada vehículo y su progreso en el mapa.',
            'icon' => 'fa-solid fa-map-location-dot'
        ],
        [
            'title' => 'Gestión de Mantenimiento',
            'description' => 'Programa y registra el mantenimiento de la flota para asegurar su operatividad.',
            'icon' => 'fa-solid fa-screwdriver-wrench'
        ],
        [
            'title' => 'Reportes de Rendimiento',
            'description' => 'Analiza el desempeño de la flota, consumo de combustible y eficiencia de rutas.',
            'icon' => 'fa-solid fa-chart-line'
        ],
        [
            'title' => 'Sistema de Reservas Integrado',
            'description' => 'Permite a tus clientes reservar viajes fácilmente y gestiona las solicitudes.',
            'icon' => 'fa-solid fa-calendar-check'
        ],
        [
            'title' => 'Comunicación con Clientes',
            'description' => 'Envía notificaciones automáticas sobre el estado del viaje y la llegada del vehículo.',
            'icon' => 'fa-solid fa-bell'
        ],
        [
            'title' => 'Facturación y Pagos',
            'description' => 'Genera facturas por servicios de transporte y gestiona los pagos de forma eficiente.',
            'icon' => 'fa-solid fa-file-invoice-dollar'
        ]
    ];
@endphp

<x-products.features
    title="Control Total en Movimiento"
    subtitle="Herramientas avanzadas para una gestión logística sin precedentes."
    badge="Logística y Movilidad"
    :features="$features"
/>