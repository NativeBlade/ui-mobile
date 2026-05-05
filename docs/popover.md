# Popover

Tag: `<x-nb-mobile::popover>`

Floating menu anchored to a clicked element.

## Usage

```blade
<x-nb-mobile::popover id="more-actions">
    <button class="block w-full px-4 py-3 text-left text-sm hover:bg-gray-100" onclick="nb.close('popover','more-actions')">Edit</button>
    <button class="block w-full px-4 py-3 text-left text-sm hover:bg-gray-100" onclick="...">Duplicate</button>
    <button class="block w-full px-4 py-3 text-left text-sm text-red-500 hover:bg-gray-100" onclick="...">Delete</button>
</x-nb-mobile::popover>

{{-- Opens anchored to the clicked button --}}
<x-nb-mobile::button onclick="nb.popover('more-actions', this)">More</x-nb-mobile::button>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-popover` | |

The `nb.popover(id, anchorElement)` helper computes the anchor's bounding rect and positions the popover below (or above if no space).
