@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $placeholder = $placeholder ?? 'Search';
    $name = $name ?? null;
    $value = $value ?? '';
    $color = Theme::color('primary', $theme);

    if ($theme === 'ios') {
        $wrapper = 'px-4 py-2 bg-gray-100';
        $field = 'flex items-center bg-gray-200 rounded-lg px-2 h-9';
        $input = 'flex-1 bg-transparent text-sm text-gray-900 placeholder:text-gray-500 focus:outline-none px-2';
    } else {
        $wrapper = 'px-4 py-3 bg-white';
        $field = 'flex items-center bg-gray-100 rounded-full px-4 h-10';
        $input = 'flex-1 bg-transparent text-sm text-gray-900 placeholder:text-gray-500 focus:outline-none px-2';
    }
@endphp

<div {{ $attributes->class($wrapper) }}>
    <label class="{{ $field }}">
        <span class="text-gray-500 shrink-0">
            <x-nativeblade-icon name="magnifying-glass" size="16" />
        </span>

        <input
            type="search"
            @if($name) name="{{ $name }}" @endif
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            class="{{ $input }}"
        />
    </label>
</div>
