@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $title = $title ?? null;
    $id = $id ?? 'nb-sheet';

    $rounded = $theme === 'ios' ? 'rounded-t-3xl' : 'rounded-t-2xl';
    $sheet = "bg-white {$rounded} shadow-2xl";

    $titleClass = $theme === 'ios'
        ? 'px-5 pt-4 pb-2 text-base font-semibold text-gray-900'
        : 'px-5 pt-5 pb-2 text-lg font-medium text-gray-900';

    $bodyClass = 'px-5 py-3 text-sm text-gray-700';

    $handle = $theme === 'ios'
        ? '<div class="mx-auto mt-2 h-1 w-10 rounded-full bg-gray-300"></div>'
        : '';
@endphp

<div
    x-data="{ open: false }"
    x-on:nb-sheet-open.window="if ($event.detail?.id === '{{ $id }}') open = true"
    x-on:nb-sheet-close.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    role="dialog"
    aria-modal="true"
    class="fixed inset-0 z-50 flex items-end"
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

    <div
        x-show="open"
        x-transition:enter="transition transform duration-400"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition transform duration-400"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full"
        class="relative w-full {{ $sheet }}"
        style="padding-bottom: env(safe-area-inset-bottom);"
    >
        {!! $handle !!}

        @if($title)
            <div class="{{ $titleClass }}">{{ $title }}</div>
        @endif

        <div class="{{ $bodyClass }}">{{ $slot }}</div>
    </div>
</div>
