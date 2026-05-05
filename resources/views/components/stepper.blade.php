@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $variant = $variant ?? 'fill';
    $size = $size ?? 'medium';
    $rounded = (bool)($rounded ?? false);
    $value = (int)($value ?? 0);
    $min = $min ?? null;
    $max = $max ?? null;
    $step = (int)($step ?? 1);
    $color = $color ?? Theme::color('primary', $theme);
    $textColor = $textColor ?? Theme::color('primary_text', $theme);

    $h = match ($size) {
        'small' => $theme === 'ios' ? 'h-7' : 'h-8',
        'large' => 'h-12',
        default => $theme === 'ios' ? 'h-9' : 'h-10',
    };

    $shape = $rounded ? 'rounded-full' : ($theme === 'ios' ? 'rounded' : 'rounded-lg');
    $btnLeft = $rounded ? 'rounded-s-full' : ($theme === 'ios' ? 'rounded-s' : 'rounded-s-lg');
    $btnRight = $rounded ? 'rounded-e-full' : ($theme === 'ios' ? 'rounded-e' : 'rounded-e-lg');

    if ($variant === 'fill') {
        $btn = "bg-{$color} text-{$textColor} active:opacity-70";
        $val = "border-t-2 border-b-2 border-{$color} text-gray-900";
    } elseif ($variant === 'outline') {
        $btn = "bg-transparent text-{$color} border-2 border-{$color}";
        $val = "border-t-2 border-b-2 border-{$color} text-gray-900";
    } else {
        $btn = "bg-transparent text-{$color}";
        $val = "border-l border-r border-gray-200 text-gray-900";
    }
@endphp

<div
    x-data="{
        value: {{ $value }},
        @if($min !== null) min: {{ $min }}, @endif
        @if($max !== null) max: {{ $max }}, @endif
        step: {{ $step }},
        dec() { let n = this.value - this.step; @if($min !== null) if (n < this.min) return; @endif this.value = n; },
        inc() { let n = this.value + this.step; @if($max !== null) if (n > this.max) return; @endif this.value = n; }
    }"
    {{ $attributes->class("inline-flex items-stretch shadow {$shape} {$h}") }}
>
    <button type="button" class="w-10 flex items-center justify-center cursor-pointer select-none {{ $btn }} {{ $btnLeft }}" x-on:click="dec">
        <span class="block w-3 h-0.5 bg-current"></span>
    </button>

    <div class="w-12 flex items-center justify-center font-medium {{ $val }}">
        <span x-text="value"></span>
    </div>

    <button type="button" class="w-10 flex items-center justify-center cursor-pointer select-none {{ $btn }} {{ $btnRight }} relative" x-on:click="inc">
        <span class="block w-3 h-0.5 bg-current"></span>
        <span class="block w-0.5 h-3 bg-current absolute"></span>
    </button>
</div>
