@php
    $products = [
        [
            'title' => 'Membresía Bronce',
            'price' => '$30',
            'price_period' => '/mes',
            'description' => 'Acceso básico a nuestras instalaciones y clases grupales.',
            'features' => [
                ['icon' => 'fa-solid fa-dumbbell', 'text' => 'Acceso a Sala de Pesas'],
                ['icon' => 'fa-solid fa-person-running', 'text' => 'Clases Grupales (limitadas)'],
                ['icon' => 'fa-solid fa-shower', 'text' => 'Uso de Duchas y Vestuarios'],
            ],
            'button_link' => '#contacto',
            'button_text' => 'Inscribirse',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Membresía Plata',
            'price' => '$50',
            'price_period' => '/mes',
            'description' => 'Acceso completo a todas las instalaciones y clases, más beneficios adicionales.',
            'features' => [
                ['icon' => 'fa-solid fa-dumbbell', 'text' => 'Acceso Ilimitado a Sala de Pesas'],
                ['icon' => 'fa-solid fa-person-running', 'text' => 'Todas las Clases Grupales'],
                ['icon' => 'fa-solid fa-swimming-pool', 'text' => 'Acceso a Piscina'],
                ['icon' => 'fa-solid fa-spa', 'text' => 'Acceso a Sauna y Vapor'],
                ['icon' => 'fa-solid fa-mug-hot', 'text' => 'Bebidas Energéticas Gratis'],
            ],
            'button_link' => '#contacto',
            'button_text' => '¡Quiero la Plata!',
            'featured' => true,
            'badge' => 'Popular',
            'delay' => '0.2s',
        ],
        [
            'title' => 'Membresía Oro',
            'price' => '$80',
            'price_period' => '/mes',
            'description' => 'La experiencia premium con entrenamiento personalizado y todos los lujos.',
            'features' => [
                ['icon' => 'fa-solid fa-star', 'text' => 'Entrenador Personal (2 sesiones/mes)'],
                ['icon' => 'fa-solid fa-utensils', 'text' => 'Plan de Nutrición Personalizado'],
                ['icon' => 'fa-solid fa-handshake', 'text' => 'Acceso VIP a Eventos'],
                ['icon' => 'fa-solid fa-tshirt', 'text' => 'Kit de Bienvenida Exclusivo'],
                ['icon' => 'fa-solid fa-infinity', 'text' => 'Todos los Beneficios de Plata'],
            ],
            'button_link' => '#contacto',
            'button_text' => '¡Ser de Oro!',
            'delay' => '0.3s',
        ],
    ];
@endphp

<x-products.pricing :products="$products" />
