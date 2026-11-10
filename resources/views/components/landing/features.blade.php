@php
    $services = [
        ['icon' => 'fa-solid fa-magnifying-glass-chart', 'title' => 'Análisis de Negocio', 'description' => 'Desglosamos la lógica de tu operación para identificar cuellos de botella y oportunidades de digitalización efectivas.'],
        ['icon' => 'fa-solid fa-laptop-code', 'title' => 'Desarrollo a Medida', 'description' => 'Creamos software exclusivo que se adapta a tus reglas de negocio, y no al revés. Tu visión, nuestro código.'],
        ['icon' => 'fa-solid fa-brain', 'title' => 'Plataformas Inteligentes', 'description' => 'Implementamos sistemas capaces de procesar datos complejos para brindarte insights accionables en tiempo real.'],
        ['icon' => 'fa-solid fa-robot', 'title' => 'Automatización de Procesos', 'description' => 'Eliminamos tareas repetitivas mediante flujos de trabajo automatizados, liberando a tu equipo para lo estratégico.'],
        ['icon' => 'fa-solid fa-server', 'title' => 'Infraestructura Escalable', 'description' => 'Arquitecturas cloud robustas diseñadas para crecer contigo, garantizando rendimiento y disponibilidad global.'],
        ['icon' => 'fa-solid fa-rocket', 'title' => 'Estrategia Digital', 'description' => 'Te acompañamos en la transformación digital, asegurando que cada implementación tecnológica tenga un retorno real.'],
    ];
@endphp

<section class="py-20 lg:py-32" id="caracteristicas">
    <x-section-heading badge="Nuestra Esencia" title="Soluciones Empresariales">
        Analizamos la lógica de tu negocio para transformarla en soluciones digitales a medida. Diseñamos plataformas inteligentes para automatizar tus procesos y escalar tu infraestructura.
    </x-section-heading>

    <x-feature-grid :features="$services" />
</section>
