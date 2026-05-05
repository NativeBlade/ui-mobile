<?php

namespace NativeBlade\UiMobile;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class UiMobileServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nb-ui-mobile.php', 'nb-ui-mobile');
    }

    public function boot(): void
    {
        Blade::anonymousComponentPath(
            __DIR__ . '/../resources/views/components',
            'nb-mobile'
        );

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/nb-ui-mobile.php' => config_path('nb-ui-mobile.php'),
            ], 'nb-ui-mobile-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/nb-ui-mobile'),
            ], 'nb-ui-mobile-views');
        }
    }
}
