@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $title = $title ?? null;
    $subtitle = $subtitle ?? null;
    $href = $href ?? null;
    $chevron = $chevron ?? ($href !== null && $theme === 'ios');
    $media = $media ?? null;
    $after = $after ?? null;

    if ($theme === 'ios') {
        $row = 'flex items-center px-4 gap-3 active:bg-gray-100 border-b border-gray-100 last:border-b-0 min-h-[44px]';
        $titleSize = 'text-base text-gray-900';
        $subtitleSize = 'text-sm text-gray-500';
    } else {
        $row = 'flex items-center px-4 py-3 gap-4 active:bg-gray-100 border-b border-gray-200/60 last:border-b-0';
        $titleSize = 'text-sm text-gray-900';
        $subtitleSize = 'text-xs text-gray-500';
    }
@endphp

<li role="listitem">
    @if($href)
        <a href="{{ $href }}" {{ $attributes->class($row) }}>
    @else
        <div {{ $attributes->class($row) }}>
    @endif

        @if($media)
            <div class="shrink-0 py-2">{{ $media }}</div>
        @endif

        <div class="flex-1 min-w-0 py-2">
            @if($title)
                <div class="{{ $titleSize }} truncate">{{ $title }}</div>
            @endif
            @if($subtitle)
                <div class="{{ $subtitleSize }} truncate">{{ $subtitle }}</div>
            @endif
            @if(!$title && !$subtitle)
                {{ $slot }}
            @endif
        </div>

        @if($after !== null)
            <div class="shrink-0 text-sm text-gray-500">{{ $after }}</div>
        @endif

        @if($chevron)
            <span class="shrink-0 opacity-30">
                <x-nativeblade-icon name="caret-right-bold" size="14" />
            </span>
        @endif

    @if($href)
        </a>
    @else
        </div>
    @endif
</li>
