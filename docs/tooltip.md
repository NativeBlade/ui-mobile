# Tooltip

Tag: `<x-nb-mobile::tooltip>`

Floating hint that appears on hover (desktop) or tap (mobile). Auto-dismisses after 2 seconds on tap.

## Usage

```blade
<x-nb-mobile::tooltip text="Delete this item">
    <x-nb-mobile::button color="red-500" size="small">
        <x-nativeblade-icon name="trash" size="16" />
    </x-nb-mobile::button>
</x-nb-mobile::tooltip>

{{-- Position --}}
<x-nb-mobile::tooltip text="More info" position="bottom">
    <x-nativeblade-icon name="info" size="20" />
</x-nb-mobile::tooltip>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `text` | `''` | Tooltip text |
| `position` | `top` | `top`, `bottom`, `left`, `right` |

The tooltip is meant for short hints. For longer content prefer a popover or a sheet.
