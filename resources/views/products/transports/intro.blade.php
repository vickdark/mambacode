@php
    $carouselImages = [
        [
            'src' => 'https://picsum.photos/1200/675?random=7',
            'alt' => 'Dashboard',
            'caption_title' => 'Monitoreo en Tiempo Real',
            'caption_text' => 'Visualiza la ubicación y estado de cada unidad al instante.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=8',
            'alt' => 'Conductores',
            'caption_title' => 'Gestión de Conductores',
            'caption_text' => 'Expedientes digitales, control de documentos y asignación de vehículos.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=9',
            'alt' => 'App Móvil',
            'caption_title' => 'Aplicación Móvil',
            'caption_text' => 'Herramientas para conductores y pasajeros en Android y iOS.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-route',
            'title' => 'Rutas Inteligentes',
            'description' => 'Algoritmos de optimización para reducir tiempos y combustible.'
        ],
        [
            'icon' => 'fa-solid fa-file-invoice-dollar',
            'title' => 'Facturación Automática',
            'description' => 'Genera facturas y liquidaciones de conductores con un clic.'
        ],
        [
            'icon' => 'fa-solid fa-mobile-screen-button',
            'title' => 'Apps Nativas',
            'description' => 'Experiencia fluida para cliente y conductor.'
        ]
    ];
@endphp

<x-products.intro 
    title="Sistema de Transporte Privado"
    subtitle="Control total sobre tu flota, conductores y facturación en una sola plataforma."
    badge="Solución de Movilidad"
    :carouselImages="$carouselImages"
    :features="$features"
>
    <h3 class="fw-bold mb-4 text-white">Optimiza cada kilómetro</h3>
    
    <p class="text-muted mb-4" style="line-height: 1.8;">
        Nuestra plataforma está diseñada para empresas de transporte privado que buscan eficiencia y control. 
        Desde la asignación inteligente de viajes hasta la facturación automatizada, cubrimos cada aspecto de tu operación.
    </p>
</x-products.intro>
