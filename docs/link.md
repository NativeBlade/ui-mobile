# Link

Tag: `<x-nb-mobile::link>`

Inline styled anchor.

## Usage

```blade
Read more in the <x-nb-mobile::link href="/docs">documentation</x-nb-mobile::link>.

<x-nb-mobile::link href="https://example.com" color="emerald-600">External</x-nb-mobile::link>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `href` | `#` | |
| `color` | theme primary | |

Material applies `hover:underline`, iOS does not.
