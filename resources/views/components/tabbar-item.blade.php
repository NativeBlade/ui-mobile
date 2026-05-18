@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $active = (bool)($active ?? false);
    $href = $href ?? null;
    $icon = $icon ?? null;
    $label = $label ?? null;
    $color = Theme::color('primary', $theme);

    if ($theme === 'ios') {
        $base = 'flex-1 flex flex-col items-center justify-center gap-0.5 py-1 select-none active:opacity-60 transition no-underline';
        $colorClass = $active ? "text-{$color}" : 'text-gray-700';
        $iconWrap = 'flex items-center justify-center';
        $labelSize = $label && $icon ? 'text-[10px] font-medium leading-tight' : 'text-xs font-medium';
    } else {
        $base = 'flex-1 flex flex-col items-center justify-center gap-1 py-2 select-none active:opacity-60 transition no-underline';
        $colorClass = $active ? "text-{$color}" : 'text-gray-600';
        $iconWrap = 'flex items-center justify-center transition-colors';
        $labelSize = $active ? "text-xs font-semibold text-{$color}" : 'text-xs font-medium';
    }

    // Render as a plain anchor so:
    //   - Shell mode: link-intercept (nativeblade) catches the click and
    //     posts a `nativeblade-navigate` message — same flow as wire:nb-navigate.
    //   - Browser preview: the anchor follows href normally.
    // We avoid window.location.href in onclick because it doesn't go through
    // the shell's navigate handler in WASM mode (404 on Android).
    $tag = $href ? 'a' : 'button';
    $tapHighlight = 'style="-webkit-tap-highlight-color: transparent;"';
@endphp

@if($href)
    <a
        href="{{ $href }}"
        {!! $tapHighlight !!}
        {{ $attributes->class("{$base} {$colorClass} focus:outline-none") }}
    >
        @if($icon)
            <span class="{{ $iconWrap }}">{{ $icon }}</span>
        @endif

        @if($label)
            <span class="{{ $labelSize }}">{{ $label }}</span>
        @endif

        {{ $slot }}
    </a>
@else
    <button
        type="button"
        {!! $tapHighlight !!}
        {{ $attributes->class("{$base} {$colorClass} focus:outline-none") }}
    >
        @if($icon)
            <span class="{{ $iconWrap }}">{{ $icon }}</span>
        @endif

        @if($label)
            <span class="{{ $labelSize }}">{{ $label }}</span>
        @endif

        {{ $slot }}
    </button>
@endif
