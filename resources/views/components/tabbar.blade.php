@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    if ($theme === 'ios') {
        $bar = 'sticky bottom-0 z-20 border-t border-gray-200';
        $barStyle = 'background-color: rgba(248,248,250,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);';
        $inner = 'flex h-12';
    } else {
        $bar = 'sticky bottom-0 z-20 bg-gray-50';
        $barStyle = '';
        $inner = 'flex h-20 items-center';
    }
@endphp

<nav
    {{ $attributes->class($bar) }}
    style="padding-bottom: env(safe-area-inset-bottom);{{ $barStyle }}"
>
    <div class="{{ $inner }}">
        {{ $slot }}
    </div>
</nav>
