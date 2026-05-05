# Input

Tag: `<x-nb-mobile::input>`

Standalone form input with label, hint and error.

## Usage

```blade
<x-nb-mobile::input
    label="Email"
    type="email"
    placeholder="you@example.com"
    hint="We never share your email."
/>

<x-nb-mobile::input
    label="Password"
    type="password"
    error="Password is too short"
    required
/>

<x-nb-mobile::input wire:model.live="search" placeholder="Type..." />
```

## Props

| Prop | Default | Description |
|---|---|---|
| `label` | `null` | Field label |
| `type` | `text` | HTML input type |
| `placeholder` | `''` | |
| `value` | `''` | |
| `name` | `null` | |
| `error` | `null` | Red error text below |
| `hint` | `null` | Gray hint text below |
| `required` | `false` | Shows asterisk + native required |
| `disabled` | `false` | |

## Theme

- iOS: rounded boxed input with bordered field
- Material: underlined input with focus underline change
