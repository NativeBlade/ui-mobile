@php
    $threshold = (int)($threshold ?? 60);
    $onRefresh = $onRefresh ?? null;
@endphp

<div {{ $attributes->class('relative overflow-y-auto') }}
    x-data="{
        startY: 0,
        currentY: 0,
        pulling: false,
        refreshing: false,
        threshold: {{ $threshold }},
        get progress() {
            if (this.refreshing) return 1;
            if (!this.pulling) return 0;
            const dy = this.currentY - this.startY;
            if (dy <= 0) return 0;
            return Math.min((dy * 0.35) / this.threshold, 1);
        },
        get triggered() { return this.progress >= 1; },
        start(e) {
            if (this.refreshing) return;
            if (this.$el.scrollTop > 0) return;
            this.startY = e.touches[0].clientY;
            this.currentY = this.startY;
            this.pulling = true;
        },
        move(e) {
            if (!this.pulling) return;
            this.currentY = e.touches[0].clientY;
        },
        async end() {
            const triggered = this.triggered;
            this.pulling = false;
            this.startY = 0;
            this.currentY = 0;
            if (triggered && !this.refreshing) {
                this.refreshing = true;
                try {
                    @if($onRefresh) await $wire.{{ $onRefresh }}(); @endif
                } finally {
                    this.refreshing = false;
                }
            }
        }
    }"
    @touchstart.passive="start($event)"
    @touchmove.passive="move($event)"
    @touchend="end()"
    @touchcancel="end()">
    {{-- Floating spinner: fixed position relative to viewport --}}
    <div
        class="fixed left-1/2 -translate-x-1/2 pointer-events-none z-30"
        :style="`top: ${-44 + progress * 60}px; opacity: ${progress}; transition: ${pulling || refreshing ? 'none' : 'top 250ms ease, opacity 250ms ease'};`"
    >
        <div class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-600">
            <svg
                class="w-5 h-5"
                :class="(refreshing || triggered) ? 'animate-spin' : ''"
                viewBox="0 0 24 24"
                fill="none"
            >
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.5" stroke-opacity="0.25"></circle>
                <path d="M12 3a9 9 0 0 1 9 9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"></path>
            </svg>
        </div>
    </div>

    {{ $slot }}
</div>
