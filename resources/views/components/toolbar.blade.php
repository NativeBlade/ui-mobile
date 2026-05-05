@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $top = (bool)($top ?? false);

    $position = $top ? 'sticky top-0' : 'sticky bottom-0';

    if ($theme === 'ios') {
        $bar = "{$position} z-20 bg-white px-4 flex items-center justify-around h-12";
        $border = $top ? 'border-b border-gray-200' : 'border-t border-gray-200';
    } else {
        $bar = "{$position} z-20 bg-white px-4 flex items-center justify-around h-14 shadow";
        $border = '';
    }
@endphp

<div
    {{ $attributes->class("{$bar} {$border}") }}
    style="@if($top) padding-top: env(safe-area-inset-top); @else padding-bottom: env(safe-area-inset-bottom); @endif"
>
    {{ $slot }}
</div>
