@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $title = $title ?? null;
    $footer = $footer ?? null;

    // Variants:
    //   inset    — rounded corners + horizontal margin (card-like)
    //   strong   — solid surface (white bg)
    //   outline  — border around block
    //   nested   — no top/bottom margin (use inside another container)
    $inset = (bool)($inset ?? false);
    $strong = (bool)($strong ?? false);
    $outline = (bool)($outline ?? false);
    $nested = (bool)($nested ?? false);

    $rounded = $theme === 'ios' ? 'rounded-3xl' : 'rounded-2xl';

    $surface = $strong ? 'bg-white' : '';
    $padding = $strong || $outline ? 'py-4' : 'py-2';

    if ($inset) {
        $border = $outline ? 'border border-gray-200' : '';
        $wrapper = "mx-4 px-4 {$padding} {$rounded} {$surface} {$border}";
    } else {
        $border = $outline ? 'border-y border-gray-200' : '';
        $wrapper = "px-4 {$padding} {$surface} {$border}";
    }

    if (!$nested) {
        $wrapper .= ' my-4';
    }

    $titleClass = $theme === 'ios'
        ? 'px-4 pb-1 pt-4 text-xs uppercase tracking-wide text-gray-500'
        : 'px-4 pb-2 pt-4 text-xs font-medium tracking-wide text-gray-500';

    $footerClass = 'px-4 pt-1 pb-2 text-xs text-gray-500';
@endphp

@if($title)
    <div class="{{ $titleClass }}">{{ $title }}</div>
@endif

<div {{ $attributes->class("{$wrapper} text-sm text-gray-700") }}>
    {{ $slot }}
</div>

@if($footer)
    <div class="{{ $footerClass }}">{{ $footer }}</div>
@endif
