@php
    $size = $size ?? 6;
    $color = $color ?? null;

    $sizeClass = is_numeric($size) ? "w-{$size} h-{$size}" : $size;
    $colorClass = $color ? "text-{$color}" : '';
@endphp

<span {{ $attributes->class("inline-flex items-center justify-center {$sizeClass} {$colorClass}") }} aria-hidden="true">
    {{ $slot }}
</span>
