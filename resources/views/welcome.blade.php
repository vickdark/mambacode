@extends('layouts.landing')

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