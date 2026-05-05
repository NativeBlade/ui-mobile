@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $label = $label ?? null;
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? '';
    $name = $name ?? null;
    $value = $value ?? '';
    $error = $error ?? null;
    $hint = $hint ?? null;
    $required = (bool)($required ?? false);
    $disabled = (bool)($disabled ?? false);
    $color = Theme::color('primary', $theme);

    if ($theme === 'ios') {
        $row = 'flex items-center gap-3 px-4 py-2.5 border-b border-gray-100 last:border-b-0 min-h-[44px]';
        $labelClass = 'text-base text-gray-900 shrink-0 min-w-[80px]';
        $field = 'flex-1 bg-transparent text-base text-gray-900 placeholder:text-gray-400 focus:outline-none text-right';
    } else {
        $row = 'flex flex-col gap-1 px-4 py-3 border-b border-gray-200/60 last:border-b-0';
        $labelClass = 'text-xs font-medium text-gray-600';
        $field = "block w-full bg-transparent border-b border-gray-300 px-1 py-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-{$color}";
    }
@endphp

<li role="listitem">
    <div {{ $attributes->class($row) }}>
        @if($label)
            <span class="{{ $labelClass }}">{{ $label }}@if($required) <span class="text-red-500">*</span>@endif</span>
        @endif

        <input
            type="{{ $type }}"
            @if($name) name="{{ $name }}" @endif
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            class="{{ $field }}"
        />

        @if($error)
            <span class="text-red-500 text-xs">{{ $error }}</span>
        @elseif($hint && $theme === 'material')
            <span class="text-xs text-gray-500">{{ $hint }}</span>
        @endif
    </div>
</li>
