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

    <x-basekit-ui::styleguide.section-toggle section="cards" title="Card">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Default</p>
                <x-basekit-ui::card>
                    <x-slot:header class="font-semibold">Card Header</x-slot:header>
                    <p class="text-slate-600">Card body content with header and footer slots.</p>
                    <x-slot:footer>
                        <x-basekit-ui::button size="sm" variant="primary">Action</x-basekit-ui::button>
                    </x-slot:footer>
                </x-basekit-ui::card>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Bordered Variant</p>
                <x-basekit-ui::card variant="bordered">
                    <x-slot:header class="font-semibold">Bordered Card</x-slot:header>
                    <p class="text-slate-600">Card with bordered variant styling.</p>
                </x-basekit-ui::card>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Without Body Padding</p>
                <x-basekit-ui::card :is-padded="false">
                    <img src="https://placehold.co/400" alt="Card Image" class="w-full object-cover h-56">
                    <div class="bg-slate-100 px-4 py-3 text-sm text-slate-700">Full-bleed body content.</div>
                    <div class="px-4 py-3">
                        <x-basekit-ui::button size="sm" variant="secondary">View</x-basekit-ui::button>
                    </div>
                </x-basekit-ui::card>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="badges" title="Badge">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <div class="flex flex-wrap gap-2">
                    @foreach (['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'] as $variant)
                        <x-basekit-ui::badge :variant="$variant">{{ ucfirst($variant) }}</x-basekit-ui::badge>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <div class="flex flex-wrap items-center gap-2">
                    @foreach (['sm', 'md', 'lg'] as $size)
                        <x-basekit-ui::badge variant="primary"
                            :size="$size">{{ strtoupper($size) }}</x-basekit-ui::badge>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Icon</p>
                <div class="flex flex-wrap gap-2">
                    <x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>
                    <x-basekit-ui::badge variant="warning" icon="exclamation-triangle">Review</x-basekit-ui::badge>
                    <x-basekit-ui::badge variant="danger" icon="x-mark">Blocked</x-basekit-ui::badge>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Dot Indicator</p>
                <div class="flex flex-wrap gap-2">
                    @foreach (['primary', 'success', 'warning', 'danger'] as $variant)
                        <x-basekit-ui::badge :variant="$variant"
                            :is-dot="true">{{ ucfirst($variant) }}</x-basekit-ui::badge>
                    @endforeach
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="avatars" title="Avatar">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <div class="flex flex-wrap items-end gap-4">
                    @foreach (['sm', 'md', 'lg', 'xl'] as $size)
                        <div class="flex flex-col items-center gap-1">
                            <x-basekit-ui::avatar initials="JD" :size="$size" />
                            <span class="text-xs text-slate-400">{{ $size }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Shapes</p>
                <div class="flex flex-wrap items-end gap-4">
                    @foreach (['round', 'soft', 'square'] as $shape)
                        <div class="flex flex-col items-center gap-1">
                            <x-basekit-ui::avatar initials="JD" :shape="$shape" />
                            <span class="text-xs text-slate-400">{{ $shape }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Status Indicators</p>
                <div class="flex flex-wrap items-end gap-4">
                    @foreach (['online', 'away', 'busy', 'offline'] as $status)
                        <div class="flex flex-col items-center gap-1">
                            <x-basekit-ui::avatar initials="JD" :status="$status" />
                            <span class="text-xs text-slate-400">{{ $status }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Image And Fallback</p>
                <div class="flex flex-wrap items-end gap-4">
                    <div class="flex flex-col items-center gap-1">
                        <x-basekit-ui::avatar src="https://i.pravatar.cc/80?img=1" alt="Jane Doe" initials="JD" />
                        <span class="text-xs text-slate-400">Image</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <x-basekit-ui::avatar src="/broken-image.jpg" alt="John Smith" initials="JS" />
                        <span class="text-xs text-slate-400">Fallback</span>
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="table" title="Table">
        <div class="space-y-8">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Types</p>
                <div class="space-y-6">
                    <div>
                        <p class="mb-1 text-xs text-slate-400">basic</p>
                        <x-basekit-ui::table type="basic" :columns="$tableColumns" :rows="$tableRows" />
                    </div>
                    <div>
                        <p class="mb-1 text-xs text-slate-400">dropdown (responsive column visibility)</p>
                        <x-basekit-ui::styleguide.responsive-preview title="Dropdown Table Preview"
                            subtitle="Resize to see hidden columns and the column menu behavior"
                            small-label="Mobile columns" large-label="Desktop columns" :breakpoint="768"
                            :default-width="520">
                            <x-basekit-ui::table type="dropdown" :columns="$tableColumns" :rows="$tableRows" />
                        </x-basekit-ui::styleguide.responsive-preview>
                    </div>
                    <div>
                        <p class="mb-1 text-xs text-slate-400">stacked (responsive detail rows)</p>
                        <x-basekit-ui::styleguide.responsive-preview title="Stacked Table Preview"
                            subtitle="Resize to see compact stacked behavior on small widths" small-label="Stacked mode"
                            large-label="Desktop table" :breakpoint="768" :default-width="520">
                            <x-basekit-ui::table type="stacked" :columns="$tableColumns" :rows="$tableRows"
                                primary-column="name" />
                        </x-basekit-ui::styleguide.responsive-preview>
                    </div>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <div class="space-y-4">
                    @foreach (['default', 'bordered', 'striped', 'hoverable'] as $variant)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">variant="{{ $variant }}"</p>
                            <x-basekit-ui::table type="basic" :variant="$variant" :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <div class="space-y-4">
                    @foreach (['sm', 'md', 'lg'] as $size)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">size="{{ $size }}"</p>
                            <x-basekit-ui::table type="basic" :size="$size" :columns="[['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']]"
                                :rows="[['name' => 'Jane Doe', 'role' => 'Admin']]" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Empty State</p>
                <x-basekit-ui::table type="basic" :columns="$tableColumns" :rows="[]" empty="No records found." />
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="lists" title="List">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach (['default', 'divided', 'bordered'] as $variant)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">{{ $variant }}</p>
                            <x-basekit-ui::list :variant="$variant" :items="['First item', 'Second item', 'Third item']" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Markers</p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach (['disc', 'circle', 'square', 'decimal', 'none'] as $marker)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">{{ $marker }}</p>
                            <x-basekit-ui::list :ordered="$marker === 'decimal'" :marker="$marker" :items="['Alpha', 'Beta', 'Gamma']" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="descriptionLists" title="Description List">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <div class="space-y-4">
                    <div>
                        <p class="mb-1 text-xs text-slate-400">default</p>
                        <x-basekit-ui::description-list :items="$descriptionListItems" />
                    </div>
                    <div>
                        <p class="mb-1 text-xs text-slate-400">horizontal</p>
                        <x-basekit-ui::description-list variant="horizontal" :items="$descriptionListItems" />
                    </div>
                    <div>
                        <p class="mb-1 text-xs text-slate-400">striped</p>
                        <x-basekit-ui::description-list variant="striped" :items="$descriptionListItems" />
                    </div>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Gap Sizes</p>
                <div class="space-y-4">
                    @foreach (['sm', 'md', 'lg'] as $gap)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">gap="{{ $gap }}"</p>
                            <x-basekit-ui::description-list :gap="$gap" :items="[['term' => 'Key', 'description' => 'Value']]" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="stats" title="Stat">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Trend Directions</p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <x-basekit-ui::stat label="Revenue" value="$12,345" change="+12%" trend="up" />
                    <x-basekit-ui::stat label="Refunds" value="$1,200" change="-4%" trend="down" />
                    <x-basekit-ui::stat label="Visitors" value="8,430" change="0%" trend="neutral" />
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Icon</p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <x-basekit-ui::stat label="Orders" value="342" change="+8%" trend="up"
                        icon="chart-bar" />
                    <x-basekit-ui::stat label="Users" value="1,847" change="+23%" trend="up"
                        icon="users" />
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Without Change</p>
                <x-basekit-ui::stat label="Total Items" value="4,096" />
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
