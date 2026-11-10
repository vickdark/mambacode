@props(['products'])

<section class="container-page py-20 lg:py-24" id="pricing">
    <h2 class="mb-2 text-center text-3xl font-bold tracking-tight sm:text-4xl xl:text-5xl">Planes Flexibles</h2>
    <p class="mb-12 text-center text-muted">Elige el modelo que mejor se adapte al despliegue de tu infraestructura.</p>

    <div class="mx-auto grid max-w-md gap-8 md:max-w-none md:grid-cols-2 xl:grid-cols-3 xl:gap-10">
        @foreach ($products as $product)
            @php($featured = $product['featured'] ?? false)
            <div x-reveal="{{ rtrim($product['delay'] ?? (0.1 * $loop->iteration), 's') }}" @class([
                'relative overflow-hidden rounded-3xl border p-8 text-center transition duration-500 hover:-translate-y-2.5 hover:border-secondary sm:p-12',
                'border-secondary bg-popular xl:scale-105' => $featured,
                'border-card-border bg-card' => ! $featured,
            ])>
                @if ($product['badge'] ?? false)
                    <div class="absolute top-8 -right-12 rotate-45 bg-secondary px-16 py-2 text-xs font-bold text-inverse uppercase">{{ $product['badge'] }}</div>
                @endif
                <h3 class="text-2xl font-bold text-fg">{{ $product['title'] }}</h3>
                <p class="my-6">
                    <span class="text-4xl font-bold">{{ $product['price'] }}</span><small class="text-base text-muted">{{ $product['price_period'] }}</small>
                </p>
                <p class="mb-8 text-sm text-muted">{{ $product['description'] }}</p>
                <ul class="my-8 space-y-4 text-start">
                    @foreach ($product['features'] as $feature)
                        <li class="flex items-center gap-3 text-muted"><i class="{{ $feature['icon'] }} w-5 text-secondary" aria-hidden="true"></i> {{ $feature['text'] }}</li>
                        @if ($feature['note'] ?? false)
                            <li class="-mt-2 ps-8 text-xs text-muted">{{ $feature['note'] }}</li>
                        @endif
                    @endforeach
                </ul>
                <a href="{{ $product['button_link'] === route('contact') ? route('contact', ['asunto' => $product['title']]) : $product['button_link'] }}" class="btn-primary w-full">{{ $product['button_text'] }}</a>
            </div>
        @endforeach
    </div>
</section>
