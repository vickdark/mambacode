@extends('layouts.landing')

@section('title', 'Sistema de Ventas POS | Mamba Code')
@section('meta_description', 'Optimiza tu negocio con nuestro sistema de ventas POS: inventario, facturación, reportes y control comercial en una sola plataforma.')
@section('meta_keywords', 'sistema POS, software de ventas, punto de venta, inventario, facturación, reportes comerciales, Mamba Code')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'Sistema de ventas POS de Mamba Code')

@section('content')
    <x-landing.navigation />

    @include('products.sales.intro')
    
    @include('products.sales.features')

    @include('products.sales.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection
