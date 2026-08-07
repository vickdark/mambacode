@extends('layouts.landing')

@section('title', 'Tu Producto - Desarrollo a Medida | Mamba Code')
@section('meta_description', 'Desarrollamos soluciones a la medida que se adaptan a los procesos y objetivos de tu empresa.')
@section('meta_keywords', 'desarrollo a medida, software personalizado, soluciones empresariales')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Desarrollo a medida')

@section('content')
    <x-landing.navigation />

    <section class="container py-5 text-center">
        <h1 class="mb-3">Tu Producto - Desarrollo a Medida</h1>
        <p class="lead text-muted">Diseñamos y desarrollamos soluciones personalizadas que encajan 100% con tus procesos y objetivos. Cuéntanos tu idea y la convertimos en software real.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary mt-4">Contactar equipo</a>
    </section>

    <x-landing.footer />
@endsection
