# Menu Item

Tag: `<x-nb-mobile::menu-item>`

Navigation drawer item with icon, label, optional badge text on the right. Distinct from `list-item` because it's styled for the drawer / nav context (rounded pill on Material, indent on iOS).

## Usage

```blade
<x-nb-mobile::menu-item active href="/">
    <x-slot name="icon"><svg ...>home</svg></x-slot>
    Home
</x-nb-mobile::menu-item>

<x-nb-mobile::menu-item href="/inbox" after="34">
    <x-slot name="icon"><svg ...>inbox</svg></x-slot>
    Inbox
</x-nb-mobile::menu-item>

<x-nb-mobile::menu-item wire:click="signOut">
    Sign out
</x-nb-mobile::menu-item>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `active` | `false` | Highlighted (current page) |
| `href` | `null` | Link target. Without it, renders as `<button>` |
| `icon` | `null` | Slot for SVG icon |
| `after` | `null` | Right-aligned text (count, badge, etc.) |
| `color` | theme primary | Active color |

## Theme

- iOS: clean row, `bg-primary/10 text-primary` when active
- Material 3: `rounded-full` pill with horizontal margin, `bg-primary/15` when active (signature M3 navigation drawer)
