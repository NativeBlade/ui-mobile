# Page

Tag: `<x-nb-mobile::page>`

Root container for any screen. Sets up theme background, dark-mode listener, and registers the global `nb.*` JS helper used by other modal components.

## Usage

```blade
<x-nb-mobile::page>
    <x-nb-mobile::navbar title="Profile" />

    <main class="flex-1">
        ...
    </main>

    <x-nb-mobile::tabbar>...</x-nb-mobile::tabbar>
</x-nb-mobile::page>
```

## Props

| Prop | Default | Description |
|---|---|---|
| `theme` | auto-detect | Force `ios` or `material` |

## What it does

- Sets `min-h-screen flex flex-col`, theme-appropriate background
- Injects `window.nb` helpers (open / close / toast / popover / darkMode) once per page
- Restores saved dark mode preference from `localStorage`

## Customize

```blade
<x-nb-mobile::page class="bg-amber-50 dark:bg-stone-950">
```
