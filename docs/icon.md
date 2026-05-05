# Icon

Tag: `<x-nb-mobile::icon>`

Small wrapper that sizes and colors an inline SVG icon. Mostly cosmetic; for slot-based icons (in tabbar, fab, navbar) you can pass raw SVG directly.

## Usage

```blade
<x-nb-mobile::icon size="6" color="blue-500">
    <svg viewBox="0 0 24 24" fill="currentColor">...</svg>
</x-nb-mobile::icon>

<x-nb-mobile::icon size="w-8 h-8">
    <svg ...></svg>
</x-nb-mobile::icon>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `size` | `6` | Number → `w-{n} h-{n}`. String → use as-is. |
| `color` | `null` | Tailwind color, e.g. `blue-500` |
