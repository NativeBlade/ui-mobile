@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $variant = $variant ?? 'underline';
    $color = Theme::color('primary', $theme);

    $base = 'flex items-center w-full overflow-x-auto';

    if ($variant === 'pill') {
        $wrapper = "{$base} bg-gray-100 rounded-full p-1 gap-1";
    } elseif ($variant === 'segmented') {
        $wrapper = "{$base} bg-gray-100 rounded-lg p-0.5 gap-0.5";
    } else {
        $wrapper = "{$base} border-b border-gray-200 gap-1";
    }
@endphp

<div {{ $attributes->class($wrapper) }} role="tablist" data-nb-tabs-variant="{{ $variant }}" data-nb-tabs-color="{{ $color }}">
    {{ $slot }}
</div>
