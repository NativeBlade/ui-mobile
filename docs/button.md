# Button

Tag: `<x-nb-mobile::button>`

## Usage

```blade
<x-nb-mobile::button>Default</x-nb-mobile::button>
<x-nb-mobile::button variant="outline">Outline</x-nb-mobile::button>
<x-nb-mobile::button variant="clear">Clear</x-nb-mobile::button>
<x-nb-mobile::button variant="tonal">Tonal</x-nb-mobile::button>

<x-nb-mobile::button size="large" block>Continue</x-nb-mobile::button>
<x-nb-mobile::button color="emerald-500" rounded>Custom color</x-nb-mobile::button>
```

## Press feedback

- **iOS:** `active:scale-[0.97]` + `active:opacity-70` for a perceptible press-in feel.
- **Material / desktop:** ink ripple expanding from the tap point + shadow elevation on the fill variant.

The ripple is on by default for non-iOS themes. Disable per button with `:ripple="false"`. Or force it on iOS with `:ripple="true"`.

## Props

| Prop | Default | Description |
|---|---|---|
| `variant` | `fill` | `fill`, `outline`, `clear`, `tonal` |
| `size` | `medium` | `small`, `medium`, `large` |
| `color` | theme primary | Tailwind color, e.g. `red-500` |
| `textColor` | `white` | Text color for filled variant |
| `block` | `false` | Full width |
| `rounded` | `false` | Pill shape |
| `disabled` | `false` | Greyed out + ignores clicks |
| `ripple` | auto | Material ripple on tap (on for Material, off for iOS) |
| `type` | `button` | HTML type (`submit`, `reset`, etc.) |

## Customize

```blade
<x-nb-mobile::button class="shadow-2xl ring-2 ring-emerald-300">
    Override
</x-nb-mobile::button>
```
