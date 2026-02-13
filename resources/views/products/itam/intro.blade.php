@php
    $carouselImages = [
        [
            'src' => 'https://picsum.photos/1200/675?random=4',
            'alt' => 'Dashboard ITAM',
            'caption_title' => 'Visibilidad Central',
            'caption_text' => 'Conoce exactamente qué tienes, quién lo usa y dónde está.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=5',
            'alt' => 'Topología',
            'caption_title' => 'Mapeo de Red',
            'caption_text' => 'Visualiza conexiones y dependencias críticas entre servidores.'
        ],
        [
            'src' => 'https://picsum.photos/1200/675?random=6',
            'alt' => 'Auditoría',
            'caption_title' => 'Auditorías sin Estrés',
            'caption_text' => 'Genera evidencias de cumplimiento en minutos.'
        ]
    ];

    $features = [
        [
            'icon' => 'fa-solid fa-server',
            'title' => 'Inventario Hardware/Software',
            'description' => 'Base de datos unificada de todos tus recursos tecnológicos.'
        ],
        [
            'icon' => 'fa-solid fa-file-contract',
            'title' => 'Gestión de Contratos',
            'description' => 'Alertas automáticas antes de renovaciones costosas.'
        ],
        [
            'icon' => 'fa-solid fa-user-check',
            'title' => 'Responsabilidad Clara',
            'description' => 'Firma digital de resguardos de equipo por empleado.'
        ]
    ];
@endphp

<x-products.intro 
    title="Gestión de Activos ITAM"
    subtitle="Maximiza el valor de tus inversiones en tecnología y minimiza riesgos operativos y legales."
    badge="Infraestructura TI"
    :carouselImages="$carouselImages"
    :features="$features"
>
    <h3 class="fw-bold mb-4 text-white">Tu inventario bajo control</h3>
    
    <p class="text-muted mb-4" style="line-height: 1.8;">
        Desde laptops hasta licencias de software en la nube. Nuestra plataforma ITAM automatiza el descubrimiento, seguimiento y gestión del ciclo de vida de cada activo, asegurando eficiencia financiera y operativa.
    </p>
</x-products.intro>
