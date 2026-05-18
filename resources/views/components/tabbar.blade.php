@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    // Safe-area padding — just enough to clear the home indicator / gesture
    // bar without leaving an empty band below the buttons.
    $safePad = 'padding-bottom: env(safe-area-inset-bottom, 0px);';

    if ($theme === 'ios') {
        $bar = 'sticky bottom-0 z-20 border-t border-gray-200';
        $barStyle = $safePad . 'background-color: rgba(248,248,250,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);';
        // iOS spec tabbar: 49px. h-12 (48px) matches.
        $inner = 'flex items-stretch h-12';
    } else {
        $bar = 'sticky bottom-0 z-20 bg-white border-t border-gray-200 shadow-sm';
        $barStyle = $safePad;
        // Material 3 navigation bar: 80px is its MAX with a label/badge stack;
        // for icon+label compact layout (our default) 56-64px is correct.
        $inner = 'flex items-stretch h-16';
    }
@endphp

<nav
    {{ $attributes->class($bar) }}
    style="{{ $barStyle }}"
>
    <div class="{{ $inner }}">
        {{ $slot }}
    </div>
</nav>
