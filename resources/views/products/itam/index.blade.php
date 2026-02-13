@extends('layouts.landing')

@section('content')
    <x-landing.navigation />

    @include('products.itam.intro')
    
    @include('products.itam.features')

    @include('products.itam.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection