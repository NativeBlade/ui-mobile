@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $destructive = (bool)($destructive ?? false);
    $href = $href ?? null;

    $color = Theme::color('primary', $theme);
    $destructiveColor = Theme::color('destructive', $theme);

    $textColor = $destructive ? "text-{$destructiveColor}" : "text-{$color}";

    if ($theme === 'ios') {
        $row = "block w-full px-4 py-3 text-center text-base {$textColor} active:bg-gray-100 border-b border-gray-100 last:border-b-0 cursor-pointer min-h-[44px]";
    } else {
        $row = "block w-full px-4 py-3 text-left text-sm font-medium {$textColor} active:bg-gray-100 border-b border-gray-200/60 last:border-b-0 cursor-pointer";
    }
@endphp

<li role="listitem">
    @if($href)
        <a href="{{ $href }}" {{ $attributes->class($row) }}>{{ $slot }}</a>
    @else
        <button type="button" {{ $attributes->class($row) }}>{{ $slot }}</button>
    @endif
</li>
