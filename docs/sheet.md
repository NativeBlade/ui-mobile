# Sheet Modal

Tag: `<x-nb-mobile::sheet>`

Bottom sheet that slides up from below. Use for forms, filters, or anything that doesn't need full screen.

## Usage

```blade
<x-nb-mobile::sheet id="filters" title="Filters">
    <div class="space-y-3">
        ... your form ...
        <x-nb-mobile::button block onclick="nb.close('sheet','filters')">Apply</x-nb-mobile::button>
    </div>
</x-nb-mobile::sheet>

{{-- Open from anywhere --}}
<x-nb-mobile::button onclick="nb.open('sheet','filters')">Filters</x-nb-mobile::button>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-sheet` | Unique id for `nb.open()` / `nb.close()` |
| `title` | `null` | Optional heading |

Click backdrop or press Escape to close. iOS variant shows a small drag handle on top.
