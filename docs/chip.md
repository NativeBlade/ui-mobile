# Chip

Tag: `<x-nb-mobile::chip>`

Pill / tag for filters, categories, labels.

## Usage

```blade
<x-nb-mobile::chip>Default</x-nb-mobile::chip>
<x-nb-mobile::chip variant="outline">Outline</x-nb-mobile::chip>
<x-nb-mobile::chip color="green-500">Active</x-nb-mobile::chip>
<x-nb-mobile::chip color="red-500" deletable>Removable</x-nb-mobile::chip>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `variant` | `fill` | `fill`, `outline` |
| `color` | theme primary | |
| `textColor` | `white` | |
| `deletable` | `false` | Adds an X button on the right |

When `deletable`, the chip dispatches a `chip-delete` event on click; you handle it via `x-on:chip-delete` to remove.

## Theme

- iOS: `rounded-full h-7`
- Material: `rounded-lg h-8 font-medium`
