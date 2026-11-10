@props(['size' => 'sm'])

<span {{ $attributes->class('inline-flex min-w-0 items-center gap-2') }}>
    <img
        src="{{ asset('img/mambacode.jpeg') }}"
        alt="Mamba Code"
        width="40"
        height="40"
        loading="lazy"
        decoding="async"
        @class([
            'aspect-square shrink-0 rounded-md object-cover',
            'size-8' => $size === 'sm',
            'size-10 shadow-[0_0_15px_rgba(130,87,229,0.2)]' => $size === 'lg',
        ])
    >
    <span @class(['truncate font-bold text-fg', 'text-2xl' => $size === 'lg'])>Mamba<span class="text-secondary">Code</span></span>
</span>
