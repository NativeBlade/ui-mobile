@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $color = $color ?? Theme::color('primary', $theme);
    $textColor = $textColor ?? Theme::color('primary_text', $theme);
    $position = $position ?? 'bottom-right';
    $icon = $icon ?? null;
    $label = $label ?? null;
    $iconOnly = $label === null;

    $base = 'fixed z-30 flex items-center justify-center gap-2 cursor-pointer select-none transition-shadow active:shadow-sm';

    if ($theme === 'ios') {
        $shape = 'h-11 rounded-full';
        $sizing = $iconOnly ? 'w-11' : 'px-4';
        $shadow = 'shadow-lg';
        $textClass = 'text-sm font-semibold uppercase';
    } else {
        $shape = $iconOnly ? 'rounded-2xl w-14 h-14' : 'rounded-2xl h-14 px-4';
        $sizing = '';
        $shadow = 'shadow-lg';
        $textClass = 'text-sm font-medium';
    }

    $colorClass = "bg-{$color} text-{$textColor}";

    $positionStyle = match ($position) {
        'bottom-left'  => 'bottom: calc(env(safe-area-inset-bottom) + 1rem); left: 1rem;',
        'top-right'    => 'top: calc(env(safe-area-inset-top) + 1rem); right: 1rem;',
        'top-left'     => 'top: calc(env(safe-area-inset-top) + 1rem); left: 1rem;',
        default        => 'bottom: calc(env(safe-area-inset-bottom) + 1rem); right: 1rem;',
    };
@endphp

<button
    type="button"
    {{ $attributes->class("{$base} {$shape} {$sizing} {$shadow} {$colorClass}") }}
    style="{{ $positionStyle }}"
>
    @if($icon)
        <span class="size-6 flex items-center justify-center">{{ $icon }}</span>
    @endif

    @if($label)
        <span class="{{ $textClass }}">{{ $label }}</span>
    @endif
</button>
