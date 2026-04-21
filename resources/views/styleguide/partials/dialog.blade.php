<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return !h || h === key; };
        return {
            accordion: open('accordion'),
            modals: open('modals'),
        };
    })(),
    expandAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = true));
    },
    collapseAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = false));
    },
    openModal: false,
    openConfirm: false,
    openSmall: false,
    openMedium: false,
    openLarge: false,
    openXLarge: false,
    openFull: false,
    openNoClose: false,
    openFormModal: false,
}">

    <x-basekit-ui::styleguide.section-controls />

    <!-- Accordion -->
    <x-basekit-ui::styleguide.section-toggle section="accordion" title="Accordion">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Default</p>
                        <x-basekit-ui::accordion :items="[
                            [
                                'title' => 'What is Basekit Laravel UI?',
                                'content' =>
                                    'Basekit Laravel UI is a set of reusable, customizable Blade components styled with Tailwind CSS.',
                                'value' => 'item-1',
                            ],
                            [
                                'title' => 'How do I install it?',
                                'content' =>
                                    'You can install the package via Composer using `composer require basekit-laravel/basekit-laravel-ui`.',
                                'value' => 'item-2',
                            ],
                            [
                                'title' => 'Can I customize the styles?',
                                'content' =>
                                    'Yes! The components are built with Tailwind CSS, so you can easily override styles.',
                                'value' => 'item-3',
                            ],
                        ]" active="item-1" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Bordered</p>
                        <x-basekit-ui::accordion variant="bordered" :items="[
                            [
                                'title' => 'Features',
                                'content' =>
                                    'Includes buttons, forms, modals, dropdowns, tables, and more. All components are fully accessible.',
                                'value' => 'bordered-1',
                            ],
                            [
                                'title' => 'Performance',
                                'content' => 'Optimized for performance with minimal CSS and JavaScript footprint.',
                                'value' => 'bordered-2',
                            ],
                            [
                                'title' => 'Documentation',
                                'content' => 'Comprehensive documentation with usage examples for every component.',
                                'value' => 'bordered-3',
                            ],
                        ]" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Flush</p>
                        <x-basekit-ui::accordion variant="flush" :items="[
                            [
                                'title' => 'Getting Started',
                                'content' => 'Start by installing the package and publishing the config file.',
                                'value' => 'flush-1',
                            ],
                            [
                                'title' => 'Theming',
                                'content' => 'Customize colors, fonts, and spacing using Tailwind CSS configuration.',
                                'value' => 'flush-2',
                            ],
                            [
                                'title' => 'Advanced Usage',
                                'content' => 'Learn about slots, variants, and custom component composition.',
                                'value' => 'flush-3',
                            ],
                        ]" active="flush-1" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700">Separated</p>
                        <x-basekit-ui::accordion variant="separated" :items="[
                            [
                                'title' => 'Components',
                                'content' =>
                                    'Over 30 components including forms, navigation, feedback, and layout elements.',
                                'value' => 'separated-1',
                            ],
                            [
                                'title' => 'Accessibility',
                                'content' =>
                                    'All components follow WAI-ARIA best practices and are keyboard navigable.',
                                'value' => 'separated-2',
                            ],
                        ]" />
                    </div>
                </div>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">SM</p>
                        <x-basekit-ui::accordion size="sm" :items="[
                            [
                                'title' => 'Question 1',
                                'content' => 'This is a compact accordion with smaller padding and font sizes.',
                                'value' => 'sm-1',
                            ],
                            [
                                'title' => 'Question 2',
                                'content' => 'Perfect for tight spaces or when you need to conserve vertical space.',
                                'value' => 'sm-2',
                            ],
                        ]" active="sm-1" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">MD</p>
                        <x-basekit-ui::accordion size="md" :items="[
                            [
                                'title' => 'Default Size',
                                'content' =>
                                    'Medium is the default accordion size and works well for most content blocks.',
                                'value' => 'md-1',
                            ],
                            [
                                'title' => 'Balanced Layout',
                                'content' => 'It provides a balanced amount of spacing and readable typography.',
                                'value' => 'md-2',
                            ],
                        ]" active="md-1" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-slate-700 uppercase">LG</p>
                        <x-basekit-ui::accordion size="lg" :items="[
                            [
                                'title' => 'Important Information',
                                'content' => 'This is a larger accordion with more generous padding and larger text.',
                                'value' => 'lg-1',
                            ],
                            [
                                'title' => 'Key Features',
                                'content' =>
                                    'Use this size when you want to draw more attention to the accordion content.',
                                'value' => 'lg-2',
                            ],
                        ]" />
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Modals -->
    <x-basekit-ui::styleguide.section-toggle section="modals" title="Modals">
        <div class="space-y-6">
            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>

                <div class="flex flex-wrap gap-3">
                    <x-basekit-ui::button size="sm" @click="openSmall = true">
                        Small Modal
                    </x-basekit-ui::button>

                    <x-basekit-ui::button size="sm" variant="secondary" @click="openMedium = true">
                        Medium Modal (Default)
                    </x-basekit-ui::button>

                    <x-basekit-ui::button size="sm" variant="success" @click="openLarge = true">
                        Large Modal
                    </x-basekit-ui::button>

                    <x-basekit-ui::button size="sm" variant="info" @click="openXLarge = true">
                        Extra Large Modal
                    </x-basekit-ui::button>

                    <x-basekit-ui::button size="sm" variant="warning" @click="openFull = true">
                        Full Screen Modal
                    </x-basekit-ui::button>
                </div>

                {{-- Small Modal --}}
                <x-basekit-ui::modal show="openSmall" size="sm" title="Small Modal">
                    <p class="text-slate-600">
                        This is a small modal, perfect for simple confirmations or short messages.
                    </p>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3 w-full">
                            <x-basekit-ui::button variant="ghost" @click="openSmall = false">Close</x-basekit-ui::button>
                            <x-basekit-ui::button variant="primary" @click="openSmall = false">OK</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- Medium Modal (Default) --}}
                <x-basekit-ui::modal show="openMedium" size="md" title="Medium Modal (Default)">
                    <div class="space-y-4">
                        <p class="text-slate-600">
                            This is the default medium-sized modal. It works well for most use cases including forms and
                            detailed content.
                        </p>
                        <p class="text-slate-600">
                            You can add multiple paragraphs, images, or any other content here.
                        </p>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-basekit-ui::button variant="ghost" @click="openMedium = false">Cancel</x-basekit-ui::button>
                            <x-basekit-ui::button variant="primary" @click="openMedium = false">Save</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- Large Modal --}}
                <x-basekit-ui::modal show="openLarge" size="lg" title="Large Modal">
                    <div class="space-y-4">
                        <p class="text-slate-600">
                            This is a large modal with more room for content. Great for complex forms or detailed
                            information.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 rounded">
                                <h4 class="font-medium mb-2">Feature 1</h4>
                                <p class="text-sm text-slate-600">Description of the first feature.</p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded">
                                <h4 class="font-medium mb-2">Feature 2</h4>
                                <p class="text-sm text-slate-600">Description of the second feature.</p>
                            </div>
                        </div>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-basekit-ui::button variant="ghost" @click="openLarge = false">Close</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- Extra Large Modal --}}
                <x-basekit-ui::modal show="openXLarge" size="xl" title="Extra Large Modal">
                    <div class="space-y-4">
                        <p class="text-slate-600">
                            This extra large modal provides maximum space for complex layouts, data tables, or rich
                            media
                            content.
                        </p>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="p-4 bg-blue-50 rounded">
                                <h4 class="font-medium mb-2 text-blue-900">Column 1</h4>
                                <p class="text-sm text-blue-700">Content for first column.</p>
                            </div>
                            <div class="p-4 bg-green-50 rounded">
                                <h4 class="font-medium mb-2 text-green-900">Column 2</h4>
                                <p class="text-sm text-green-700">Content for second column.</p>
                            </div>
                            <div class="p-4 bg-purple-50 rounded">
                                <h4 class="font-medium mb-2 text-purple-900">Column 3</h4>
                                <p class="text-sm text-purple-700">Content for third column.</p>
                            </div>
                        </div>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-between w-full">
                            <x-basekit-ui::button variant="ghost" @click="openXLarge = false">Back</x-basekit-ui::button>
                            <div class="flex gap-3">
                                <x-basekit-ui::button variant="ghost"
                                    @click="openXLarge = false">Cancel</x-basekit-ui::button>
                                <x-basekit-ui::button variant="primary"
                                    @click="openXLarge = false">Continue</x-basekit-ui::button>
                            </div>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- Full Screen Modal --}}
                <x-basekit-ui::modal show="openFull" size="full" title="Full Screen Modal">
                    <div class="space-y-6">
                        <p class="text-slate-600">
                            This full-screen modal takes up 90% of the viewport, perfect for editors, complex forms, or
                            immersive experiences.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="p-6 border border-slate-200 rounded-lg">
                                    <h4 class="font-semibold mb-3">Section {{ $i }}</h4>
                                    <p class="text-sm text-slate-600 mb-4">
                                        This is a demonstration of how much content you can fit in a full-screen modal.
                                        Each section can contain forms, images, or any other components.
                                    </p>
                                    <x-basekit-ui::button size="sm" variant="ghost">Action</x-basekit-ui::button>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3 w-full">
                            <x-basekit-ui::button variant="ghost" @click="openFull = false">Cancel</x-basekit-ui::button>
                            <x-basekit-ui::button variant="primary" @click="openFull = false">Save
                                Changes</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>
            </div>

            <!-- Use Cases -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Use Cases</h4>

                <div class="flex flex-wrap gap-3">
                    <x-basekit-ui::button @click="openModal = true">
                        Basic Modal
                    </x-basekit-ui::button>

                    <x-basekit-ui::button variant="danger" @click="openConfirm = true">
                        Confirmation Modal
                    </x-basekit-ui::button>

                    <x-basekit-ui::button variant="warning" @click="openNoClose = true">
                        No Close Button
                    </x-basekit-ui::button>
                </div>

                {{-- Basic Modal --}}
                <x-basekit-ui::modal show="openModal" title="Welcome to Basekit">
                    <div class="space-y-4">
                        <p class="text-slate-600">
                            This is a basic modal dialog. It can contain any content, forms, or other components.
                        </p>
                        <div class="p-4 bg-slate-50 rounded border border-slate-100">
                            <p class="text-sm">You can dismiss this by clicking the backdrop or the close button.</p>
                        </div>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-basekit-ui::button variant="ghost" @click="openModal = false">Close</x-basekit-ui::button>
                            <x-basekit-ui::button variant="primary"
                                @click="openModal = false">Understood</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- Confirmation Modal --}}
                <x-basekit-ui::modal show="openConfirm" size="sm" title="Are you sure?">
                    <p class="text-slate-600">
                        This action cannot be undone. This will permanently delete your data from our servers.
                    </p>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3 w-full">
                            <x-basekit-ui::button class="w-full sm:w-auto" variant="ghost"
                                @click="openConfirm = false">Cancel</x-basekit-ui::button>
                            <x-basekit-ui::button class="w-full sm:w-auto" variant="danger"
                                @click="openConfirm = false">Delete Permanently</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>

                {{-- No Close Button Modal --}}
                <x-basekit-ui::modal show="openNoClose" :is-close-button="false" title="Action Required">
                    <div class="space-y-4">
                        <p class="text-slate-600">
                            This modal requires you to make a choice. There's no close button, so you must select one of
                            the options below.
                        </p>
                        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded">
                            <p class="text-sm text-yellow-800">
                                <strong>Note:</strong> You can still close this by pressing the Escape key or clicking
                                outside the modal.
                            </p>
                        </div>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3 w-full">
                            <x-basekit-ui::button variant="ghost"
                                @click="openNoClose = false">Decline</x-basekit-ui::button>
                            <x-basekit-ui::button variant="primary"
                                @click="openNoClose = false">Accept</x-basekit-ui::button>
                        </div>
                    </x-slot:footer>
                </x-basekit-ui::modal>
            </div>

            <!-- Advanced Example -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Advanced Example</h4>

                <div class="space-y-2">
                    <p class="text-xs font-semibold text-slate-700">Form Modal</p>

                    <div class="flex flex-wrap gap-3">
                        <x-basekit-ui::button variant="secondary" @click="openFormModal = true">
                            Form Modal
                        </x-basekit-ui::button>
                    </div>

                    {{-- Form Modal --}}
                    <x-basekit-ui::modal show="openFormModal" title="Create New Project">
                        <form class="space-y-4">
                            <div>
                                <x-basekit-ui::input label="Project Name" placeholder="Enter project name" />
                            </div>
                            <div>
                                <x-basekit-ui::textarea label="Description" placeholder="Describe your project..."
                                    rows="3" />
                            </div>
                            <div>
                                <x-basekit-ui::select label="Category" :options="[
                                    'web' => 'Web Application',
                                    'mobile' => 'Mobile App',
                                    'api' => 'API Service',
                                    'other' => 'Other',
                                ]" />
                            </div>
                        </form>

                        <x-slot:footer>
                            <div class="flex justify-end gap-3">
                                <x-basekit-ui::button variant="ghost"
                                    @click="openFormModal = false">Cancel</x-basekit-ui::button>
                                <x-basekit-ui::button variant="primary" @click="openFormModal = false">Create
                                    Project</x-basekit-ui::button>
                            </div>
                        </x-slot:footer>
                    </x-basekit-ui::modal>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>
</div>
