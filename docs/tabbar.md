# Tabbar

Tags: `<x-nb-mobile::tabbar>` + `<x-nb-mobile::tabbar-item>`

Bottom navigation bar with multiple items.

## Usage

```blade
<x-nb-mobile::tabbar>
    <x-nb-mobile::tabbar-item :active="$tab === 'home'" wire:click="$set('tab','home')" label="Home">
        <x-slot name="icon">
            <svg ...>home</svg>
        </x-slot>
    </x-nb-mobile::tabbar-item>

    <x-nb-mobile::tabbar-item :active="$tab === 'search'" wire:click="$set('tab','search')" label="Search">
        <x-slot name="icon"><svg ...>search</svg></x-slot>
    </x-nb-mobile::tabbar-item>
</x-nb-mobile::tabbar>
```

## Tabbar-item props

| Prop | Default | Description |
|---|---|---|
| `active` | `false` | Highlighted state |
| `label` | `null` | Text below icon |
| `icon` | `null` | Slot for SVG icon |
| `href` | `null` | Optional link instead of button |
| `color` | theme primary | Color when active |

## Theme

- iOS: text color change on active, h-12, w-7 h-7 icons
- Material 3: pill background `bg-{color}` behind icon when active (the M3 navigation rail signature look), h-20, w-16 h-8 icon container

## Safe area

The tabbar pads itself with `env(safe-area-inset-bottom)` to stay above the iPhone home indicator.
