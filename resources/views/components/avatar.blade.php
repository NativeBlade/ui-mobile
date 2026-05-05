@php
    $size = $size ?? 'md';
    $name = $name ?? null;
    $src = $src ?? null;
    $color = $color ?? 'blue-500';
    $textColor = $textColor ?? 'white';
    $shape = $shape ?? 'circle';
    $badge = $badge ?? null;
    $badgeColor = $badgeColor ?? 'red-500';

    $sizeMap = [
        'xs' => ['box' => 'w-6 h-6',  'text' => 'text-[10px]', 'badge' => 'w-2 h-2'],
        'sm' => ['box' => 'w-8 h-8',  'text' => 'text-xs',     'badge' => 'w-2.5 h-2.5'],
        'md' => ['box' => 'w-10 h-10','text' => 'text-sm',     'badge' => 'w-3 h-3'],
        'lg' => ['box' => 'w-14 h-14','text' => 'text-base',   'badge' => 'w-3.5 h-3.5'],
        'xl' => ['box' => 'w-20 h-20','text' => 'text-2xl',    'badge' => 'w-4 h-4'],
        '2xl'=> ['box' => 'w-24 h-24','text' => 'text-3xl',    'badge' => 'w-4 h-4'],
    ];
    $sizing = $sizeMap[$size] ?? $sizeMap['md'];

    $rounded = $shape === 'square' ? 'rounded-xl' : 'rounded-full';

    $initials = '';
    if (!$src && $name) {
        $words = preg_split('/\s+/', trim($name));
        $initials = mb_strtoupper(mb_substr($words[0] ?? '', 0, 1));
        if (count($words) > 1) {
            $initials .= mb_strtoupper(mb_substr(end($words), 0, 1));
        }
    }
@endphp

<span class="relative inline-block shrink-0">
    @if($src)
        <img
            src="{{ $src }}"
            alt="{{ $name ?? 'Avatar' }}"
            {{ $attributes->class("{$sizing['box']} {$rounded} object-cover") }}
        />
    @else
        <span
            {{ $attributes->class("{$sizing['box']} {$rounded} bg-{$color} text-{$textColor} {$sizing['text']} font-semibold flex items-center justify-center select-none") }}
        >
            {{ $initials ?: ($slot->isEmpty() ? '?' : $slot) }}
        </span>
    @endif

    @if($badge !== null)
        <span class="absolute -top-0.5 -right-0.5 {{ $sizing['badge'] }} bg-{{ $badgeColor }} rounded-full ring-2 ring-white"></span>
    @endif
</span>
