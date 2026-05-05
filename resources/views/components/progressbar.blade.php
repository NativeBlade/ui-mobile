@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $value = (float)($value ?? 0);
    $value = max(0, min(100, $value));
    $color = $color ?? Theme::color('primary', $theme);

    $height = $theme === 'ios' ? 'h-1.5' : 'h-1';
    $track = "block overflow-hidden rounded-full bg-gray-200 relative {$height}";
    $fill = "block h-full rounded-full bg-{$color} transition-all duration-200";
@endphp

<div {{ $attributes->class($track) }} role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $value }}">
    <span class="{{ $fill }}" style="width: {{ $value }}%"></span>
</div>
