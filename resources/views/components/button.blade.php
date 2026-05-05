@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $variant = $variant ?? 'fill';
    $size = $size ?? 'medium';
    $color = $color ?? Theme::color('primary', $theme);
    $textColor = $textColor ?? Theme::color('primary_text', $theme);
    $type = $type ?? 'button';
    $block = (bool)($block ?? false);
    $disabled = (bool)($disabled ?? false);
    $rounded = (bool)($rounded ?? false);
    $ripple = isset($ripple) ? (bool)$ripple : ($theme !== 'ios');

    $base = 'relative overflow-hidden inline-flex justify-center items-center text-center appearance-none cursor-pointer select-none focus:outline-none font-medium will-change-transform';

    if ($theme === 'ios') {
        $duration = 'duration-100';
        $padding = match ($size) {
            'small'  => 'h-7 px-2 text-sm',
            'large'  => 'h-12 px-2 text-[17px] font-semibold',
            default  => 'h-9 px-2 text-[15px]',
        };
        $shape = $rounded ? 'rounded-full' : 'rounded-lg';
        // iOS: dim + scale-down for noticeable press feedback.
        $pressFeedback = 'transition-transform active:scale-[0.97]';
        $variantClass = match ($variant) {
            'clear'   => "bg-transparent text-{$color} active:bg-{$color}/10",
            'outline' => "bg-transparent text-{$color} border-2 border-{$color} active:bg-{$color}/10",
            'tonal'   => "bg-{$color}/15 text-{$color} active:bg-{$color}/25",
            default   => "bg-{$color} text-{$textColor} active:opacity-70",
        };
    } else {
        $duration = 'duration-200';
        $padding = match ($size) {
            'small'  => 'h-8 px-4 text-sm',
            'large'  => 'h-12 px-4 text-base',
            default  => 'h-10 px-4 text-sm',
        };
        $shape = $rounded ? 'rounded-full' : 'rounded-lg';
        $pressFeedback = 'transition-shadow';
        $variantClass = match ($variant) {
            'clear'   => "bg-transparent text-{$color}",
            'outline' => "bg-transparent text-{$color} border border-{$color}",
            'tonal'   => "bg-{$color}/15 text-{$color}",
            default   => "bg-{$color} text-{$textColor} shadow active:shadow-lg",
        };
    }

    $widthClass = $block ? 'w-full flex' : 'inline-flex';
    $disabledClass = $disabled ? 'opacity-50 pointer-events-none' : '';

    $classes = trim("{$base} {$duration} {$shape} {$padding} {$variantClass} {$pressFeedback} {$widthClass} {$disabledClass}");
@endphp

@once
    <style>
        .nb-ripple {
            position: absolute;
            border-radius: 9999px;
            background-color: currentColor;
            opacity: 0.25;
            pointer-events: none;
            transform: scale(0);
            animation: nb-ripple-anim 550ms ease-out forwards;
        }
        @keyframes nb-ripple-anim {
            to { transform: scale(1); opacity: 0; }
        }
    </style>
    <script>
        window.nbRipple = window.nbRipple || function (e) {
            const btn = e.currentTarget;
            if (!btn || btn.disabled) return;
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height) * 2.2;
            const span = document.createElement('span');
            span.className = 'nb-ripple';
            span.style.width = size + 'px';
            span.style.height = size + 'px';
            const x = (e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || rect.left + rect.width / 2) - rect.left - size / 2;
            const y = (e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || rect.top + rect.height / 2) - rect.top - size / 2;
            span.style.left = x + 'px';
            span.style.top = y + 'px';
            btn.appendChild(span);
            setTimeout(() => span.remove(), 600);
        };
    </script>
@endonce

<button
    type="{{ $type }}"
    @if($disabled) disabled @endif
    @if($ripple) onpointerdown="nbRipple(event)" @endif
    {{ $attributes->class($classes) }}
>
    {{ $slot }}
</button>
