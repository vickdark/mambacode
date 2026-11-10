@props(['badge' => null, 'title', 'as' => 'h2'])

<div {{ $attributes->class('container-page mb-10 text-center lg:mb-14') }}>
    @if ($badge)
        <span class="eyebrow">/ {{ mb_strtolower($badge) }}</span>
    @endif
    <{{ $as }} class="section-title mt-3 mb-4">{{ $title }}</{{ $as }}>
    @if ($slot->isNotEmpty())
        <p class="mx-auto max-w-2xl text-base leading-relaxed text-muted sm:text-lg">{{ $slot }}</p>
    @endif
</div>
