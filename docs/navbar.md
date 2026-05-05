# Navbar

Tag: `<x-nb-mobile::navbar>`

Sticky top bar with optional left/right slots and centered title.

## Usage

```blade
<x-nb-mobile::navbar title="Profile">
    <x-slot name="left">
        <button onclick="nb.open('drawer','main-menu')">
            <svg ...>menu</svg>
        </button>
    </x-slot>

    <x-slot name="right">
        <button>Edit</button>
    </x-slot>
</x-nb-mobile::navbar>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `title` | `null` | Page title text |
| `theme` | auto | Force `ios` or `material` |

## Slots

- `left` — typically a back button or hamburger
- `right` — typically actions like Edit, Save, More
- Default — used as title fallback if `title` not set

## Theme

- iOS: h-11, title centered absolutely, hairline border
- Material: h-16, title left aligned, shadow-sm

## Safe area

The navbar handles `env(safe-area-inset-top)` automatically (the shell of NativeBlade also absorbs it for iframe contexts).
