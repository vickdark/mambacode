@php
    $steps = [
        ['title' => 'Soluciones a la medida', 'text' => 'Resolvemos problemas reales con software construido para tus procesos, datos y clientes. No usamos plantillas: tu proyecto crece con tu negocio.'],
        ['title' => 'Entrega clara', 'text' => 'Priorizamos comunicación frecuente, plazos definidos y entregables con valor inmediato para que cada fase sea útil desde el primer día.'],
        ['title' => 'Soporte estratégico', 'text' => 'Acompañamos tu solución en producción con mejoras, ajustes y optimización continua para que tu tecnología no solo funcione, sino que evolucione.'],
    ];
@endphp

<section class="border-t border-glass" id="proceso">
    <div class="container-page py-20 lg:py-28">
        <span class="eyebrow">/ cómo trabajamos</span>
        <h2 class="section-title mt-3.5 mb-10 max-w-3xl lg:mb-12">Claridad, control y cuidado técnico en cada fase</h2>

        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($steps as $step)
                <div x-reveal="{{ 0.08 * $loop->iteration }}" class="rounded-[1.1rem] border border-glass bg-surface p-7">
                    <span class="grid size-10 place-items-center rounded-xl border border-highlight font-mono text-sm text-primary">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="mt-5 mb-2.5 text-[1.3rem] font-semibold text-fg">{{ $step['title'] }}</h3>
                    <p class="leading-relaxed text-muted">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
