@extends('layouts.landing')

@section('content')
    <x-landing.navigation />

    @include('products.gym.intro')
    
    @include('products.gym.features')

    @include('products.gym.pricing')


    <x-landing.cta />

    <x-landing.footer />
@endsection