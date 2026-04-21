<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return !h || h === key; };
        return {
            tabs: open('tabs'),
            breadcrumbs: open('breadcrumbs'),
            dropdowns: open('dropdowns'),
            links: open('links'),
            pagination: open('pagination'),
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
        $customIconTabsItems = [
            [
                'label' => 'Home',
                'value' => 'custom-home',
                'iconSvg' =>
                    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11.5 12 4l9 7.5"></path><path d="M5 10.5V20h14v-9.5"></path></svg>',
            ],
            [
                'label' => 'Search',
                'value' => 'custom-search',
                'iconSvg' =>
                    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path></svg>',
            ],
            [
                'label' => 'Favorites',
                'value' => 'custom-star',
                'iconSvg' =>
                    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 2.9 6.1 6.7 1-4.8 4.6 1.1 6.6L12 18.1 6.1 21.3l1.1-6.6L2.4 10l6.7-1L12 3z"></path></svg>',
            ],
        ];
    @endphp

    <!-- Tabs -->
    <x-basekit-ui::styleguide.section-toggle section="tabs" title="Tabs">
        <div class="space-y-6">
            <!-- Underline Variant (Default) -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Underline (Default)</h4>
                <x-basekit-ui::tabs :items="[
                    ['label' => 'Overview', 'value' => 'overview'],
                    ['label' => 'Details', 'value' => 'details'],
                    ['label' => 'Activity', 'value' => 'activity'],
                ]" variant="underline" active="overview">
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'overview'">
                        <p class="text-slate-700 text-sm">Overview tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'details'">
                        <p class="text-slate-700 text-sm">Details tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'activity'">
                        <p class="text-slate-700 text-sm">Activity tab content.</p>
                    </div>
                </x-basekit-ui::tabs>
            </div>

            <!-- Pills Variant -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Pills</h4>
                <x-basekit-ui::tabs :items="[
                    ['label' => 'Account', 'value' => 'account', 'icon' => 'user'],
                    ['label' => 'Password', 'value' => 'password', 'icon' => 'key'],
                    ['label' => 'Notifications', 'value' => 'notifications', 'icon' => 'bell'],
                    ['label' => 'Disabled', 'value' => 'disabled', 'disabled' => true],
                ]" variant="pills" active="account">
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'account'">
                        <p class="text-slate-700 text-sm">Account tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'password'">
                        <p class="text-slate-700 text-sm">Password tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white"
                        x-show="activeTab === 'notifications'">
                        <p class="text-slate-700 text-sm">Notifications tab content.</p>
                    </div>
                </x-basekit-ui::tabs>
            </div>

            <!-- Boxed Variant -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Boxed</h4>
                <x-basekit-ui::tabs :items="[
                    ['label' => 'Documents', 'value' => 'docs'],
                    ['label' => 'Images', 'value' => 'images'],
                    ['label' => 'Videos', 'value' => 'videos'],
                ]" variant="boxed" active="docs">
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'docs'">
                        <p class="text-slate-700 text-sm">Documents tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'images'">
                        <p class="text-slate-700 text-sm">Images tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white" x-show="activeTab === 'videos'">
                        <p class="text-slate-700 text-sm">Videos tab content.</p>
                    </div>
                </x-basekit-ui::tabs>
            </div>

            <!-- With Custom Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">With Custom Icon (Pills)</h4>
                <x-basekit-ui::tabs :items="$customIconTabsItems" active="custom-home" variant="pills">
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white"
                        x-show="activeTab === 'custom-home'">
                        <p class="text-slate-700 text-sm">Home tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white"
                        x-show="activeTab === 'custom-search'">
                        <p class="text-slate-700 text-sm">Search tab content.</p>
                    </div>
                    <div class="mt-4 p-4 border border-slate-200 rounded-lg bg-white"
                        x-show="activeTab === 'custom-star'">
                        <p class="text-slate-700 text-sm">Favorites tab content.</p>
                    </div>
                </x-basekit-ui::tabs>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Breadcrumbs -->
    <x-basekit-ui::styleguide.section-toggle section="breadcrumbs" title="Breadcrumbs">
        <div class="space-y-6">
            @php
                $breadcrumbItems = [
                    ['label' => 'Home', 'url' => '#'],
                    ['label' => 'Projects', 'url' => '#'],
                    ['label' => 'Basekit UI'],
                ];

                $dropdownItemsNested = [
                    ['label' => 'New', 'url' => '#', 'icon' => 'document-plus'],
                    ['label' => 'Open', 'url' => '#', 'icon' => 'folder-open'],
                    [
                        'label' => 'Recent',
                        'icon' => 'clock',
                        'children' => [
                            ['label' => 'Project Atlas', 'url' => '#'],
                            ['label' => 'Project Nova', 'url' => '#'],
                        ],
                    ],
                    ['separator' => true],
                    ['label' => 'Save', 'url' => '#', 'icon' => 'arrow-down-tray'],
                ];
            @endphp

            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Default (Chevron)</p>
                        <nav aria-label="Breadcrumb Default">
                            <x-basekit-ui::breadcrumb :items="$breadcrumbItems" />
                        </nav>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Slash Separator</p>
                        <nav aria-label="Breadcrumb Slash">
                            <x-basekit-ui::breadcrumb :items="[
                                ['label' => 'Home', 'url' => '#'],
                                ['label' => 'Documentation', 'url' => '#'],
                                ['label' => 'Components', 'url' => '#'],
                                ['label' => 'Button'],
                            ]" separator="slash" />
                        </nav>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">With Icons</p>
                        <nav aria-label="Breadcrumb Icons">
                            <x-basekit-ui::breadcrumb :items="[
                                ['label' => 'Dashboard', 'url' => '#', 'icon' => 'home'],
                                ['label' => 'Settings', 'url' => '#', 'icon' => 'cog'],
                                ['label' => 'Account'],
                            ]" />
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">SM</p>
                        <nav aria-label="Breadcrumb Small">
                            <x-basekit-ui::breadcrumb size="sm" :items="$breadcrumbItems" />
                        </nav>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">MD</p>
                        <nav aria-label="Breadcrumb Medium">
                            <x-basekit-ui::breadcrumb size="md" :items="$breadcrumbItems" />
                        </nav>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">LG</p>
                        <nav aria-label="Breadcrumb Large">
                            <x-basekit-ui::breadcrumb size="lg" :items="$breadcrumbItems" />
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Dropdowns -->
    <x-basekit-ui::styleguide.section-toggle section="dropdowns" title="Dropdowns">
        <div class="space-y-6">
            @php
                $dropdownItemsDefault = [
                    ['label' => 'New', 'url' => '#'],
                    ['label' => 'Edit', 'url' => '#'],
                    ['label' => 'Duplicate', 'url' => '#'],
                    ['separator' => true],
                    ['label' => 'Delete', 'url' => '#', 'class' => 'text-red-600 hover:bg-red-50'],
                ];

                $dropdownItemsWithIcons = [
                    ['label' => 'View Profile', 'url' => '#', 'icon' => 'user'],
                    ['label' => 'Settings', 'url' => '#', 'icon' => 'cog'],
                    ['separator' => true],
                    [
                        'label' => 'Delete Account',
                        'url' => '#',
                        'icon' => 'trash',
                        'class' => 'text-red-600 hover:bg-red-50',
                    ],
                ];
            @endphp

            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Default</p>
                        <div class="flex gap-4">
                            <x-basekit-ui::dropdown-menu :items="$dropdownItemsDefault" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">With Icons</p>
                        <div class="flex gap-4">
                            <x-basekit-ui::dropdown-menu :items="$dropdownItemsWithIcons" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trigger Modes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Trigger Modes</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Click (Default)</p>
                        <div class="flex gap-4">
                            <x-basekit-ui::dropdown-menu :items="$dropdownItemsDefault" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Hover</p>
                        <div class="flex gap-4">
                            <x-basekit-ui::dropdown-menu trigger="hover" :items="[
                                ['label' => 'Download', 'url' => '#', 'icon' => 'arrow-down-tray'],
                                ['label' => 'Share', 'url' => '#', 'icon' => 'share'],
                                ['label' => 'Move', 'url' => '#', 'icon' => 'inbox'],
                            ]" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Example -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Advanced Example</h4>
                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Custom Trigger + Nested Items</p>
                    <x-basekit-ui::dropdown-menu :items="$dropdownItemsNested">
                        <x-slot:trigger>
                            <x-basekit-ui::button>File</x-basekit-ui::button>
                        </x-slot:trigger>
                    </x-basekit-ui::dropdown-menu>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Links -->
    <x-basekit-ui::styleguide.section-toggle section="links" title="Links">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Core</p>
                        <div class="flex flex-wrap gap-4">
                            <x-basekit-ui::link href="#" variant="primary">Primary Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="secondary">Secondary Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="muted">Muted Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="ghost">Ghost Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="success">Success Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="warning">Warning Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="danger">Danger Link</x-basekit-ui::link>
                            <x-basekit-ui::link href="#" variant="info">Info Link</x-basekit-ui::link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Icon & External -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Icon & External</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">With Icon</p>
                        <x-basekit-ui::link href="#" icon="arrow-right" variant="primary">
                            Read More
                        </x-basekit-ui::link>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">External</p>
                        <x-basekit-ui::link href="#" icon="arrow-top-right-on-square" is-external
                            variant="secondary">
                            External Link
                        </x-basekit-ui::link>
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Pagination -->
    <x-basekit-ui::styleguide.section-toggle section="pagination" title="Pagination">
        <div class="space-y-6">
            @php
                $paginationCurrentPage = 3;
                $paginationTotalPages = 12;
                $paginationPerPage = 10;
                $paginationTotal = 115;
                $paginationFirstItem = ($paginationCurrentPage - 1) * $paginationPerPage + 1;
                $paginationLastItem = min($paginationCurrentPage * $paginationPerPage, $paginationTotal);
            @endphp

            <!-- Default -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Default</h4>
                <div class="border rounded p-4">
                    <x-basekit-ui::pagination :current-page="$paginationCurrentPage" :total-pages="$paginationTotalPages" :per-page="$paginationPerPage"
                        :total="$paginationTotal" path="#" />
                </div>
            </div>

            <!-- Simple Pagination -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Simple Pagination</h4>
                <div class="border rounded p-4">
                    <x-basekit-ui::pagination :current-page="$paginationCurrentPage" :total-pages="$paginationTotalPages" :per-page="$paginationPerPage"
                        :total="$paginationTotal" path="#" type="simple" />
                </div>
            </div>

            <!-- With Page Info -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Built-in Per Page</h4>
                <div class="border rounded p-4">
                    <x-basekit-ui::pagination :current-page="$paginationCurrentPage" :total-pages="$paginationTotalPages" :per-page="$paginationPerPage"
                        :total="$paginationTotal" path="#" :show-info="true" :show-per-page="true" :per-page-options="[10, 25, 50]"
                        per-page-label="Rows per page:" />
                </div>
            </div>

            <!-- Custom Info Text -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Info Text</h4>
                <div class="border rounded p-4">
                    <x-basekit-ui::pagination :current-page="$paginationCurrentPage" :total-pages="$paginationTotalPages" :per-page="$paginationPerPage"
                        :total="$paginationTotal" path="#" :show-info="true">
                        <x-slot:info>
                            <p class="text-sm text-slate-600">
                                Page {{ $paginationCurrentPage }} with items
                                {{ $paginationFirstItem }}-{{ $paginationLastItem }}
                            </p>
                        </x-slot:info>
                    </x-basekit-ui::pagination>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
