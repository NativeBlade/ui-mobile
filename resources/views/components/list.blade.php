@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    // Variants:
    //   inset    — rounded card with horizontal margin (default true on iOS)
    //   strong   — bolder background (full white surface, used for grouped sections)
    //   outline  — border around the list (instead of plain bg)
    //   nested   — no margin top/bottom, used inside another list/card
    $inset   = isset($inset) ? (bool)$inset : ($theme === 'ios');
    $strong  = (bool)($strong ?? false);
    $outline = (bool)($outline ?? false);
    $nested  = (bool)($nested ?? false);
    $title   = $title ?? null;

    $rounded = $theme === 'ios' ? 'rounded-3xl' : 'rounded-2xl';

    if ($inset) {
        $base = "mx-4 overflow-hidden {$rounded}";
    } else {
        $base = '';
    }

    $bg = $strong || $inset ? 'bg-white' : 'bg-white';
    $borders = '';
    if ($outline) {
        $borders = $inset ? 'border border-gray-200' : 'border-y border-gray-200';
    } elseif (!$inset) {
        $borders = 'border-y border-gray-200';
    }

    $spacing = $nested ? '' : 'my-4';

    $wrapper = trim("{$base} {$bg} {$borders} {$spacing}");

    $titleClass = $theme === 'ios'
        ? 'px-4 pb-1 pt-4 text-xs uppercase tracking-wide text-gray-500'
        : 'px-4 pb-2 pt-4 text-xs font-medium tracking-wide text-gray-500';
@endphp

<div>
    @if($title)
        <div class="{{ $titleClass }}">{{ $title }}</div>
    @endif

    <ul {{ $attributes->class($wrapper) }} role="list">
        {{ $slot }}
    </ul>
</div>
