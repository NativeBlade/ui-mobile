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
];
