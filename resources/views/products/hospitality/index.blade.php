@extends('layouts.landing')

@section('title', 'POS para Cafeterías y Bares | Mamba Code')
@section('meta_description', 'Conoce el POS de Mamba Code para cafeterías, bares, licoreras y negocios relacionados. Hablemos de la solución de punto de venta para tu negocio.')
@section('meta_keywords', 'POS cafeterías, POS bares, POS licoreras, punto de venta, Mamba Code')
@section('meta_image_alt', 'Mamba Code: POS para cafeterías y bares')

@section('content')
    <x-landing.navigation />

    <main class="hospitality-page">
        <section class="hospitality-hero" id="inicio" aria-labelledby="hospitality-title">
            <div class="container">
                <a class="hospitality-back" href="{{ route('home') }}#productos">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Nuestro portafolio
                </a>

                <div class="hospitality-hero-grid">
                    <div class="hospitality-hero-copy">
                        <span class="hospitality-eyebrow"><i class="fa-solid fa-mug-hot" aria-hidden="true"></i> Un POS para tu negocio</span>
                        <h1 id="hospitality-title">POS para<br>cafeterías <span>y bares.</span></h1>
                        <p class="hospitality-lead">Del primer café al último brindis.</p>
                        <p class="hospitality-description">Una solución de punto de venta para cafeterías, bares, licoreras y negocios relacionados. Conoce cómo llevar la tecnología de Mamba Code a tu operación.</p>

                        <div class="hospitality-actions">
                            <a href="{{ route('contact') }}" class="hospitality-button hospitality-button-primary">
                                Hablemos de tu negocio <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('access.index') }}" class="hospitality-button hospitality-button-secondary">
                                Portal de accesos <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="hospitality-visual" aria-hidden="true">
                        <div class="hospitality-visual-heading"><span>MAMBA CODE</span><span>PUNTO DE VENTA</span></div>
                        <div class="hospitality-visual-center">
                            <div class="hospitality-orbit hospitality-orbit-outer"></div>
                            <div class="hospitality-orbit hospitality-orbit-inner"></div>
                            <div class="hospitality-main-icon"><i class="fa-solid fa-cash-register"></i></div>
                            <span class="hospitality-orbit-icon hospitality-coffee"><i class="fa-solid fa-mug-hot"></i></span>
                            <span class="hospitality-orbit-icon hospitality-drink"><i class="fa-solid fa-martini-glass-citrus"></i></span>
                            <span class="hospitality-orbit-icon hospitality-wine"><i class="fa-solid fa-wine-bottle"></i></span>
                        </div>
                        <div class="hospitality-visual-footer"><span>Café. Bar. Licorera.</span><span>Tu negocio, conectado.</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hospitality-sectors" id="features" aria-labelledby="hospitality-sectors-title">
            <div class="container">
                <div class="hospitality-section-heading">
                    <span class="hospitality-eyebrow">Tu sector, tu forma de vender</span>
                    <h2 id="hospitality-sectors-title">Cada negocio tiene su ritmo.</h2>
                    <p>Empecemos por conocer el tuyo. Explora una solución POS para el día a día de tu establecimiento.</p>
                </div>

                <div class="hospitality-sector-grid">
                    <article class="hospitality-sector-card">
                        <span class="hospitality-sector-icon"><i class="fa-solid fa-mug-hot" aria-hidden="true"></i></span>
                        <h3>Cafeterías</h3>
                        <p>Para negocios donde un buen café y la atención al cliente son parte de cada jornada.</p>
                        <span class="hospitality-sector-detail">Café · Bebidas · Acompañamientos</span>
                    </article>
                    <article class="hospitality-sector-card">
                        <span class="hospitality-sector-icon"><i class="fa-solid fa-martini-glass-citrus" aria-hidden="true"></i></span>
                        <h3>Bares</h3>
                        <p>Para establecimientos donde cada turno reúne bebidas, encuentros y una forma propia de atender.</p>
                        <span class="hospitality-sector-detail">Bares · Gastrobares · Negocios afines</span>
                    </article>
                    <article class="hospitality-sector-card">
                        <span class="hospitality-sector-icon"><i class="fa-solid fa-wine-bottle" aria-hidden="true"></i></span>
                        <h3>Licoreras y más</h3>
                        <p>Para comercios de bebidas y negocios relacionados que buscan una solución de punto de venta.</p>
                        <span class="hospitality-sector-detail">Licoreras · Tiendas de bebidas</span>
                    </article>
                </div>
            </div>
        </section>

        <section class="hospitality-contact" id="pricing" aria-labelledby="hospitality-contact-title">
            <div class="container">
                <div class="hospitality-contact-panel">
                    <div>
                        <span class="hospitality-eyebrow">Demos el siguiente paso</span>
                        <h2 id="hospitality-contact-title">Hablemos de tu negocio.</h2>
                        <p>Cuéntanos qué vendes y cómo trabaja tu equipo. Revisemos tus necesidades y preparemos una propuesta con el alcance y la inversión para tu establecimiento.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="hospitality-button hospitality-button-primary">Solicitar información <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
@endsection
