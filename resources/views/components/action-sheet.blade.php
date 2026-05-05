@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $id = $id ?? 'nb-action-sheet';
    $title = $title ?? null;

    if ($theme === 'ios') {
        $sheet = 'mx-2 mb-2 rounded-2xl bg-white shadow-xl';
        $titleClass = 'px-4 py-3 text-center text-xs text-gray-500 border-b border-gray-200';
    } else {
        $sheet = 'rounded-t-2xl bg-white shadow-2xl';
        $titleClass = 'px-5 pt-5 pb-2 text-base font-medium text-gray-900';
    }
@endphp

<div
    x-data="{ open: false }"
    x-on:nb-action-sheet-open.window="if ($event.detail?.id === '{{ $id }}') open = true"
    x-on:nb-action-sheet-close.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    class="fixed inset-0 z-50 flex flex-col justify-end"
    style="display: none;"
    {{ $attributes }}
>
    <div
        x-show="open"
        x-transition.opacity.duration.300ms
        class="absolute inset-0"
        style="background-color: rgba(0,0,0,0.5);"
        x-on:click="open = false"
    ></div>

    <div
        x-show="open"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full"
        class="relative {{ $sheet }}"
        style="padding-bottom: env(safe-area-inset-bottom);"
    >
        @if($title)
            <div class="{{ $titleClass }}">{{ $title }}</div>
        @endif

        <div @class([
            'flex flex-col',
            'divide-y divide-gray-200' => $theme === 'ios',
        ])>
            {{ $slot }}
        </div>
    </div>
</div>
