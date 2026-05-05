@php
    $text = $text ?? '';
    $position = $position ?? 'top';
@endphp

<span
    x-data="{
        open: false,
        coords: { left: 0, top: 0, transform: '' },
        timer: null,
        position: '{{ $position }}',
        show() {
            const triggerRect = this.$el.getBoundingClientRect();
            const cx = triggerRect.left + triggerRect.width / 2;
            const cy = triggerRect.top + triggerRect.height / 2;
            const gap = 8;
            switch (this.position) {
                case 'bottom':
                    this.coords = { left: cx, top: triggerRect.bottom + gap, transform: 'translateX(-50%)' };
                    break;
                case 'left':
                    this.coords = { left: triggerRect.left - gap, top: cy, transform: 'translate(-100%, -50%)' };
                    break;
                case 'right':
                    this.coords = { left: triggerRect.right + gap, top: cy, transform: 'translateY(-50%)' };
                    break;
                default:
                    this.coords = { left: cx, top: triggerRect.top - gap, transform: 'translate(-50%, -100%)' };
            }
            this.open = true;
        },
        hide() {
            this.open = false;
        },
        tap() {
            if (this.open) { this.hide(); return; }
            this.show();
            clearTimeout(this.timer);
            this.timer = setTimeout(() => this.hide(), 2000);
        },
        get isHover() {
            return window.matchMedia('(hover: hover)').matches;
        }
    }"
    @mouseenter="if (isHover) show()"
    @mouseleave="if (isHover) hide()"
    @click="if (!isHover) tap()"
    {{ $attributes->class('relative inline-flex') }}
>
    {{ $slot }}

    <template x-teleport="body">
        <span
            x-show="open"
            x-cloak
            x-transition.opacity.duration.150ms
            :style="`position: fixed; left: ${coords.left}px; top: ${coords.top}px; transform: ${coords.transform}; z-index: 9999;`"
            class="px-2 py-1 text-xs text-white bg-gray-900 rounded-md whitespace-nowrap pointer-events-none shadow-lg"
        >
            {{ $text }}
        </span>
    </template>
</span>
