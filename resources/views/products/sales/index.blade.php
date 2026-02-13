@extends('layouts.landing')

@section('content')
    <x-landing.navigation />

    @include('products.sales.intro')
    
    @include('products.sales.features')

    @include('products.sales.pricing')

    <x-landing.cta />

    <x-landing.footer />
@endsection