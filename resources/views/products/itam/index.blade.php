@extends('layouts.landing')

@section('title', 'Gestión de Activos ITAM | Mamba Code')
@section('meta_description', 'Controla hardware, software, contratos y ciclo de vida tecnológico con una solución ITAM orientada a visibilidad, orden y cumplimiento.')
@section('meta_keywords', 'ITAM, gestión de activos TI, inventario de hardware, inventario de software, contratos TI, activos tecnológicos, Mamba Code')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Solución ITAM de Mamba Code para gestión de activos TI')

@section('content')
    <x-landing.navigation />

    @include('products.itam.intro')
    
    @include('products.itam.features')

    @include('products.itam.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection
