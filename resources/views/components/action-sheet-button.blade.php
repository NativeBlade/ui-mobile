@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $destructive = (bool)($destructive ?? false);
    $bold = (bool)($bold ?? false);

    $color = Theme::color('primary', $theme);
    $destructiveColor = Theme::color('destructive', $theme);

    $textColor = $destructive ? "text-{$destructiveColor}" : "text-{$color}";
    $weight = $bold ? 'font-semibold' : ($theme === 'ios' ? 'font-normal' : 'font-medium');

    if ($theme === 'ios') {
        $row = "block w-full py-3.5 text-center text-base {$textColor} {$weight} active:bg-gray-100 cursor-pointer";
    } else {
        $row = "flex items-center w-full px-5 py-3 text-left text-sm {$textColor} {$weight} active:bg-gray-100 cursor-pointer";
    }
@endphp

<button type="button" {{ $attributes->class($row) }}>
    {{ $slot }}
</button>
