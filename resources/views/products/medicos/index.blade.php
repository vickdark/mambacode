@extends('layouts.landing')

@section('title', 'Médicos Integrados | Atención Médica Conectada | Mamba Code')
@section('meta_description', 'Médicos Integrados conecta pacientes y profesionales de la salud con citas, historial médico, diagnósticos, recetas y pagos desde cualquier dispositivo.')
@section('meta_keywords', 'Médicos Integrados, sistema médico, gestión de citas, historia clínica, recetas médicas, atención en salud')
@section('meta_image', asset('img/products/medicos/cover.png'))
@section('meta_image_alt', 'Portada de Médicos Integrados, plataforma de atención médica')
@section('body_class', 'medicos-page')

@section('content')
    <x-landing.navigation />

    <main class="medicos">
        <section class="medicos-hero" aria-labelledby="medicos-title">
            <div class="container">
                <a class="medicos-back" href="{{ route('home') }}#productos">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Nuestro portafolio
                </a>

                <div class="medicos-hero-grid">
                    <div class="medicos-copy">
                        <span class="medicos-eyebrow"><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i> Atención médica integrada</span>
                        <h1 id="medicos-title">Tu salud y tu historial,<br><span>en un solo lugar.</span></h1>
                        <p class="medicos-lead">Médicos Integrados acerca a pacientes y profesionales para facilitar el cuidado y seguimiento de la salud.</p>
                        <p class="medicos-description">Agenda citas, consulta diagnósticos y recetas, y lleva el control de tus pagos desde cualquier dispositivo.</p>
                        <p class="medicos-migration"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> En migración · el acceso actual sigue disponible.</p>

                        <div class="medicos-actions">
                            <a href="{{ config('products.medicos.url') }}" class="medicos-button medicos-button-primary" target="_blank" rel="noopener noreferrer">
                                Abrir Médicos Integrados <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                <span class="visually-hidden">(se abre en una pestaña nueva)</span>
                            </a>
                            <a href="{{ route('contact') }}" class="medicos-button medicos-button-secondary">
                                Contactar a Mamba Code <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="medicos-visual">
                        <img src="{{ asset('img/products/medicos/cover.png') }}" alt="Vista de la plataforma Médicos Integrados con citas y datos de atención" width="1503" height="765">
                    </div>
                </div>
            </div>
        </section>

        <section class="medicos-capabilities" aria-labelledby="medicos-capabilities-title">
            <div class="container">
                <div class="medicos-section-heading">
                    <span class="medicos-eyebrow">Acompañamiento en cada consulta</span>
                    <h2 id="medicos-capabilities-title">La información de salud, más accesible.</h2>
                    <p>Una experiencia digital para facilitar la relación entre pacientes y profesionales médicos.</p>
                </div>

                <div class="medicos-grid">
                    <article class="medicos-card">
                        <span class="medicos-card-icon"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></span>
                        <h3>Citas médicas</h3>
                        <p>Solicita y consulta citas con profesionales y especialistas.</p>
                    </article>
                    <article class="medicos-card">
                        <span class="medicos-card-icon"><i class="fa-solid fa-file-medical" aria-hidden="true"></i></span>
                        <h3>Historial y diagnósticos</h3>
                        <p>Consulta la información clínica y el seguimiento de tus atenciones.</p>
                    </article>
                    <article class="medicos-card">
                        <span class="medicos-card-icon"><i class="fa-solid fa-prescription" aria-hidden="true"></i></span>
                        <h3>Recetas</h3>
                        <p>Accede a las recetas e indicaciones asociadas a tus consultas.</p>
                    </article>
                    <article class="medicos-card">
                        <span class="medicos-card-icon"><i class="fa-solid fa-file-invoice-dollar" aria-hidden="true"></i></span>
                        <h3>Pagos y documentos</h3>
                        <p>Revisa tus pagos y consulta los documentos disponibles desde el portal.</p>
                    </article>
                </div>

                <div class="medicos-footer-cta">
                    <div>
                        <h2>Conoce Médicos Integrados.</h2>
                        <p>Conversemos sobre las necesidades de tu centro médico.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="medicos-button medicos-button-primary">
                        Solicitar información <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
@endsection
