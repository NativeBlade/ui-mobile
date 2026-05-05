@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $id = $id ?? 'nb-popup';

    $rounded = $theme === 'ios' ? 'md:rounded-3xl' : 'md:rounded-2xl';
@endphp

<div
    x-data="{ open: false }"
    x-on:nb-popup-open.window="if ($event.detail?.id === '{{ $id }}') open = true"
    x-on:nb-popup-close.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    class="fixed inset-0 z-50"
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
        class="absolute inset-0 bg-white overflow-y-auto md:left-1/2 md:top-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:w-[28rem] md:h-[28rem] md:inset-auto {{ $rounded }}"
    >
        {{ $slot }}
    </div>
</div>
