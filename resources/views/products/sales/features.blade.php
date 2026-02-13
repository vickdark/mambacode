@php
    $features = [
        [
            'title' => 'Gestión de Ventas a Crédito',
            'description' => 'Administra cuentas por cobrar y plazos de pago directamente desde el POS.',
            'icon' => 'fa-solid fa-file-invoice-dollar'
        ],
        [
            'title' => 'Control Multi-Almacén',
            'description' => 'Gestiona inventarios en diferentes sucursales o depósitos de forma centralizada.',
            'icon' => 'fa-solid fa-warehouse'
        ],
        [
            'title' => 'Cotizaciones y Pedidos',
            'description' => 'Genera cotizaciones y conviértelas en ventas con un solo clic.',
            'icon' => 'fa-solid fa-calculator'
        ],
        [
            'title' => 'Gestión de Caja y Turnos',
            'description' => 'Controla aperturas, cierres y movimientos de efectivo por turno y usuario.',
            'icon' => 'fa-solid fa-cash-register'
        ],
        [
            'title' => 'Reportes de Rentabilidad',
            'description' => 'Accede a informes detallados de ventas, productos y utilidad en tiempo real.',
            'icon' => 'fa-solid fa-chart-line'
        ],
        [
            'title' => 'Facturación Electrónica Integrada',
            'description' => 'Emite facturas electrónicas válidas y cumple con la normativa fiscal vigente.',
            'icon' => 'fa-solid fa-receipt'
        ],
        [
            'title' => 'Devoluciones y Cambios',
            'description' => 'Procesa devoluciones y cambios de forma rápida, actualizando el inventario automáticamente.',
            'icon' => 'fa-solid fa-rotate-left'
        ],
        [
            'title' => 'Alertas de Stock Mínimo',
            'description' => 'Recibe notificaciones automáticas cuando los productos alcanzan su stock mínimo.',
            'icon' => 'fa-solid fa-bell'
        ],
        [
            'title' => 'Perfiles de Usuario Personalizables',
            'description' => 'Define roles y permisos específicos para cada miembro de tu equipo.',
            'icon' => 'fa-solid fa-user-shield'
        ]
    ];
@endphp

<x-products.features
    title="Funcionalidades Clave para tu POS"
    subtitle="Herramientas esenciales para optimizar tu punto de venta y la gestión comercial."
    badge="Gestión Comercial"
    :features="$features"
/>
