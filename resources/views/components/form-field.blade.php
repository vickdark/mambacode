@props(['name', 'label', 'icon' => null, 'type' => 'text'])

@php
    $id = 'contact_' . $name;
    $control = 'w-full rounded-lg border border-input-border bg-input px-3 py-2.5 text-fg placeholder:text-muted transition focus:border-secondary focus:bg-surface focus:ring-3 focus:ring-blue-500/20 focus:outline-none';
@endphp

<div {{ $attributes->only('class') }}>
    <label for="{{ $id }}" class="mb-1 block text-sm">{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea id="{{ $id }}" name="{{ $name }}" rows="6" {{ $attributes->except('class')->class($control) }}>{{ old($name) }}</textarea>
    @elseif ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->except('class')->class($control . ' appearance-none [&>option]:bg-surface') }}>{{ $slot }}</select>
    @else
        <div class="flex">
            @if ($icon)
                <span class="grid w-11 shrink-0 place-items-center rounded-s-lg border border-e-0 border-input-border bg-input text-secondary">
                    <i class="fa-solid {{ $icon }}" aria-hidden="true"></i>
                </span>
            @endif
            <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" {{ $attributes->except('class')->class([$control, 'rounded-s-none' => $icon]) }}>
        </div>
    @endif
</div>
