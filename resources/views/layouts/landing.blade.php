<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $seoTitle = trim($__env->yieldContent('title', 'Mamba Code | Desarrollo de Software y Soluciones Tecnológicas'));
        $seoDescription = trim($__env->yieldContent('meta_description', 'Mamba Code es una empresa de desarrollo de software y consultoría tecnológica. Creamos soluciones a medida para digitalizar procesos, automatizar operaciones y hacer crecer tu negocio.'));
        $seoKeywords = trim($__env->yieldContent('meta_keywords', 'Mamba Code, desarrollo de software, soluciones tecnológicas, consultoría tecnológica, software a medida, automatización de procesos, Colombia'));
        $seoImage = trim($__env->yieldContent('meta_image', asset('img/mambacode.jpeg')));
        $seoImageAlt = trim($__env->yieldContent('meta_image_alt', 'Mamba Code, soluciones tecnológicas a medida'));
        $seoImageWidth = trim($__env->yieldContent('meta_image_width', '1280'));
        $seoImageHeight = trim($__env->yieldContent('meta_image_height', '1280'));
        $canonicalUrl = trim($__env->yieldContent('canonical_url', url()->current()));
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="author" content="Mamba Code">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <meta name="theme-color" content="#0a0c11">
    <meta name="image" content="{{ $seoImage }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/mambacodelg-removebg.png') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Mamba Code">
    <meta property="og:locale" content="es_CO">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:image:alt" content="{{ $seoImageAlt }}">
    <meta property="og:image:width" content="{{ $seoImageWidth }}">
    <meta property="og:image:height" content="{{ $seoImageHeight }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <meta name="twitter:image:alt" content="{{ $seoImageAlt }}">

    @php
        $professionalService = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'Mamba Code',
            'alternateName' => 'Mamba Code Soluciones Tecnológicas',
            'description' => $seoDescription,
            'url' => url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('img/mambacodelg-removebg.png'),
            ],
            'image' => $seoImage,
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'CO',
            ],
            'priceRange' => '$$',
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Servicios Tecnológicos',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Análisis de Lógica de Negocio',
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Desarrollo de Software a Medida',
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Sistema POS Inteligente',
                        ],
                    ],
                ],
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Mamba Code',
            'url' => url('/'),
            'image' => $seoImage,
        ];
    @endphp

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
        {!! json_encode($professionalService, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Theme initialization (inline to prevent flash) -->
    <script>
        (function () {
            var stored = null;
            try { stored = localStorage.getItem('theme'); } catch (e) {}
            var prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
            document.documentElement.setAttribute('data-theme', stored || (prefersLight ? 'light' : 'dark'));
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data class="@yield('body_class', 'pt-[4.5rem]')">
    @yield('content')

    <x-theme-preference />
</body>
</html>
