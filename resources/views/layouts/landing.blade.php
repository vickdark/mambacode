<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mamba Code - Soluciones Tecnológicas')</title>
    <meta name="description" content="Mamba Code: Análisis de lógica de negocio y desarrollo de soluciones tecnológicas a medida. Evolucionamos tu software con infraestructura escalable, POS inteligente y consultoría experta.">
    <meta name="keywords" content="Mamba Code, soluciones tecnológicas, desarrollo de software, POS, punto de venta, inventario, consultoría it, transformación digital, software a medida, lógica de negocio">
    <meta name="author" content="Mamba Code">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Mamba Code - Soluciones Tecnológicas">
    <meta property="og:description" content="Analizamos tu lógica de negocio para crear software de alto impacto. POS, inventarios y arquitectura escalable.">
    <meta property="og:image" content="{{ asset('img/mambacode.jpeg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Mamba Code - Soluciones Tecnológicas">
    <meta property="twitter:description" content="Analizamos tu lógica de negocio para crear software de alto impacto. POS, inventarios y arquitectura escalable.">
    <meta property="twitter:image" content="{{ asset('img/mambacode.jpeg') }}">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Mamba Code",
      "alternateName": "Mamba Code Soluciones Tecnológicas",
      "description": "Expertos en análisis de lógica de negocio y desarrollo de software a medida. Ofrecemos sistemas POS, gestión de inventarios y consultoría tecnológica avanzada.",
      "url": "@endverbatim{{ url('/') }}@verbatim",
      "logo": "@endverbatim{{ asset('img/mambacode.jpeg') }}@verbatim",
      "image": "@endverbatim{{ asset('img/mambacode.jpeg') }}@verbatim",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "CO"
      },
      "priceRange": "$$",
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Servicios Tecnológicos",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                "@type": "Service",
                "name": "Análisis de Lógica de Negocio"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                "@type": "Service",
                "name": "Desarrollo de Software a Medida"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                "@type": "Service",
                "name": "Sistema POS Inteligente"
                }
            }
        ]
      }
    }
    @endverbatim
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/pages/landing.css', 'resources/js/pages/landing.js'])
</head>
<body class="landing-page text-white">
    <!-- Background Animation -->
    <div class="landing-bg"></div>

    @yield('content')

</body>
</html>
