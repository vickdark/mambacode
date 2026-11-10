@props(['title', 'subtitle', 'badge', 'features'])

<section class="py-20 lg:py-32" id="features">
    <x-section-heading :badge="$badge" :title="$title">{{ $subtitle }}</x-section-heading>

    <x-feature-grid :features="$features" />
</section>
