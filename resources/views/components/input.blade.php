@php
    use NativeBlade\UiMobile\Theme;

    $theme = Theme::current($theme ?? null);
    $label = $label ?? null;
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? '';
    $name = $name ?? null;
    $value = $value ?? '';
    $error = $error ?? null;
    $hint = $hint ?? null;
    $info = $info ?? null;
    $required = (bool)($required ?? false);
    $disabled = (bool)($disabled ?? false);
    $floating = (bool)($floating ?? false);
    $outline = (bool)($outline ?? false);
    $clearable = (bool)($clearable ?? false);
    $color = Theme::color('primary', $theme);

    $hasIconSlot = isset($icon) && trim($icon) !== '';
    $iosTheme = $theme === 'ios';
@endphp

<label
    x-data="{
        focused: false,
        hasValue: @js((string)$value !== ''),
        sync(e) { this.hasValue = (e.target.value ?? '').length > 0; }
    }"
    x-init="hasValue = $refs.input.value.length > 0"
    {{ $attributes->class('block w-full') }}
>
    {{-- Static label (above the field) when not floating --}}
    @if($label && !$floating)
        @if($iosTheme)
            <span class="block px-1 mb-1 text-xs uppercase tracking-wide text-gray-500">
                {{ $label }}@if($required) <span class="text-red-500">*</span>@endif
            </span>
        @else
            <span class="block mb-1 text-xs font-medium text-gray-600">
                {{ $label }}@if($required) <span class="text-red-500">*</span>@endif
            </span>
        @endif
    @endif

    {{-- Field wrapper --}}
    <div
        @if($outline || $floating)
            class="relative"
        @endif
    >
        {{-- Outlined / boxed wrapper (Material 3 style) --}}
        @if($outline)
            <div
                class="flex items-center bg-white rounded-lg border-2 transition-colors px-3"
                :class="focused ? 'border-{{ $color }}' : '{{ $error ? 'border-red-500' : 'border-gray-300' }}'"
                style="min-height: 56px;"
            >
                @if($hasIconSlot)
                    <span class="text-gray-500 mr-2 shrink-0">{{ $icon }}</span>
                @endif

                <div class="relative flex-1">
                    {{-- Floating label sits on the border line when active (Material 3 style).
                         The label has a white bg + horizontal padding so it visually punches a
                         notch through the surrounding border. --}}
                    @if($floating && $label)
                        <span
                            class="absolute pointer-events-none transition-all duration-200 origin-left text-base text-gray-500 leading-none"
                            :style="{
                                top: (focused || hasValue) ? '-10px' : '50%',
                                transform: (focused || hasValue) ? 'translateY(0) scale(0.85)' : 'translateY(-50%) scale(1)',
                                color: focused ? '#3b82f6' : '#6b7280',
                                backgroundColor: (focused || hasValue) ? '#fff' : 'transparent',
                                padding: (focused || hasValue) ? '0 4px' : '0',
                                left: (focused || hasValue) ? '-4px' : '0'
                            }"
                        >
                            {{ $label }}@if($required) <span class="text-red-500">*</span>@endif
                        </span>
                    @endif

                    <input
                        type="{{ $type }}"
                        x-ref="input"
                        @if($name) name="{{ $name }}" @endif
                        value="{{ $value }}"
                        placeholder="{{ ($floating && $label) ? '' : $placeholder }}"
                        @if($required) required @endif
                        @if($disabled) disabled @endif
                        @focus="focused = true"
                        @blur="focused = false"
                        @input="sync($event)"
                        class="block w-full bg-transparent py-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none"
                    />
                </div>

                @if($clearable)
                    <button
                        type="button"
                        x-show="hasValue"
                        x-cloak
                        @click="$refs.input.value=''; $refs.input.dispatchEvent(new Event('input',{bubbles:true})); hasValue=false; $refs.input.focus()"
                        class="text-gray-400 active:opacity-60 ml-2 shrink-0"
                        aria-label="Clear"
                    >
                        <x-nativeblade-icon name="x-circle-fill" size="18" />
                    </button>
                @endif
            </div>

        @elseif($floating)
            {{-- Floating label without outline (Material filled style) --}}
            <div class="flex items-end bg-gray-100 rounded-t-lg px-3 pt-5 pb-2 border-b-2 transition-colors"
                :class="focused ? 'border-{{ $color }}' : '{{ $error ? 'border-red-500' : 'border-gray-300' }}'"
            >
                @if($hasIconSlot)
                    <span class="text-gray-500 mr-2 shrink-0 self-center">{{ $icon }}</span>
                @endif

                <div class="relative flex-1">
                    @if($label)
                        <span
                            class="absolute pointer-events-none transition-all duration-200 origin-left"
                            :style="{
                                top: (focused || hasValue) ? '-16px' : '0',
                                fontSize: (focused || hasValue) ? '11px' : '16px',
                                color: focused ? '#3b82f6' : '#6b7280'
                            }"
                        >
                            {{ $label }}@if($required) <span class="text-red-500">*</span>@endif
                        </span>
                    @endif

                    <input
                        type="{{ $type }}"
                        x-ref="input"
                        @if($name) name="{{ $name }}" @endif
                        value="{{ $value }}"
                        placeholder="{{ ($label) ? '' : $placeholder }}"
                        @if($required) required @endif
                        @if($disabled) disabled @endif
                        @focus="focused = true"
                        @blur="focused = false"
                        @input="sync($event)"
                        class="block w-full bg-transparent text-base text-gray-900 placeholder:text-gray-400 focus:outline-none"
                    />
                </div>

                @if($clearable)
                    <button
                        type="button"
                        x-show="hasValue"
                        x-cloak
                        @click="$refs.input.value=''; $refs.input.dispatchEvent(new Event('input',{bubbles:true})); hasValue=false; $refs.input.focus()"
                        class="text-gray-400 active:opacity-60 ml-2 shrink-0 self-center"
                        aria-label="Clear"
                    >
                        <x-nativeblade-icon name="x-circle-fill" size="18" />
                    </button>
                @endif
            </div>

        @else
            {{-- Standard input (no floating, no outline) --}}
            <div
                @class([
                    'flex items-center transition-colors',
                    'bg-white rounded-lg px-3 border' => $iosTheme,
                    'border-b-2 border-gray-300 px-1' => !$iosTheme,
                ])
                :class="focused ? '{{ $iosTheme ? "border-{$color}" : "border-{$color}" }}' : '{{ $error ? "border-red-500" : ($iosTheme ? "border-gray-200" : "border-gray-300") }}'"
            >
                @if($hasIconSlot)
                    <span class="text-gray-500 mr-2 shrink-0">{{ $icon }}</span>
                @endif

                <input
                    type="{{ $type }}"
                    x-ref="input"
                    @if($name) name="{{ $name }}" @endif
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @focus="focused = true"
                    @blur="focused = false"
                    @input="sync($event)"
                    class="block flex-1 bg-transparent {{ $iosTheme ? 'py-2.5' : 'py-2' }} text-base text-gray-900 placeholder:text-gray-400 focus:outline-none"
                />

                @if($clearable)
                    <button
                        type="button"
                        x-show="hasValue"
                        x-cloak
                        @click="$refs.input.value=''; $refs.input.dispatchEvent(new Event('input',{bubbles:true})); hasValue=false; $refs.input.focus()"
                        class="text-gray-400 active:opacity-60 ml-2 shrink-0"
                        aria-label="Clear"
                    >
                        <x-nativeblade-icon name="x-circle-fill" size="18" />
                    </button>
                @endif
            </div>
        @endif
    </div>

    {{-- Below: error / hint / info --}}
    @if($error)
        <div class="mt-1 px-1 flex items-center gap-1 text-red-500 text-xs">
            <x-nativeblade-icon name="warning-circle-fill" size="14" />
            <span>{{ $error }}</span>
        </div>
    @elseif($hint)
        <div class="mt-1 px-1 text-xs text-gray-500">{{ $hint }}</div>
    @endif

    @if($info)
        <div class="mt-1 px-1 text-xs text-gray-400">{{ $info }}</div>
    @endif
</label>
