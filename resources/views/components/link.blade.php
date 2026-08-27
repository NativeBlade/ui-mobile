@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $href = $href ?? '#';
    $color = $color ?? Theme::color('primary', $theme);

    $base = $theme === 'ios'
        ? "inline text-{$color} active:opacity-60"
        : "inline text-{$color} hover:underline active:opacity-60";

    $external = $href !== '' && $href !== '#'
        && preg_match('#^(?:https?:)?//|^(?:mailto|tel):#i', $href);
    $internal = $href !== '' && $href !== '#' && ! $external;
@endphp

@if($external)
    <a wire:nb-bridge="open_url" wire:nb-payload="{{ json_encode(['url' => $href]) }}" {{ $attributes->class($base) }}>
        {{ $slot }}
    </a>
@elseif($internal)
    <a wire:nb-navigate="{{ $href }}" {{ $attributes->class($base) }}>
        {{ $slot }}
    </a>
@else
    <span {{ $attributes->class($base) }}>
        {{ $slot }}
    </span>
@endif
