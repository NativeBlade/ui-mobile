# Drawer

Tag: `<x-nb-mobile::drawer>`

Sliding side panel (left or right) with backdrop. Best paired with `<x-nb-mobile::menu-item>` for navigation lists.

## Usage

```blade
<x-nb-mobile::drawer id="main-menu" title="MyApp">
    <nav class="flex flex-col gap-1 mt-2">
        <x-nb-mobile::menu-item active>
            <x-slot name="icon"><svg ...></svg></x-slot>
            Home
        </x-nb-mobile::menu-item>
        <x-nb-mobile::menu-item href="/settings">Settings</x-nb-mobile::menu-item>
    </nav>

    <div class="mt-auto px-4 pb-4 pt-2">
        <x-nb-mobile::button variant="clear" block onclick="nb.close('drawer','main-menu')">
            Close menu
        </x-nb-mobile::button>
    </div>
</x-nb-mobile::drawer>

{{-- Trigger from anywhere --}}
<button onclick="nb.open('drawer','main-menu')">Menu</button>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-drawer` | Unique id, used by `nb.open()` / `nb.close()` |
| `side` | `left` | `left` or `right` |
| `width` | `w-72` | Tailwind width class |
| `title` | `null` | Heading shown at top |

## Events

- Open: `window.dispatchEvent(new CustomEvent('nb-drawer-open', {detail:{id:'main-menu'}}))`. Or simply: `nb.open('drawer','main-menu')`.
- Close: `nb.close('drawer','main-menu')`

Pressing Escape or clicking the backdrop also closes.

## Theme

- iOS: white surface, border-b under title, hairline shadow on edge, large title style
- Material: tinted gray-50 surface, no border under title, stronger shadow
