# Stepper

Tag: `<x-nb-mobile::stepper>`

Numeric +/- input with bounds.

## Usage

```blade
<x-nb-mobile::stepper :value="3" :min="0" :max="10" />
<x-nb-mobile::stepper variant="outline" :value="5" rounded />
<x-nb-mobile::stepper :value="1" :step="2" />
```

## Props

| Prop | Default | Description |
|---|---|---|
| `value` | `0` | Initial value |
| `min` | none | Lower bound |
| `max` | none | Upper bound |
| `step` | `1` | Increment / decrement amount |
| `variant` | `fill` | `fill`, `outline`, `clear` |
| `size` | `medium` | `small`, `medium`, `large` |
| `rounded` | `false` | Pill shape |
| `color` | theme primary | |

## State

State lives in Alpine inside the component. To expose to Livewire, fork the component (publish views) and bind via `wire:model`.
