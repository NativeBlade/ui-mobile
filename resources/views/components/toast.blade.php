@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $id = $id ?? 'nb-toast';
    $position = $position ?? 'bottom';
    $duration = (int)($duration ?? 3000);

    if ($theme === 'ios') {
        $box = 'mx-4 px-4 py-3 rounded-2xl bg-gray-900 text-white text-sm shadow-lg';
    } else {
        $box = 'mx-4 px-4 py-3 rounded-lg bg-gray-800 text-white text-sm shadow-lg';
    }

    $positionClass = match ($position) {
        'top'    => 'top-0',
        default  => 'bottom-0',
    };

    $enterFrom = $position === 'top' ? '-translate-y-4' : 'translate-y-4';
@endphp

<div
    x-data="{
        open: false,
        timer: null,
        show(message) {
            if (message) this.$refs.message.textContent = message;
            this.open = true;
            clearTimeout(this.timer);
            this.timer = setTimeout(() => this.open = false, {{ $duration }});
        }
    }"
    x-on:nb-toast-show.window="if ($event.detail?.id === '{{ $id }}') show($event.detail.message)"
    x-on:nb-toast-hide.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    @class([
        'fixed left-0 right-0 z-50 flex justify-center pointer-events-none',
        $positionClass,
    ])
    style="@if($position === 'top') padding-top: calc(env(safe-area-inset-top) + 0.75rem); @else padding-bottom: calc(env(safe-area-inset-bottom) + 0.75rem); @endif"
    {{ $attributes }}
>
    <div
        x-show="open"
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="opacity-0 {{ $enterFrom }}"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="{{ $box }} pointer-events-auto"
        style="display: none;"
    >
        <span x-ref="message">{{ $slot }}</span>
    </div>
</div>
