# Floating Action Button (FAB)

Tag: `<x-nb-mobile::fab>`

Floating button anchored to a screen corner.

## Usage

```blade
<x-nb-mobile::fab label="New" position="bottom-right" wire:click="create">
    <x-slot name="icon">
        <svg ...>+</svg>
    </x-slot>
</x-nb-mobile::fab>

{{-- Icon only --}}
<x-nb-mobile::fab>
    <x-slot name="icon"><svg ...></svg></x-slot>
</x-nb-mobile::fab>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `label` | `null` | Text next to icon. Without it the FAB is icon-only. |
| `icon` | required | SVG slot |
| `position` | `bottom-right` | `bottom-right`, `bottom-left`, `top-right`, `top-left` |
| `color` | theme primary | |

The FAB respects safe-area insets automatically (1rem from edge plus inset).

## Theme

- iOS: pill h-11
- Material: rounded-2xl, square h-14 w-14 when icon-only
