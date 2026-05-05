# Tabs

Tags: `<x-nb-mobile::tabs>` + `<x-nb-mobile::tab>`

Content tabs (Account / Billing / Notifications inside a Settings page). Different from `tabbar` which is bottom navigation between top-level routes.

## Usage

```blade
<x-nb-mobile::tabs>
    <x-nb-mobile::tab :active="$tab === 'account'" wire:click="$set('tab','account')">Account</x-nb-mobile::tab>
    <x-nb-mobile::tab :active="$tab === 'billing'" wire:click="$set('tab','billing')">Billing</x-nb-mobile::tab>
    <x-nb-mobile::tab :active="$tab === 'team'" wire:click="$set('tab','team')">Team</x-nb-mobile::tab>
</x-nb-mobile::tabs>

@if($tab === 'account')
    <x-nb-mobile::list inset>...</x-nb-mobile::list>
@elseif($tab === 'billing')
    ...
@endif
```

## Variants

```blade
{{-- Underline (default) --}}
<x-nb-mobile::tabs variant="underline">
    <x-nb-mobile::tab :active="true" variant="underline">All</x-nb-mobile::tab>
    ...
</x-nb-mobile::tabs>

{{-- Pill (rounded full background) --}}
<x-nb-mobile::tabs variant="pill">
    <x-nb-mobile::tab :active="true" variant="pill">All</x-nb-mobile::tab>
    ...
</x-nb-mobile::tabs>

{{-- Segmented (iOS Settings style) --}}
<x-nb-mobile::tabs variant="segmented">
    <x-nb-mobile::tab :active="true" variant="segmented">Daily</x-nb-mobile::tab>
    <x-nb-mobile::tab variant="segmented">Weekly</x-nb-mobile::tab>
</x-nb-mobile::tabs>
```

## Props

### tabs container

| Prop | Default | Description |
|---|---|---|
| `variant` | `underline` | `underline`, `pill`, `segmented` |

### tab item

| Prop | Default | Description |
|---|---|---|
| `active` | `false` | Highlighted state |
| `variant` | `underline` | Match the parent's variant |

Pass the same `variant` to both tabs and each tab so the styling lines up.
