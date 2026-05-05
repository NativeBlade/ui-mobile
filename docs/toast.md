# Toast

Tag: `<x-nb-mobile::toast>`

Auto-dismissing message at the top or bottom of the screen.

## Usage

```blade
{{-- Place once per page --}}
<x-nb-mobile::toast id="hello-toast" position="bottom" />

{{-- Trigger anywhere --}}
<x-nb-mobile::button onclick="nb.toast('hello-toast', 'File saved!')">Save</x-nb-mobile::button>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-toast` | |
| `position` | `bottom` | `bottom` or `top` |
| `duration` | `3000` | Auto-dismiss after N ms |

## API

`nb.toast(id, message, opts?)` — shows the toast with the given message. Auto-dismisses after the configured duration.

Multiple toasts can coexist by giving each a different `id`.
