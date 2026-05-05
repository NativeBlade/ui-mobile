# Preloader

Tag: `<x-nb-mobile::preloader>`

Loading spinner.

## Usage

```blade
<x-nb-mobile::preloader />
<x-nb-mobile::preloader size="sm" />
<x-nb-mobile::preloader size="lg" color="red-500" />
```

## Props

| Prop | Default | Description |
|---|---|---|
| `size` | `md` | `sm` (20px), `md` (32px), `lg` (48px) |
| `color` | theme primary | |

## Theme

- iOS: 12-spoke radial spinner with fading opacity
- Material: circular dasharray stroke spinner
