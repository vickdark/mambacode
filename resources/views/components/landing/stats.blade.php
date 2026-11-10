@php
    $stats = [
        ['target' => 360, 'suffix' => '°', 'label' => 'Control Total'],
        ['target' => 99.9, 'suffix' => '%', 'label' => 'Uptime Garantizado'],
        ['target' => 24, 'suffix' => '/7', 'label' => 'Soporte Técnico'],
        ['target' => 10, 'suffix' => 'x', 'label' => 'Más Rápido'],
    ];
@endphp

<section class="border-y border-glass bg-stats py-12 sm:py-16" x-reveal="0.2">
    <div class="container-page grid grid-cols-2 gap-y-8 text-center md:grid-cols-4">
        @foreach ($stats as $stat)
            <div
                x-data="counter({{ $stat['target'] }}, @js($stat['suffix']))"
                x-intersect:enter.half="start()"
                x-intersect:leave="reset()"
            >
                <span class="text-gradient block text-4xl font-extrabold sm:text-5xl 2xl:text-6xl" x-text="display">{{ $stat['target'] . $stat['suffix'] }}</span>
                <span class="text-xs font-semibold tracking-wider text-secondary uppercase sm:text-sm">{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </div>
</section>
