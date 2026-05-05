@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $side = $side ?? 'left';
    $width = $width ?? 'w-72';
    $title = $title ?? null;
    $id = $id ?? 'nb-drawer';

    if ($theme === 'ios') {
        $panel = 'bg-white';
        $titleClass = 'px-5 pt-6 pb-3 text-2xl font-bold text-gray-900';
        $titleBorder = 'border-b border-gray-200';
        $shadowSide = $side === 'right' ? 'shadow-[-2px_0_8px_rgba(0,0,0,0.06)]' : 'shadow-[2px_0_8px_rgba(0,0,0,0.06)]';
    } else {
        $panel = 'bg-gray-50';
        $titleClass = 'px-6 pt-6 pb-4 text-xl font-medium text-gray-900';
        $titleBorder = '';
        $shadowSide = $side === 'right' ? 'shadow-[-4px_0_16px_rgba(0,0,0,0.08)]' : 'shadow-[4px_0_16px_rgba(0,0,0,0.08)]';
    }

    $sideClass = $side === 'right' ? 'right-0' : 'left-0';
    $closedTransform = $side === 'right' ? 'translate-x-full' : '-translate-x-full';
@endphp

<div
    x-data="{ open: false }"
    x-on:nb-drawer-open.window="if ($event.detail?.id === '{{ $id }}') open = true"
    x-on:nb-drawer-close.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    @class(['fixed inset-0 z-40'])
    style="display: none;"
    {{ $attributes }}
>
    <div
        x-show="open"
        x-transition.opacity.duration.400ms
        class="absolute inset-0"
        style="background-color: rgba(0,0,0,0.5);"
        x-on:click="open = false"
    ></div>

    <aside
        x-show="open"
        x-transition:enter="transition transform duration-400"
        x-transition:enter-start="{{ $closedTransform }}"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-400"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="{{ $closedTransform }}"
        @class(["absolute top-0 bottom-0 {$sideClass} {$width} {$panel} {$shadowSide} flex flex-col"])
        style="padding-top: env(safe-area-inset-top); padding-bottom: env(safe-area-inset-bottom);"
    >
        @if($title)
            <div class="{{ $titleClass }} {{ $titleBorder }}">{{ $title }}</div>
        @endif

        <div class="flex-1 overflow-y-auto py-2">
            {{ $slot }}
        </div>
    </aside>
</div>
