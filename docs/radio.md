# Radio

Tag: `<x-nb-mobile::radio>`

Single-choice input. Native HTML mutual exclusion via shared `name`.

## Usage

```blade
<x-nb-mobile::radio name="plan" value="free">Free</x-nb-mobile::radio>
<x-nb-mobile::radio name="plan" value="pro" checked>Pro</x-nb-mobile::radio>
<x-nb-mobile::radio name="plan" value="team">Team</x-nb-mobile::radio>
```

For Livewire two-way binding, add `wire:model.live` to each radio (same property name on all):

```blade
<x-nb-mobile::radio name="plan" value="free" wire:model.live="plan">Free</x-nb-mobile::radio>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `name` | `null` | Group name (required for mutual exclusion) |
| `value` | `''` | |
| `checked` | `false` | Initial state |
| `disabled` | `false` | |
| `color` | theme primary | |
