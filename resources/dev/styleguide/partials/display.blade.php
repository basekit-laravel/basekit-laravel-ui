<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return h === '' || h === key; };
        return {
            cards: open('cards'),
            badges: open('badges'),
            avatars: open('avatars'),
            table: open('table'),
            lists: open('lists'),
            descriptionLists: open('descriptionLists'),
            stats: open('stats'),
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

    @php
        $tableColumns = [
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'role', 'label' => 'Role', 'show' => 'sm+'],
            ['key' => 'status', 'label' => 'Status', 'show' => 'md+'],
        ];
        $tableRows = [
            ['name' => 'Jane Doe', 'role' => 'Admin', 'status' => 'Active'],
            ['name' => 'John Smith', 'role' => 'Editor', 'status' => 'Active'],
            ['name' => 'Sarah Brown', 'role' => 'Viewer', 'status' => 'Inactive'],
        ];
        $descriptionListItems = [
            ['term' => 'Framework', 'description' => 'Laravel'],
            ['term' => 'Styling', 'description' => 'Tailwind CSS 4'],
            ['term' => 'Templates', 'description' => 'Blade Components'],
        ];
    @endphp

    {{-- ============================================================ --}}
    {{-- CARD --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="cards" title="Card" description="Content container with header/footer">
        <div class="space-y-6">

            {{-- Default --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Default</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::card name="code_card_default">
                            <x-slot:header class="font-semibold">Card Header</x-slot:header>
                            <p class="text-slate-600">Card body content with header and footer slots.</p>
                            <x-slot:footer>
                                <x-basekit-ui::button size="sm" variant="primary">Action</x-basekit-ui::button>
                            </x-slot:footer>
                        </x-basekit-ui::card>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::card>
    <x-slot:header class="font-semibold">Card Header</x-slot:header>
    <p class="text-slate-600">Card body content with header and footer slots.</p>
    <x-slot:footer>
        <x-basekit-ui::button size="sm" variant="primary">Action</x-basekit-ui::button>
    </x-slot:footer>
</x-basekit-ui::card>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Bordered --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Bordered Variant</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::card name="code_card_bordered" variant="bordered">
                            <x-slot:header class="font-semibold">Bordered Card</x-slot:header>
                            <p class="text-slate-600">Card with bordered variant styling.</p>
                        </x-basekit-ui::card>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::card variant="bordered">
    <x-slot:header class="font-semibold">Bordered Card</x-slot:header>
    <p class="text-slate-600">Card with bordered variant styling.</p>
</x-basekit-ui::card>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Without Body Padding --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Without Body Padding</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::card name="code_card_nopad" :is-padded="false">
                            <img src="https://placehold.co/400" alt="Card Image" class="w-full object-cover h-56">
                            <div class="bg-slate-100 px-4 py-3 text-sm text-slate-700">Full-bleed body content.</div>
                            <div class="px-4 py-3">
                                <x-basekit-ui::button size="sm" variant="secondary">View</x-basekit-ui::button>
                            </div>
                        </x-basekit-ui::card>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::card :is-padded="false">
    <img src="https://placehold.co/400" alt="Card Image" class="w-full object-cover h-56">
    <div class="bg-slate-100 px-4 py-3 text-sm text-slate-700">Full-bleed body content.</div>
    <div class="px-4 py-3">
        <x-basekit-ui::button size="sm" variant="secondary">View</x-basekit-ui::button>
    </div>
</x-basekit-ui::card>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Transparent --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Transparent Variant</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 p-4">
                            <x-basekit-ui::card name="code_card_transparent" variant="transparent">
                                <x-slot:header class="font-semibold text-white">Transparent Card</x-slot:header>
                                <p class="text-indigo-100">Card with transparent background — inherits the parent background.</p>
                            </x-basekit-ui::card>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::card variant="transparent">
    <x-slot:header class="font-semibold text-white">Transparent Card</x-slot:header>
    <p class="text-indigo-100">Card with transparent background — inherits the parent background.</p>
</x-basekit-ui::card>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- BADGE --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="badges" title="Badge" description="Label and status indicator">
        <div class="space-y-6">

            {{-- Variants --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap gap-2">
                            <x-basekit-ui::badge variant="primary">Primary</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="secondary">Secondary</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="success">Success</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="warning">Warning</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="danger">Danger</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="info">Info</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="ghost">Ghost</x-basekit-ui::badge>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::badge variant="primary">Primary</x-basekit-ui::badge>
<x-basekit-ui::badge variant="secondary">Secondary</x-basekit-ui::badge>
<x-basekit-ui::badge variant="success">Success</x-basekit-ui::badge>
<x-basekit-ui::badge variant="warning">Warning</x-basekit-ui::badge>
<x-basekit-ui::badge variant="danger">Danger</x-basekit-ui::badge>
<x-basekit-ui::badge variant="info">Info</x-basekit-ui::badge>
<x-basekit-ui::badge variant="ghost">Ghost</x-basekit-ui::badge>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Custom Colors --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Custom Colors</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap gap-2">
                            <x-basekit-ui::badge color="indigo-500">Indigo</x-basekit-ui::badge>
                            <x-basekit-ui::badge color="pink-500">Pink</x-basekit-ui::badge>
                            <x-basekit-ui::badge color="emerald-500">Emerald</x-basekit-ui::badge>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::badge color="indigo-500">Indigo</x-basekit-ui::badge>
<x-basekit-ui::badge color="pink-500">Pink</x-basekit-ui::badge>
<x-basekit-ui::badge color="emerald-500">Emerald</x-basekit-ui::badge>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-center gap-2">
                            <x-basekit-ui::badge variant="primary" size="sm">SM</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="primary" size="md">MD</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="primary" size="lg">LG</x-basekit-ui::badge>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::badge variant="primary" size="sm">SM</x-basekit-ui::badge>
<x-basekit-ui::badge variant="primary" size="md">MD</x-basekit-ui::badge>
<x-basekit-ui::badge variant="primary" size="lg">LG</x-basekit-ui::badge>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- With Icon --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Icon</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap gap-2">
                            <x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="warning" icon="exclamation-triangle">Review</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="danger" icon="x-mark">Blocked</x-basekit-ui::badge>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>
<x-basekit-ui::badge variant="warning" icon="exclamation-triangle">Review</x-basekit-ui::badge>
<x-basekit-ui::badge variant="danger" icon="x-mark">Blocked</x-basekit-ui::badge>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Dot Indicator --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Dot Indicator</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap gap-2">
                            <x-basekit-ui::badge variant="primary" :is-dot="true">Primary</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="success" :is-dot="true">Success</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="warning" :is-dot="true">Warning</x-basekit-ui::badge>
                            <x-basekit-ui::badge variant="danger" :is-dot="true">Danger</x-basekit-ui::badge>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::badge variant="primary" :is-dot="true">Primary</x-basekit-ui::badge>
<x-basekit-ui::badge variant="success" :is-dot="true">Success</x-basekit-ui::badge>
<x-basekit-ui::badge variant="warning" :is-dot="true">Warning</x-basekit-ui::badge>
<x-basekit-ui::badge variant="danger" :is-dot="true">Danger</x-basekit-ui::badge>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- AVATAR --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="avatars" title="Avatar" description="User image or initials">
        <div class="space-y-6">

            {{-- Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-end gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_sm" initials="JD" size="sm" />
                                <span class="text-xs text-slate-400">sm</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_md" initials="JD" size="md" />
                                <span class="text-xs text-slate-400">md</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_lg" initials="JD" size="lg" />
                                <span class="text-xs text-slate-400">lg</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_xl" initials="JD" size="xl" />
                                <span class="text-xs text-slate-400">xl</span>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::avatar initials="JD" size="sm" />
<x-basekit-ui::avatar initials="JD" size="md" />
<x-basekit-ui::avatar initials="JD" size="lg" />
<x-basekit-ui::avatar initials="JD" size="xl" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Shapes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Shapes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-end gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_round" initials="JD" shape="round" />
                                <span class="text-xs text-slate-400">round</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_soft" initials="JD" shape="soft" />
                                <span class="text-xs text-slate-400">soft</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_square" initials="JD" shape="square" />
                                <span class="text-xs text-slate-400">square</span>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::avatar initials="JD" shape="round" />
<x-basekit-ui::avatar initials="JD" shape="soft" />
<x-basekit-ui::avatar initials="JD" shape="square" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Status Indicators --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Status Indicators</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-end gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_online" initials="JD" status="online" />
                                <span class="text-xs text-slate-400">online</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_away" initials="JD" status="away" />
                                <span class="text-xs text-slate-400">away</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_busy" initials="JD" status="busy" />
                                <span class="text-xs text-slate-400">busy</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_offline" initials="JD" status="offline" />
                                <span class="text-xs text-slate-400">offline</span>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::avatar initials="JD" status="online" />
<x-basekit-ui::avatar initials="JD" status="away" />
<x-basekit-ui::avatar initials="JD" status="busy" />
<x-basekit-ui::avatar initials="JD" status="offline" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Image And Fallback --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Image And Fallback</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex flex-wrap items-end gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_img" src="https://i.pravatar.cc/80?img=1" alt="Jane Doe" initials="JD" />
                                <span class="text-xs text-slate-400">Image</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::avatar name="code_avatar_fb" src="/broken-image.jpg" alt="John Smith" initials="JS" />
                                <span class="text-xs text-slate-400">Fallback</span>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::avatar src="https://i.pravatar.cc/80?img=1" alt="Jane Doe" initials="JD" />
<x-basekit-ui::avatar src="/broken-image.jpg" alt="John Smith" initials="JS" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- TABLE --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="table" title="Table" description="Data table with responsive modes">
        <div class="space-y-8">

            {{-- Types --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Types</p>
                <div class="space-y-6">

                    {{-- basic --}}
                    <div>
                        <p class="mb-1 text-xs text-slate-400">basic</p>
                        <x-basekit-ui::styleguide.code-example>
                            <x-slot:preview>
                                <x-basekit-ui::table name="code_table_basic" type="basic" :columns="$tableColumns" :rows="$tableRows" />
                            </x-slot:preview>
                            @verbatim
<x-basekit-ui::table type="basic" :columns="$tableColumns" :rows="$tableRows" />
                            @endverbatim
                        </x-basekit-ui::styleguide.code-example>
                    </div>

                    {{-- dropdown --}}
                    <div>
                        <p class="mb-1 text-xs text-slate-400">dropdown (responsive column visibility)</p>
                        <x-basekit-ui::styleguide.code-example>
                            <x-slot:preview>
                                <x-basekit-ui::styleguide.responsive-preview title="Dropdown Table Preview"
                                    subtitle="Resize to see hidden columns and the column menu behavior"
                                    small-label="Mobile columns" large-label="Desktop columns" :breakpoint="768"
                                    :default-width="520">
                                    <x-basekit-ui::table name="code_table_dropdown" type="dropdown" :columns="$tableColumns"
                                        :rows="$tableRows" />
                                </x-basekit-ui::styleguide.responsive-preview>
                            </x-slot:preview>
                            @verbatim
<x-basekit-ui::styleguide.responsive-preview title="Dropdown Table Preview"
    subtitle="Resize to see hidden columns and the column menu behavior"
    small-label="Mobile columns" large-label="Desktop columns" :breakpoint="768"
    :default-width="520">
    <x-basekit-ui::table type="dropdown" :columns="$tableColumns" :rows="$tableRows" />
</x-basekit-ui::styleguide.responsive-preview>
                            @endverbatim
                        </x-basekit-ui::styleguide.code-example>
                    </div>

                    {{-- stacked --}}
                    <div>
                        <p class="mb-1 text-xs text-slate-400">stacked (responsive detail rows)</p>
                        <x-basekit-ui::styleguide.code-example>
                            <x-slot:preview>
                                <x-basekit-ui::styleguide.responsive-preview title="Stacked Table Preview"
                                    subtitle="Resize to see compact stacked behavior on small widths" small-label="Stacked mode"
                                    large-label="Desktop table" :breakpoint="768" :default-width="520">
                                    <x-basekit-ui::table name="code_table_stacked" type="stacked" :columns="$tableColumns"
                                        :rows="$tableRows" primary-column="name" />
                                </x-basekit-ui::styleguide.responsive-preview>
                            </x-slot:preview>
                            @verbatim
<x-basekit-ui::styleguide.responsive-preview title="Stacked Table Preview"
    subtitle="Resize to see compact stacked behavior on small widths" small-label="Stacked mode"
    large-label="Desktop table" :breakpoint="768" :default-width="520">
    <x-basekit-ui::table type="stacked" :columns="$tableColumns" :rows="$tableRows"
        primary-column="name" />
</x-basekit-ui::styleguide.responsive-preview>
                            @endverbatim
                        </x-basekit-ui::styleguide.code-example>
                    </div>

                </div>
            </div>

            {{-- Variants --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">variant="default"</p>
                                <x-basekit-ui::table name="code_table_var_default" type="basic" variant="default"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">variant="bordered"</p>
                                <x-basekit-ui::table name="code_table_var_bordered" type="basic" variant="bordered"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">variant="striped"</p>
                                <x-basekit-ui::table name="code_table_var_striped" type="basic" variant="striped"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">variant="hoverable"</p>
                                <x-basekit-ui::table name="code_table_var_hoverable" type="basic" variant="hoverable"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::table type="basic" variant="default"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
<x-basekit-ui::table type="basic" variant="bordered"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
<x-basekit-ui::table type="basic" variant="striped"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
<x-basekit-ui::table type="basic" variant="hoverable"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">size="sm"</p>
                                <x-basekit-ui::table name="code_table_size_sm" type="basic" size="sm"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">size="md"</p>
                                <x-basekit-ui::table name="code_table_size_md" type="basic" size="md"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">size="lg"</p>
                                <x-basekit-ui::table name="code_table_size_lg" type="basic" size="lg"
                                    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::table type="basic" size="sm"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
<x-basekit-ui::table type="basic" size="md"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
<x-basekit-ui::table type="basic" size="lg"
    :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
    :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Empty State --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Empty State</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::table name="code_table_empty" type="basic" :columns="$tableColumns" :rows="[]"
                            empty="No records found." />
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::table type="basic" :columns="$tableColumns" :rows="[]" empty="No records found." />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- LIST --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="lists" title="List" description="Ordered and unordered lists">
        <div class="space-y-6">

            {{-- Variants --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">default</p>
                                <x-basekit-ui::list name="code_list_default" variant="default"
                                    :items="['First item', 'Second item', 'Third item']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">divided</p>
                                <x-basekit-ui::list name="code_list_divided" variant="divided"
                                    :items="['First item', 'Second item', 'Third item']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">bordered</p>
                                <x-basekit-ui::list name="code_list_bordered" variant="bordered"
                                    :items="['First item', 'Second item', 'Third item']" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::list variant="default" :items="['First item', 'Second item', 'Third item']" />
<x-basekit-ui::list variant="divided" :items="['First item', 'Second item', 'Third item']" />
<x-basekit-ui::list variant="bordered" :items="['First item', 'Second item', 'Third item']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Markers --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Markers</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">disc</p>
                                <x-basekit-ui::list name="code_list_disc" :marker="'disc'"
                                    :items="['Alpha', 'Beta', 'Gamma']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">circle</p>
                                <x-basekit-ui::list name="code_list_circle" :marker="'circle'"
                                    :items="['Alpha', 'Beta', 'Gamma']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">square</p>
                                <x-basekit-ui::list name="code_list_square" :marker="'square'"
                                    :items="['Alpha', 'Beta', 'Gamma']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">decimal</p>
                                <x-basekit-ui::list name="code_list_decimal" :ordered="true" :marker="'decimal'"
                                    :items="['Alpha', 'Beta', 'Gamma']" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">none</p>
                                <x-basekit-ui::list name="code_list_none" :marker="'none'"
                                    :items="['Alpha', 'Beta', 'Gamma']" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::list :marker="'disc'" :items="['Alpha', 'Beta', 'Gamma']" />
<x-basekit-ui::list :marker="'circle'" :items="['Alpha', 'Beta', 'Gamma']" />
<x-basekit-ui::list :marker="'square'" :items="['Alpha', 'Beta', 'Gamma']" />
<x-basekit-ui::list :ordered="true" :marker="'decimal'" :items="['Alpha', 'Beta', 'Gamma']" />
<x-basekit-ui::list :marker="'none'" :items="['Alpha', 'Beta', 'Gamma']" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- DESCRIPTION LIST --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="descriptionLists" title="Description List" description="Key-value pair display">
        <div class="space-y-6">

            {{-- Variants --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">default</p>
                                <x-basekit-ui::description-list name="code_dl_default"
                                    :items="$descriptionListItems" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">horizontal</p>
                                <x-basekit-ui::description-list name="code_dl_horizontal" variant="horizontal"
                                    :items="$descriptionListItems" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">striped</p>
                                <x-basekit-ui::description-list name="code_dl_striped" variant="striped"
                                    :items="$descriptionListItems" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::description-list :items="$descriptionListItems" />
<x-basekit-ui::description-list variant="horizontal" :items="$descriptionListItems" />
<x-basekit-ui::description-list variant="striped" :items="$descriptionListItems" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Gap Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Gap Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="sm"</p>
                                <x-basekit-ui::description-list name="code_dl_gap_sm" gap="sm"
                                    :items="[['term' => 'Key', 'description' => 'Value']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="md"</p>
                                <x-basekit-ui::description-list name="code_dl_gap_md" gap="md"
                                    :items="[['term' => 'Key', 'description' => 'Value']]" />
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="lg"</p>
                                <x-basekit-ui::description-list name="code_dl_gap_lg" gap="lg"
                                    :items="[['term' => 'Key', 'description' => 'Value']]" />
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::description-list gap="sm" :items="[['term' => 'Key', 'description' => 'Value']]" />
<x-basekit-ui::description-list gap="md" :items="[['term' => 'Key', 'description' => 'Value']]" />
<x-basekit-ui::description-list gap="lg" :items="[['term' => 'Key', 'description' => 'Value']]" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- STAT --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="stats" title="Stat" description="Metric with trend indicator">
        <div class="space-y-6">

            {{-- Trend Directions --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Trend Directions</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <x-basekit-ui::stat name="code_stat_up" label="Revenue" value="$12,345" change="+12%"
                                trend="up" />
                            <x-basekit-ui::stat name="code_stat_down" label="Refunds" value="$1,200" change="-4%"
                                trend="down" />
                            <x-basekit-ui::stat name="code_stat_neutral" label="Visitors" value="8,430"
                                change="0%" trend="neutral" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stat label="Revenue" value="$12,345" change="+12%" trend="up" />
<x-basekit-ui::stat label="Refunds" value="$1,200" change="-4%" trend="down" />
<x-basekit-ui::stat label="Visitors" value="8,430" change="0%" trend="neutral" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- With Icon --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Icon</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-basekit-ui::stat name="code_stat_icon_orders" label="Orders" value="342"
                                change="+8%" trend="up" icon="chart-bar" />
                            <x-basekit-ui::stat name="code_stat_icon_users" label="Users" value="1,847"
                                change="+23%" trend="up" icon="users" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stat label="Orders" value="342" change="+8%" trend="up" icon="chart-bar" />
<x-basekit-ui::stat label="Users" value="1,847" change="+23%" trend="up" icon="users" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Without Change --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Without Change</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::stat name="code_stat_no_change" label="Total Items" value="4,096" />
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stat label="Total Items" value="4,096" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
