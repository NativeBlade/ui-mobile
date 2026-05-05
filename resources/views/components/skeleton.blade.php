@php
    $variant = $variant ?? 'text';
    $width = $width ?? null;
    $height = $height ?? null;
    $count = (int)($count ?? 1);
    $animated = isset($animated) ? (bool)$animated : true;
    $rounded = $rounded ?? null;

    $base = 'bg-gray-200 ' . ($animated ? 'nb-skeleton-pulse' : '');

    $shape = match ($variant) {
        'circle' => $rounded ?? 'rounded-full',
        'image'  => $rounded ?? 'rounded-2xl',
        'rect'   => $rounded ?? 'rounded-lg',
        default  => $rounded ?? 'rounded',
    };

    $defaultSize = match ($variant) {
        'circle' => ['w' => '40px', 'h' => '40px'],
        'image'  => ['w' => '100%', 'h' => '160px'],
        'rect'   => ['w' => '100%', 'h' => '80px'],
        default  => ['w' => '100%', 'h' => '12px'],
    };

    $w = $width ?? $defaultSize['w'];
    $h = $height ?? $defaultSize['h'];
@endphp

@for($i = 0; $i < $count; $i++)
    <div
        {{ $attributes->class("{$base} {$shape}") }}
        style="width: {{ is_numeric($w) ? $w.'px' : $w }}; height: {{ is_numeric($h) ? $h.'px' : $h }};{{ $i < $count - 1 ? ' margin-bottom: 8px;' : '' }}"
    ></div>
@endfor

@once
<style>
.nb-skeleton-pulse {
    animation: nb-skeleton-pulse 1.5s ease-in-out infinite;
}
@keyframes nb-skeleton-pulse {
    0%, 100% { opacity: 1; }
    50%      { opacity: 0.5; }
}
</style>
@endonce
