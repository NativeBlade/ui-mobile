# Checkbox

Tag: `<x-nb-mobile::checkbox>`

## Usage

```blade
<x-nb-mobile::checkbox checked>Accept terms</x-nb-mobile::checkbox>
<x-nb-mobile::checkbox name="newsletter">Subscribe</x-nb-mobile::checkbox>
<x-nb-mobile::checkbox wire:model.live="accept">I agree</x-nb-mobile::checkbox>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `checked` | `false` | Initial state |
| `name` | `null` | Form field name |
| `disabled` | `false` | |
| `color` | theme primary | |

## Theme

- iOS: `rounded-full` 24px box
- Material: `rounded-sm` 20px box with thicker border

Click anywhere on the label area toggles. Works without JavaScript framework via Alpine.
