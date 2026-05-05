@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $href = $href ?? '#';
    $color = $color ?? Theme::color('primary', $theme);

    $base = $theme === 'ios'
        ? "inline text-{$color} active:opacity-60"
        : "inline text-{$color} hover:underline active:opacity-60";
@endphp

<a href="{{ $href }}" {{ $attributes->class($base) }}>
    {{ $slot }}
</a>
