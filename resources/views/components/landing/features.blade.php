@php
    $services = [
        ['icon' => 'fa-magnifying-glass-chart', 'title' => 'Análisis de negocio', 'description' => 'Desglosamos la lógica de tu operación para identificar cuellos de botella y oportunidades de digitalización efectivas.'],
        ['icon' => 'fa-laptop-code', 'title' => 'Desarrollo a medida', 'description' => 'Creamos software exclusivo que se adapta a tus reglas de negocio, y no al revés. Tu visión, nuestro código.'],
        ['icon' => 'fa-microchip', 'title' => 'Plataformas inteligentes', 'description' => 'Implementamos sistemas capaces de procesar datos complejos para brindarte insights accionables en tiempo real.'],
        ['icon' => 'fa-gears', 'title' => 'Automatización de procesos', 'description' => 'Eliminamos tareas repetitivas mediante flujos de trabajo automatizados, liberando a tu equipo para lo estratégico.'],
        ['icon' => 'fa-server', 'title' => 'Infraestructura escalable', 'description' => 'Arquitecturas cloud robustas diseñadas para crecer contigo, garantizando rendimiento y disponibilidad global.'],
        ['icon' => 'fa-chart-line', 'title' => 'Estrategia digital', 'description' => 'Te acompañamos en la transformación digital, asegurando que cada implementación tecnológica tenga un retorno real.'],
    ];
@endphp

<section class="container-page py-20 lg:py-28" id="servicios">
    <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-end lg:mb-12">
        <div class="max-w-2xl">
            <span class="eyebrow">/ servicios</span>
            <h2 class="section-title mt-3.5">Soluciones empresariales de punta a punta</h2>
        </div>
        <p class="max-w-md leading-relaxed text-muted">Analizamos la lógica de tu negocio para transformarla en soluciones digitales a medida, automatizar tus procesos y escalar tu infraestructura.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($services as $service)
            <article x-reveal="{{ 0.06 * ($loop->index % 3) }}" class="group relative flex flex-col overflow-hidden rounded-[1.1rem] border border-glass bg-surface p-7 transition-colors duration-300 hover:border-highlight">
                {{-- Accent line that draws in on hover --}}
                <span class="absolute inset-x-0 top-0 h-0.5 origin-left scale-x-0 bg-primary transition-transform duration-500 group-hover:scale-x-100" aria-hidden="true"></span>

                <div class="mb-6 flex items-start justify-between">
                    <span class="grid size-12 place-items-center rounded-xl border border-highlight bg-bg text-lg text-primary transition-colors duration-300 group-hover:border-primary">
                        <i class="fa-solid {{ $service['icon'] }}" aria-hidden="true"></i>
                    </span>
                    <span class="font-mono text-xs text-faint">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3 class="mb-2.5 text-xl font-semibold text-fg">{{ $service['title'] }}</h3>
                <p class="leading-relaxed text-muted">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>
