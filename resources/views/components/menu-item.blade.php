@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $href = $href ?? null;
    $active = (bool)($active ?? false);
    $icon = $icon ?? null;
    $after = $after ?? null;
    $color = Theme::color('primary', $theme);

    if ($theme === 'ios') {
        // iOS uses a clean row with no rounded corners by default
        $base = 'flex items-center gap-3 px-5 py-3 select-none cursor-pointer transition-colors';
        $active_class = $active ? "bg-{$color}/10 text-{$color}" : 'text-gray-900 active:bg-gray-100';
        $iconClass = $active ? "text-{$color}" : 'text-gray-500';
    } else {
        // Material 3: rounded-full pill, indents from sides
        $base = 'flex items-center gap-4 mx-3 px-4 py-3 rounded-full select-none cursor-pointer transition-colors';
        $active_class = $active
            ? "bg-{$color}/15 text-{$color} font-medium"
            : 'text-gray-700 active:bg-gray-200';
        $iconClass = $active ? "text-{$color}" : 'text-gray-600';
    }

    $tag = $href ? 'a' : 'button';
@endphp

@if($href)
    <a wire:nb-navigate="{{ $href }}" {{ $attributes->class("{$base} {$active_class}") }}>
@else
    <button type="button" {{ $attributes->class("{$base} {$active_class} w-full text-left") }}>
@endif

    @if($icon)
        <span class="w-6 h-6 shrink-0 {{ $iconClass }}">{{ $icon }}</span>
    @endif

    <span class="flex-1 text-sm">{{ $slot }}</span>

    @if($after !== null)
        <span class="shrink-0 text-xs text-gray-500">{{ $after }}</span>
    @endif

@if($href)
    </a>
@else
    </button>
@endif
