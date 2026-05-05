# Action Sheet

Tags: `<x-nb-mobile::action-sheet>` + `<x-nb-mobile::action-sheet-button>`

iOS-style bottom action menu (also works on Android with Material list styling).

## Usage

```blade
<x-nb-mobile::action-sheet id="share" title="Share via">
    <x-nb-mobile::action-sheet-button onclick="nb.close('action-sheet','share')">
        Copy link
    </x-nb-mobile::action-sheet-button>
    <x-nb-mobile::action-sheet-button onclick="...">Email</x-nb-mobile::action-sheet-button>
    <x-nb-mobile::action-sheet-button destructive onclick="...">Delete</x-nb-mobile::action-sheet-button>
    <x-nb-mobile::action-sheet-button bold onclick="nb.close('action-sheet','share')">
        Cancel
    </x-nb-mobile::action-sheet-button>
</x-nb-mobile::action-sheet>

<x-nb-mobile::button onclick="nb.open('action-sheet','share')">Share</x-nb-mobile::button>
```

## action-sheet props

| Prop | Default | Description |
|---|---|---|
| `id` | `nb-action-sheet` | |
| `title` | `null` | Subtle text at top of sheet |

## action-sheet-button props

| Prop | Default | Description |
|---|---|---|
| `destructive` | `false` | Red text |
| `bold` | `false` | Semibold weight (typical for Cancel) |

iOS: rounded sheet 16px from screen edges with hairline dividers between options.
Material: rounded-top sheet at full width with menu-list styling.
