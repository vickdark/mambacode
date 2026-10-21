@extends('layouts.landing')

@section('title', 'Portal de Accesos | Mamba Code')
@section('meta_description', 'Directorio de accesos del equipo Mamba Code a sus productos publicados.')
@section('meta_robots', 'noindex, nofollow')
@section('body_class', 'access-page')

@section('content')
    <header class="access-header container">
        <a href="{{ route('home') }}" class="access-brand" aria-label="Mamba Code, volver al inicio">
            <img src="{{ asset('img/mambacodelg-removebg.png') }}" width="48" height="48" alt="">
            <span>Mamba <strong>Code</strong></span>
        </a>
        <div class="access-header-actions">
            <a href="{{ route('home') }}#productos" class="access-back">Ver portafolio <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            <button class="access-theme" id="themeToggle" type="button" aria-label="Cambiar tema" title="Cambiar tema">
                <i class="fa-solid fa-sun theme-icon-light" style="display: none;" aria-hidden="true"></i>
                <i class="fa-solid fa-moon theme-icon-dark" aria-hidden="true"></i>
            </button>
        </div>
    </header>

    <main class="access-main container" id="inicio">
        <div class="access-intro">
            <span class="access-eyebrow">ESPACIO DEL EQUIPO</span>
            <h1>Todos tus accesos,<br><span>en un solo lugar.</span></h1>
            <p>Elige el producto que necesitas administrar. Cada enlace abre su plataforma y conserva su propio inicio de sesión.</p>
        </div>

        <section aria-labelledby="access-products-title">
            <div class="access-section-heading">
                <h2 id="access-products-title">Productos disponibles</h2>
                <span>{{ $products->count() }} {{ $products->count() === 1 ? 'acceso' : 'accesos' }}</span>
            </div>

            <div class="access-grid">
                @forelse ($products as $product)
                    <article class="access-card">
                        <div class="access-cover">
                            <img src="{{ asset($product['cover']) }}" alt="Vista previa de {{ $product['name'] }}" loading="lazy" decoding="async">
                        </div>
                        <div class="access-card-content">
                            <div class="access-card-top">
                                <span class="access-icon"><i class="{{ $product['icon'] }}" aria-hidden="true"></i></span>
                                <span class="access-category">{{ $product['category'] }}</span>
                            </div>
                            <h3>{{ $product['name'] }}</h3>
                            <p class="access-description">{{ $product['description'] }}</p>
                            @isset($product['note'])
                                <p class="access-note"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> {{ $product['note'] }}</p>
                            @endisset
                            <p class="access-destination">{{ parse_url($product['url'], PHP_URL_HOST) }}<span>{{ parse_url($product['url'], PHP_URL_PATH) }}</span></p>
                            <a href="{{ $product['url'] }}" class="access-open" target="_blank" rel="noopener noreferrer">
                                {{ $product['access_label'] }}
                                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                <span class="visually-hidden">(se abre en una pestaña nueva)</span>
                            </a>
                            <a href="{{ route($product['route']) }}" class="access-details">Ver producto <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                @empty
                    <p class="access-empty">Aún no hay accesos disponibles. <a href="{{ route('contact') }}">Contacta al equipo Mamba Code.</a></p>
                @endforelse
            </div>
        </section>

        <footer class="access-footer">
            <span>Mamba Code · Portal del equipo</span>
            <a href="{{ route('contact') }}">Contactar al equipo <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </footer>
    </main>
@endsection
