# Popup

Tag: `<x-nb-mobile::popup>`

Full-screen modal on mobile, centered card on desktop. Useful for dedicated flows that have their own navbar.

## Usage

```blade
<x-nb-mobile::popup id="profile-edit">
    <x-nb-mobile::navbar title="Edit Profile">
        <x-slot name="left">
            <button onclick="nb.close('popup','profile-edit')">Close</button>
        </x-slot>
    </x-nb-mobile::navbar>

    <div class="p-4">
        ... form fields ...
    </div>
</x-nb-mobile::popup>

<x-nb-mobile::button onclick="nb.open('popup','profile-edit')">Edit</x-nb-mobile::button>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-popup` | Unique id |

Slides up from bottom on mobile (taking the whole viewport). On `md` and larger viewports it appears as a centered card with rounded corners.
