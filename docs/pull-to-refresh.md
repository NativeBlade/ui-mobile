# Pull To Refresh

Tag: `<x-nb-mobile::pull-to-refresh>`

Wrap a fixed-height area. The wrapper IS the scroll container. When the user pulls down at the top past a threshold, calls a Livewire action and shows a spinner.

## Usage

```blade
<div class="h-screen">
    <x-nb-mobile::pull-to-refresh onRefresh="reload" class="h-full">
        @foreach($messages as $message)
            <x-nb-mobile::list-item :title="$message->subject" :subtitle="$message->preview" />
        @endforeach
    </x-nb-mobile::pull-to-refresh>
</div>
```

```php
public function reload()
{
    $this->messages = Message::latest()->take(20)->get();
}
```

## Important: parent must have a fixed height

The component creates an internal scrollable area. For the scroll to work, the wrapper needs a height. Use `class="h-full"` and put the component inside a parent with explicit height (`h-screen`, `h-96`, fixed `style="height: 400px"`, or flex parent).

If you want the whole page to pull-to-refresh, place this directly inside `<x-nb-mobile::page>` and give it `class="flex-1"`.

## Props

| Prop | Default | Description |
|---|---|---|
| `threshold` | `80` | Pull distance in pixels to trigger |
| `onRefresh` | `null` | Name of the Livewire method to call. The pull-down state is held until this resolves. |

## Behaviour

1. User starts pulling at the top of the scroll
2. Content drags down at half-speed (rubber band feel)
3. Past the threshold, the spinner is at full opacity and prepared to spin
4. On release: if past threshold, `$wire.{onRefresh}()` runs. Spinner spins until it returns. Then the content snaps back.
5. If not past threshold, the content snaps back immediately.

## Caveats

- Only triggers when scroll is at the top (`scrollTop === 0`).
- Does not interfere with normal scrolling once the user is past the top.
- The component uses `passive` touch listeners to keep scroll smooth, so it cannot prevent the browser from scrolling. The pull translation rides on top of the scroll, similar to how iOS native scrollers behave.
