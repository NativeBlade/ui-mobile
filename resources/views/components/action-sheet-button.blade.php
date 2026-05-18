@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $destructive = (bool)($destructive ?? false);
    $bold = (bool)($bold ?? false);
    $href = $href ?? null;

    $color = Theme::color('primary', $theme);
    $destructiveColor = Theme::color('destructive', $theme);

    $textColor = $destructive ? "text-{$destructiveColor}" : "text-{$color}";
    $weight = $bold ? 'font-semibold' : ($theme === 'ios' ? 'font-normal' : 'font-medium');

    // iOS action sheets center the row content (Apple HIG). Using flex with
    // justify-center keeps ANY slot layout — plain text, or "icon + text +
    // trailing badge" — visually centered. `text-center` alone only handles
    // inline text and leaves flex children stuck on the left.
    //
    // Material is leading-aligned with optional leading icon (M3 spec), so
    // we keep flex-start there.
    if ($theme === 'ios') {
        $row = "flex items-center justify-center gap-2 w-full py-3.5 text-base {$textColor} {$weight} active:bg-gray-100 cursor-pointer no-underline";
    } else {
        $row = "flex items-center w-full px-5 py-3 gap-3 text-left text-sm {$textColor} {$weight} active:bg-gray-100 cursor-pointer no-underline";
    }
@endphp

@if($href)
    {{-- Anchor variant — lets the nativeblade link-intercept (or plain
         browser navigation) handle routing. Use href when the button is
         a navigation action; otherwise pass a `wire:click` to a button. --}}
    <a href="{{ $href }}" {{ $attributes->class($row) }}>
        {{ $slot }}
    </a>
@else
    <button type="button" {{ $attributes->class($row) }}>
        {{ $slot }}
    </button>
@endif
