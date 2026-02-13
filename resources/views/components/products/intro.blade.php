@props(['title', 'subtitle', 'badge', 'features', 'carouselImages'])

<section class="product-intro-section py-5 mt-5">
    <div class="container">
        <!-- Header -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-12 text-center">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">{{ $badge }}</span>
                <h1 class="hero-title display-4 fw-bold mb-3">{{ $title }}</h1>
                <p class="lead text-muted mx-auto intro-subtitle">
                    {{ $subtitle }}
                </p>
            </div>
        </div>

        <div class="row align-items-center g-5">
            <!-- Carousel Column -->
            <div class="col-lg-7">
                <div id="productCarousel" class="carousel slide rounded-4 overflow-hidden product-carousel-custom" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($carouselImages as $index => $image)
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($carouselImages as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image['src'] }}" class="d-block w-100 carousel-image" alt="{{ $image['alt'] }}">
                                <div class="carousel-caption d-none d-md-block carousel-caption-custom">
                                    <h5>{{ $image['caption_title'] }}</h5>
                                    <p>{{ $image['caption_text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>

            <!-- Description & Demo Column -->
            <div class="col-lg-5">
                <div class="ps-lg-4">
                    {{ $slot }}

                    <div class="d-flex flex-column gap-3 mb-5">
                        @foreach ($features as $feature)
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-25 p-2 rounded-circle text-primary">
                                <i class="{{ $feature['icon'] }} fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-white">{{ $feature['title'] }}</h6>
                                <small class="text-muted">{{ $feature['description'] }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="#contacto" class="btn-cyber w-100 text-center">
                        <i class="fa-solid fa-laptop-code me-2"></i> Solicitar Demo en Vivo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
