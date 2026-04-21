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
    <x-basekit-ui::styleguide.section-toggle section="buttons" title="Buttons">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="flex flex-wrap items-center gap-3">
                    <x-basekit-ui::button variant="primary">Primary</x-basekit-ui::button>
                    <x-basekit-ui::button variant="secondary">Secondary</x-basekit-ui::button>
                    <x-basekit-ui::button variant="success">Success</x-basekit-ui::button>
                    <x-basekit-ui::button variant="danger">Danger</x-basekit-ui::button>
                    <x-basekit-ui::button variant="warning">Warning</x-basekit-ui::button>
                    <x-basekit-ui::button variant="info">Info</x-basekit-ui::button>
                    <x-basekit-ui::button variant="ghost">Ghost</x-basekit-ui::button>
                </div>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div>
                    <x-basekit-ui::button size="sm">Small</x-basekit-ui::button>
                    <x-basekit-ui::button size="md">Medium</x-basekit-ui::button>
                    <x-basekit-ui::button size="lg">Large</x-basekit-ui::button>
                </div>
            </div>

            <!-- States -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">States</p>
                <div class="flex flex-wrap items-center gap-3">
                    <x-basekit-ui::button disabled>Disabled</x-basekit-ui::button>
                    <x-basekit-ui::button is-loading>Loading</x-basekit-ui::button>
                </div>
            </div>

            <!-- With Icons -->
            <div class="space-y-2">
                <p class="text-sm text-slate-500 font-medium">With Icons</p>
                <div class="flex flex-wrap items-center gap-3">
                    <x-basekit-ui::button icon="bell" icon-orientation="left">
                        With Heroicon
                    </x-basekit-ui::button>

                    <x-basekit-ui::button icon-orientation="right" variant="secondary">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        Right Custom SVG
                    </x-basekit-ui::button>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Inputs -->
    <x-basekit-ui::styleguide.section-toggle section="inputs" title="Form Inputs">
        <div class="space-y-6">
            <!-- Input Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-basekit-ui::input label="Primary" name="variant_primary" placeholder="Primary variant"
                        variant="primary" />
                    <x-basekit-ui::input label="Secondary" name="variant_secondary" placeholder="Secondary variant"
                        variant="secondary" />
                    <x-basekit-ui::input label="Success" name="variant_success" value="Valid input" variant="success" />
                    <x-basekit-ui::input label="Warning" name="variant_warning" value="Check this value"
                        variant="warning" />
                    <x-basekit-ui::input label="Info" name="variant_info" placeholder="Info variant" variant="info" />
                    <x-basekit-ui::input label="Ghost" name="variant_ghost" placeholder="Ghost variant" variant="ghost" />
                </div>
            </div>

            <!-- Input Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::input label="Small Input" name="size_sm" size="sm" placeholder="Small size" />
                    <x-basekit-ui::input label="Medium Input (Default)" name="size_md" size="md"
                        placeholder="Medium size" />
                    <x-basekit-ui::input label="Large Input" name="size_lg" size="lg" placeholder="Large size" />
                </div>
            </div>

            <!-- Input States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::input label="Default State" name="state_default" placeholder="Enter text..."
                        hint="Helper text goes here" />
                    <x-basekit-ui::input label="Disabled Input" name="state_disabled" value="Disabled value" disabled />
                    <x-basekit-ui::input label="Readonly Input" name="state_readonly" value="Readonly value" readonly />
                    <x-basekit-ui::input label="Error State" name="state_error" value=""
                        error="This field is required" />
                </div>
            </div>

            <!-- Input Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Input Variations</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                        <x-basekit-ui::input label="Amount" name="corner_hint" placeholder="0.00" corner-hint="USD" />
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Underline Input</p>
                        <x-basekit-ui::input label="Website" name="underline_input" placeholder="example.com"
                            control-style="underline" />
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                        <x-basekit-ui::input label="Company" name="inset_label" placeholder="Acme Inc."
                            label-style="inset" />
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                        <x-basekit-ui::input label="Username" name="overlap_label" placeholder="jane.doe"
                            label-style="overlap" />
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Pill Input</p>
                        <x-basekit-ui::input name="pill_input" placeholder="Search..." control-style="pill" />
                    </div>
                </div>
            </div>

            <!-- Input Addons (Prefix/Suffix) -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Input Addons</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <x-basekit-ui::input label="Website (Prefix)" name="addon_prefix" placeholder="example.com">
                        <x-slot name="prefix">https://</x-slot>
                    </x-basekit-ui::input>
                    <x-basekit-ui::input label="Price (Prefix)" name="addon_currency" placeholder="0.00">
                        <x-slot name="prefix">$</x-slot>
                    </x-basekit-ui::input>
                    <x-basekit-ui::input label="Email (Suffix)" name="addon_suffix" placeholder="username">
                        <x-slot name="suffix">@gmail.com</x-slot>
                    </x-basekit-ui::input>
                    <x-basekit-ui::input label="Double Addon" name="addon_both" placeholder="0.00">
                        <x-slot name="prefix">$</x-slot>
                        <x-slot name="suffix">USD</x-slot>
                    </x-basekit-ui::input>
                </div>
            </div>

            <!-- Masked Inputs -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Masked Inputs</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <x-basekit-ui::input label="Phone" name="mask_phone" mask="(###) ###-####"
                        placeholder="(555) 123-4567" />
                    <x-basekit-ui::input label="Card" name="mask_card" mask="#### #### #### ####"
                        placeholder="4242 4242 4242 4242" />
                </div>
            </div>

            <!-- Inputs with Icons -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Inputs with Icons</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::input label="Search" name="icon_search" icon="magnifying-glass"
                        placeholder="Search..." />
                    <x-basekit-ui::input label="Email" name="icon_email" icon="envelope"
                        placeholder="you@example.com" />
                    <x-basekit-ui::input label="Phone" name="icon_phone" icon="phone"
                        placeholder="+1 (555) 000-0000" mask="+1 (###) ###-####" />
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex space-x-10">
                    <div>
                        <!-- Password Input -->
                        <h4 class="text-sm text-slate-500 font-medium mb-2">Password Input</h4>
                        <x-basekit-ui::input label="Password" name="pw_basic" type="password" icon="lock-closed"
                            placeholder="Password" :is-toggle-password="true" />
                    </div>
                    <div>
                        <!-- Number Input -->
                        <h4 class="text-sm text-slate-500 font-medium mb-2">Number Input</h4>
                        <x-basekit-ui::input label="Quantity" name="qty" type="number" value="1"
                            min="0" max="100" class="w-32" />
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Selects -->
    <x-basekit-ui::styleguide.section-toggle section="selects" title="Form Selects">
        <div class="space-y-8">
            <!-- Select Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-basekit-ui::select label="Primary" name="select_variant_primary" variant="primary"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::select label="Secondary" name="select_variant_secondary" variant="secondary"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::select label="Success" name="select_variant_success" variant="success"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" value="opt1" />
                    <x-basekit-ui::select label="Warning" name="select_variant_warning" variant="warning"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" value="opt1" />
                    <x-basekit-ui::select label="Info" name="select_variant_info" variant="info"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::select label="Ghost" name="select_variant_ghost" variant="ghost"
                        placeholder="Choose an option" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                </div>
            </div>

            <!-- Select Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::select label="Small Select" name="select_size_sm" size="sm"
                        placeholder="Choose an option" :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                    <x-basekit-ui::select label="Medium Select (Default)" name="select_size_md" size="md"
                        placeholder="Choose an option" :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                    <x-basekit-ui::select label="Large Select" name="select_size_lg" size="lg"
                        placeholder="Choose an option" :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                </div>
            </div>

            <!-- Select States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::select label="Default State" name="select_default" placeholder="Select an option"
                        :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" hint="Helper text goes here" />
                    <x-basekit-ui::select label="Disabled State" name="select_disabled" placeholder="Select an option"
                        :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" disabled />
                    <x-basekit-ui::select label="Error State" name="select_error" placeholder="Select an option"
                        :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" error="This field is required" />
                </div>
            </div>

            <!-- Select Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Select Variations</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                        <x-basekit-ui::select label="Region" name="select_corner" corner-hint="Optional"
                            placeholder="Select a region" :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Underline</p>
                        <x-basekit-ui::select label="Underline Select" name="select_underline" control-style="underline"
                            placeholder="Select an option" :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                        <x-basekit-ui::select label="Department" name="select_inset" label-style="inset"
                            placeholder="Select department" :options="['product' => 'Product', 'sales' => 'Sales', 'support' => 'Support']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                        <x-basekit-ui::select label="Role" name="select_overlap" label-style="overlap"
                            placeholder="Select role" :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Pill Select</p>
                        <x-basekit-ui::select name="select_pill" control-style="pill" placeholder="Select status"
                            :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                    </div>
                </div>
            </div>

            <!-- Select with Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Select with Icon</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <x-basekit-ui::select label="Country" name="select_icon" icon="globe-alt"
                        placeholder="Select a country" :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Multi Selects -->
    <x-basekit-ui::styleguide.section-toggle section="multiselects" title="Multi Selects">
        <div class="space-y-8">
            <!-- Multi Select Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-basekit-ui::multi-select label="Primary" name="multiselect_variant_primary" variant="primary"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::multi-select label="Secondary" name="multiselect_variant_secondary"
                        variant="secondary" placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::multi-select label="Success" name="multiselect_variant_success" variant="success"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::multi-select label="Warning" name="multiselect_variant_warning" variant="warning"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::multi-select label="Info" name="multiselect_variant_info" variant="info"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                    <x-basekit-ui::multi-select label="Ghost" name="multiselect_variant_ghost" variant="ghost"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'marketing' => 'Marketing']" />
                </div>
            </div>

            <!-- Multi Select Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::multi-select label="Small Multi Select" name="multiselect_size_sm" size="sm"
                        placeholder="Select tags" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                    <x-basekit-ui::multi-select label="Medium Multi Select" name="multiselect_size_md" size="md"
                        placeholder="Select tags" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                    <x-basekit-ui::multi-select label="Large Multi Select" name="multiselect_size_lg" size="lg"
                        placeholder="Select tags" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::multi-select label="Default State" name="multiselect_default"
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" hint="Helper text goes here" />
                    <x-basekit-ui::multi-select label="Disabled State" name="multiselect_disabled" disabled
                        placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                    <x-basekit-ui::multi-select label="Error State" name="multiselect_error"
                        error="This field is required" placeholder="Select options" :options="['design' => 'Design', 'dev' => 'Development', 'ops' => 'Operations']" />
                    <x-basekit-ui::multi-select label="Preselected" name="multiselect_tags" placeholder="Select tags"
                        :options="[
                            'design' => 'Design',
                            'dev' => 'Development',
                            'ops' => 'Operations',
                            'sales' => 'Sales',
                        ]" :value="['design', 'ops']" />
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Multi Select
                    Variations</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                        <x-basekit-ui::multi-select label="Regions" name="multiselect_corner" corner-hint="Optional"
                            placeholder="Select regions" :options="['na' => 'North America', 'eu' => 'Europe', 'apac' => 'APAC']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Underline</p>
                        <x-basekit-ui::multi-select label="Underline Multi Select" name="multiselect_underline"
                            control-style="underline" placeholder="Select tiers" :options="['basic' => 'Basic', 'pro' => 'Pro', 'team' => 'Team']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                        <x-basekit-ui::multi-select label="Teams" name="multiselect_inset" label-style="inset"
                            placeholder="Select teams" :options="['core' => 'Core', 'infra' => 'Infrastructure', 'growth' => 'Growth']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                        <x-basekit-ui::multi-select label="Roles" name="multiselect_overlap" label-style="overlap"
                            placeholder="Select roles" :options="['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Pill</p>
                        <x-basekit-ui::multi-select label="Status" name="multiselect_pill" control-style="pill"
                            placeholder="Select status" :options="['active' => 'Active', 'paused' => 'Paused', 'archived' => 'Archived']" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">With Icon</p>
                        <x-basekit-ui::multi-select label="Locations" name="multiselect_icon" icon="map-pin"
                            placeholder="Select locations" :options="['ny' => 'New York', 'sf' => 'San Francisco', 'ldn' => 'London']" />
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Textareas -->
    <x-basekit-ui::styleguide.section-toggle section="textareas" title="Form Textareas">
        <div class="space-y-8">

            <!-- Textarea Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-basekit-ui::textarea label="Primary" name="ta_variant_primary" variant="primary" rows="3"
                        placeholder="Primary variant" />
                    <x-basekit-ui::textarea label="Secondary" name="ta_variant_secondary" variant="secondary"
                        rows="3" placeholder="Secondary variant" />
                    <x-basekit-ui::textarea label="Success" name="ta_variant_success" value="Valid input"
                        variant="success" rows="3" />
                    <x-basekit-ui::textarea label="Warning" name="ta_variant_warning" value="Check this value"
                        variant="warning" rows="3" />
                    <x-basekit-ui::textarea label="Info" name="ta_variant_info" variant="info" rows="3"
                        placeholder="Info variant" />
                    <x-basekit-ui::textarea label="Ghost" name="ta_variant_ghost" variant="ghost" rows="3"
                        placeholder="Ghost variant" />
                </div>
            </div>

            <!-- Textarea Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::textarea label="Small Textarea" name="ta_size_sm" size="sm" rows="3"
                        placeholder="Small textarea" />
                    <x-basekit-ui::textarea label="Medium Textarea (Default)" name="ta_size_md" size="md"
                        rows="4" placeholder="Medium textarea" />
                    <x-basekit-ui::textarea label="Large Textarea" name="ta_size_lg" size="lg" rows="6"
                        placeholder="Large textarea" />
                </div>
            </div>

            <!-- Textarea States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <x-basekit-ui::textarea label="Default State" name="ta_default" rows="4"
                        placeholder="Enter text..." hint="Helper text goes here" />
                    <x-basekit-ui::textarea label="Disabled Textarea" name="ta_disabled" rows="4"
                        value="Disabled value" disabled />
                    <x-basekit-ui::textarea label="Readonly Textarea" name="ta_readonly" rows="4"
                        value="Readonly value" readonly />
                    <x-basekit-ui::textarea label="Error State" name="ta_error" rows="4"
                        error="This field is required" />
                </div>
            </div>

            <!-- Textarea Variations -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Textarea Variations</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Corner Hint</p>
                        <x-basekit-ui::textarea label="Description" name="ta_corner" rows="4"
                            corner-hint="Optional" placeholder="Enter description..." />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Underline Textarea</p>
                        <x-basekit-ui::textarea label="Notes" name="ta_underline" rows="4" is-underline
                            placeholder="Enter your notes here..." />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Inset Label</p>
                        <x-basekit-ui::textarea label="Company bio" name="ta_inset" rows="4" label-style="inset"
                            placeholder="Tell us about your company..." />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Overlap Label</p>
                        <x-basekit-ui::textarea label="Bio" name="ta_overlap" rows="4" label-style="overlap"
                            placeholder="Tell us about yourself..." />
                    </div>
                </div>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Checkboxes -->
    <x-basekit-ui::styleguide.section-toggle section="checkboxes" title="Form Checkboxes">
        <div class="space-y-6">
            <!-- Checkbox Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-2">
                    <x-basekit-ui::checkbox name="ckx_primary" label="Primary" variant="primary" is-checked />
                    <x-basekit-ui::checkbox name="ckx_secondary" label="Secondary" variant="secondary" is-checked />
                    <x-basekit-ui::checkbox name="ckx_success" label="Success" variant="success" is-checked />
                    <x-basekit-ui::checkbox name="ckx_warning" label="Warning" variant="warning" is-checked />
                    <x-basekit-ui::checkbox name="ckx_danger" label="Danger" variant="danger" is-checked />
                    <x-basekit-ui::checkbox name="ckx_info" label="Info" variant="info" is-checked />
                    <x-basekit-ui::checkbox name="ckx_ghost" label="Ghost" variant="ghost" is-checked />
                </div>
            </div>

            <!-- Checkbox Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-2">
                    <x-basekit-ui::checkbox name="ckx_sm" label="Small" size="sm" />
                    <x-basekit-ui::checkbox name="ckx_md" label="Medium" size="md" />
                    <x-basekit-ui::checkbox name="ckx_lg" label="Large" size="lg" />
                </div>
            </div>

            <!-- Checkbox States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="space-y-2">
                    <x-basekit-ui::checkbox name="ckx_unchecked" label="Unchecked" />
                    <x-basekit-ui::checkbox name="ckx_checked" label="Checked" is-checked />
                    <x-basekit-ui::checkbox name="ckx_disabled" label="Disabled" disabled />
                    <x-basekit-ui::checkbox name="ckx_disabled_checked" label="Disabled & Checked" is-checked disabled />
                    <x-basekit-ui::checkbox name="ckx_error" label="With Error" error="This is required" />
                    <x-basekit-ui::checkbox name="ckx_hint" label="With Hint" hint="This is a helpful hint" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Radios -->
    <x-basekit-ui::styleguide.section-toggle section="radios" title="Form Radios">
        <div class="space-y-6">
            <!-- Radio Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-2">
                    <x-basekit-ui::radio name="radio_variants" value="primary" label="Primary" variant="primary"
                        is-checked />
                    <x-basekit-ui::radio name="radio_variants" value="secondary" label="Secondary"
                        variant="secondary" />
                    <x-basekit-ui::radio name="radio_variants" value="success" label="Success" variant="success" />
                    <x-basekit-ui::radio name="radio_variants" value="warning" label="Warning" variant="warning" />
                    <x-basekit-ui::radio name="radio_variants" value="danger" label="Danger" variant="danger" />
                    <x-basekit-ui::radio name="radio_variants" value="info" label="Info" variant="info" />
                    <x-basekit-ui::radio name="radio_variants" value="ghost" label="Ghost" variant="ghost" />
                </div>
            </div>

            <!-- Radio Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-2">
                    <x-basekit-ui::radio name="radio_sizes" value="sm" label="Small" size="sm" />
                    <x-basekit-ui::radio name="radio_sizes" value="md" label="Medium" size="md" />
                    <x-basekit-ui::radio name="radio_sizes" value="lg" label="Large" size="lg" />
                </div>
            </div>

            <!-- Radio States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="space-y-2">
                    <x-basekit-ui::radio name="radio_group" value="unchecked" label="Unchecked" />
                    <x-basekit-ui::radio name="radio_group" value="checked" label="Checked" is-checked />
                    <x-basekit-ui::radio name="radio_group" value="disabled" label="Disabled" disabled />
                    <x-basekit-ui::radio name="radio_group_disabled" value="checked_disabled" label="Disabled & Checked"
                        is-checked disabled />
                    <x-basekit-ui::radio name="radio_group" value="error" label="With Error"
                        error="Please select an option" />
                    <x-basekit-ui::radio name="radio_group" value="hint" label="With Hint"
                        hint="Select the option that applies" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Form Toggles -->
    <x-basekit-ui::styleguide.section-toggle section="toggles" title="Form Toggles">
        <div class="space-y-6">
            <!-- Toggle Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-2">
                    <x-basekit-ui::toggle name="toggle_primary" label="Primary" variant="primary" is-checked />
                    <x-basekit-ui::toggle name="toggle_secondary" label="Secondary" variant="secondary" is-checked />
                    <x-basekit-ui::toggle name="toggle_success" label="Success" variant="success" is-checked />
                    <x-basekit-ui::toggle name="toggle_warning" label="Warning" variant="warning" is-checked />
                    <x-basekit-ui::toggle name="toggle_danger" label="Danger" variant="danger" is-checked />
                    <x-basekit-ui::toggle name="toggle_info" label="Info" variant="info" is-checked />
                    <x-basekit-ui::toggle name="toggle_ghost" label="Ghost" variant="ghost" is-checked />
                </div>
            </div>

            <!-- Toggle Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-2">
                    <x-basekit-ui::toggle name="toggle_sm" label="Small" size="sm" />
                    <x-basekit-ui::toggle name="toggle_md" label="Medium" size="md" />
                    <x-basekit-ui::toggle name="toggle_lg" label="Large" size="lg" />
                </div>
            </div>

            <!-- Toggle States -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">States</h4>
                <div class="space-y-2">
                    <x-basekit-ui::toggle name="toggle_off" label="Off" />
                    <x-basekit-ui::toggle name="toggle_on" label="On" is-checked />
                    <x-basekit-ui::toggle name="toggle_disabled" label="Disabled" disabled />
                    <x-basekit-ui::toggle name="toggle_disabled_on" label="Disabled & On" is-checked disabled />
                    <x-basekit-ui::toggle name="toggle_error" label="With Error" error="This setting is required" />
                    <x-basekit-ui::toggle name="toggle_hint" label="With Hint" hint="Enable to activate this feature" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
