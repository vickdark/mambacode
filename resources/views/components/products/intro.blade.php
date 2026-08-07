@props(['title', 'subtitle', 'badge', 'features', 'carouselImages'])

@php
    $carouselId = 'productCarousel' . uniqid();
@endphp

<section class="product-intro-section py-5 mt-5" id="intro">
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
                <div id="{{ $carouselId }}" class="carousel slide rounded-4 overflow-hidden product-carousel-custom" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($carouselImages as $index => $image)
                            <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($carouselImages as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <button type="button" class="carousel-image-button d-block w-100 p-0 border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#productImageModal" data-bs-carousel-id="{{ $carouselId }}" data-bs-index="{{ $index }}" data-bs-image="{{ $image['src'] }}" data-bs-alt="{{ $image['alt'] }}" data-bs-title="{{ $image['caption_title'] }}" data-bs-text="{{ $image['caption_text'] }}">
                                    <img src="{{ $image['src'] }}" class="d-block w-100 carousel-image" alt="{{ $image['alt'] }}">
                                </button>
                                <div class="carousel-caption d-none d-md-block carousel-caption-custom">
                                    <h5>{{ $image['caption_title'] }}</h5>
                                    <p>{{ $image['caption_text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
                <div class="product-carousel-click-hint mt-3 text-center">
                    <span class="badge badge-click-to-expand">
                        <i class="fa-solid fa-magnifying-glass-plus me-2"></i>
                        Dar clic para ampliar imagen
                    </span>
                </div>

                @once
                <div class="modal fade" id="productImageModal" tabindex="-1" aria-labelledby="productImageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content bg-dark text-white border-0">
                            <div class="modal-header border-0 align-items-center">
                                <div>
                                    <h5 class="modal-title" id="productImageModalLabel"></h5>
                                    <p class="mb-0 text-muted small modal-image-caption-text"></p>
                                </div>
                                <div class="ms-auto d-flex align-items-center gap-2 modal-control-group">
                                    <button type="button" class="btn btn-sm btn-outline-light modal-image-prev" aria-label="Anterior imagen">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light modal-image-next" aria-label="Siguiente imagen">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                            </div>
                            <div class="modal-body p-0 d-flex justify-content-center align-items-center">
                                <img src="" alt="" class="img-fluid w-100 modal-carousel-image">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    (function () {
                        if (window.productImageModalHandlerAdded) return;
                        window.productImageModalHandlerAdded = true;

                        function updateModalDisplay() {
                            const items = window.productImageModalItems || [];
                            const index = window.productImageModalCurrentIndex || 0;
                            const item = items[index];
                            if (!item) return;

                            const modalImg = document.querySelector('#productImageModal .modal-carousel-image');
                            const modalTitle = document.querySelector('#productImageModalLabel');
                            const modalText = document.querySelector('#productImageModal .modal-image-caption-text');

                            if (!modalImg || !modalTitle || !modalText) return;

                            modalImg.src = item.src || '';
                            modalImg.alt = item.alt || '';
                            modalTitle.textContent = item.title || '';
                            modalText.textContent = item.text || '';
                        }

                        function setModalItemsFromButton(btn) {
                            const carouselId = btn.dataset.bsCarouselId;
                            const groupButtons = document.querySelectorAll(`[data-bs-carousel-id="${carouselId}"]`);
                            const items = Array.from(groupButtons).map(button => ({
                                src: button.dataset.bsImage || '',
                                alt: button.dataset.bsAlt || '',
                                title: button.dataset.bsTitle || '',
                                text: button.dataset.bsText || ''
                            }));

                            window.productImageModalItems = items;
                            window.productImageModalCurrentIndex = parseInt(btn.dataset.bsIndex || '0', 10);
                            updateModalDisplay();
                        }

                        document.addEventListener('click', function (event) {
                            const btn = event.target.closest('.carousel-image-button');
                            if (btn) {
                                setModalItemsFromButton(btn);
                                return;
                            }

                            const actionBtn = event.target.closest('.modal-image-prev, .modal-image-next');
                            if (!actionBtn) return;

                            const items = window.productImageModalItems || [];
                            if (!items.length) return;

                            if (actionBtn.classList.contains('modal-image-prev')) {
                                window.productImageModalCurrentIndex = (window.productImageModalCurrentIndex - 1 + items.length) % items.length;
                            } else if (actionBtn.classList.contains('modal-image-next')) {
                                window.productImageModalCurrentIndex = (window.productImageModalCurrentIndex + 1) % items.length;
                            }

                            updateModalDisplay();
                        });
                    })();
                </script>
                @endonce
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

                    <a href="{{ route('contact') }}" class="btn-cyber w-100 text-center">
                        <i class="fa-solid fa-laptop-code me-2"></i> Solicitar Demo en Vivo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
