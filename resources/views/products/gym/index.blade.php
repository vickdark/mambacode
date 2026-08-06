@extends('layouts.landing')

@section('title', 'SysGym Software Fitness | Mamba Code')
@section('meta_description', 'Administra membresías, accesos, reservas y cobros recurrentes con SysGym, nuestro software para gimnasios y centros deportivos.')
@section('meta_keywords', 'software para gimnasios, sistema fitness, membresías, reservas, cobros recurrentes, control de acceso, SysGym, Mamba Code')
@section('meta_image', asset('img/mambacode.jpeg'))
@section('meta_image_alt', 'SysGym, software fitness de Mamba Code')

@section('content')
    <x-landing.navigation />

    @include('products.gym.intro')
    
    @include('products.gym.features')

    @include('products.gym.pricing')


    <x-landing.cta />

    <x-landing.footer />
@endsection
