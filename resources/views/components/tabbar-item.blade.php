@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $active = (bool)($active ?? false);
    $href = $href ?? null;
    $icon = $icon ?? null;
    $label = $label ?? null;
    $color = Theme::color('primary', $theme);

    // Tabs default to no slide because they navigate between sibling sections,
    // not deeper screens. Override with transition="slide" / "fade" / etc.
    $transition = $transition ?? 'none';

    if ($theme === 'ios') {
        $base = 'flex-1 flex flex-col items-center justify-center py-1 select-none active:opacity-60 transition';
        $colorClass = $active ? "text-{$color}" : 'text-gray-700';
        $iconWrap = 'flex items-center justify-center w-7 h-7';
        $labelSize = $label && $icon ? 'text-[10px] font-medium leading-tight' : 'text-xs font-medium';
    } else {
        $base = 'flex-1 flex flex-col items-center justify-center py-2 gap-1 select-none active:opacity-60 transition';
        $colorClass = $active ? "text-{$color}" : 'text-gray-600';
        $iconWrap = 'flex items-center justify-center w-7 h-7 transition-colors';
        $labelSize = $active ? "text-xs font-semibold text-{$color}" : 'text-xs font-medium';
    }

    // When href is provided we render as a button that calls nb.navigate so
    // we can pass the transition option. Plain <a href> goes through the
    // router's default transition, which would slide.
    $click = $href ? "nb.navigate('" . addslashes($href) . "', {transition:'" . addslashes($transition) . "'})" : null;
@endphp

<button
    type="button"
    @if($click) onclick="{{ $click }}" @endif
    {{ $attributes->class("{$base} {$colorClass}") }}
>
    @if($icon)
        <span class="{{ $iconWrap }}">
            <span class="w-6 h-6 flex items-center justify-center">{{ $icon }}</span>
        </span>
    @endif

    @if($label)
        <span class="{{ $labelSize }}">{{ $label }}</span>
    @endif

    {{ $slot }}
</button>
