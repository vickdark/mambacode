@php
    $features = [
        [
            'title' => 'Descubrimiento de Activos',
            'description' => 'Escaneo automático de redes para identificar y catalogar hardware y software en uso.',
            'icon' => 'fa-solid fa-satellite-dish'
        ],
        [
            'title' => 'Gestión de Licencias',
            'description' => 'Seguimiento de cumplimiento de licencias de software, renovaciones y auditorías.',
            'icon' => 'fa-solid fa-file-contract'
        ],
        [
            'title' => 'Ciclo de Vida del Hardware',
            'description' => 'Historial completo desde la adquisición, asignación, mantenimiento hasta la baja.',
            'icon' => 'fa-solid fa-timeline'
        ],
        [
            'title' => 'Costos y Depreciación',
            'description' => 'Cálculo automatizado de depreciación y valoración actual de activos TI.',
            'icon' => 'fa-solid fa-coins'
        ],
        [
            'title' => 'Asignación a Usuarios',
            'description' => 'Vincula dispositivos y software a empleados específicos, con historial de responsables.',
            'icon' => 'fa-solid fa-user-tag'
        ],
        [
            'title' => 'Gestión de Garantías',
            'description' => 'Alertas proactivas sobre vencimientos de garantías y contratos de soporte.',
            'icon' => 'fa-solid fa-shield-cat'
        ],
        [
            'title' => 'Solicitudes de Servicio',
            'description' => 'Portal para que usuarios reporten incidencias o soliciten nuevos equipos.',
            'icon' => 'fa-solid fa-headset'
        ],
        [
            'title' => 'Inventario Remoto',
            'description' => 'Agentes ligeros para inventariar equipos fuera de la red corporativa.',
            'icon' => 'fa-solid fa-laptop-medical'
        ],
        [
            'title' => 'Cumplimiento Normativo',
            'description' => 'Reportes listos para auditorías internas y externas (ISO, SOC2).',
            'icon' => 'fa-solid fa-clipboard-check'
        ]
    ];
@endphp

<x-products.features
    title="Control Total de TI"
    subtitle="Una visión 360° de tu infraestructura tecnológica para decisiones estratégicas basadas en datos."
    badge="Gestión de Activos"
    :features="$features"
/>
