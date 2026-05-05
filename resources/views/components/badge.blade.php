@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $color = $color ?? 'red-500';
    $textColor = $textColor ?? 'white';
    $size = $size ?? 'md';

    $weight = $theme === 'ios' ? 'font-semibold' : 'font-medium';

    if ($size === 'sm') {
        $boxStyle = 'min-width:16px;height:16px;font-size:10px;padding:0 4px;line-height:1;';
    } else {
        $boxStyle = 'min-width:20px;height:20px;font-size:12px;padding:0 6px;line-height:1;';
    }
@endphp

<span
    {{ $attributes->class("inline-flex items-center justify-center rounded-full bg-{$color} text-{$textColor} {$weight}") }}
    style="{{ $boxStyle }}"
>
    {{ $slot }}
</span>
