# Avatar

Tag: `<x-nb-mobile::avatar>`

Circular (or square) profile image with auto initials fallback and optional badge dot.

## Usage

```blade
{{-- Image --}}
<x-nb-mobile::avatar src="/img/john.jpg" name="John Doe" size="md" />

{{-- Initials (auto from name: "Maria Silva" -> MS) --}}
<x-nb-mobile::avatar name="Maria Silva" color="emerald-500" />

{{-- With badge dot (e.g. unread / online) --}}
<x-nb-mobile::avatar name="Alex Wong" badge badgeColor="green-500" />

{{-- Square shape --}}
<x-nb-mobile::avatar name="Team Acme" shape="square" color="purple-500" />
```

## Props

| Prop | Default | Description |
|---|---|---|
| `src` | `null` | Image URL. If set, renders an `<img>`. |
| `name` | `null` | Used to derive initials when `src` is missing. |
| `size` | `md` | `xs`, `sm`, `md`, `lg`, `xl`, `2xl` |
| `color` | `blue-500` | Background color for initials variant. |
| `textColor` | `white` | Text color for initials. |
| `shape` | `circle` | `circle` or `square` (rounded-xl). |
| `badge` | `null` | Truthy = show a small dot in the top-right. |
| `badgeColor` | `red-500` | Color of the dot. |

## Slot

If you need full control of the inside (e.g. an icon), pass children:

```blade
<x-nb-mobile::avatar size="lg" color="indigo-600">
    <x-nativeblade-icon name="user" size="24" />
</x-nb-mobile::avatar>
```
