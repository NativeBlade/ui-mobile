@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $active = (bool)($active ?? false);
    $rounded = (bool)($rounded ?? false);

    $base = 'flex-1 inline-flex items-center justify-center px-3 h-8 text-sm select-none cursor-pointer transition-all';

    $shape = $rounded ? 'rounded-full' : ($theme === 'ios' ? 'rounded-sm' : 'rounded-md');

    $activeClass = $active
        ? 'bg-white shadow text-gray-900 font-medium'
        : 'bg-transparent text-gray-600';
@endphp

<button type="button" {{ $attributes->class("{$base} {$shape} {$activeClass}") }}>
    {{ $slot }}
</button>
