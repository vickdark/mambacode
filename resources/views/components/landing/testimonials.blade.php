@php
    $values = [
        ['title' => 'Soluciones a la medida', 'text' => 'Resolvemos problemas reales con software construido para tus procesos, datos y clientes. No usamos plantillas: tu proyecto crece con tu negocio.'],
        ['title' => 'Entrega clara', 'text' => 'Priorizamos comunicación frecuente, plazos definidos y entregables con valor inmediato para que cada fase sea útil desde el primer día.'],
        ['title' => 'Soporte estratégico', 'text' => 'Acompañamos tu solución en producción con mejoras, ajustes y optimización continua para que tu tecnología no solo funcione, sino que evolucione.'],
    ];
@endphp

<section class="container-page mb-12 py-12 lg:py-20" id="testimonios">
    <div class="mb-10 text-center lg:mb-14">
        <span class="mb-4 inline-flex text-xs tracking-[0.18em] text-secondary uppercase">Qué hacemos mejor</span>
        <h2 class="text-gradient mb-3 text-3xl font-extrabold tracking-tight sm:text-4xl">Nuestro valor en MambaCode</h2>
        <p class="mx-auto max-w-2xl leading-loose text-muted">No se trata de llenar espacios o soluciones genéricas: se trata de construir software que convierte tu idea en resultados reales, con claridad, control y cuidado técnico.</p>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($values as $value)
            <div x-reveal="{{ 0.1 * $loop->iteration }}" class="h-full min-h-64 rounded-3xl border border-card-border bg-card p-7 shadow-[0_24px_60px_var(--shadow-color)] backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:border-highlight hover:bg-hover sm:p-10 lg:p-7 xl:p-10">
                <div class="mb-6 inline-grid size-11 place-items-center rounded-full bg-glass font-bold text-fg">{{ $loop->iteration }}</div>
                <h3 class="mb-4 text-xl font-bold text-fg sm:text-2xl">{{ $value['title'] }}</h3>
                <p class="leading-relaxed text-muted">{{ $value['text'] }}</p>
            </div>
        @endforeach
    </div>
</section>
