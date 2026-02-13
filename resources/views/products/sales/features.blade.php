@php
    $features = [
        [
            'title' => 'Gestión de Ventas a Crédito',
            'description' => 'Administra cuentas por cobrar, límites de crédito y plazos de pago para tus clientes.',
            'icon' => 'fa-solid fa-file-invoice'
        ],
        [
            'title' => 'Multi-Almacén',
            'description' => 'Controla inventarios en múltiples sucursales o depósitos desde una sola plataforma centralizada.',
            'icon' => 'fa-solid fa-warehouse'
        ],
        [
            'title' => 'Cotizaciones Express',
            'description' => 'Genera y envía cotizaciones profesionales en segundos, con opción a convertirlas en venta.',
            'icon' => 'fa-solid fa-calculator'
        ],
        [
            'title' => 'Control de Caja Chica',
            'description' => 'Registro detallado de gastos menores y movimientos de efectivo diarios.',
            'icon' => 'fa-solid fa-coins'
        ],
        [
            'title' => 'Reportes de Utilidad',
            'description' => 'Analiza la rentabilidad por producto, categoría o periodo con gráficos intuitivos.',
            'icon' => 'fa-solid fa-chart-line'
        ],
        [
            'title' => 'Facturación Electrónica',
            'description' => 'Emisión de comprobantes fiscales cumpliendo con la normativa vigente.',
            'icon' => 'fa-solid fa-qrcode'
        ],
        [
            'title' => 'Gestión de Devoluciones',
            'description' => 'Proceso simplificado para cambios y devoluciones, ajustando inventario automáticamente.',
            'icon' => 'fa-solid fa-rotate-left'
        ],
        [
            'title' => 'Alertas de Stock',
            'description' => 'Notificaciones automáticas cuando tus productos están por agotarse.',
            'icon' => 'fa-solid fa-bell'
        ],
        [
            'title' => 'Perfiles de Usuario',
            'description' => 'Control de acceso granular para cajeros, vendedores, gerentes y administradores.',
            'icon' => 'fa-solid fa-user-shield'
        ]
    ];
@endphp

<x-products.features
    title="Potencia tu Comercio"
    subtitle="Herramientas diseñadas para agilizar tu operación diaria y maximizar tus ganancias."
    badge="Gestión Comercial"
    :features="$features"
/>
