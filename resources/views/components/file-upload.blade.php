@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $name = $name ?? null;
    $accept = $accept ?? '*/*';
    $multiple = (bool)($multiple ?? false);
    $label = $label ?? 'Tap to choose a file';
    $hint = $hint ?? null;
    $color = Theme::color('primary', $theme);

    $rounded = $theme === 'ios' ? 'rounded-3xl' : 'rounded-2xl';
    $id = 'nb-file-' . substr(md5(uniqid()), 0, 6);
@endphp

<div
    x-data="{
        files: [],
        fileNames: '',
        onChange(e) {
            const list = Array.from(e.target.files || []);
            this.files = list;
            this.fileNames = list.map(f => f.name).join(', ');
        },
        clear() {
            this.files = [];
            this.fileNames = '';
            this.$refs.input.value = '';
            this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }"
    class="block w-full"
>
    <label for="{{ $id }}" class="block cursor-pointer">
        <div class="border-2 border-dashed border-gray-300 {{ $rounded }} px-4 py-6 text-center bg-white active:bg-gray-50 transition-colors">
            <div class="text-gray-400 mb-2 flex justify-center">
                <x-nativeblade-icon name="upload-simple" size="32" />
            </div>

            <p class="text-sm font-medium text-gray-900" x-show="!fileNames">{{ $label }}</p>
            <p class="text-sm font-medium text-gray-900 truncate" x-show="fileNames" x-text="fileNames"></p>

            @if($hint)
                <p class="text-xs text-gray-500 mt-1" x-show="!fileNames">{{ $hint }}</p>
            @endif

            <button
                type="button"
                x-show="files.length > 0"
                x-cloak
                @click.prevent="clear()"
                class="mt-3 text-xs text-{{ $color }} font-medium"
            >
                Clear
            </button>
        </div>
    </label>

    <input
        id="{{ $id }}"
        type="file"
        x-ref="input"
        @if($name) name="{{ $name }}{{ $multiple ? '[]' : '' }}" @endif
        accept="{{ $accept }}"
        @if($multiple) multiple @endif
        {{ $attributes->whereStartsWith(['wire:', 'x-on:', '@']) }}
        class="sr-only"
        @change="onChange($event)"
    />
</div>
