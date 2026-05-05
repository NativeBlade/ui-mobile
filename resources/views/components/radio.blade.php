@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $name = $name ?? null;
    $value = $value ?? '';
    $checked = (bool)($checked ?? false);
    $disabled = (bool)($disabled ?? false);
    $color = Theme::color('primary', $theme);

    $box = $theme === 'ios'
        ? 'w-6 h-6 rounded-full border-2 flex items-center justify-center transition-colors'
        : 'w-5 h-5 rounded-full border-2 flex items-center justify-center transition-colors';

    $disabledClass = $disabled ? 'opacity-50 pointer-events-none' : '';
@endphp

<label
    x-data="{ checked: {{ $checked ? 'true' : 'false' }} }"
    x-on:change.window="if ($event.target.matches('input[type=radio][name=&quot;{{ $name }}&quot;]')) checked = $refs.input.checked"
    {{ $attributes->class(['cursor-pointer inline-flex items-center align-middle', $disabledClass]) }}
>
    <input
        type="radio"
        x-ref="input"
        @if($name) name="{{ $name }}" @endif
        value="{{ $value }}"
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        class="sr-only"
    />

    <span
        class="{{ $box }}"
        x-bind:class="checked ? 'border-{{ $color }}' : 'border-gray-400'"
    >
        <span
            class="w-2.5 h-2.5 rounded-full bg-{{ $color }} transition-opacity duration-150"
            x-bind:class="checked ? 'opacity-100' : 'opacity-0'"
        ></span>
    </span>

    @if(trim($slot))
        <span class="ml-3 text-sm text-gray-900">{{ $slot }}</span>
    @endif
</label>
