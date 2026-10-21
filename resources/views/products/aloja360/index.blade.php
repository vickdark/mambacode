@extends('layouts.landing')

@section('title', 'Aloja360 | Gestión de Alojamientos | Mamba Code')
@section('meta_description', 'Gestiona alojamientos turísticos con Aloja360: disponibilidad, tarifas, huéspedes, cotizaciones, reservas y operación en una sola plataforma.')
@section('meta_keywords', 'Aloja360, gestión de hoteles, software para alojamientos, administración de cabañas, reservas turísticas')
@section('meta_image', asset('img/products/aloja360/cover.png'))
@section('meta_image_alt', 'Panel de gestión de alojamientos Aloja360')
@section('body_class', 'aloja360-page')

@section('content')
    <x-landing.navigation />

    <main class="aloja360">
        <section class="aloja360-hero" aria-labelledby="aloja360-title">
            <div class="container">
                <a class="aloja360-back" href="{{ route('home') }}#productos">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Nuestro portafolio
                </a>

                <div class="aloja360-hero-grid">
                    <div class="aloja360-copy">
                        <span class="aloja360-eyebrow"><i class="fa-solid fa-hotel" aria-hidden="true"></i> Gestión de alojamientos</span>
                        <h1 id="aloja360-title">Cada estancia,<br><span>mejor organizada.</span></h1>
                        <p class="aloja360-lead">Aloja360 reúne la operación de hoteles, cabañas y alojamientos turísticos en una sola plataforma.</p>
                        <p class="aloja360-description">Administra disponibilidad, tarifas, huéspedes, cotizaciones, reservas y tareas del alojamiento con una visión integral de tu operación.</p>
                        <p class="aloja360-migration"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> En migración · el acceso actual sigue disponible.</p>

                        <div class="aloja360-actions">
                            <a href="{{ config('products.aloja360.url') }}" class="aloja360-button aloja360-button-primary" target="_blank" rel="noopener noreferrer">
                                Abrir Aloja360 <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                <span class="visually-hidden">(se abre en una pestaña nueva)</span>
                            </a>
                            <a href="{{ route('contact') }}" class="aloja360-button aloja360-button-secondary">
                                Solicitar información <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="aloja360-visual">
                        <img src="{{ asset('img/products/aloja360/cover.png') }}" alt="Panel de gestión de reservas de Aloja360" width="1503" height="765">
                    </div>
                </div>
            </div>
        </section>

        <section class="aloja360-capabilities" aria-labelledby="aloja360-capabilities-title">
            <div class="container">
                <div class="aloja360-section-heading">
                    <span class="aloja360-eyebrow">Una operación conectada</span>
                    <h2 id="aloja360-capabilities-title">Todo lo que sucede en tu alojamiento.</h2>
                    <p>Herramientas para coordinar la experiencia del huésped y el trabajo diario del equipo.</p>
                </div>

                <div class="aloja360-grid">
                    <article class="aloja360-card">
                        <span class="aloja360-card-icon"><i class="fa-solid fa-house-chimney" aria-hidden="true"></i></span>
                        <h3>Alojamientos y disponibilidad</h3>
                        <p>Organiza tus espacios y consulta su disponibilidad y bloqueos por fechas.</p>
                    </article>
                    <article class="aloja360-card">
                        <span class="aloja360-card-icon"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></span>
                        <h3>Huéspedes y reservas</h3>
                        <p>Centraliza huéspedes, cotizaciones, reservas, pagos y seguimiento de estancias.</p>
                    </article>
                    <article class="aloja360-card">
                        <span class="aloja360-card-icon"><i class="fa-solid fa-tags" aria-hidden="true"></i></span>
                        <h3>Tarifas y temporadas</h3>
                        <p>Gestiona precios y temporadas para distintos tipos de alojamiento y estadía.</p>
                    </article>
                    <article class="aloja360-card">
                        <span class="aloja360-card-icon"><i class="fa-solid fa-broom" aria-hidden="true"></i></span>
                        <h3>Operación diaria</h3>
                        <p>Da seguimiento a limpieza, mantenimiento, inventario, servicios y reportes.</p>
                    </article>
                </div>

                <div class="aloja360-footer-cta">
                    <div>
                        <h2>¿Quieres conocer Aloja360?</h2>
                        <p>Hablemos de las necesidades de tu hotel o alojamiento.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="aloja360-button aloja360-button-primary">
                        Contactar a Mamba Code <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
@endsection
