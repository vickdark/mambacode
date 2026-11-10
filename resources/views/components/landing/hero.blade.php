@php
    $cards = [
        ['icon' => 'fa-microchip', 'title' => 'Análisis y Consultoría', 'text' => 'Estudiamos profundamente tu lógica de negocio para diseñar la solución tecnológica ideal, construyendo desde cero la infraestructura que necesitas.'],
        ['icon' => 'fa-headset', 'title' => 'Soporte y Disponibilidad', 'text' => 'Disponibilidad garantizada y servicio de soporte técnico experto 24/7 para asegurar la continuidad de tu ecosistema tecnológico.'],
    ];
@endphp

<header class="relative z-[1] flex min-h-screen animate-fade-up flex-col justify-center overflow-hidden py-16 text-center md:py-24 md:text-start" id="inicio">
    {{-- three.js particle network --}}
    <div x-data="heroNetwork" class="absolute inset-0 z-0 opacity-(--hero-net-opacity)" aria-hidden="true"></div>
    {{-- Dark gradient overlay for logo / text readability --}}
    <div class="pointer-events-none absolute inset-0 z-[1] bg-linear-to-b from-slate-900/30 to-slate-900/80" aria-hidden="true"></div>

    <div class="container-page relative z-[2] grid items-center lg:grid-cols-2">
        <div class="mb-12 text-center lg:mb-0 lg:text-start">
            <div class="mb-6 animate-fade-down">
                <img src="{{ asset('img/mambacode-complete-removebg-preview.png') }}" alt="Mamba Code Logo" width="500" height="500" class="mx-auto block size-[120px] rounded-[32px] object-cover md:size-[150px] lg:mx-0 lg:size-80">
            </div>
            <h1 class="text-gradient mb-6 text-[2.2rem] leading-[1.2] font-extrabold tracking-[-2px] md:text-[2.5rem] md:leading-[1.1] lg:text-[3.5rem]">
                Desarrollo de Software a Medida,<br>
                <span class="text-shine">Análisis de Negocio y Automatización de Procesos</span>
            </h1>
            <p class="mb-6 px-4 text-base leading-relaxed text-fg md:px-0 md:text-xl">
                Analizamos tu lógica de negocio, automatizamos procesos y escalamos infraestructura. Soluciones digitales con soporte 24/7 garantizado.
            </p>
            <div class="flex flex-wrap justify-center gap-4 lg:justify-start">
                <a href="#caracteristicas" class="btn-cyber px-6! py-4! text-[1.1rem]!">Explorar Soluciones</a>
                <a href="#contacto" class="inline-block rounded-full border-2 border-secondary px-6 py-4 leading-normal font-semibold text-secondary transition duration-300 hover:-translate-y-[3px] hover:bg-secondary hover:text-white hover:shadow-[0_8px_20px_rgba(59,130,246,0.3)]">Agendar Consultoría</a>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-6 md:mt-0 md:gap-10 md:ps-8">
            @foreach ($cards as $card)
                <div class="animate-fade-left" style="animation-delay: {{ 0.1 + $loop->index * 0.2 }}s">
                    <div class="animate-float will-change-transform {{ $loop->odd ? '' : 'md:ms-12 [animation-delay:-3s]' }}">
                        <div x-glow class="group z-10 cursor-pointer rounded-3xl border border-card-border bg-hero-card p-[1.8rem] text-start shadow-[0_25px_50px_-12px_var(--hero-card-shadow)] backdrop-blur-xl [--glow-radius:1.5rem] md:p-10">
                            <div x-gradient-icon class="mb-6 grid size-[70px] place-items-center rounded-full text-white shadow-soft transition-transform duration-500 group-hover:scale-110 group-hover:rotate-[10deg]">
                                <i class="fa-solid {{ $card['icon'] }} fa-2x" aria-hidden="true"></i>
                            </div>
                            <h3 class="mb-4 text-[1.3rem] font-bold text-fg md:text-[calc(1.3rem+0.6vw)] xl:text-[1.75rem]">{{ $card['title'] }}</h3>
                            <p @class(['text-[0.9rem] leading-relaxed text-muted md:text-base', 'mb-4' => $loop->first])>{{ $card['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</header>
