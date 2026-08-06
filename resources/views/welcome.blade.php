@extends('layouts.landing')

@section('title', 'Mamba Code | Desarrollo de Software y Soluciones Tecnológicas')
@section('meta_description', 'Mamba Code es una empresa de desarrollo de software y consultoría tecnológica. Creamos soluciones a medida para digitalizar procesos, automatizar operaciones y hacer crecer tu negocio.')
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
