# Badge

Tag: `<x-nb-mobile::badge>`

Small inline counter or status pill.

## Usage

```blade
<x-nb-mobile::badge>3</x-nb-mobile::badge>
<x-nb-mobile::badge color="green-500">New</x-nb-mobile::badge>
<x-nb-mobile::badge color="amber-500" size="sm">9</x-nb-mobile::badge>

{{-- Inline next to label --}}
<span class="flex items-center gap-2">
    Inbox <x-nb-mobile::badge>12</x-nb-mobile::badge>
</span>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `color` | `red-500` | Background color |
| `textColor` | `white` | |
| `size` | `md` | `sm` (16x16) or `md` (20x20) |
