@php
    $stats = [
        ['target' => 360, 'suffix' => '°', 'label' => 'control total'],
        ['target' => 99.9, 'suffix' => '%', 'label' => 'uptime garantizado'],
        ['target' => 24, 'suffix' => '/7', 'label' => 'soporte técnico'],
        ['target' => 10, 'suffix' => 'x', 'label' => 'más rápido'],
    ];
@endphp

{{-- 1px gaps over a border-colored backdrop draw the dividers in both the 2- and 4-column layouts --}}
<section class="border-b border-glass bg-glass" aria-label="Cifras">
    <div class="mx-auto grid max-w-[104rem] grid-cols-2 gap-px md:grid-cols-4">
        @foreach ($stats as $stat)
            <div
                class="bg-bg px-5 py-7 sm:px-8 sm:py-9"
                x-data="counter({{ $stat['target'] }}, @js($stat['suffix']))"
                x-intersect:enter.half="start()"
                x-intersect:leave="reset()"
            >
                <span class="block font-display text-4xl font-semibold tracking-[-0.03em] text-fg sm:text-5xl" x-text="display">{{ $stat['target'] . $stat['suffix'] }}</span>
                <span class="font-mono text-xs text-muted uppercase">{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </div>
</section>
