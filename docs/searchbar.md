# Searchbar

Tag: `<x-nb-mobile::searchbar>`

Search input with magnifying-glass icon, sized for iOS or Material.

## Usage

```blade
<x-nb-mobile::searchbar
    placeholder="Search components"
    wire:model.live.debounce.300ms="query"
/>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `placeholder` | `Search` | |
| `name` | `null` | |
| `value` | `''` | |

Supports `wire:model` for Livewire two-way binding.
