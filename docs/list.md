# List, List Item, List Input, List Button

Group of related rows. iOS uses inset (rounded card around the list); Material is full-width with hairlines.

## Tags

- `<x-nb-mobile::list>` container
- `<x-nb-mobile::list-item>` row with title/subtitle/after/chevron
- `<x-nb-mobile::list-input>` row with input field inline
- `<x-nb-mobile::list-button>` clickable row (often "Sign out", "Delete account")

## Usage

```blade
<x-nb-mobile::list inset title="Account">
    <x-nb-mobile::list-item title="Email" subtitle="you@example.com" />
    <x-nb-mobile::list-item title="Plan" :after="'Pro'" href="/upgrade" />
    <x-nb-mobile::list-item>
        <x-slot name="title">Notifications</x-slot>
        <x-slot name="after"><x-nb-mobile::toggle :checked="true" /></x-slot>
    </x-nb-mobile::list-item>
</x-nb-mobile::list>

<x-nb-mobile::list inset title="Profile">
    <x-nb-mobile::list-input label="Name" placeholder="Your name" />
    <x-nb-mobile::list-input label="Email" type="email" />
    <x-nb-mobile::list-button>Sign in with Apple</x-nb-mobile::list-button>
    <x-nb-mobile::list-button destructive>Delete account</x-nb-mobile::list-button>
</x-nb-mobile::list>
```

## List props

| Prop | Default | Description |
|---|---|---|
| `inset` | `true` (iOS) / `false` (Material) | Rounded card style |
| `title` | `null` | Group title above the list |

## List-item props

| Prop | Default | Description |
|---|---|---|
| `title` | `null` | Main label |
| `subtitle` | `null` | Secondary line |
| `href` | `null` | Render as link |
| `chevron` | auto | Show iOS chevron (defaults to true if href) |
| `after` | `null` | Right-aligned content (text, badge, toggle) |
| `media` | `null` | Left-side media (avatar, icon) |

## List-input props

Same as `<x-nb-mobile::input>` plus inset row styling. Renders inline label on iOS, stacked on Material.

## List-button props

| Prop | Default | Description |
|---|---|---|
| `destructive` | `false` | Red color (delete actions) |
| `href` | `null` | Render as link |
