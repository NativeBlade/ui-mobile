# Empty State

Tag: `<x-nb-mobile::empty-state>`

The "nothing here yet" / "no results" / "list is empty" placeholder. Centered icon, title, description, and optional action button.

## Usage

```blade
<x-nb-mobile::empty-state title="No messages" description="When you have new messages they will appear here.">
    <x-slot name="icon">
        <x-nativeblade-icon name="envelope" size="48" />
    </x-slot>

    <x-slot name="action">
        <x-nb-mobile::button>Refresh</x-nb-mobile::button>
    </x-slot>
</x-nb-mobile::empty-state>

{{-- Minimal --}}
<x-nb-mobile::empty-state title="No results" />

{{-- Larger size for full-screen states --}}
<x-nb-mobile::empty-state size="lg" title="Inbox zero" description="You're all caught up.">
    <x-slot name="icon">
        <x-nativeblade-icon name="check-circle-fill" size="64" />
    </x-slot>
</x-nb-mobile::empty-state>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `title` | `null` | Bigger heading text. |
| `description` | `null` | Smaller gray supporting text. |
| `size` | `md` | `sm`, `md`, `lg`. Affects icon size + padding. |

## Slots

- `icon` — any SVG / icon component
- `action` — typically a button
- Default slot — extra content below the action
