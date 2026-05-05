@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $name = $name ?? null;
    $checked = (bool)($checked ?? false);
    $disabled = (bool)($disabled ?? false);
    $color = Theme::color('primary', $theme);

    if ($theme === 'ios') {
        $box = 'w-6 h-6 rounded-full border flex items-center justify-center transition-colors';
        $checkedBox = "bg-{$color} border-{$color}";
        $uncheckedBox = 'bg-white border-gray-300';
    } else {
        $box = 'w-5 h-5 rounded-sm border-2 flex items-center justify-center transition-colors';
        $checkedBox = "bg-{$color} border-{$color}";
        $uncheckedBox = 'bg-white border-gray-400';
    }

    $disabledClass = $disabled ? 'opacity-50 pointer-events-none' : '';
@endphp

<label
    x-data="{ checked: {{ $checked ? 'true' : 'false' }} }"
    {{ $attributes->class(['cursor-pointer inline-flex items-center align-middle', $disabledClass]) }}
>
    <input
        type="checkbox"
        @if($name) name="{{ $name }}" @endif
        x-model="checked"
        @if($disabled) disabled @endif
        class="sr-only"
    />

    <span
        class="{{ $box }}"
        x-bind:class="checked ? '{{ $checkedBox }}' : '{{ $uncheckedBox }}'"
    >
        <svg
            class="w-4 h-4 text-white transition-opacity duration-150"
            x-bind:class="checked ? 'opacity-100' : 'opacity-0'"
            fill="none" stroke="currentColor" stroke-width="3"
            viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round"
        >
            <path d="M5 13l4 4L19 7"/>
        </svg>
    </span>

    @if(trim($slot))
        <span class="ml-3 text-sm text-gray-900">{{ $slot }}</span>
    @endif
</label>
