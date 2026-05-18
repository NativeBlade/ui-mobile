@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    $title = $title ?? null;
    $subtitle = $subtitle ?? null;
    $left = $left ?? null;
    $right = $right ?? null;

    // Props:
    //   size         — 'sm' (compact, 44px), 'md' (comfortable, 56px), 'lg' (iOS large title)
    //   large        — alias for size="lg" (backwards compatible with previous API)
    //   back         — auto-render a back button in the `left` slot if no left was passed
    //   backUrl      — optional URL for the back button (default: history.back())
    //   transparent  — no background, no border (overlay style)
    //   centerTitle  — force the title to center (defaults to true on iOS for size=sm)
    //   safe         — true to honour env(safe-area-inset-top). Defaults to true.
    //   raw          — render subtitle as raw HTML (caller is responsible for escaping)
    $size = $size ?? ($large ?? false ? 'lg' : 'sm');
    if (!in_array($size, ['sm', 'md', 'lg'], true)) $size = 'sm';
    $back = (bool)($back ?? false);
    $backUrl = $backUrl ?? null;
    $transparent = (bool)($transparent ?? false);
    $safe = isset($safe) ? (bool)$safe : true;
    $raw = (bool)($raw ?? false);

    // Center title only makes sense on the compact iOS variant.
    $centerTitle = $centerTitle ?? null;
    if ($centerTitle === null) {
        $centerTitle = ($theme === 'ios' && $size === 'sm');
    }

    // Safe-area: respect notch when present; no fake gap in browser preview.
    $safePad = $safe ? 'padding-top: env(safe-area-inset-top, 0px);' : '';

    if ($transparent) {
        $bar = 'sticky top-0 z-20';
        $barStyle = $safePad;
    } elseif ($theme === 'ios') {
        $bar = 'sticky top-0 z-20 border-b border-gray-200';
        $barStyle = $safePad . 'background-color: rgba(255,255,255,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);';
    } else {
        $bar = 'sticky top-0 z-20 bg-white shadow-sm';
        $barStyle = $safePad;
    }

    // Row height by size.
    $rowMinH = match ($size) {
        'lg' => 'min-h-[44px]',
        'md' => 'min-h-[56px]',
        default => 'min-h-[44px]',
    };

    $rowPad = $theme === 'ios' ? 'px-3 py-2' : 'px-4 py-2 gap-3';
    $inner = "flex items-center {$rowMinH} {$rowPad} relative";

    // Title typography by size. For sm we keep the centered iOS title; for md
    // we use a comfortable left-aligned title with subtitle below.
    if ($size === 'md') {
        $titleClass = 'flex-1 min-w-0 text-[20px] font-semibold text-gray-900 truncate';
    } elseif ($centerTitle) {
        $titleClass = 'absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-base font-semibold text-gray-900 whitespace-nowrap';
    } else {
        $titleClass = 'flex-1 min-w-0 text-lg font-semibold text-gray-900 truncate';
    }

    $subtitleClass = 'text-[12px] text-gray-500 truncate';

    $sideClass = $theme === 'ios' ? 'min-w-[44px] flex items-center' : 'flex items-center';

    // Subtitle: when set, sm/md render it below the title (NOT only large).
    $showInlineSubtitle = $subtitle !== null && $size !== 'lg';
@endphp

<header
    {{ $attributes->class($bar) }}
    style="{{ $barStyle }}"
>
    <div class="{{ $inner }}">
        @if($left)
            <div class="{{ $sideClass }} justify-start">{{ $left }}</div>
        @elseif($back)
            <div class="{{ $sideClass }} justify-start">
                <button type="button"
                    @if($backUrl) onclick="window.location.href='{{ $backUrl }}'"
                    @else onclick="history.back()" @endif
                    nb-feedback
                    style="-webkit-tap-highlight-color: transparent; touch-action: manipulation; -webkit-touch-callout: none;"
                    class="p-2 -ml-1 rounded-lg text-gray-900 active:bg-gray-100 focus:outline-none focus-visible:outline-none focus:ring-0 transition-colors">
                    <x-nativeblade-icon name="arrow-left" size="22" />
                </button>
            </div>
        @elseif($theme === 'ios' && $centerTitle)
            <div class="{{ $sideClass }}"></div>
        @endif

        @if($title && $size !== 'lg')
            <div class="min-w-0 flex-1 {{ $centerTitle ? '' : 'mx-0' }}">
                <h1 class="{{ $titleClass }}">{{ $title }}</h1>
                @if($showInlineSubtitle)
                    @if($raw)
                        <p class="{{ $subtitleClass }}">{!! $subtitle !!}</p>
                    @else
                        <p class="{{ $subtitleClass }}">{{ $subtitle }}</p>
                    @endif
                @endif
            </div>
        @endif

        @if($right)
            <div class="{{ $sideClass }} justify-end ml-auto">{{ $right }}</div>
        @elseif($theme === 'ios' && $centerTitle)
            <div class="{{ $sideClass }} ml-auto"></div>
        @endif
    </div>

    @if($size === 'lg' && $title)
        <div class="px-4 pb-2 pt-1">
            <h2 class="text-3xl font-bold text-gray-900 leading-tight truncate">{{ $title }}</h2>
            @if($subtitle)
                @if($raw)
                    <p class="text-sm text-gray-500 mt-0.5 truncate">{!! $subtitle !!}</p>
                @else
                    <p class="text-sm text-gray-500 mt-0.5 truncate">{{ $subtitle }}</p>
                @endif
            @endif
        </div>
    @endif
</header>
