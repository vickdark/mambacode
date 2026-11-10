@props(['src', 'alt', 'sizes' => '100vw'])

{{-- Browsers pick a WebP variant (scripts/optimize-images.mjs) from srcset; the original stays in src as the fallback --}}
@php
    [$width, $height] = \App\Support\ResponsiveImage::dimensions($src);
    $srcset = \App\Support\ResponsiveImage::srcset($src);
@endphp

<img
    src="{{ asset($src) }}"
    @if ($srcset) srcset="{{ $srcset }}" sizes="{{ $sizes }}" @endif
    alt="{{ $alt }}"
    @if ($width) width="{{ $width }}" height="{{ $height }}" @endif
    {{ $attributes->merge(['decoding' => 'async']) }}
>
