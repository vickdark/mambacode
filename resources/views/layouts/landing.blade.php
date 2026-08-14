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
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0f172a">
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
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/landing/index.js'])
</head>
<body class="landing-page text-white">
    <!-- Background Animation -->
    <div class="landing-bg"></div>

    @yield('content')

</body>

<script>
// Smooth scroll for internal anchors, account for fixed navbar height
// Use capture-phase listener for contact anchor to avoid broken handlers stopping navigation
function smoothScrollToId(id){
  const target = document.getElementById(id);
  if(!target) return false;
  const nav = document.querySelector('.landing-nav');
  const navHeight = nav ? nav.getBoundingClientRect().height : 0;
  const top = target.getBoundingClientRect().top + window.scrollY - navHeight - 12;
  window.scrollTo({ top, behavior: 'smooth' });
  history.replaceState && history.replaceState(null, '', '#' + id);
  return true;
}

// Capture-phase handler: runs before non-capture listeners and can stop them
document.addEventListener('click', function(e){
  const a = e.target.closest && e.target.closest('a[href^="#"]');
  if(!a) return;
  const href = a.getAttribute('href');
  if(!href || href === '#') return;
  const id = href.slice(1);
  if(!id) return;

  // If it's the contact anchor, intercept immediately and prevent other handlers
  if(id === 'contacto'){
    e.preventDefault();
    e.stopImmediatePropagation();
    smoothScrollToId(id);
    return;
  }

  // For other anchors, do a normal smooth scroll (non-capturing)
  const target = document.getElementById(id);
  if(target){
    e.preventDefault();
    smoothScrollToId(id);
  }
}, true);
</script>
</html>
