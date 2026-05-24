@php
    $title = $title ?? null;
    $description = $description ?? null;
    $size = $size ?? 'md';

    $padding = match ($size) {
        'sm' => 'py-8 px-6',
        'lg' => 'py-20 px-8',
        default => 'py-12 px-6',
    };

    $iconSize = match ($size) {
        'sm' => 'w-12 h-12',
        'lg' => 'w-24 h-24',
        default => 'w-16 h-16',
    };

    $titleSize = match ($size) {
        'sm' => 'text-base',
        'lg' => 'text-2xl',
        default => 'text-lg',
    };
@endphp

<div {{ $attributes->class("flex flex-col items-center justify-center text-center {$padding}") }}>
    @isset($icon)
        <div class="{{ $iconSize }} text-gray-400 mb-3 flex items-center justify-center">
            {{ $icon }}
        </div>
    @endisset

    @if($title)
        {{-- No explicit text-* class so the heading inherits the parent's
             text colour. Light-themed parents (body text-gray-900) get dark
             titles; dark-themed parents (e.g. text-[#e6edf3]) get light
             titles. Override by passing a class on the component if needed. --}}
        <h3 class="{{ $titleSize }} font-semibold mb-1">{{ $title }}</h3>
    @endif

    @if($description)
        <p class="text-sm opacity-60 max-w-xs">{{ $description }}</p>
    @endif

    @isset($action)
        <div class="mt-5">{{ $action }}</div>
    @endisset

    {{ $slot }}
</div>
