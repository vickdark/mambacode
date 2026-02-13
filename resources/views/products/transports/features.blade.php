@php
    $features = [
        [
            'title' => 'Punto de Venta Ágil',
            'description' => 'Registra ventas en segundos. Interfaz diseñada para la velocidad y facilidad de uso en el mostrador.',
            'icon' => 'fa-solid fa-cash-register'
        ],
        [
            'title' => 'Control de Inventario',
            'description' => 'Monitorea existencias en tiempo real, gestiona alertas de bajo stock y optimiza tus pedidos.',
            'icon' => 'fa-solid fa-boxes-stacked'
        ],
        [
            'title' => 'Reportes y Finanzas',
            'description' => 'Visualiza ganancias, gastos y flujo de caja en reportes claros para tomar mejores decisiones.',
            'icon' => 'fa-solid fa-chart-pie'
        ],
        [
            'title' => 'Gestión de Clientes',
            'description' => 'Administra cuentas corrientes y créditos. Mantén un historial detallado de tus mejores clientes.',
            'icon' => 'fa-solid fa-users'
        ],
        [
            'title' => 'Sistema ELT Integrado',
            'description' => 'Migración masiva inteligente. Importa productos, clientes y proveedores desde Excel con validación automática.',
            'icon' => 'fa-solid fa-cloud-arrow-up'
        ],
        [
            'title' => 'Cortes de Caja',
            'description' => 'Cuadre diario de efectivo sin estrés. Reportes detallados por turno y cajero.',
            'icon' => 'fa-solid fa-file-invoice-dollar'
        ],
        [
            'title' => 'Proveedores',
            'description' => 'Gestión completa de abastecimiento. Registra compras y actualiza tu inventario automaticamente.',
            'icon' => 'fa-solid fa-truck-field'
        ],
        [
            'title' => 'Modo Offline y Licencias',
            'description' => 'Sigue vendiendo sin internet. Elige entre pago único de licencia de por vida o suscripción mensual flexible.',
            'icon' => 'fa-solid fa-wifi'
        ],
        [
            'title' => 'Seguridad Total',
            'description' => 'Respaldos automáticos, cierre de cajas programado y protección de datos avanzada.',
            'icon' => 'fa-solid fa-lock'
        ]
    ];
@endphp

<x-products.features
    title="Características Tecnológicas"
    subtitle="Analizamos tu lógica de negocio para ofrecerte herramientas que realmente impulsen tu productividad."
    badge="Soluciones"
    :features="$features"
/>
