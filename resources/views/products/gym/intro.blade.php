@php
    $carouselImages = [
        [
            'src' => 'https://picsum.photos/1200/675?random=1',
            'alt' => 'Dashboard Gym',
            'caption_title' => 'Gestión de Membresías',
            'caption_text' => 'Control de pagos, vencimientos y renovaciones en un vistazo.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=2',
            'alt' => 'Acceso',
            'caption_title' => 'Seguridad Biométrica',
            'caption_text' => 'Entrada segura y sin tarjetas clonadas para tus socios.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=3',
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
    <h2 class="mb-4 text-2xl font-bold text-fg sm:text-3xl">Entrena tu negocio</h2>
    
    <p class="mb-6 leading-loose text-muted">
        SysGym es la plataforma que transformará tu centro deportivo. Olvídate del papeleo y las hojas de asistencia manuales. Centraliza acceso, cobros y rutinas en una sola app moderna y fácil de usar.
    </p>
</x-products.intro>
