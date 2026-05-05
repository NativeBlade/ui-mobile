# Card

Tag: `<x-nb-mobile::card>`

Rounded container with shadow for grouped content.

## Usage

```blade
<x-nb-mobile::card title="Profile">
    Body content here. Plain text or any markup.
</x-nb-mobile::card>

<x-nb-mobile::card title="Order" footer="Updated 2 min ago">
    3 items, $42.30
</x-nb-mobile::card>

<x-nb-mobile::card :raised="false">No shadow card</x-nb-mobile::card>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `title` | `null` | Header text |
| `footer` | `null` | Footer text (smaller, gray) |
| `raised` | `true` | Adds `shadow` |

## Theme

- iOS: `rounded-3xl`
- Material: `rounded-2xl`
