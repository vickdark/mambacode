@extends('layouts.landing')

@section('title', 'POS para Cafeterías y Bares | Mamba Code')
@section('meta_description', 'Conoce el POS de Mamba Code para cafeterías, bares, licoreras y negocios relacionados. Hablemos de la solución de punto de venta para tu negocio.')
@section('meta_keywords', 'POS cafeterías, POS bares, POS licoreras, punto de venta, Mamba Code')
@section('meta_image_alt', 'Mamba Code: POS para cafeterías y bares')

@php
    $sectors = [
        ['icon' => 'fa-mug-hot', 'title' => 'Cafeterías', 'text' => 'Para negocios donde un buen café y la atención al cliente son parte de cada jornada.', 'detail' => 'Café · Bebidas · Acompañamientos'],
        ['icon' => 'fa-martini-glass-citrus', 'title' => 'Bares', 'text' => 'Para establecimientos donde cada turno reúne bebidas, encuentros y una forma propia de atender.', 'detail' => 'Bares · Gastrobares · Negocios afines'],
        ['icon' => 'fa-wine-bottle', 'title' => 'Licoreras y más', 'text' => 'Para comercios de bebidas y negocios relacionados que buscan una solución de punto de venta.', 'detail' => 'Licoreras · Tiendas de bebidas'],
    ];

    $primaryButton = 'inline-flex min-h-[3.2rem] items-center justify-center gap-3 rounded-xl bg-primary px-5 py-3 text-center text-sm font-bold text-on-accent transition hover:shadow-[0_6px_24px_rgba(130,87,229,0.3)]';
    $orbitIcon = 'absolute grid aspect-square w-1/5 place-items-center rounded-[25%] border border-highlight bg-elevated text-[clamp(1.4rem,2.5vw,2rem)] shadow-[0_10px_25px_var(--shadow-color)]';
@endphp

@section('content')
    <x-landing.navigation />

    <main class="text-fg">
        <section class="pt-7 pb-12 sm:pt-10 lg:pb-22" id="inicio" aria-labelledby="hospitality-title">
            <div class="container-page">
                <a class="mb-8 inline-flex items-center gap-2.5 text-sm text-muted transition hover:text-secondary sm:mb-12" href="{{ route('home') }}#productos">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Nuestro portafolio
                </a>

                <div class="grid items-center gap-12 lg:grid-cols-[1.15fr_1fr]">
                    <div class="min-w-0 max-w-2xl lg:max-w-none">
                        <span class="inline-flex items-center gap-2.5 text-xs font-bold tracking-wider text-secondary uppercase">
                            <i class="fa-solid fa-mug-hot" aria-hidden="true"></i> Un POS para tu negocio
                        </span>
                        <h1 id="hospitality-title" class="mt-5 mb-6 text-[clamp(2.2rem,10.8vw,3.3rem)] leading-[1.08] font-bold tracking-[-0.055em] sm:text-[clamp(2.6rem,4.6vw,4.5rem)]">
                            POS para<br>cafeterías <span class="text-primary">y bares.</span>
                        </h1>
                        <p class="mb-3 text-xl font-semibold">Del primer café al último brindis.</p>
                        <p class="max-w-xl leading-loose text-muted">Una solución de punto de venta para cafeterías, bares, licoreras y negocios relacionados. Conoce cómo llevar la tecnología de Mamba Code a tu operación.</p>

                        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                            <a href="{{ route('contact', ['asunto' => 'POS Cafeterías y Bares']) }}" class="{{ $primaryButton }}">
                                Hablemos de tu negocio <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('access.index') }}" class="inline-flex min-h-[3.2rem] items-center justify-center gap-3 rounded-xl border border-btn-border bg-btn px-5 py-3 text-sm font-bold text-fg transition hover:border-secondary hover:text-secondary">
                                Portal de accesos <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="relative w-full max-w-[30rem] justify-self-center overflow-hidden rounded-3xl border border-card-border bg-surface bg-[radial-gradient(ellipse_at_50%_40%,rgba(130,87,229,0.14),transparent_65%)] p-6 shadow-hero sm:rounded-[2rem] sm:p-8 lg:max-w-none" aria-hidden="true">
                        <div class="flex items-center justify-between gap-3 text-[0.6rem] font-bold tracking-[0.14em] text-muted">
                            <span class="text-fg">MAMBA CODE</span><span>PUNTO DE VENTA</span>
                        </div>
                        <div class="relative mx-auto my-6 aspect-[1.15] w-full">
                            <div class="absolute top-1/2 left-1/2 aspect-square w-[94%] -translate-1/2 rounded-full border border-dashed border-glass"></div>
                            <div class="absolute top-1/2 left-1/2 aspect-square w-[65%] -translate-1/2 rounded-full border border-glass"></div>
                            <div class="absolute top-1/2 left-1/2 grid aspect-square w-[36%] -translate-1/2 place-items-center rounded-[26%] bg-primary text-[clamp(2rem,4vw,3.5rem)] text-on-accent shadow-hero">
                                <i class="fa-solid fa-cash-register"></i>
                            </div>
                            <span class="{{ $orbitIcon }} top-[7%] left-[10%] -rotate-8 text-primary"><i class="fa-solid fa-mug-hot"></i></span>
                            <span class="{{ $orbitIcon }} top-[22%] right-0 rotate-8 text-secondary"><i class="fa-solid fa-martini-glass-citrus"></i></span>
                            <span class="{{ $orbitIcon }} bottom-0 left-[22%] -rotate-5 text-accent"><i class="fa-solid fa-wine-bottle"></i></span>
                        </div>
                        <div class="flex flex-col gap-1 border-t border-glass pt-5 text-lg font-bold">
                            <span>Café. Bar. Licorera.</span>
                            <span class="text-sm font-normal text-muted">Tu negocio, conectado.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-y border-feature-border bg-feature py-12 sm:py-18" id="features" aria-labelledby="hospitality-sectors-title">
            <div class="container-page">
                <div class="mb-10 max-w-2xl">
                    <span class="text-xs font-bold tracking-wider text-secondary uppercase">Tu sector, tu forma de vender</span>
                    <h2 id="hospitality-sectors-title" class="mt-3 mb-4 text-[clamp(1.8rem,3vw,2.5rem)] leading-tight font-bold tracking-tight">Cada negocio tiene su ritmo.</h2>
                    <p class="leading-loose text-muted">Empecemos por conocer el tuyo. Explora una solución POS para el día a día de tu establecimiento.</p>
                </div>

                <div class="grid gap-5 md:grid-cols-3">
                    @foreach ($sectors as $sector)
                        <article class="flex flex-col rounded-2xl border border-card-border bg-card p-7 lg:p-8">
                            <span class="mb-7 grid size-14 place-items-center rounded-2xl border border-glass bg-hover text-2xl text-primary">
                                <i class="fa-solid {{ $sector['icon'] }}" aria-hidden="true"></i>
                            </span>
                            <h3 class="mb-3 text-xl font-bold">{{ $sector['title'] }}</h3>
                            <p class="mb-6 flex-1 text-[0.95rem] leading-loose text-muted">{{ $sector['text'] }}</p>
                            <span class="border-t border-glass pt-4 text-xs leading-relaxed text-muted">{{ $sector['detail'] }}</span>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-12 sm:py-20" id="pricing" aria-labelledby="hospitality-contact-title">
            <div class="container-page">
                <div class="flex flex-col items-start justify-between gap-6 rounded-3xl border border-card-border bg-popular p-7 sm:p-12 lg:flex-row lg:items-center lg:gap-10">
                    <div class="max-w-2xl">
                        <span class="text-xs font-bold tracking-wider text-secondary uppercase">Demos el siguiente paso</span>
                        <h2 id="hospitality-contact-title" class="mt-3 mb-4 text-[clamp(1.8rem,3vw,2.5rem)] leading-tight font-bold tracking-tight">Hablemos de tu negocio.</h2>
                        <p class="leading-loose text-muted">Cuéntanos qué vendes y cómo trabaja tu equipo. Revisemos tus necesidades y preparemos una propuesta con el alcance y la inversión para tu establecimiento.</p>
                    </div>
                    <a href="{{ route('contact', ['asunto' => 'POS Cafeterías y Bares']) }}" class="{{ $primaryButton }} w-full shrink-0 sm:w-auto">Solicitar información <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
@endsection
