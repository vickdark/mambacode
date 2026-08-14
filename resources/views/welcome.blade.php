@extends('layouts.landing')

@section('title', 'Desarrollo de Software a Medida | Mamba Code')
@section('meta_description', 'Software a medida con análisis de negocio y automatización de procesos. Soluciones escalables para empresas. Consultoría 24/7 garantizada en Colombia.')
@section('meta_keywords', 'Mamba Code, desarrollo de software, soluciones tecnológicas, consultoría tecnológica, automatización de procesos, software a medida, transformación digital')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Mamba Code, empresa de desarrollo de software y consultoría tecnológica')

@section('content')
    <x-landing.navigation />

    <x-landing.hero />

    <x-landing.stats />

    <x-landing.features />

    <x-landing.products />

    {{-- <x-landing.pricing /> --}}

    <x-landing.testimonials />

    <x-landing.cta />

    <x-landing.footer />
@endsection
