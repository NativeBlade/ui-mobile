@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $name = $name ?? null;
    $value = (int)($value ?? 50);
    $min = (int)($min ?? 0);
    $max = (int)($max ?? 100);
    $step = (int)($step ?? 1);
    $color = Theme::color('primary', $theme);
@endphp

<div class="block w-full px-2">
    <input
        type="range"
        @if($name) name="{{ $name }}" @endif
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        value="{{ $value }}"
        {{ $attributes->class("w-full nb-range nb-range-{$theme}") }}
        style="--nb-range-color: var(--color-{{ $color }}, currentColor);"
    />
</div>

@once
<style>
    .nb-range {
        -webkit-appearance: none;
        appearance: none;
        background: transparent;
        cursor: pointer;
        height: 28px;
    }

    .nb-range::-webkit-slider-runnable-track {
        height: 4px;
        background: rgba(0,0,0,0.12);
        border-radius: 999px;
    }
    .nb-range::-moz-range-track {
        height: 4px;
        background: rgba(0,0,0,0.12);
        border-radius: 999px;
    }

    .nb-range-ios::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 3px 8px rgba(0,0,0,0.12);
        margin-top: -12px;
    }
    .nb-range-ios::-moz-range-thumb {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: white;
        border: none;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 3px 8px rgba(0,0,0,0.12);
    }

    .nb-range-material::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--nb-range-color, #4f46e5);
        margin-top: -8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }
    .nb-range-material::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--nb-range-color, #4f46e5);
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }
</style>
@endonce
