@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $active = (bool)($active ?? false);
    $variant = $variant ?? 'underline';
    $color = Theme::color('primary', $theme);

    if ($variant === 'pill') {
        $base = 'shrink-0 px-4 py-1.5 text-sm rounded-full transition-colors select-none';
        $activeClass = $active ? "bg-white text-gray-900 shadow font-semibold" : 'text-gray-600';
    } elseif ($variant === 'segmented') {
        $base = 'flex-1 px-3 py-1.5 text-sm rounded-md transition-colors text-center select-none';
        $activeClass = $active ? "bg-white text-gray-900 shadow font-medium" : 'text-gray-600';
    } else {
        $base = 'shrink-0 px-4 pb-2 pt-3 text-sm transition-colors select-none border-b-2';
        $activeClass = $active ? "border-{$color} text-{$color} font-semibold" : 'border-transparent text-gray-600';
    }
@endphp

<button type="button" role="tab" aria-selected="{{ $active ? 'true' : 'false' }}" {{ $attributes->class("{$base} {$activeClass}") }}>
    {{ $slot }}
</button>
