@php
    $features = [
        [
            'title' => 'Control de Acceso Biométrico',
            'description' => 'Integración con lectores de huella y faciales para ingreso rápido y seguro.',
            'icon' => 'fa-solid fa-fingerprint'
        ],
        [
            'title' => 'Gestión de Membresías',
            'description' => 'Planes flexibles, recurrencias automáticas y notificaciones de vencimiento por WhatsApp.',
            'icon' => 'fa-solid fa-id-card'
        ],
        [
            'title' => 'App para Socios',
            'description' => 'Rutinas personalizadas, reserva de clases y seguimiento de progreso desde el móvil.',
            'icon' => 'fa-solid fa-mobile-heart'
        ],
        [
            'title' => 'Punto de Venta Integrado',
            'description' => 'Vende suplementos, bebidas y merchandising directamente desde el mostrador.',
            'icon' => 'fa-solid fa-cart-shopping'
        ],
        [
            'title' => 'Rutinas y Evaluaciones',
            'description' => 'Creación de planes de entrenamiento digitales y registro de medidas corporales.',
            'icon' => 'fa-solid fa-clipboard-list'
        ],
        [
            'title' => 'Control de Aforo',
            'description' => 'Monitoreo en tiempo real de la ocupación del gimnasio para mejor gestión.',
            'icon' => 'fa-solid fa-users-viewfinder'
        ],
        [
            'title' => 'Facturación Automática',
            'description' => 'Cobros recurrentes a tarjetas y envío de facturas fiscales sin intervención.',
            'icon' => 'fa-solid fa-receipt'
        ],
        [
            'title' => 'Reportes de Retención',
            'description' => 'Identifica socios en riesgo de baja y lanza campañas de fidelización.',
            'icon' => 'fa-solid fa-user-check'
        ],
        [
            'title' => 'Múltiples Sedes',
            'description' => 'Gestiona una cadena de gimnasios con una base de datos unificada de socios.',
            'icon' => 'fa-solid fa-building'
        ]
    ];
@endphp

<x-products.features
    title="La Fuerza de tu Gimnasio"
    subtitle="Tecnología para atraer, retener y motivar a tus socios mientras automatizas la administración."
    badge="Software Fitness"
    :features="$features"
/>
