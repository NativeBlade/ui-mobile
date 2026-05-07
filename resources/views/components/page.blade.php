@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);

    $bg = $theme === 'ios' ? 'bg-gray-50' : 'bg-gray-100';
@endphp

<div {{ $attributes->class("min-h-screen flex flex-col {$bg}") }}>
@once
    <script>
        // Global helpers. Devs write onclick="nb.open('drawer','main-menu')"
        // instead of window.dispatchEvent(...). Modals listen on nb-{kind}-open
        // / nb-{kind}-close window events.
        window.nb = window.nb || {
            open(kind, id, extra) {
                window.dispatchEvent(new CustomEvent('nb-' + kind + '-open', { detail: Object.assign({ id }, extra || {}) }));
            },
            close(kind, id) {
                window.dispatchEvent(new CustomEvent('nb-' + kind + '-close', { detail: { id } }));
            },
            toast(id, message, opts) {
                window.dispatchEvent(new CustomEvent('nb-toast-show', { detail: Object.assign({ id, message }, opts || {}) }));
            },
            popover(id, anchor) {
                const rect = (anchor instanceof Element ? anchor : event.currentTarget).getBoundingClientRect();
                window.dispatchEvent(new CustomEvent('nb-popover-open', { detail: { id, rect } }));
            },
            // Programmatic navigation. Useful for tabbar items that should
            // skip the page slide and just swap content. Pass options like
            // { transition: 'none' } or { transition: 'fade', replace: true }.
            navigate(path, options) {
                options = options || {};
                window.parent.postMessage({
                    type: 'nativeblade-navigate',
                    path: path,
                    transition: options.transition,
                    replace: !!options.replace,
                }, '*');
            },
        };
    </script>
@endonce

    {{ $slot }}
</div>
