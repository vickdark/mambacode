@props(['title', 'subtitle', 'badge', 'features'])

<section class="features-section" id="features">
    <div class="container mb-5 text-center">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">{{ $badge }}</span>
        <h2 class="hero-title fs-1 mb-3">{{ $title }}</h2>
        <p class="feature-subtitle text-muted mx-auto">
            {{ $subtitle }}
        </p>
    </div>

    <div class="features-container">
        @foreach($features as $index => $feature)
        <!-- Feature {{ $index + 1 }} -->
        <div class="feature-card animate__animated animate__fadeInUp" style="--animation-delay: {{ 0.1 * ($index + 1) }}s;">
            <div class="feature-icon">
                <i class="{{ $feature['icon'] }} fa-2x"></i>
            </div>
            <h3 class="feature-title">{{ $feature['title'] }}</h3>
            <p class="feature-desc">
                {{ $feature['description'] }}
            </p>
        </div>
        @endforeach
    </div>
</section>
