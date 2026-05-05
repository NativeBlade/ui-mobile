@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $variant = $variant ?? 'fill';
    $color = $color ?? Theme::color('primary', $theme);
    $textColor = $textColor ?? Theme::color('primary_text', $theme);
    $deletable = (bool)($deletable ?? false);

    $base = 'text-sm inline-flex items-center justify-center align-middle px-3';

    if ($theme === 'ios') {
        $shape = 'rounded-full h-7';
    } else {
        $shape = 'rounded-lg h-8 font-medium';
    }

    $variantClass = match ($variant) {
        'outline' => "bg-transparent text-{$color} border border-{$color}",
        default   => "bg-{$color} text-{$textColor}",
    };
@endphp

<span {{ $attributes->class("{$base} {$shape} {$variantClass}") }}>
    {{ $slot }}

    @if($deletable)
        <button
            type="button"
            class="ms-2 -me-1 h-full w-5 flex items-center justify-center opacity-70 active:opacity-100 cursor-pointer"
            x-on:click="$el.closest('.k-chip-wrapper, span').dispatchEvent(new CustomEvent('chip-delete', {bubbles: true}))"
            aria-label="Remove"
        >
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 6l12 12M6 18L18 6"/>
            </svg>
        </button>
    @endif
</span>
