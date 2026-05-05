# Segmented Control

Tags: `<x-nb-mobile::segmented>` + `<x-nb-mobile::segmented-item>`

iOS-style segmented control / Material tab switcher.

## Usage

```blade
<x-nb-mobile::segmented>
    <x-nb-mobile::segmented-item :active="$tab === 'all'" wire:click="$set('tab','all')">All</x-nb-mobile::segmented-item>
    <x-nb-mobile::segmented-item :active="$tab === 'starred'" wire:click="$set('tab','starred')">Starred</x-nb-mobile::segmented-item>
    <x-nb-mobile::segmented-item :active="$tab === 'archived'" wire:click="$set('tab','archived')">Archived</x-nb-mobile::segmented-item>
</x-nb-mobile::segmented>
```

## Container props

| Prop | Default | Description |
|---|---|---|
| `rounded` | `false` | Pill shape (default is `rounded` on iOS, `rounded-lg` on Material) |

## Item props

| Prop | Default | Description |
|---|---|---|
| `active` | `false` | Selected state |
| `rounded` | `false` | Match container |

Active item gets white background + shadow + bold weight; inactive items are transparent with gray text.
