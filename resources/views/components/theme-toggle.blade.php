@props(['label' => null])

<button
    type="button"
    @click="$store.theme.toggle()"
    aria-label="Cambiar tema"
    title="Cambiar tema"
    {{ $attributes->class('flex items-center justify-center gap-2 rounded-lg border border-btn-border bg-btn px-3 py-2 text-fg transition hover:scale-105 hover:border-secondary hover:bg-hover hover:text-secondary') }}
>
    @if ($label)
        <span class="me-auto">{{ $label }}</span>
    @endif
    <i class="fa-solid" :class="$store.theme.isLight ? 'fa-sun' : 'fa-moon'" aria-hidden="true"></i>
</button>
