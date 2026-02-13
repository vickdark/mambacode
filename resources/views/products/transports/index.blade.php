@extends('layouts.landing')

@section('content')
    <x-landing.navigation />

    @include('products.transports.intro')
    
    @include('products.transports.features')

    @include('products.transports.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection