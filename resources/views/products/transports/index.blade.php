@extends('layouts.landing')

@section('title', 'Sistema de Transporte Privado | Mamba Code')
@section('meta_description', 'Gestiona rutas, reservas, conductores y seguimiento de flota con un sistema de transporte privado pensado para operar con eficiencia.')
@section('meta_keywords', 'software de transporte, gestión de flota, rutas, reservas, seguimiento GPS, transporte privado, Mamba Code')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Sistema de transporte privado de Mamba Code')

@section('content')
    <x-landing.navigation />

    @include('products.transports.intro')
    
    @include('products.transports.features')

    @include('products.transports.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection
