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

    /**
     * Resolved color mode: 'light' (default), 'dark', or 'auto'.
     */
    public static function mode(): string
    {
        $m = strtolower(trim((string) config('nb-ui-mobile.mode', 'light')));
        return in_array($m, ['light', 'dark', 'auto'], true) ? $m : 'light';
    }

    /**
     * Render the <style> tag injected by the @nbUiMobileStyles directive.
     *
     * Always emits a small base reset (removes the Android tap-highlight
     * flash and the browser focus ring on touch-driven elements). When
     * mode=dark or mode=auto, also emits the dark palette overrides.
     */
    public static function styleTag(): string
    {
        $mode = self::mode();
        $base = self::baseRules();
        $modeRules = '';

        if ($mode !== 'light') {
            $p = config('nb-ui-mobile.dark_palette', []);
            $bg        = $p['bg']        ?? '#0d1117';
            $surface   = $p['surface']   ?? '#161b22';
            $surface2  = $p['surface_2'] ?? '#21262d';
            $border    = $p['border']    ?? '#30363d';
            $fg        = $p['fg']        ?? '#e6edf3';
            $fgMuted   = $p['fg_muted']  ?? '#8b949e';
            $fgSoft    = $p['fg_soft']   ?? '#c9d1d9';

            $modeRules = self::darkRules($bg, $surface, $surface2, $border, $fg, $fgMuted, $fgSoft);

            if ($mode === 'auto') {
                $modeRules = "@media (prefers-color-scheme: dark) { {$modeRules} }";
            }
        }

        return "<style data-nb-mobile-mode=\"{$mode}\">{$base}{$modeRules}</style>";
    }

    /**
     * Base reset shared across all modes. Quietly removes the white/blue
     * tap-highlight flash on Android and the default focus outline on
     * interactive elements — both look broken on touch UIs.
     */
    private static function baseRules(): string
    {
        return <<<'CSS'
html { -webkit-tap-highlight-color: transparent; }
button, a, [role="button"] {
    -webkit-tap-highlight-color: transparent;
    touch-action: manipulation;
}
button:focus, a:focus, [role="button"]:focus,
button:focus-visible, a:focus-visible, [role="button"]:focus-visible { outline: none; }
CSS;
    }

    private static function darkRules(string $bg, string $surface, string $surface2, string $border, string $fg, string $fgMuted, string $fgSoft): string
    {
        return <<<CSS
body { background-color: {$bg}; color: {$fg}; }
.bg-white { background-color: {$surface} !important; }
.bg-gray-50 { background-color: {$bg} !important; }
.bg-gray-100 { background-color: {$surface2} !important; }
.bg-gray-200 { background-color: {$border} !important; }
.border-gray-100, .border-gray-200, .border-gray-200\\/60,
.border-t-gray-200, .border-b-gray-200, .border-y-gray-200 { border-color: {$border} !important; }
.divide-gray-100 > * + *, .divide-gray-200 > * + *,
.divide-gray-100 > :not(:last-child), .divide-gray-200 > :not(:last-child),
.divide-gray-100 > :not([hidden]) ~ :not([hidden]),
.divide-gray-200 > :not([hidden]) ~ :not([hidden]) { border-color: {$border} !important; }
.text-gray-900, .text-gray-800 { color: {$fg} !important; }
.text-gray-700 { color: {$fgSoft} !important; }
.text-gray-600, .text-gray-500, .text-gray-400 { color: {$fgMuted} !important; }
.text-gray-300 { color: {$border} !important; }
.active\\:bg-gray-100:active { background-color: {$surface2} !important; }
.active\\:bg-gray-200:active { background-color: {$border} !important; }
.shadow, .shadow-sm, .shadow-md { box-shadow: 0 2px 8px rgba(0,0,0,.45) !important; }
.shadow-lg, .shadow-xl, .shadow-2xl { box-shadow: 0 8px 24px rgba(0,0,0,.55) !important; }
header[class*="sticky"][style*="rgba(255,255,255"] { background-color: rgba(13,17,23,0.85) !important; }
nav[class*="sticky"][style*="rgba(248,248,250"] { background-color: rgba(13,17,23,0.9) !important; }
input, textarea, select { color-scheme: dark; }
::selection { background: rgba(249,115,22,0.35); color: #fff; }
CSS;
    }
}
