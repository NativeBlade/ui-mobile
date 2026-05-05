# Toolbar

Tag: `<x-nb-mobile::toolbar>`

Flexible action bar that can sit at the top or bottom of a page.

## Usage

```blade
{{-- Top toolbar with actions --}}
<x-nb-mobile::toolbar top>
    <x-nb-mobile::button variant="clear" size="small">Cancel</x-nb-mobile::button>
    <x-nb-mobile::button size="small">Save</x-nb-mobile::button>
</x-nb-mobile::toolbar>

{{-- Bottom toolbar (inside a popup or sheet) --}}
<x-nb-mobile::toolbar>
    <x-nb-mobile::button variant="clear">Back</x-nb-mobile::button>
    <x-nb-mobile::button>Next</x-nb-mobile::button>
</x-nb-mobile::toolbar>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `top` | `false` | Sticks to top instead of bottom |

Different from `<x-nb-mobile::tabbar>`, which is specifically a 3-5 tab bottom navigation. Use Toolbar for arbitrary action sets.

iOS: h-12 with hairline border.
Material: h-14 with shadow.
