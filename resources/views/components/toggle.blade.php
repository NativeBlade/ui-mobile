@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $name = $name ?? null;
    $checked = (bool)($checked ?? false);
    $disabled = (bool)($disabled ?? false);
    $color = Theme::color('primary', $theme);

    $colorMap = [
        'blue-500' => '#3b82f6', 'blue-600' => '#2563eb',
        'indigo-500' => '#6366f1', 'indigo-600' => '#4f46e5',
        'red-500' => '#ef4444', 'red-600' => '#dc2626',
        'green-500' => '#22c55e', 'green-600' => '#16a34a',
        'emerald-500' => '#10b981', 'emerald-600' => '#059669',
        'amber-500' => '#f59e0b', 'amber-600' => '#d97706',
        'purple-500' => '#a855f7', 'purple-600' => '#9333ea',
        'pink-500' => '#ec4899', 'pink-600' => '#db2777',
        'cyan-500' => '#06b6d4', 'cyan-600' => '#0891b2',
        'sky-500' => '#0ea5e9', 'sky-600' => '#0284c7',
        'teal-500' => '#14b8a6', 'teal-600' => '#0d9488',
        'orange-500' => '#f97316', 'orange-600' => '#ea580c',
    ];
    $primary = $colorMap[$color] ?? '#3b82f6';

    if ($theme === 'ios') {
        $wrapperClass = 'relative inline-block w-[51px] h-[31px] align-middle';
        $thumbBaseStyle = 'position:absolute;top:2px;left:2px;width:27px;height:27px;border-radius:9999px;background:#fff;box-shadow:0 2px 4px rgba(0,0,0,.15);transition:transform .25s ease;';
    } else {
        $wrapperClass = 'relative inline-block w-9 h-5 align-middle';
        $thumbBaseStyle = 'position:absolute;top:-2px;left:0;width:24px;height:24px;border-radius:9999px;box-shadow:0 1px 3px rgba(0,0,0,.2);border:1px solid #e5e7eb;background:#fff;transition:transform .25s ease, background .25s ease, border-color .25s ease;';
    }

    $disabledClass = $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : 'cursor-pointer';
@endphp

<label
    x-data="{ checked: {{ $checked ? 'true' : 'false' }} }"
    {{ $attributes->class([$wrapperClass, $disabledClass]) }}
>
    <input
        type="checkbox"
        @if($name) name="{{ $name }}" @endif
        x-model="checked"
        @if($disabled) disabled @endif
        class="sr-only"
    />

    {{-- Track --}}
    <span
        class="absolute inset-0 rounded-full"
        style="transition: background-color .25s ease;"
        :style="{ backgroundColor: checked ? '{{ $primary }}' : '#d1d5db' }"
    ></span>

    {{-- Thumb. Using object-syntax :style merges with inline `style` attribute,
         instead of replacing it like string-syntax does. --}}
    @if($theme === 'ios')
        <span
            style="{{ $thumbBaseStyle }}"
            :style="{ transform: checked ? 'translateX(20px)' : 'translateX(0)' }"
        ></span>
    @else
        <span
            style="{{ $thumbBaseStyle }}"
            :style="{
                transform: checked ? 'translateX(16px)' : 'translateX(0)'
            }"
        ></span>
    @endif
</label>
