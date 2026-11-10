@extends('layouts.landing')

@section('title', 'Contacto | Mamba Code')
@section('meta_description', 'Contáctanos y nuestro equipo de Mamba Code te responderá pronto. Solicita una consultoría, una demo en vivo o cuéntanos tu proyecto de software a medida.')
@section('meta_keywords', 'contacto Mamba Code, cotizar software, consultoría tecnológica, desarrollo a medida, Colombia')

@section('content')
    <x-landing.navigation />

    <section class="container-page py-12">
        <div class="mx-auto max-w-4xl">
            <h1 class="mb-3 text-center text-4xl font-bold">Contáctanos</h1>
            <p class="mb-8 text-center text-lg text-muted sm:text-xl">Completa el formulario y nuestro equipo te responderá pronto.</p>

            @if (session('success'))
                <div class="mb-4 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-emerald-400 light:text-emerald-700" role="status">{{ session('success') }}</div>
                @if (session('reference'))
                    <div class="mb-4 text-sm text-muted">Referencia de envío: <strong>{{ session('reference') }}</strong></div>
                @endif
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-red-400 light:text-red-700" role="alert">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('components.landing.contact-form')
        </div>
    </section>

    <x-landing.footer />
@endsection
