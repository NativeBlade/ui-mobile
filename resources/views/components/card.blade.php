@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $title = $title ?? null;
    $footer = $footer ?? null;

    // Visual variants:
    //   raised  (default true)  — adds shadow
    //   outline (default false) — outlined card with border, no shadow
    //   plain   (default false) — flat: no shadow, no border, transparent bg
    //   headerDivider — line under the header
    //   footerDivider — line above the footer
    //   inset   (default true)  — has horizontal margin (mx-4)
    $raised        = isset($raised) ? (bool)$raised : true;
    $outline       = (bool)($outline ?? false);
    $plain         = (bool)($plain ?? false);
    $headerDivider = (bool)($headerDivider ?? false);
    $footerDivider = (bool)($footerDivider ?? false);
    $inset         = isset($inset) ? (bool)$inset : true;

    if ($plain) {
        $raised = false;
        $outline = false;
    }

    $rounded = $theme === 'ios' ? 'rounded-3xl' : 'rounded-2xl';

    if ($plain) {
        $surface = 'bg-transparent';
        $shadow = '';
        $border = '';
    } elseif ($outline) {
        $surface = 'bg-white';
        $shadow = '';
        $border = 'border border-gray-200';
    } else {
        $surface = 'bg-white';
        $shadow = $raised ? 'shadow' : '';
        $border = '';
    }

    $margin = $inset ? 'mx-4 my-4' : 'my-4';

    $wrapper = "overflow-hidden {$margin} {$surface} {$rounded} {$shadow} {$border}";
    $headerClass = 'p-4 text-base font-semibold text-gray-900' . ($headerDivider ? ' border-b border-gray-200' : '');
    $bodyClass = 'px-4 py-4 text-sm text-gray-700';
    $footerClass = 'p-4 pt-2 text-xs text-gray-500' . ($footerDivider ? ' border-t border-gray-200' : '');
@endphp

<div {{ $attributes->class($wrapper) }}>
    @if($title)
        <div class="{{ $headerClass }}">{{ $title }}</div>
    @endif

    <div class="{{ $bodyClass }}">{{ $slot }}</div>

    @if($footer)
        <div class="{{ $footerClass }}">{{ $footer }}</div>
    @endif
</div>
