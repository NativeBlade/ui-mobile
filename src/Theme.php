<?php

namespace NativeBlade\UiMobile;

class Theme
{
    public const IOS = 'ios';
    public const MATERIAL = 'material';

    /**
     * Resolve the theme to use for a given component render.
     *
     * Priority order:
     *   1. Per-component override passed as $override
     *   2. config('nb-ui-mobile.force') is true, returns config('nb-ui-mobile.theme')
     *   3. NativeBlade::isIos() returns 'ios'
     *   4. NativeBlade::isAndroid() returns 'material'
     *   5. Falls back to config('nb-ui-mobile.theme')
     */
    public static function current(?string $override = null): string
    {
        if ($override !== null) {
            return self::normalize($override);
        }

        $config = config('nb-ui-mobile.theme', self::IOS);

        if (config('nb-ui-mobile.force', false)) {
            return self::normalize($config);
        }

        // The NativeBlade facade declares isIos() / isAndroid() as @method
        // docblocks but dispatches them via __callStatic, so method_exists()
        // returns false. Catch any error from calling on a missing dispatcher
        // and fall through to the config default.
        try {
            if (class_exists('\NativeBlade\Facades\NativeBlade')) {
                $facade = '\NativeBlade\Facades\NativeBlade';
                if ($facade::isIos()) {
                    return self::IOS;
                }
                if ($facade::isAndroid()) {
                    return self::MATERIAL;
                }
            }
        } catch (\Throwable $e) {
            // facade not bootable, ignore
        }

        return self::normalize($config);
    }

    /**
     * Returns true if the resolved theme matches.
     */
    public static function is(string $theme, ?string $override = null): bool
    {
        return self::current($override) === self::normalize($theme);
    }

    /**
     * Read a Tailwind color token from the config map.
     */
    public static function color(string $key, ?string $themeOverride = null): string
    {
        $theme = self::current($themeOverride);
        return config("nb-ui-mobile.colors.{$theme}.{$key}", 'blue-500');
    }

    private static function normalize(string $theme): string
    {
        $t = strtolower(trim($theme));
        return $t === self::MATERIAL ? self::MATERIAL : self::IOS;
    }
}
