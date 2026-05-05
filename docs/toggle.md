# Toggle

Tag: `<x-nb-mobile::toggle>`

iOS-style switch / Material-style switch.

## Usage

```blade
<x-nb-mobile::toggle :checked="true" />
<x-nb-mobile::toggle wire:model.live="notifications" />

{{-- With dark mode hookup --}}
<x-nb-mobile::toggle
    wire:model.live="darkMode"
    x-on:change="nb.darkMode($el.querySelector('input').checked)"
/>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `checked` | `false` | Initial state |
| `name` | `null` | |
| `disabled` | `false` | |

## Theme

- iOS: `h-7 w-12` track with floating thumb, primary color when on
- Material: smaller `h-5 w-9` track, thumb pops out 6px on either side
