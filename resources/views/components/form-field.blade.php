@props(['name', 'label', 'icon' => null, 'type' => 'text', 'value' => null])

@php
    $id = 'contact_' . $name;
    $control = 'w-full min-h-12 rounded-xl border border-input-border bg-input px-3.5 py-2.5 text-fg placeholder:text-faint transition focus:border-primary focus:ring-3 focus:ring-primary/20 focus:outline-none';
@endphp

<div {{ $attributes->only('class') }}>
    <label for="{{ $id }}" class="mb-1.5 block text-sm font-medium text-fg">{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea id="{{ $id }}" name="{{ $name }}" rows="6" {{ $attributes->except('class')->class($control) }}>{{ old($name, $value) }}</textarea>
    @elseif ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->except('class')->class($control . ' [&>option]:bg-surface') }}>{{ $slot }}</select>
    @else
        <div class="relative">
            @if ($icon)
                <i class="fa-solid {{ $icon }} pointer-events-none absolute top-1/2 left-3.5 -translate-y-1/2 text-sm text-faint" aria-hidden="true"></i>
            @endif
            <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" {{ $attributes->except('class')->class([$control, 'ps-10' => $icon]) }}>
        </div>
    @endif
</div>
