@props(['badge' => null, 'title', 'as' => 'h2'])

<div {{ $attributes->class('container-page mb-10 text-center lg:mb-14') }}>
    @if ($badge)
        <span class="mb-3 inline-block rounded-full bg-primary/10 px-3 py-2 text-xs font-semibold text-primary sm:text-sm">{{ $badge }}</span>
    @endif
    <{{ $as }} class="text-gradient mb-3 text-3xl font-extrabold tracking-tight sm:text-4xl xl:text-5xl">{{ $title }}</{{ $as }}>
    @if ($slot->isNotEmpty())
        <p class="mx-auto max-w-3xl text-base text-muted sm:text-lg">{{ $slot }}</p>
    @endif
</div>
