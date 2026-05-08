@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $title = $title ?? null;
    $subtitle = $subtitle ?? null;
    $left = $left ?? null;
    $right = $right ?? null;

    // Variants:
    //   large       — iOS-style large title shown below the bar
    //   transparent — no background, no border (overlay style)
    //   centerTitle — force the title to center (defaults to true on iOS, false on Material)
    $large = (bool)($large ?? false);
    $transparent = (bool)($transparent ?? false);
    $centerTitle = $centerTitle ?? null;
    if ($centerTitle === null) {
        $centerTitle = ($theme === 'ios');
    }

    if ($transparent) {
        $bar = 'sticky top-0 z-20';
        $barStyle = '';
    } elseif ($theme === 'ios') {
        $bar = 'sticky top-0 z-20 border-b border-gray-200';
        $barStyle = 'background-color: rgba(255,255,255,0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);';
    } else {
        $bar = 'sticky top-0 z-20 bg-white shadow-sm';
        $barStyle = '';
    }

    $inner = $theme === 'ios'
        ? 'flex items-center h-11 px-2 relative'
        : 'flex items-center h-16 px-4 gap-3';

    if ($centerTitle) {
        $titleClass = 'absolute left-1/2 -translate-x-1/2 text-base font-semibold text-gray-900 whitespace-nowrap';
    } else {
        $titleClass = 'flex-1 text-lg font-medium text-gray-900 truncate';
    }

    $sideClass = $theme === 'ios' ? 'min-w-[60px] flex items-center' : 'flex items-center';
@endphp

<header
    {{ $attributes->class($bar) }}
    style="padding-top: min(env(safe-area-inset-top, 0px), 28px);{{ $barStyle }}"
>
    <div class="{{ $inner }}">
        @if($left)
            <div class="{{ $sideClass }} justify-start">{{ $left }}</div>
        @elseif($theme === 'ios' && $centerTitle)
            <div class="{{ $sideClass }}"></div>
        @endif

        @if($title)
            <h1 class="{{ $titleClass }}">{{ $title }}</h1>
        @endif

        @if($right)
            <div class="{{ $sideClass }} justify-end ml-auto">{{ $right }}</div>
        @elseif($theme === 'ios' && $centerTitle)
            <div class="{{ $sideClass }} ml-auto"></div>
        @endif
    </div>

    @if($large && $title)
        <div class="px-4 pb-2 pt-1">
            <h2 class="text-3xl font-bold text-gray-900 leading-tight">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-sm text-gray-500 mt-0.5">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
</header>
