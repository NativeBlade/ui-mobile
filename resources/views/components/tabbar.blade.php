@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    // Safe-area padding — only enough to clear the home indicator / gesture
    // bar. Konsta's `pb-safe-4` (safe + 1rem) leaves visible empty space
    // below the buttons; we use just `pb-safe` so the tab items sit closer
    // to the indicator while still clearing it.
    $safePad = 'padding-bottom: env(safe-area-inset-bottom, 0px);';

    if ($theme === 'ios') {
        $bar = 'sticky bottom-0 z-20 border-t border-gray-200';
        $barStyle = $safePad . 'background-color: rgba(248,248,250,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);';
        $inner = 'flex items-center h-12';
    } else {
        $bar = 'sticky bottom-0 z-20 bg-gray-50';
        $barStyle = $safePad;
        $inner = 'flex h-20 items-center';
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
