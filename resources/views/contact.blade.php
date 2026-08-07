@extends('layouts.landing')

@section('title', 'Contacto | Mamba Code')

@section('content')
    <x-landing.navigation />

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-3 text-center">Contáctanos</h1>
                <p class="lead text-center text-muted">Completa el formulario y nuestro equipo te responderá pronto.</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @if(session('reference'))
                        <div class="mt-2 small text-muted">Referencia de envío: <strong>{{ session('reference') }}</strong></div>
                    @endif
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('components.landing.contact-form')
            </div>
        </div>
    </section>

    <x-landing.footer />
@endsection
