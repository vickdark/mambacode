@props(['size' => 'sm'])

<span {{ $attributes->class('inline-flex min-w-0 items-center gap-3') }}>
    <img
        src="{{ \App\Support\ResponsiveImage::largest('img/mambacodelg-removebg.png') }}"
        alt=""
        width="40"
        height="40"
        decoding="async"
        {{-- The PNG has wide transparent margins, so scale the mark up inside its box --}}
        @class(['shrink-0 scale-[1.7] object-contain', 'size-8' => $size === 'sm', 'size-10' => $size === 'lg'])
    >
    <span @class(['truncate font-display font-bold text-fg', 'text-lg' => $size === 'sm', 'text-xl' => $size === 'lg'])>mamba<span class="text-primary">code</span></span>
</span>
