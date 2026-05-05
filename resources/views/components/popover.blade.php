@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $id = $id ?? 'nb-popover';

    $box = $theme === 'ios'
        ? 'bg-white rounded-2xl shadow-xl'
        : 'bg-white rounded-lg shadow-lg';
@endphp

<div
    x-data="{
        open: false,
        x: 0,
        y: 0,
        showAt(rect) {
            this.x = rect.left + (rect.width / 2);
            this.y = rect.bottom + 8;
            this.open = true;
            this.$nextTick(() => {
                const popover = this.$refs.popover;
                if (!popover) return;
                const r = popover.getBoundingClientRect();
                if (this.x + r.width / 2 > window.innerWidth - 8) {
                    this.x = window.innerWidth - r.width / 2 - 8;
                }
                if (this.x - r.width / 2 < 8) {
                    this.x = r.width / 2 + 8;
                }
                if (this.y + r.height > window.innerHeight - 8) {
                    this.y = rect.top - r.height - 8;
                }
            });
        }
    }"
    x-on:nb-popover-open.window="if ($event.detail?.id === '{{ $id }}') showAt($event.detail.rect)"
    x-on:nb-popover-close.window="if (!$event.detail?.id || $event.detail?.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    class="fixed inset-0 z-50"
    x-show="open"
    style="display: none;"
    {{ $attributes }}
>
    <div
        class="absolute inset-0"
        x-on:click="open = false"
    ></div>

    <div
        x-ref="popover"
        x-show="open"
        x-transition:enter="transition duration-150 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition duration-100 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        :style="`left: ${x}px; top: ${y}px; transform: translateX(-50%)`"
        class="fixed min-w-[180px] {{ $box }} overflow-hidden"
    >
        {{ $slot }}
    </div>
</div>
