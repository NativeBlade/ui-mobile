@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $size = $size ?? 'md';
    $color = $color ?? Theme::color('primary', $theme);

    $sizing = match ($size) {
        'sm' => 'w-5 h-5',
        'lg' => 'w-12 h-12',
        default => 'w-8 h-8',
    };
@endphp

@if($theme === 'ios')
    {{-- iOS preloader: 12 spokes --}}
    <span {{ $attributes->class("inline-block {$sizing} text-{$color}") }} role="status" aria-label="Loading">
        <svg class="w-full h-full animate-spin" viewBox="0 0 120 120" fill="currentColor">
            @for($i = 0; $i < 12; $i++)
                <rect
                    x="56" y="10" rx="3" ry="3" width="8" height="22"
                    transform="rotate({{ $i * 30 }} 60 60)"
                    style="opacity: {{ round(0.1 + ($i / 12) * 0.9, 2) }}"
                ></rect>
            @endfor
        </svg>
    </span>
@else
    {{-- Material preloader: animated stroke --}}
    <span {{ $attributes->class("inline-block {$sizing} text-{$color}") }} role="status" aria-label="Loading">
        <svg class="w-full h-full animate-spin" viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-opacity="0.25"></circle>
            <path d="M12 2a10 10 0 0 1 10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
        </svg>
    </span>
@endif
