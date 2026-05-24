# Navbar

Tag: `<x-nb-mobile::navbar>`

Sticky top bar with optional left/right slots and centered title.

## Usage

```blade
<x-nb-mobile::navbar title="Profile">
    <x-slot name="left">
        <button onclick="nb.open('drawer','main-menu')">
            <svg ...>menu</svg>
        </button>
    </x-slot>

    <x-slot name="right">
        <button>Edit</button>
    </x-slot>
</x-nb-mobile::navbar>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `title` | `null` | Page title text |
| `theme` | auto | Force `ios` or `material` |

## Slots

- `left` — typically a back button or hamburger
- `right` — typically actions like Edit, Save, More
- Default — used as title fallback if `title` not set

## Theme

- iOS: h-11, title centered absolutely, hairline border
- Material: h-16, title left aligned, shadow-sm

## Safe area

The navbar does **not** add `env(safe-area-inset-top)` padding by default. The NativeBlade shell (and most native webviews) already inset the webview below the status bar / notch, so adding the inset on top would produce an empty band above the title on iOS.

If your webview is configured with `viewport-fit=cover` (the page extends under the status bar), opt in explicitly:

```blade
<x-nb-mobile::navbar title="Profile" :safe="true" />
```
