@php
        $products = [
            [
                'title' => 'Suscripción Flexible',
                'price' => '$29',
                'price_period' => '/30 días',
                'description' => 'Planes adaptables de 30, 90 o 365 días según tus requerimientos de escalabilidad.',
                'features' => [
                    ['icon' => 'fa-solid fa-shield-halved', 'text' => 'Seguridad de la Información'],
                    ['icon' => 'fa-solid fa-database', 'text' => 'Integridad de Datos y Backups'],
                    ['icon' => 'fa-solid fa-bolt', 'text' => 'Alto Rendimiento Garantizado'],
                    ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Técnico Especializado'],
                ],
                'button_link' => '#contacto',
                'button_text' => 'Iniciar Despliegue',
                'delay' => '0.1s',
            ],
            [
                'title' => 'Licencia de Software',
                'price' => '$499',
                'price_period' => '/Pago único',
                'description' => 'Adquiere el uso perpetuo del software con servicios de mantenimiento y evolutivos anuales.',
                'features' => [
                    ['icon' => 'fa-solid fa-check-double', 'text' => 'Pago único por Uso de Software'],
                    ['icon' => 'fa-solid fa-gears', 'text' => 'Mantenimiento de Software*', 'note' => '*Requiere un pequeño pago anual'],
                    ['icon' => 'fa-solid fa-headset', 'text' => 'Soporte Técnico Especializado'],
                    ['icon' => 'fa-solid fa-chalkboard-user', 'text' => 'Capacitaciones Personalizadas'],
                    ['icon' => 'fa-solid fa-code-branch', 'text' => 'Mejoras e Integraciones**', 'note' => '**Sujeto a presupuesto por desarrollo'],
                    ['icon' => 'fa-solid fa-shield-halved', 'text' => 'Máxima Seguridad e Integridad'],
                    ['icon' => 'fa-solid fa-server', 'text' => 'Infraestructura de Backups Incluida'],
                ],
                'button_link' => '#contacto',
                'button_text' => 'Adquirir Licencia Vitalicia',
                'featured' => true,
                'badge' => 'Recomendado',
                'delay' => '0.2s',
            ],
        ];
    @endphp

<x-products.pricing :products="$products" />