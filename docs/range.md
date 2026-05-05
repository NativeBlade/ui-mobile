# Range Slider

Tag: `<x-nb-mobile::range>`

## Usage

```blade
<x-nb-mobile::range :value="40" />
<x-nb-mobile::range :value="50" :min="0" :max="100" :step="5" />
<x-nb-mobile::range wire:model.live="volume" />
```

## Props

| Prop | Default | Description |
|---|---|---|
| `value` | `50` | Current value |
| `min` | `0` | |
| `max` | `100` | |
| `step` | `1` | |
| `color` | theme primary | |
| `name` | `null` | |

## Theme

- iOS: 28px white thumb with shadow, thin track
- Material: 20px filled thumb (primary color), thin track

Built on a native `<input type="range">` so it works for accessibility, keyboard, etc.
