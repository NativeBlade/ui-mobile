# File Upload

Tag: `<x-nb-mobile::file-upload>`

Drag-and-drop / tap-to-pick area with file name preview and clear button.

## Usage

### 1. Standard form submit (lo-fi)

The hidden `<input type="file" name="...">` works in any `<form>`. The file shows up in `$_FILES` server-side.

```blade
<form method="POST" action="/upload" enctype="multipart/form-data">
    @csrf
    <x-nb-mobile::file-upload name="document" accept="image/*,application/pdf" />
    <x-nb-mobile::button type="submit">Upload</x-nb-mobile::button>
</form>
```

### 2. Livewire (recommended)

`wire:model` is forwarded to the underlying input, so Livewire's `WithFileUploads` works out of the box. The file uploads to a temporary location as soon as the user picks it.

```blade
<x-nb-mobile::file-upload wire:model="photo" name="photo" accept="image/*" />

@if($photo)
    <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32 rounded-full" />
@endif
```

```php
use Livewire\WithFileUploads;
use Livewire\Component;

class ProfilePhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {
        $path = $this->photo->store('avatars', 'public');
        // ...
    }
}
```

For multiple files:

```blade
<x-nb-mobile::file-upload wire:model="photos" multiple accept="image/*" />
```

```php
public $photos = [];
```

### 3. Native picker (camera / photo library)

For real mobile, prefer NativeBlade's media plugin which opens the OS-native picker (camera, photo library, document scanner) instead of an HTML file input. Render a button that triggers it from the server side:

```php
return NativeBlade::media()->pickImage()->toResponse();
```

The result comes back via the bridge as a base64 / temp file path that you can then attach to a Livewire model.

## Props

| Prop | Default | Description |
|---|---|---|
| `name` | `null` | Form field name (becomes `name[]` if `multiple`) |
| `accept` | `*/*` | MIME filter, e.g. `image/*`, `application/pdf` |
| `multiple` | `false` | Allow more than one file |
| `label` | `Tap to choose a file` | Main label inside the dropzone |
| `hint` | `null` | Smaller helper text below the label |
| `color` | theme primary | Color of the Clear button |

## Forwarded attributes

The component forwards `wire:*`, `x-on:*` and `@event` directives directly to the underlying `<input>` so Livewire and Alpine listeners attach to the right element.

## Visual

Dashed border dropzone with upload icon. After selection: shows file name (or comma list if multiple) and a Clear button that resets state and emits a `change` event.
