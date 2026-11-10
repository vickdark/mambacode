<section class="relative overflow-hidden border-b border-glass" id="inicio">
    {{-- Slowly drifting dot grid; one cell larger than the section on the top/left so the loop never shows an edge --}}
    <div class="bg-dot-grid pointer-events-none absolute -top-7 -left-7 right-0 bottom-0 animate-dot-drift will-change-transform" aria-hidden="true"></div>

    {{-- From lg up the hero fills the screen below the 4.5rem navbar, so nothing needs scrolling --}}
    <div class="container-page relative flex flex-col items-center gap-14 py-14 sm:py-20 lg:min-h-[calc(100svh-4.5rem)] lg:flex-row lg:gap-12 lg:py-10 xl:gap-16 2xl:py-14">
        {{-- Staggered entrance: pill, title, copy, buttons, then the logo --}}
        <div class="w-full min-w-0 lg:flex-[1_1_44%]">
            <span class="inline-flex animate-fade-up items-center gap-2.5 rounded-full border border-highlight bg-surface px-3.5 py-1.5 font-mono text-xs text-muted">
                <span class="size-[7px] animate-pulse-dot rounded-full bg-primary"></span>
                desarrollo de software a medida · colombia
            </span>
            <h1 class="mt-6 mb-5 animate-fade-up [animation-delay:0.08s] text-[clamp(2.4rem,4.4vw,3.9rem)] leading-[1.03] font-bold tracking-[-0.04em] text-fg lg:mt-5 3xl:text-[4.5rem]">
                Software a medida, análisis de negocio y <span class="text-primary">automatización de procesos.</span>
            </h1>
            <p class="mb-8 max-w-xl animate-fade-up text-lg leading-relaxed text-muted [animation-delay:0.16s] lg:mb-7">
                Analizamos tu lógica de negocio, automatizamos procesos y escalamos infraestructura. Soluciones digitales con soporte 24/7 garantizado.
            </p>
            <div class="flex animate-fade-up flex-col gap-3 [animation-delay:0.24s] sm:flex-row">
                <a href="#servicios" class="btn-primary">
                    Explorar soluciones <i class="fa-solid fa-arrow-right text-sm" aria-hidden="true"></i>
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">Agendar consultoría</a>
            </div>
        </div>

        <div class="flex w-full min-w-0 animate-fade-left flex-col items-center [animation-delay:0.3s] lg:flex-[1_1_56%]">
            <figure class="flex flex-col items-center">
                {{-- Floats continuously (translate) and tilts toward the mouse on desktop (transform, see tilt.js) --}}
                <div
                    x-data="tilt"
                    class="animate-float transition-transform duration-300 ease-out will-change-transform [transform:perspective(900px)_rotateX(var(--tilt-x,0deg))_rotateY(var(--tilt-y,0deg))_translate(var(--shift-x,0px),var(--shift-y,0px))]"
                >
                    {{-- The PNG has wide transparent margins, so scale the mark up inside its box --}}
                    <x-responsive-img
                        src="img/mambacodelg-removebg.png"
                        alt="Logo de Mamba Code"
                        sizes="400px"
                        fetchpriority="high"
                        class="size-36 scale-[1.6] object-contain sm:size-44 lg:size-52 2xl:size-60"
                    />
                </div>
                <figcaption class="mt-1 text-center">
                    <span class="block font-display text-[clamp(1.9rem,3.6vw,3rem)] leading-none font-bold tracking-[-0.03em] text-fg">mamba<span class="text-primary">code</span></span>
                    <span class="mt-2.5 block font-mono text-xs tracking-[0.2em] text-muted uppercase sm:text-[13px]">soluciones tecnológicas</span>
                </figcaption>
            </figure>

            <div class="mt-8 flex items-center gap-3 rounded-2xl border border-highlight bg-surface px-4 py-3 shadow-soft">
                <span class="grid size-10 place-items-center rounded-xl border border-highlight bg-bg text-primary">
                    <i class="fa-solid fa-headset" aria-hidden="true"></i>
                </span>
                <span class="flex flex-col">
                    <strong class="font-display text-[15px] font-semibold text-fg">Soporte 24/7</strong>
                    <span class="font-mono text-xs text-muted">continuidad garantizada</span>
                </span>
            </div>
        </div>
    </div>
</section>
