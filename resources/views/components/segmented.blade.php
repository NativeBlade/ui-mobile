@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $rounded = (bool)($rounded ?? false);

    $shape = $rounded ? 'rounded-full' : ($theme === 'ios' ? 'rounded' : 'rounded-lg');

    $bg = $theme === 'ios' ? 'bg-gray-100' : 'bg-gray-100';
    $padding = 'p-0.5';
@endphp

<div {{ $attributes->class("inline-flex w-full {$bg} {$padding} {$shape} relative") }}>
    {{ $slot }}
</div>
