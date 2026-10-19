<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return !h || h === key; };
        return {
            buttons: open('buttons'),
            inputs: open('inputs'),
            selects: open('selects'),
            multiselects: open('multiselects'),
            textareas: open('textareas'),
            checkboxes: open('checkboxes'),
            radios: open('radios'),
            toggles: open('toggles'),
            fieldsets: open('fieldsets'),
            copybuttons: open('copybuttons'),
        };
    })(),
    expandAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = true));
    },
    collapseAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = false));
    },
}">
    <x-basekit-ui::styleguide.section-controls />

    <!-- Buttons -->
    <x-basekit-ui::styleguide.section-toggle section="buttons" title="Buttons" description="Actions and triggers">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button variant="primary">Primary</x-basekit-ui::button>
                            <x-basekit-ui::button variant="secondary">Secondary</x-basekit-ui::button>
                            <x-basekit-ui::button variant="success">Success</x-basekit-ui::button>
                            <x-basekit-ui::button variant="danger">Danger</x-basekit-ui::button>
                            <x-basekit-ui::button variant="warning">Warning</x-basekit-ui::button>
                            <x-basekit-ui::button variant="info">Info</x-basekit-ui::button>
                            <x-basekit-ui::button variant="ghost">Ghost</x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button variant="primary">Primary</x-basekit-ui::button>
<x-basekit-ui::button variant="secondary">Secondary</x-basekit-ui::button>
<x-basekit-ui::button variant="success">Success</x-basekit-ui::button>
<x-basekit-ui::button variant="danger">Danger</x-basekit-ui::button>
<x-basekit-ui::button variant="warning">Warning</x-basekit-ui::button>
<x-basekit-ui::button variant="info">Info</x-basekit-ui::button>
<x-basekit-ui::button variant="ghost">Ghost</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button color="indigo-500">Indigo</x-basekit-ui::button>
                            <x-basekit-ui::button color="pink-500">Pink</x-basekit-ui::button>
                            <x-basekit-ui::button color="emerald-500">Emerald</x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button color="indigo-500">Indigo</x-basekit-ui::button>
<x-basekit-ui::button color="pink-500">Pink</x-basekit-ui::button>
<x-basekit-ui::button color="emerald-500">Emerald</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button size="sm">Small</x-basekit-ui::button>
                            <x-basekit-ui::button size="md">Medium</x-basekit-ui::button>
                            <x-basekit-ui::button size="lg">Large</x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button size="sm">Small</x-basekit-ui::button>
<x-basekit-ui::button size="md">Medium</x-basekit-ui::button>
<x-basekit-ui::button size="lg">Large</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">States</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button disabled>Disabled</x-basekit-ui::button>
                            <x-basekit-ui::button is-loading>Loading</x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button disabled>Disabled</x-basekit-ui::button>
<x-basekit-ui::button is-loading>Loading</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- With Icons -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">With Icons</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button icon="bell" icon-orientation="left">
                                With Heroicon
                            </x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button icon="bell" icon-orientation="left">
    With Heroicon
</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Rounded -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">Rounded</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button rounded="none">None</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="sm">Sm</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="md">Md</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="lg">Lg</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="xl">Xl</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="2xl">2xl</x-basekit-ui::button>
                            <x-basekit-ui::button rounded="full">Full</x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button rounded="none">None</x-basekit-ui::button>
<x-basekit-ui::button rounded="sm">Sm</x-basekit-ui::button>
<x-basekit-ui::button rounded="md">Md</x-basekit-ui::button>
<x-basekit-ui::button rounded="lg">Lg</x-basekit-ui::button>
<x-basekit-ui::button rounded="xl">Xl</x-basekit-ui::button>
<x-basekit-ui::button rounded="2xl">2xl</x-basekit-ui::button>
<x-basekit-ui::button rounded="full">Full</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- As Link -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">As Link</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::button href="https://github.com/basekit-laravel/basekit-laravel-ui"
                                variant="primary" icon="arrow-top-right-on-square">
                                Link Button
                            </x-basekit-ui::button>
                            <x-basekit-ui::button variant="secondary" as="a"
                                icon="arrow-top-right-on-square">
                                No Href
                            </x-basekit-ui::button>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::button href="https://github.com/basekit-laravel/basekit-laravel-ui"
    variant="primary" icon="arrow-top-right-on-square">
    Link Button
</x-basekit-ui::button>

<x-basekit-ui::button variant="secondary" as="a" icon="arrow-top-right-on-square">
    No Href
</x-basekit-ui::button>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Copy Buttons -->
    <x-basekit-ui::styleguide.section-toggle section="copybuttons" title="Copy Buttons" description="Copy content to clipboard">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="primary" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="secondary" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="success" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="danger" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="warning" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="info" />
                            <x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
                                copied-label="Copied!" variant="ghost" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="primary" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="secondary" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="success" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="danger" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="warning" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="info" />
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link"
    copied-label="Copied!" variant="ghost" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::copy-button value="secret-value" size="sm" label="Small"
                                copied-label="Copied!" />
                            <x-basekit-ui::copy-button value="secret-value" size="md" label="Medium"
                                copied-label="Copied!" />
                            <x-basekit-ui::copy-button value="secret-value" size="lg" label="Large"
                                copied-label="Copied!" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::copy-button value="secret-value" size="sm" label="Small"
    copied-label="Copied!" />
<x-basekit-ui::copy-button value="secret-value" size="md" label="Medium"
    copied-label="Copied!" />
<x-basekit-ui::copy-button value="secret-value" size="lg" label="Large"
    copied-label="Copied!" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Icons -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Icons</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::copy-button value="abc-123" icon="link" copied-icon="check-circle"
                                label="Copy token" copied-label="Copied!" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::copy-button value="abc-123" icon="link" copied-icon="check-circle"
    label="Copy token" copied-label="Copied!" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Inputs -->
    <x-basekit-ui::styleguide.section-toggle section="inputs" title="Form Inputs" description="Text field with labels and validation">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::input label="Primary" name="code_inp_variant_primary"
                                placeholder="Primary variant" variant="primary" />
                            <x-basekit-ui::input label="Secondary" name="code_inp_variant_secondary"
                                placeholder="Secondary variant" variant="secondary" />
                            <x-basekit-ui::input label="Success" name="code_inp_variant_success"
                                value="Valid input" variant="success" />
                            <x-basekit-ui::input label="Warning" name="code_inp_variant_warning"
                                value="Check this value" variant="warning" />
                            <x-basekit-ui::input label="Info" name="code_inp_variant_info"
                                placeholder="Info variant" variant="info" />
                            <x-basekit-ui::input label="Ghost" name="code_inp_variant_ghost"
                                placeholder="Ghost variant" variant="ghost" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Primary" name="variant_primary" placeholder="Primary variant"
    variant="primary" />
<x-basekit-ui::input label="Secondary" name="variant_secondary" placeholder="Secondary variant"
    variant="secondary" />
<x-basekit-ui::input label="Success" name="variant_success" value="Valid input"
    variant="success" />
<x-basekit-ui::input label="Warning" name="variant_warning" value="Check this value"
    variant="warning" />
<x-basekit-ui::input label="Info" name="variant_info" placeholder="Info variant"
    variant="info" />
<x-basekit-ui::input label="Ghost" name="variant_ghost" placeholder="Ghost variant"
    variant="ghost" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::input color="indigo-500" label="Custom"
                                name="code_inp_color_indigo" placeholder="Indigo" />
                            <x-basekit-ui::input color="pink-500" label="Custom"
                                name="code_inp_color_pink" placeholder="Pink" />
                            <x-basekit-ui::input color="emerald-500" label="Custom"
                                name="code_inp_color_emerald" placeholder="Emerald" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input color="indigo-500" label="Custom" name="color_indigo"
    placeholder="Indigo" />
<x-basekit-ui::input color="pink-500" label="Custom" name="color_pink"
    placeholder="Pink" />
<x-basekit-ui::input color="emerald-500" label="Custom" name="color_emerald"
    placeholder="Emerald" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::input label="Small Input" name="code_inp_size_sm" size="sm"
                                placeholder="Small size" />
                            <x-basekit-ui::input label="Medium Input (Default)" name="code_inp_size_md"
                                size="md" placeholder="Medium size" />
                            <x-basekit-ui::input label="Large Input" name="code_inp_size_lg" size="lg"
                                placeholder="Large size" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Small Input" name="size_sm" size="sm"
    placeholder="Small size" />
<x-basekit-ui::input label="Medium Input (Default)" name="size_md" size="md"
    placeholder="Medium size" />
<x-basekit-ui::input label="Large Input" name="size_lg" size="lg"
    placeholder="Large size" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::input label="Default State" name="code_inp_state_default"
                                placeholder="Enter text..." hint="Helper text goes here" />
                            <x-basekit-ui::input label="Disabled Input" name="code_inp_state_disabled"
                                value="Disabled value" disabled />
                            <x-basekit-ui::input label="Readonly Input" name="code_inp_state_readonly"
                                value="Readonly value" readonly />
                            <x-basekit-ui::input label="Error State" name="code_inp_state_error" value=""
                                error="This field is required" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Default State" name="state_default"
    placeholder="Enter text..." hint="Helper text goes here" />
<x-basekit-ui::input label="Disabled Input" name="state_disabled"
    value="Disabled value" disabled />
<x-basekit-ui::input label="Readonly Input" name="state_readonly"
    value="Readonly value" readonly />
<x-basekit-ui::input label="Error State" name="state_error" value=""
    error="This field is required" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Input Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Input Variations</h4>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::input label="Amount" name="code_inp_corner_hint"
                                placeholder="0.00" corner-hint="USD" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::input label="Amount" name="amount" placeholder="0.00"
    corner-hint="USD" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Underline Input</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::input label="Website" name="code_inp_underline"
                                placeholder="example.com" control-style="underline" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::input label="Website" name="underline_input" placeholder="example.com"
    control-style="underline" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::input label="Company" name="code_inp_inset"
                                placeholder="Acme Inc." label-style="inset" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::input label="Company" name="inset_label" placeholder="Acme Inc."
    label-style="inset" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::input label="Username" name="code_inp_overlap"
                                placeholder="jane.doe" label-style="overlap" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::input label="Username" name="overlap_label" placeholder="jane.doe"
    label-style="overlap" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Pill Input</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::input name="code_inp_pill" placeholder="Search..."
                                control-style="pill" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::input name="pill_input" placeholder="Search..."
    control-style="pill" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>
            </div>

            <!-- Input Addons -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Input Addons</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 gap-6">
                            <x-basekit-ui::input label="Website (Prefix)" name="code_inp_addon_prefix"
                                placeholder="example.com">
                                <x-slot name="prefix">https://</x-slot>
                            </x-basekit-ui::input>
                            <x-basekit-ui::input label="Price (Prefix)" name="code_inp_addon_currency"
                                placeholder="0.00">
                                <x-slot name="prefix">$</x-slot>
                            </x-basekit-ui::input>
                            <x-basekit-ui::input label="Email (Suffix)" name="code_inp_addon_suffix"
                                placeholder="username">
                                <x-slot name="suffix">@gmail.com</x-slot>
                            </x-basekit-ui::input>
                            <x-basekit-ui::input label="Double Addon" name="code_inp_addon_both"
                                placeholder="0.00">
                                <x-slot name="prefix">$</x-slot>
                                <x-slot name="suffix">USD</x-slot>
                            </x-basekit-ui::input>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Website (Prefix)" name="addon_prefix"
    placeholder="example.com">
    <x-slot name="prefix">https://</x-slot>
</x-basekit-ui::input>

<x-basekit-ui::input label="Price (Prefix)" name="addon_currency"
    placeholder="0.00">
    <x-slot name="prefix">$</x-slot>
</x-basekit-ui::input>

<x-basekit-ui::input label="Email (Suffix)" name="addon_suffix"
    placeholder="username">
    <x-slot name="suffix">@gmail.com</x-slot>
</x-basekit-ui::input>

<x-basekit-ui::input label="Double Addon" name="addon_both"
    placeholder="0.00">
    <x-slot name="prefix">$</x-slot>
    <x-slot name="suffix">USD</x-slot>
</x-basekit-ui::input>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Masked Inputs -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Masked Inputs</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 gap-6">
                            <x-basekit-ui::input label="Phone" name="code_inp_mask_phone"
                                mask="(###) ###-####" placeholder="(555) 123-4567" />
                            <x-basekit-ui::input label="Card" name="code_inp_mask_card"
                                mask="#### #### #### ####" placeholder="4242 4242 4242 4242" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Phone" name="mask_phone" mask="(###) ###-####"
    placeholder="(555) 123-4567" />
<x-basekit-ui::input label="Card" name="mask_card"
    mask="#### #### #### ####" placeholder="4242 4242 4242 4242" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Inputs with Icons -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Inputs with Icons</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::input label="Search" name="code_inp_icon_search"
                                icon="magnifying-glass" placeholder="Search..." />
                            <x-basekit-ui::input label="Email" name="code_inp_icon_email"
                                icon="envelope" placeholder="you@example.com" />
                            <x-basekit-ui::input label="Phone" name="code_inp_icon_phone"
                                icon="phone" placeholder="+1 (555) 000-0000"
                                mask="+1 (###) ###-####" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Search" name="icon_search" icon="magnifying-glass"
    placeholder="Search..." />
<x-basekit-ui::input label="Email" name="icon_email" icon="envelope"
    placeholder="you@example.com" />
<x-basekit-ui::input label="Phone" name="icon_phone" icon="phone"
    placeholder="+1 (555) 000-0000" mask="+1 (###) ###-####" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Password Input</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::input label="Password" name="code_inp_password" type="password"
                            icon="lock-closed" placeholder="Password" :is-toggle-password="true" />
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Password" name="password" type="password"
    icon="lock-closed" placeholder="Password" :is-toggle-password="true" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Number Input -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Number Input</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::input label="Quantity" name="code_inp_number" type="number"
                            value="1" min="0" max="100" class="w-32" />
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::input label="Quantity" name="qty" type="number" value="1"
    min="0" max="100" class="w-32" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Selects -->
    <x-basekit-ui::styleguide.section-toggle section="selects" title="Form Selects" description="Single-value dropdown selector">
        <div class="space-y-8">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::select label="Primary" name="code_sel_variant_primary"
                                variant="primary" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::select label="Secondary" name="code_sel_variant_secondary"
                                variant="secondary" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::select label="Success" name="code_sel_variant_success"
                                variant="success" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
                                value="opt1" />
                            <x-basekit-ui::select label="Warning" name="code_sel_variant_warning"
                                variant="warning" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
                                value="opt1" />
                            <x-basekit-ui::select label="Info" name="code_sel_variant_info"
                                variant="info" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::select label="Ghost" name="code_sel_variant_ghost"
                                variant="ghost" placeholder="Choose an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::select label="Primary" name="select_variant_primary" variant="primary"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::select label="Secondary" name="select_variant_secondary" variant="secondary"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::select label="Success" name="select_variant_success" variant="success"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
    value="opt1" />
<x-basekit-ui::select label="Warning" name="select_variant_warning" variant="warning"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
    value="opt1" />
<x-basekit-ui::select label="Info" name="select_variant_info" variant="info"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::select label="Ghost" name="select_variant_ghost" variant="ghost"
    placeholder="Choose an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::select color="indigo-500" label="Custom"
                                name="code_sel_color_indigo" placeholder="Indigo"
                                :options="['a' => 'A', 'b' => 'B']" />
                            <x-basekit-ui::select color="pink-500" label="Custom"
                                name="code_sel_color_pink" placeholder="Pink"
                                :options="['a' => 'A', 'b' => 'B']" />
                            <x-basekit-ui::select color="emerald-500" label="Custom"
                                name="code_sel_color_emerald" placeholder="Emerald"
                                :options="['a' => 'A', 'b' => 'B']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::select color="indigo-500" label="Custom" name="sel_color_indigo"
    placeholder="Indigo" :options="['a' => 'A', 'b' => 'B']" />
<x-basekit-ui::select color="pink-500" label="Custom" name="sel_color_pink"
    placeholder="Pink" :options="['a' => 'A', 'b' => 'B']" />
<x-basekit-ui::select color="emerald-500" label="Custom" name="sel_color_emerald"
    placeholder="Emerald" :options="['a' => 'A', 'b' => 'B']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::select label="Small Select" name="code_sel_size_sm" size="sm"
                                placeholder="Choose an option"
                                :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                            <x-basekit-ui::select label="Medium Select (Default)"
                                name="code_sel_size_md" size="md" placeholder="Choose an option"
                                :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                            <x-basekit-ui::select label="Large Select" name="code_sel_size_lg" size="lg"
                                placeholder="Choose an option"
                                :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::select label="Small Select" name="select_size_sm" size="sm"
    placeholder="Choose an option"
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
<x-basekit-ui::select label="Medium Select (Default)" name="select_size_md" size="md"
    placeholder="Choose an option"
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
<x-basekit-ui::select label="Large Select" name="select_size_lg" size="lg"
    placeholder="Choose an option"
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::select label="Default State" name="code_sel_state_default"
                                placeholder="Select an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
                                hint="Helper text goes here" />
                            <x-basekit-ui::select label="Disabled State" name="code_sel_state_disabled"
                                placeholder="Select an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
                                disabled />
                            <x-basekit-ui::select label="Error State" name="code_sel_state_error"
                                placeholder="Select an option"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
                                error="This field is required" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::select label="Default State" name="select_default"
    placeholder="Select an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
    hint="Helper text goes here" />
<x-basekit-ui::select label="Disabled State" name="select_disabled"
    placeholder="Select an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
    disabled />
<x-basekit-ui::select label="Error State" name="select_error"
    placeholder="Select an option"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']"
    error="This field is required" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Select Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Select Variations</h4>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::select label="Region" name="code_sel_corner_hint"
                                corner-hint="Optional" placeholder="Select a region"
                                :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::select label="Region" name="select_corner" corner-hint="Optional"
    placeholder="Select a region"
    :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Underline</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::select label="Underline Select" name="code_sel_underline"
                                control-style="underline" placeholder="Select an option"
                                :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::select label="Underline Select" name="select_underline"
    control-style="underline" placeholder="Select an option"
    :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::select label="Department" name="code_sel_inset"
                                label-style="inset" placeholder="Select department"
                                :options="['product' => 'Product', 'sales' => 'Sales', 'support' => 'Support']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::select label="Department" name="select_inset" label-style="inset"
    placeholder="Select department"
    :options="['product' => 'Product', 'sales' => 'Sales', 'support' => 'Support']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::select label="Role" name="code_sel_overlap"
                                label-style="overlap" placeholder="Select role"
                                :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::select label="Role" name="select_overlap" label-style="overlap"
    placeholder="Select role"
    :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Pill Select</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::select name="code_sel_pill" control-style="pill"
                                placeholder="Select status"
                                :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::select name="select_pill" control-style="pill"
    placeholder="Select status"
    :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>
            </div>

            <!-- Select with Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Select with Icon</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 gap-6">
                            <x-basekit-ui::select label="Country" name="code_sel_icon"
                                icon="globe-alt" placeholder="Select a country"
                                :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::select label="Country" name="select_icon" icon="globe-alt"
    placeholder="Select a country"
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Multi Selects -->
    <x-basekit-ui::styleguide.section-toggle section="multiselects" title="Multi Selects" description="Multi-value dropdown selector">
        <div class="space-y-8">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::multi-select label="Primary"
                                name="code_msel_variant_primary" variant="primary"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::multi-select label="Secondary"
                                name="code_msel_variant_secondary" variant="secondary"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::multi-select label="Success"
                                name="code_msel_variant_success" variant="success"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::multi-select label="Warning"
                                name="code_msel_variant_warning" variant="warning"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::multi-select label="Info"
                                name="code_msel_variant_info" variant="info"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                            <x-basekit-ui::multi-select label="Ghost"
                                name="code_msel_variant_ghost" variant="ghost"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::multi-select label="Primary" name="multiselect_variant_primary"
    variant="primary" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::multi-select label="Secondary" name="multiselect_variant_secondary"
    variant="secondary" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::multi-select label="Success" name="multiselect_variant_success"
    variant="success" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::multi-select label="Warning" name="multiselect_variant_warning"
    variant="warning" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::multi-select label="Info" name="multiselect_variant_info"
    variant="info" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
<x-basekit-ui::multi-select label="Ghost" name="multiselect_variant_ghost"
    variant="ghost" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::multi-select color="indigo-500" label="Custom"
                                name="code_msel_color_indigo" placeholder="Indigo"
                                :options="['a' => 'A', 'b' => 'B']" />
                            <x-basekit-ui::multi-select color="pink-500" label="Custom"
                                name="code_msel_color_pink" placeholder="Pink"
                                :options="['a' => 'A', 'b' => 'B']" />
                            <x-basekit-ui::multi-select color="emerald-500" label="Custom"
                                name="code_msel_color_emerald" placeholder="Emerald"
                                :options="['a' => 'A', 'b' => 'B']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::multi-select color="indigo-500" label="Custom"
    name="msel_color_indigo" placeholder="Indigo"
    :options="['a' => 'A', 'b' => 'B']" />
<x-basekit-ui::multi-select color="pink-500" label="Custom"
    name="msel_color_pink" placeholder="Pink"
    :options="['a' => 'A', 'b' => 'B']" />
<x-basekit-ui::multi-select color="emerald-500" label="Custom"
    name="msel_color_emerald" placeholder="Emerald"
    :options="['a' => 'A', 'b' => 'B']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::multi-select label="Small Multi Select"
                                name="code_msel_size_sm" size="sm" placeholder="Select tags"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                            <x-basekit-ui::multi-select label="Medium Multi Select"
                                name="code_msel_size_md" size="md" placeholder="Select tags"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                            <x-basekit-ui::multi-select label="Large Multi Select"
                                name="code_msel_size_lg" size="lg" placeholder="Select tags"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::multi-select label="Small Multi Select" name="multiselect_size_sm"
    size="sm" placeholder="Select tags"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
<x-basekit-ui::multi-select label="Medium Multi Select" name="multiselect_size_md"
    size="md" placeholder="Select tags"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
<x-basekit-ui::multi-select label="Large Multi Select" name="multiselect_size_lg"
    size="lg" placeholder="Select tags"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::multi-select label="Default State"
                                name="code_msel_state_default" placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']"
                                hint="Helper text goes here" />
                            <x-basekit-ui::multi-select label="Disabled State"
                                name="code_msel_state_disabled" disabled placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                            <x-basekit-ui::multi-select label="Error State"
                                name="code_msel_state_error" error="This field is required"
                                placeholder="Select options"
                                :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                            <x-basekit-ui::multi-select label="Preselected"
                                name="code_msel_state_preselected" placeholder="Select tags"
                                :options="[
                                    'design' => 'Design',
                                    'dev' => 'Development',
                                    'ops' => 'Operations',
                                    'sales' => 'Sales',
                                ]" :value="['design', 'ops']" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::multi-select label="Default State" name="multiselect_default"
    placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']"
    hint="Helper text goes here" />
<x-basekit-ui::multi-select label="Disabled State" name="multiselect_disabled"
    disabled placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
<x-basekit-ui::multi-select label="Error State" name="multiselect_error"
    error="This field is required" placeholder="Select options"
    :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
<x-basekit-ui::multi-select label="Preselected" name="multiselect_tags"
    placeholder="Select tags"
    :options="[
        'design' => 'Design',
        'dev' => 'Development',
        'ops' => 'Operations',
        'sales' => 'Sales',
    ]" :value="['design', 'ops']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Multi Select Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Multi Select Variations</h4>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Regions"
                                name="code_msel_corner_hint" corner-hint="Optional"
                                placeholder="Select regions"
                                :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Regions" name="multiselect_corner"
    corner-hint="Optional" placeholder="Select regions"
    :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Underline</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Underline Multi Select"
                                name="code_msel_underline" control-style="underline"
                                placeholder="Select tiers"
                                :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Underline Multi Select"
    name="multiselect_underline" control-style="underline"
    placeholder="Select tiers"
    :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Teams" name="code_msel_inset"
                                label-style="inset" placeholder="Select teams"
                                :options="['core' => 'Core', 'infra' => 'Infrastructure', 'growth' => 'Growth']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Teams" name="multiselect_inset"
    label-style="inset" placeholder="Select teams"
    :options="['core' => 'Core', 'infra' => 'Infrastructure', 'growth' => 'Growth']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Roles" name="code_msel_overlap"
                                label-style="overlap" placeholder="Select roles"
                                :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Roles" name="multiselect_overlap"
    label-style="overlap" placeholder="Select roles"
    :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Pill</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Status" name="code_msel_pill"
                                control-style="pill" placeholder="Select status"
                                :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Status" name="multiselect_pill"
    control-style="pill" placeholder="Select status"
    :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">With Icon</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::multi-select label="Locations" name="code_msel_icon"
                                icon="map-pin" placeholder="Select locations"
                                :options="['ny' => 'New York', 'sf' => 'San Francisco', 'ldn' => 'London']" />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::multi-select label="Locations" name="multiselect_icon"
    icon="map-pin" placeholder="Select locations"
    :options="['ny' => 'New York', 'sf' => 'San Francisco', 'ldn' => 'London']" />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Textareas -->
    <x-basekit-ui::styleguide.section-toggle section="textareas" title="Form Textareas" description="Multi-line text input">
        <div class="space-y-8">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::textarea label="Primary" name="code_ta_variant_primary"
                                variant="primary" rows="3" placeholder="Primary variant" />
                            <x-basekit-ui::textarea label="Secondary" name="code_ta_variant_secondary"
                                variant="secondary" rows="3" placeholder="Secondary variant" />
                            <x-basekit-ui::textarea label="Success" name="code_ta_variant_success"
                                value="Valid input" variant="success" rows="3" />
                            <x-basekit-ui::textarea label="Warning" name="code_ta_variant_warning"
                                value="Check this value" variant="warning" rows="3" />
                            <x-basekit-ui::textarea label="Info" name="code_ta_variant_info"
                                variant="info" rows="3" placeholder="Info variant" />
                            <x-basekit-ui::textarea label="Ghost" name="code_ta_variant_ghost"
                                variant="ghost" rows="3" placeholder="Ghost variant" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::textarea label="Primary" name="ta_variant_primary" variant="primary"
    rows="3" placeholder="Primary variant" />
<x-basekit-ui::textarea label="Secondary" name="ta_variant_secondary" variant="secondary"
    rows="3" placeholder="Secondary variant" />
<x-basekit-ui::textarea label="Success" name="ta_variant_success" value="Valid input"
    variant="success" rows="3" />
<x-basekit-ui::textarea label="Warning" name="ta_variant_warning"
    value="Check this value" variant="warning" rows="3" />
<x-basekit-ui::textarea label="Info" name="ta_variant_info" variant="info" rows="3"
    placeholder="Info variant" />
<x-basekit-ui::textarea label="Ghost" name="ta_variant_ghost" variant="ghost" rows="3"
    placeholder="Ghost variant" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::textarea color="indigo-500" label="Custom"
                                name="code_ta_color_indigo" placeholder="Indigo" rows="2" />
                            <x-basekit-ui::textarea color="pink-500" label="Custom"
                                name="code_ta_color_pink" placeholder="Pink" rows="2" />
                            <x-basekit-ui::textarea color="emerald-500" label="Custom"
                                name="code_ta_color_emerald" placeholder="Emerald" rows="2" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::textarea color="indigo-500" label="Custom" name="ta_color_indigo"
    placeholder="Indigo" rows="2" />
<x-basekit-ui::textarea color="pink-500" label="Custom" name="ta_color_pink"
    placeholder="Pink" rows="2" />
<x-basekit-ui::textarea color="emerald-500" label="Custom" name="ta_color_emerald"
    placeholder="Emerald" rows="2" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-3 gap-6">
                            <x-basekit-ui::textarea label="Small Textarea" name="code_ta_size_sm"
                                size="sm" rows="3" placeholder="Small textarea" />
                            <x-basekit-ui::textarea label="Medium Textarea (Default)"
                                name="code_ta_size_md" size="md" rows="4"
                                placeholder="Medium textarea" />
                            <x-basekit-ui::textarea label="Large Textarea" name="code_ta_size_lg"
                                size="lg" rows="6" placeholder="Large textarea" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::textarea label="Small Textarea" name="ta_size_sm" size="sm" rows="3"
    placeholder="Small textarea" />
<x-basekit-ui::textarea label="Medium Textarea (Default)" name="ta_size_md" size="md"
    rows="4" placeholder="Medium textarea" />
<x-basekit-ui::textarea label="Large Textarea" name="ta_size_lg" size="lg" rows="6"
    placeholder="Large textarea" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <x-basekit-ui::textarea label="Default State" name="code_ta_state_default"
                                rows="4" placeholder="Enter text..."
                                hint="Helper text goes here" />
                            <x-basekit-ui::textarea label="Disabled Textarea"
                                name="code_ta_state_disabled" rows="4" value="Disabled value"
                                disabled />
                            <x-basekit-ui::textarea label="Readonly Textarea"
                                name="code_ta_state_readonly" rows="4" value="Readonly value"
                                readonly />
                            <x-basekit-ui::textarea label="Error State" name="code_ta_state_error"
                                rows="4" error="This field is required" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::textarea label="Default State" name="ta_default" rows="4"
    placeholder="Enter text..." hint="Helper text goes here" />
<x-basekit-ui::textarea label="Disabled Textarea" name="ta_disabled" rows="4"
    value="Disabled value" disabled />
<x-basekit-ui::textarea label="Readonly Textarea" name="ta_readonly" rows="4"
    value="Readonly value" readonly />
<x-basekit-ui::textarea label="Error State" name="ta_error" rows="4"
    error="This field is required" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Textarea Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Textarea Variations</h4>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::textarea label="Description" name="code_ta_corner_hint"
                                rows="4" corner-hint="Optional"
                                placeholder="Enter description..." />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::textarea label="Description" name="ta_corner" rows="4"
    corner-hint="Optional" placeholder="Enter description..." />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Underline Textarea</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::textarea label="Notes" name="code_ta_underline"
                                rows="4" control-style="underline"
                                placeholder="Enter your notes here..." />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::textarea label="Notes" name="ta_underline" rows="4"
    control-style="underline" placeholder="Enter your notes here..." />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::textarea label="Company bio" name="code_ta_inset"
                                rows="4" label-style="inset"
                                placeholder="Tell us about your company..." />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::textarea label="Company bio" name="ta_inset" rows="4"
    label-style="inset" placeholder="Tell us about your company..." />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                    <x-basekit-ui::styleguide.code-example>
                        <x-slot:preview>
                            <x-basekit-ui::textarea label="Bio" name="code_ta_overlap"
                                rows="4" label-style="overlap"
                                placeholder="Tell us about yourself..." />
                        </x-slot:preview>
                        @verbatim
<x-basekit-ui::textarea label="Bio" name="ta_overlap" rows="4"
    label-style="overlap" placeholder="Tell us about yourself..." />
                        @endverbatim
                    </x-basekit-ui::styleguide.code-example>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Checkboxes -->
    <x-basekit-ui::styleguide.section-toggle section="checkboxes" title="Form Checkboxes" description="Binary choice input">
        <div class="space-y-6">
            <!-- Grouped -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Grouped</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset label="Checkbox variants">
                                <x-basekit-ui::checkbox name="code_ckx_primary" label="Primary"
                                    variant="primary" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_secondary" label="Secondary"
                                    variant="secondary" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_success" label="Success"
                                    variant="success" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_warning" label="Warning"
                                    variant="warning" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_danger" label="Danger"
                                    variant="danger" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_info" label="Info"
                                    variant="info" is-checked />
                                <x-basekit-ui::checkbox name="code_ckx_ghost" label="Ghost"
                                    variant="ghost" is-checked />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset label="Checkbox variants">
    <x-basekit-ui::checkbox name="ckx_primary" label="Primary" variant="primary"
        is-checked />
    <x-basekit-ui::checkbox name="ckx_secondary" label="Secondary"
        variant="secondary" is-checked />
    <x-basekit-ui::checkbox name="ckx_success" label="Success" variant="success"
        is-checked />
    <x-basekit-ui::checkbox name="ckx_warning" label="Warning" variant="warning"
        is-checked />
    <x-basekit-ui::checkbox name="ckx_danger" label="Danger" variant="danger"
        is-checked />
    <x-basekit-ui::checkbox name="ckx_info" label="Info" variant="info"
        is-checked />
    <x-basekit-ui::checkbox name="ckx_ghost" label="Ghost" variant="ghost"
        is-checked />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::checkbox color="indigo-500" name="code_ckx_color_indigo"
                                label="Indigo" is-checked />
                            <x-basekit-ui::checkbox color="pink-500" name="code_ckx_color_pink"
                                label="Pink" is-checked />
                            <x-basekit-ui::checkbox color="emerald-500" name="code_ckx_color_emerald"
                                label="Emerald" is-checked />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::checkbox color="indigo-500" name="ckx_color_indigo" label="Indigo"
    is-checked />
<x-basekit-ui::checkbox color="pink-500" name="ckx_color_pink" label="Pink"
    is-checked />
<x-basekit-ui::checkbox color="emerald-500" name="ckx_color_emerald" label="Emerald"
    is-checked />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Checkbox sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset>
                                <x-basekit-ui::checkbox name="code_ckx_size_sm" label="Small"
                                    size="sm" />
                                <x-basekit-ui::checkbox name="code_ckx_size_md" label="Medium"
                                    size="md" />
                                <x-basekit-ui::checkbox name="code_ckx_size_lg" label="Large"
                                    size="lg" />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::checkbox name="ckx_sm" label="Small" size="sm" />
    <x-basekit-ui::checkbox name="ckx_md" label="Medium" size="md" />
    <x-basekit-ui::checkbox name="ckx_lg" label="Large" size="lg" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Standalone States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::checkbox name="code_ckx_state_unchecked"
                                label="Unchecked" />
                            <x-basekit-ui::checkbox name="code_ckx_state_checked"
                                label="Checked" is-checked />
                            <x-basekit-ui::checkbox name="code_ckx_state_disabled"
                                label="Disabled" disabled />
                            <x-basekit-ui::checkbox name="code_ckx_state_disabled_checked"
                                label="Disabled & Checked" is-checked disabled />
                            <x-basekit-ui::checkbox name="code_ckx_state_error"
                                label="With Error" error="This is required" />
                            <x-basekit-ui::checkbox name="code_ckx_state_hint"
                                label="With Hint" hint="This is a helpful hint" />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::checkbox name="ckx_unchecked" label="Unchecked" />
    <x-basekit-ui::checkbox name="ckx_checked" label="Checked" is-checked />
    <x-basekit-ui::checkbox name="ckx_disabled" label="Disabled" disabled />
    <x-basekit-ui::checkbox name="ckx_disabled_checked" label="Disabled & Checked"
        is-checked disabled />
    <x-basekit-ui::checkbox name="ckx_error" label="With Error"
        error="This is required" />
    <x-basekit-ui::checkbox name="ckx_hint" label="With Hint"
        hint="This is a helpful hint" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Radios -->
    <x-basekit-ui::styleguide.section-toggle section="radios" title="Form Radios" description="Single choice from options">
        <div class="space-y-6">
            <!-- Grouped -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Grouped</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset label="Radio variants">
                                <x-basekit-ui::radio name="code_radio_variants" value="primary"
                                    label="Primary" variant="primary" is-checked />
                                <x-basekit-ui::radio name="code_radio_variants" value="secondary"
                                    label="Secondary" variant="secondary" />
                                <x-basekit-ui::radio name="code_radio_variants" value="success"
                                    label="Success" variant="success" />
                                <x-basekit-ui::radio name="code_radio_variants" value="warning"
                                    label="Warning" variant="warning" />
                                <x-basekit-ui::radio name="code_radio_variants" value="danger"
                                    label="Danger" variant="danger" />
                                <x-basekit-ui::radio name="code_radio_variants" value="info"
                                    label="Info" variant="info" />
                                <x-basekit-ui::radio name="code_radio_variants" value="ghost"
                                    label="Ghost" variant="ghost" />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset label="Radio variants">
    <x-basekit-ui::radio name="radio_variants" value="primary" label="Primary"
        variant="primary" is-checked />
    <x-basekit-ui::radio name="radio_variants" value="secondary" label="Secondary"
        variant="secondary" />
    <x-basekit-ui::radio name="radio_variants" value="success" label="Success"
        variant="success" />
    <x-basekit-ui::radio name="radio_variants" value="warning" label="Warning"
        variant="warning" />
    <x-basekit-ui::radio name="radio_variants" value="danger" label="Danger"
        variant="danger" />
    <x-basekit-ui::radio name="radio_variants" value="info" label="Info"
        variant="info" />
    <x-basekit-ui::radio name="radio_variants" value="ghost" label="Ghost"
        variant="ghost" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-basekit-ui::radio color="indigo-500" name="code_radio_color"
                                value="indigo" label="Indigo" is-checked />
                            <x-basekit-ui::radio color="pink-500" name="code_radio_color"
                                value="pink" label="Pink" />
                            <x-basekit-ui::radio color="emerald-500" name="code_radio_color"
                                value="emerald" label="Emerald" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::radio color="indigo-500" name="radio_color" value="indigo"
    label="Indigo" is-checked />
<x-basekit-ui::radio color="pink-500" name="radio_color" value="pink"
    label="Pink" />
<x-basekit-ui::radio color="emerald-500" name="radio_color" value="emerald"
    label="Emerald" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Radio sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset>
                                <x-basekit-ui::radio name="code_radio_sizes" value="sm"
                                    label="Small" size="sm" />
                                <x-basekit-ui::radio name="code_radio_sizes" value="md"
                                    label="Medium" size="md" />
                                <x-basekit-ui::radio name="code_radio_sizes" value="lg"
                                    label="Large" size="lg" />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::radio name="radio_sizes" value="sm" label="Small" size="sm" />
    <x-basekit-ui::radio name="radio_sizes" value="md" label="Medium" size="md" />
    <x-basekit-ui::radio name="radio_sizes" value="lg" label="Large" size="lg" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Standalone States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::radio name="code_radio_state" value="unchecked"
                                label="Unchecked" />
                            <x-basekit-ui::radio name="code_radio_state" value="checked"
                                label="Checked" is-checked />
                            <x-basekit-ui::radio name="code_radio_state" value="disabled"
                                label="Disabled" disabled />
                            <x-basekit-ui::radio name="code_radio_state_disabled" value="checked_disabled"
                                label="Disabled & Checked" is-checked disabled />
                            <x-basekit-ui::radio name="code_radio_state" value="error"
                                label="With Error" error="Please select an option" />
                            <x-basekit-ui::radio name="code_radio_state" value="hint"
                                label="With Hint" hint="Select the option that applies" />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::radio name="radio_group" value="unchecked" label="Unchecked" />
    <x-basekit-ui::radio name="radio_group" value="checked" label="Checked"
        is-checked />
    <x-basekit-ui::radio name="radio_group" value="disabled" label="Disabled"
        disabled />
    <x-basekit-ui::radio name="radio_group_disabled" value="checked_disabled"
        label="Disabled & Checked" is-checked disabled />
    <x-basekit-ui::radio name="radio_group" value="error" label="With Error"
        error="Please select an option" />
    <x-basekit-ui::radio name="radio_group" value="hint" label="With Hint"
        hint="Select the option that applies" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Groups (Fieldset) -->
    <x-basekit-ui::styleguide.section-toggle section="fieldsets" title="Form Groups" description="Grouped form controls">
        <div class="space-y-6">
            <!-- Radio Group -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Radio Group</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset label="Billing cycle"
                                hint="Choose how often you are billed">
                                <x-basekit-ui::radio name="code_fs_billing" value="monthly"
                                    label="Monthly" is-checked />
                                <x-basekit-ui::radio name="code_fs_billing" value="yearly"
                                    label="Yearly (save 20%)" />
                                <x-basekit-ui::radio name="code_fs_billing" value="lifetime"
                                    label="Lifetime" />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset label="Billing cycle"
    hint="Choose how often you are billed">
    <x-basekit-ui::radio name="fieldset_billing" value="monthly" label="Monthly"
        is-checked />
    <x-basekit-ui::radio name="fieldset_billing" value="yearly"
        label="Yearly (save 20%)" />
    <x-basekit-ui::radio name="fieldset_billing" value="lifetime" label="Lifetime" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Checkbox Group with Error -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Checkbox Group with Error</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset label="Topics"
                                error="Please select at least one topic">
                                <x-basekit-ui::checkbox name="code_fs_topics" value="security"
                                    label="Security" />
                                <x-basekit-ui::checkbox name="code_fs_topics" value="releases"
                                    label="Releases" />
                                <x-basekit-ui::checkbox name="code_fs_topics" value="product"
                                    label="Product news" />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset label="Topics"
    error="Please select at least one topic">
    <x-basekit-ui::checkbox name="fieldset_topics" value="security" label="Security" />
    <x-basekit-ui::checkbox name="fieldset_topics" value="releases" label="Releases" />
    <x-basekit-ui::checkbox name="fieldset_topics" value="product"
        label="Product news" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Toggle Group -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Toggle Group</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="max-w-md">
                            <x-basekit-ui::fieldset label="Notifications"
                                hint="Choose which emails you receive">
                                <x-basekit-ui::toggle name="code_fs_toggle_marketing"
                                    label="Marketing emails" />
                                <x-basekit-ui::toggle name="code_fs_toggle_security"
                                    label="Security alerts" is-checked />
                                <x-basekit-ui::toggle name="code_fs_toggle_product"
                                    label="Product news" is-checked />
                            </x-basekit-ui::fieldset>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset label="Notifications"
    hint="Choose which emails you receive">
    <x-basekit-ui::toggle name="fieldset_marketing" label="Marketing emails" />
    <x-basekit-ui::toggle name="fieldset_security" label="Security alerts"
        is-checked />
    <x-basekit-ui::toggle name="fieldset_product" label="Product news"
        is-checked />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Toggles -->
    <x-basekit-ui::styleguide.section-toggle section="toggles" title="Form Toggles" description="On/off switch control">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::toggle name="code_toggle_primary" label="Primary"
                                variant="primary" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_secondary" label="Secondary"
                                variant="secondary" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_success" label="Success"
                                variant="success" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_warning" label="Warning"
                                variant="warning" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_danger" label="Danger"
                                variant="danger" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_info" label="Info"
                                variant="info" is-checked />
                            <x-basekit-ui::toggle name="code_toggle_ghost" label="Ghost"
                                variant="ghost" is-checked />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::toggle name="toggle_primary" label="Primary" variant="primary"
        is-checked />
    <x-basekit-ui::toggle name="toggle_secondary" label="Secondary"
        variant="secondary" is-checked />
    <x-basekit-ui::toggle name="toggle_success" label="Success" variant="success"
        is-checked />
    <x-basekit-ui::toggle name="toggle_warning" label="Warning" variant="warning"
        is-checked />
    <x-basekit-ui::toggle name="toggle_danger" label="Danger" variant="danger"
        is-checked />
    <x-basekit-ui::toggle name="toggle_info" label="Info" variant="info"
        is-checked />
    <x-basekit-ui::toggle name="toggle_ghost" label="Ghost" variant="ghost"
        is-checked />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Custom Colors -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Colors</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::toggle color="indigo-500"
                                name="code_toggle_color_indigo" label="Indigo" is-checked />
                            <x-basekit-ui::toggle color="pink-500"
                                name="code_toggle_color_pink" label="Pink" is-checked />
                            <x-basekit-ui::toggle color="emerald-500"
                                name="code_toggle_color_emerald" label="Emerald" is-checked />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::toggle color="indigo-500" name="toggle_color_indigo"
        label="Indigo" is-checked />
    <x-basekit-ui::toggle color="pink-500" name="toggle_color_pink"
        label="Pink" is-checked />
    <x-basekit-ui::toggle color="emerald-500" name="toggle_color_emerald"
        label="Emerald" is-checked />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::toggle name="code_toggle_size_sm" label="Small"
                                size="sm" />
                            <x-basekit-ui::toggle name="code_toggle_size_md" label="Medium"
                                size="md" />
                            <x-basekit-ui::toggle name="code_toggle_size_lg" label="Large"
                                size="lg" />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::toggle name="toggle_sm" label="Small" size="sm" />
    <x-basekit-ui::toggle name="toggle_md" label="Medium" size="md" />
    <x-basekit-ui::toggle name="toggle_lg" label="Large" size="lg" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::fieldset>
                            <x-basekit-ui::toggle name="code_toggle_state_off" label="Off" />
                            <x-basekit-ui::toggle name="code_toggle_state_on" label="On"
                                is-checked />
                            <x-basekit-ui::toggle name="code_toggle_state_disabled"
                                label="Disabled" disabled />
                            <x-basekit-ui::toggle name="code_toggle_state_disabled_on"
                                label="Disabled & On" is-checked disabled />
                            <x-basekit-ui::toggle name="code_toggle_state_error"
                                label="With Error" error="This setting is required" />
                            <x-basekit-ui::toggle name="code_toggle_state_hint"
                                label="With Hint" hint="Enable to activate this feature" />
                        </x-basekit-ui::fieldset>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::fieldset>
    <x-basekit-ui::toggle name="toggle_off" label="Off" />
    <x-basekit-ui::toggle name="toggle_on" label="On" is-checked />
    <x-basekit-ui::toggle name="toggle_disabled" label="Disabled" disabled />
    <x-basekit-ui::toggle name="toggle_disabled_on" label="Disabled & On"
        is-checked disabled />
    <x-basekit-ui::toggle name="toggle_error" label="With Error"
        error="This setting is required" />
    <x-basekit-ui::toggle name="toggle_hint" label="With Hint"
        hint="Enable to activate this feature" />
</x-basekit-ui::fieldset>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
