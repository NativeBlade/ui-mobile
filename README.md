# NativeBlade UI Mobile

Konsta-style iOS and Material 3 components for [NativeBlade](https://github.com/nativeblade) apps. Pure Blade, pure Tailwind, no JS framework dependency. Components auto-detect the host platform via `NativeBlade::isIos()` / `NativeBlade::isAndroid()` and render the matching look.

## Install

```bash
composer require nativeblade/ui-mobile
```

The service provider auto-registers via Laravel package discovery.

## Required: tell Tailwind to scan the package

This is the most important setup step. Tailwind 4 only generates classes it sees in scanned source files. Open your project's `resources/css/app.css` and add this line near the other `@source` entries:

```css
@source '../../vendor/nativeblade/ui-mobile/resources/views/**/*.blade.php';
```

Without this line, components render but most utility classes (colors, dynamic widths, etc.) come out unstyled or transparent because Tailwind never sees them.

## Recommended: extend the safelist for opacity modifiers

NativeBlade's stub `tailwind-safelist.css` already covers solid colors and spacing. The ui-mobile components additionally use opacity modifiers (`bg-black/50`, `bg-{color}/15`) and a few arbitrary font sizes. If you started a new NativeBlade project recently the stub already includes these. If your `app.css` predates the update, add this section:

```css
@source inline("bg-black/{5,10,15,20,25,30,40,50,60,70,80,90}");
@source inline("bg-white/{5,10,15,20,25,30,40,50,60,70,75,80,85,90,95}");
@source inline("{bg,text,border}-{slate,gray,zinc,neutral,stone,red,orange,amber,yellow,lime,green,emerald,teal,cyan,sky,blue,indigo,violet,purple,fuchsia,pink,rose}-{500,600}/{5,10,15,20,30,40,50}");
@source inline("text-[10px]");
@source inline("text-[11px]");
@source inline("text-[13px]");
@source inline("text-[15px]");
@source inline("text-[17px]");
@source inline("{backdrop-blur-none,backdrop-blur-sm,backdrop-blur,backdrop-blur-md,backdrop-blur-lg,backdrop-blur-xl}");
```

## Configure (optional)

Publish the config to override defaults:

```bash
php artisan vendor:publish --tag=nb-ui-mobile-config
```

```php
return [
    'theme' => 'ios',
    'force' => false,
    'colors' => [
        'ios'      => ['primary' => 'blue-500',   'primary_text' => 'white'],
        'material' => ['primary' => 'indigo-600', 'primary_text' => 'white'],
    ],
];
```

## Usage

```blade
<x-nb-mobile::page>
    <x-nb-mobile::navbar title="Profile" />

    <x-nb-mobile::list inset title="Account">
        <x-nb-mobile::list-item title="Email" subtitle="you@example.com" />
        <x-nb-mobile::list-item title="Plan" after="Free" href="/upgrade" />
    </x-nb-mobile::list>

    <div class="px-4 mt-4">
        <x-nb-mobile::button block>Continue</x-nb-mobile::button>
    </div>
</x-nb-mobile::page>
```

On iOS, the button is rounded with iOS sizing. On Android, Material 3 pill with shadow. Same Blade markup.

## Per-component theme override

```blade
<x-nb-mobile::button theme="material">Always Material</x-nb-mobile::button>
<x-nb-mobile::card theme="ios">Always iOS</x-nb-mobile::card>
```

## Triggering modals

Place the modal anywhere in the page (drawer, sheet, popup, action-sheet, toast, popover). To open or close, call the global `nb.*` helper from any element:

```blade
<button onclick="nb.open('drawer','main-menu')">Menu</button>
<button onclick="nb.close('drawer','main-menu')">Close</button>
<button onclick="nb.toast('saved','File saved!')">Save</button>
<button onclick="nb.popover('more', this)">More</button>
```

API:
- `nb.open(kind, id, extra?)` opens a drawer / sheet / popup / action-sheet
- `nb.close(kind, id?)` closes (id optional, closes any of that kind)
- `nb.toast(id, message, opts?)` triggers a toast with a message
- `nb.popover(id, anchor)` opens a popover anchored to an element

## Components

Each component has its own doc page in `docs/`. Quick reference:

**Layout:** [page](docs/page.md), [navbar](docs/navbar.md), [tabbar](docs/tabbar.md), [drawer](docs/drawer.md), [toolbar](docs/toolbar.md), [fab](docs/fab.md)

**Containers:** [card](docs/card.md), [block](docs/block.md), [list](docs/list.md), [menu-item](docs/menu-item.md), [sheet](docs/sheet.md), [popup](docs/popup.md), [action-sheet](docs/action-sheet.md), [popover](docs/popover.md), [tabs](docs/tabs.md)

**Inputs:** [input](docs/input.md), [searchbar](docs/searchbar.md), [checkbox](docs/checkbox.md), [radio](docs/radio.md), [toggle](docs/toggle.md), [stepper](docs/stepper.md), [range](docs/range.md), [segmented](docs/segmented.md), [file-upload](docs/file-upload.md)

**Display:** [button](docs/button.md), [chip](docs/chip.md), [badge](docs/badge.md), [avatar](docs/avatar.md), [link](docs/link.md), [icon](docs/icon.md), [preloader](docs/preloader.md), [progressbar](docs/progressbar.md), [skeleton](docs/skeleton.md), [toast](docs/toast.md), [tooltip](docs/tooltip.md), [empty-state](docs/empty-state.md)

**Behaviour:** [pull-to-refresh](docs/pull-to-refresh.md)

## Customization

**Class merge** (most common):
```blade
<x-nb-mobile::button class="bg-purple-500 hover:bg-purple-700 shadow-2xl">Custom</x-nb-mobile::button>
```

**Color, variant, size, etc. as props:**
```blade
<x-nb-mobile::button color="emerald-500" variant="tonal" size="large" rounded block>
    Big rounded green tonal
</x-nb-mobile::button>
```

**Force theme globally:** edit `config/nb-ui-mobile.php` with `'force' => true, 'theme' => 'material'`.

**Fork a component** (full control of markup):
```bash
php artisan vendor:publish --tag=nb-ui-mobile-views
```

Files land at `resources/views/vendor/nb-ui-mobile/components/`. Laravel uses these instead of the package versions.

## License

MIT
