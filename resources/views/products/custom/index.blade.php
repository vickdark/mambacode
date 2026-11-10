@extends('layouts.landing')

@section('title', 'Tu Producto - Desarrollo a Medida | Mamba Code')
@section('meta_description', 'Desarrollamos soluciones a la medida que se adaptan a los procesos y objetivos de tu empresa.')
@section('meta_keywords', 'desarrollo a medida, software personalizado, soluciones empresariales')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Desarrollo a medida')

@section('content')
    <x-landing.navigation />

    <section class="container-page py-16 text-center sm:py-24">
        <h1 class="mb-4 text-3xl font-bold text-fg sm:text-5xl">Tu Producto - Desarrollo a Medida</h1>
        <p class="mx-auto max-w-3xl text-lg text-muted sm:text-xl">Diseñamos y desarrollamos soluciones personalizadas que encajan 100% con tus procesos y objetivos. Cuéntanos tu idea y la convertimos en software real.</p>
        <a href="{{ route('contact') }}" class="btn-cyber mt-8">Contactar equipo</a>
    </section>

    <x-landing.footer />
@endsection
