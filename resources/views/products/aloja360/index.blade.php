@extends('layouts.landing')

@section('title', 'Aloja360 | Gestión de Alojamientos | Mamba Code')
@section('meta_description', 'Gestiona alojamientos turísticos con Aloja360: disponibilidad, tarifas, huéspedes, cotizaciones, reservas y operación en una sola plataforma.')
@section('meta_keywords', 'Aloja360, gestión de hoteles, software para alojamientos, administración de cabañas, reservas turísticas')
@section('meta_image', asset('img/products/aloja360/cover.png'))
@section('meta_image_alt', 'Panel de gestión de alojamientos Aloja360')

@section('content')
    <x-landing.navigation />

    <x-products.showcase
        id="aloja360"
        product="Aloja360"
        icon="fa-hotel"
        eyebrow="Gestión de alojamientos"
        title="Cada estancia,"
        highlight="mejor organizada."
        lead="Aloja360 reúne la operación de hoteles, cabañas y alojamientos turísticos en una sola plataforma."
        description="Administra disponibilidad, tarifas, huéspedes, cotizaciones, reservas y tareas del alojamiento con una visión integral de tu operación."
        :access-url="config('products.aloja360.url')"
        access-label="Abrir Aloja360"
        secondary-label="Solicitar información"
        image="img/products/aloja360/cover.png"
        image-alt="Panel de gestión de reservas de Aloja360"
        capabilities-eyebrow="Una operación conectada"
        capabilities-title="Todo lo que sucede en tu alojamiento."
        capabilities-text="Herramientas para coordinar la experiencia del huésped y el trabajo diario del equipo."
        :cards="[
            ['icon' => 'fa-house-chimney', 'title' => 'Alojamientos y disponibilidad', 'text' => 'Organiza tus espacios y consulta su disponibilidad y bloqueos por fechas.'],
            ['icon' => 'fa-calendar-check', 'title' => 'Huéspedes y reservas', 'text' => 'Centraliza huéspedes, cotizaciones, reservas, pagos y seguimiento de estancias.'],
            ['icon' => 'fa-tags', 'title' => 'Tarifas y temporadas', 'text' => 'Gestiona precios y temporadas para distintos tipos de alojamiento y estadía.'],
            ['icon' => 'fa-broom', 'title' => 'Operación diaria', 'text' => 'Da seguimiento a limpieza, mantenimiento, inventario, servicios y reportes.'],
        ]"
        footer-title="¿Quieres conocer Aloja360?"
        footer-text="Hablemos de las necesidades de tu hotel o alojamiento."
        footer-label="Contactar a Mamba Code"
    />

    <x-landing.footer />
@endsection
