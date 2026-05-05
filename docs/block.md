# Block

Tag: `<x-nb-mobile::block>`

Plain text block with optional inset/strong styling. Use for paragraphs of content that don't need a card's shadow.

## Usage

```blade
<x-nb-mobile::block strong inset title="About">
    Welcome to the app. Read more in our <x-nb-mobile::link href="#">documentation</x-nb-mobile::link>.
</x-nb-mobile::block>

<x-nb-mobile::block>
    Plain inline text without bg or padding.
</x-nb-mobile::block>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `strong` | `false` | White surface with extra padding |
| `inset` | `false` | Rounded with horizontal margin |
| `title` | `null` | Group title above the block |

iOS: `rounded-3xl` when inset.
Material: `rounded-2xl` when inset.
