<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default theme
    |--------------------------------------------------------------------------
    |
    | When the running platform is desktop or web (not iOS or Android), the
    | components fall back to this theme. On iOS devices the theme is always
    | 'ios' and on Android devices it is always 'material', regardless of this
    | value, unless explicitly overridden per component via the `theme` prop.
    |
    | Supported: 'ios', 'material'
    |
    */
    'theme' => 'ios',

    /*
    |--------------------------------------------------------------------------
    | Force theme on all platforms
    |--------------------------------------------------------------------------
    |
    | If true, every component renders with the `theme` value above, ignoring
    | the platform detection. Useful for design previews or apps that want a
    | consistent look across iOS and Android.
    |
    */
    'force' => false,

    /*
    |--------------------------------------------------------------------------
    | Color mode
    |--------------------------------------------------------------------------
    |
    | Forces the surface palette used by every component:
    |   - 'light' : always light (default Konsta/iOS look)
    |   - 'dark'  : always dark (deep backgrounds + light text)
    |   - 'auto'  : follows the user's OS preference (prefers-color-scheme)
    |
    | When set to 'dark' or 'auto', the ServiceProvider injects a small
    | <style> tag that overrides the hard-coded Tailwind tokens used inside
    | the component templates (bg-white, border-gray-200, text-gray-900,
    | etc.) so you don't need to write any CSS yourself.
    |
    */
    'mode' => 'light',

    /*
    |--------------------------------------------------------------------------
    | Brand colors
    |--------------------------------------------------------------------------
    |
    | Tailwind color tokens used as the primary accent in each theme. The
    | iOS palette defaults to system blue, the Material palette defaults to
    | indigo. Override per project by overwriting this config or by passing
    | the `color` prop on individual components.
    |
    */
    'colors' => [
        'ios' => [
            'primary' => 'blue-500',
            'primary_text' => 'white',
            'destructive' => 'red-500',
        ],
        'material' => [
            'primary' => 'indigo-600',
            'primary_text' => 'white',
            'destructive' => 'red-600',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dark mode palette
    |--------------------------------------------------------------------------
    |
    | The hex values used by the auto-injected dark stylesheet. Tune these
    | to match your app's branding without rewriting every component.
    |
    */
    'dark_palette' => [
        'bg'         => '#0d1117',
        'surface'    => '#161b22',
        'surface_2'  => '#21262d',
        'border'     => '#30363d',
        'fg'         => '#e6edf3',
        'fg_muted'   => '#8b949e',
        'fg_soft'    => '#c9d1d9',
    ],
];
