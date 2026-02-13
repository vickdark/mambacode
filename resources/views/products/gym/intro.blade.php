@php
    $carouselImages = [
        [
            'src' => 'https://placehold.co/1200x675/1e1e2e/7e22ce?text=Tablero+de+Socios',
            'alt' => 'Dashboard Gym',
            'caption_title' => 'Gestión de Membresías',
            'caption_text' => 'Control de pagos, vencimientos y renovaciones en un vistazo.'
        ],
        [
            'src' => 'https://placehold.co/1200x675/1e1e2e/3b82f6?text=Acceso+Biometrico',
            'alt' => 'Acceso',
            'caption_title' => 'Seguridad Biométrica',
            'caption_text' => 'Entrada segura y sin tarjetas clonadas para tus socios.'
        ],
        [
            'src' => 'https://placehold.co/1200x675/1e1e2e/10b981?text=App+Entrenador',
            'alt' => 'Rutinas',
            'caption_title' => 'Planes Digitales',
            'caption_text' => 'Asigna rutinas y dietas directamente al móvil del cliente.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-users',
            'title' => 'Retención de Clientes',
            'description' => 'Herramientas CRM integradas para seguimiento personalizado.'
        ],
        [
            'icon' => 'fa-solid fa-calendar-check',
            'title' => 'Reservas Online',
            'description' => 'Sistema para agendar clases grupales o citas nutricionales.'
        ],
        [
            'icon' => 'fa-solid fa-credit-card',
            'title' => 'Cobros Recurrentes',
            'description' => 'Automatización de pagos mensuales sin fricción.'
        ]
    ];
@endphp

<x-products.intro 
    title="SysGym - Software Fitness"
    subtitle="Profesionaliza la gestión de tu centro deportivo y mejora la experiencia de tus socios."
    badge="Próximamente"
    :carouselImages="$carouselImages"
    :features="$features"
>
    <h3 class="fw-bold mb-4 text-white">Entrena tu negocio</h3>
    
    <p class="text-muted mb-4" style="line-height: 1.8;">
        SysGym es la plataforma que transformará tu centro deportivo. Olvídate del papeleo y las hojas de asistencia manuales. Centraliza acceso, cobros y rutinas en una sola app moderna y fácil de usar.
    </p>
</x-products.intro>
