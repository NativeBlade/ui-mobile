# Skeleton

Tag: `<x-nb-mobile::skeleton>`

Animated placeholder for loading states.

## Usage

```blade
{{-- Single line of text --}}
<x-nb-mobile::skeleton />

{{-- 4 lines of text (paragraph) --}}
<x-nb-mobile::skeleton count="4" />

{{-- Avatar circle --}}
<x-nb-mobile::skeleton variant="circle" width="40" height="40" />

{{-- Image placeholder --}}
<x-nb-mobile::skeleton variant="image" />

{{-- Custom rect --}}
<x-nb-mobile::skeleton variant="rect" height="120" />

{{-- Skeleton list item --}}
<div class="flex items-center gap-3 p-4">
    <x-nb-mobile::skeleton variant="circle" width="40" height="40" />
    <div class="flex-1 space-y-2">
        <x-nb-mobile::skeleton width="60%" />
        <x-nb-mobile::skeleton width="40%" />
    </div>
</div>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `variant` | `text` | `text`, `circle`, `image`, `rect` |
| `width` | auto | CSS value or number (px). E.g. `'80%'`, `120`. |
| `height` | auto | Same as width. |
| `count` | `1` | Render N stacked rows (text variant typical). |
| `animated` | `true` | Pulse animation. Set `false` for static. |
| `rounded` | auto | Override default rounded class. |
