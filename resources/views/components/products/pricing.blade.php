
@props(['products'])

<!-- Pricing Section -->
<section class="pricing-section" id="pricing">
    <h2 class="text-center hero-title fs-1 mb-2">Planes Flexibles</h2>
    <p class="text-center text-muted mb-5">Elige el modelo que mejor se adapte al despliegue de tu infraestructura.</p>
    
    <div class="pricing-grid">
        @foreach($products as $index => $product)
        <div class="pricing-card animate__animated animate__fadeInUp {{ $product['featured'] ?? false ? 'featured' : '' }}" style="--card-animation-delay: {{ $product['delay'] ?? ((0.1 * ($index + 1)) . 's') }};">
            @if($product['badge'] ?? false)
            <div class="badge-premium">{{ $product['badge'] }}</div>
            @endif
            <h3 class="fs-4 fw-bold">{{ $product['title'] }}</h3>
            <div class="mb-3">
                <span class="pricing-price fs-2">{{ $product['price'] }}<small class="fs-6 text-muted">{{ $product['price_period'] }}</small></span>
            </div>
            <p class="small {{ $product['featured'] ?? false ? 'text-white-50' : 'text-muted' }} mb-4">{{ $product['description'] }}</p>
            <ul class="pricing-features">
                @foreach($product['features'] as $feature)
                <li><i class="{{ $feature['icon'] }}"></i> {{ $feature['text'] }}</li>
                @if($feature['note'] ?? false)
                <li class="small text-muted feature-note">{{ $feature['note'] }}</li>
                @endif
                @endforeach
            </ul>
            <a href="{{ $product['button_link'] }}" class="btn-cyber w-100">{{ $product['button_text'] }}</a>
        </div>
        @endforeach
    </div>
</section>