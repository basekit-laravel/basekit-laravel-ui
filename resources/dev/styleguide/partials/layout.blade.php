<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return !h || h === key; };
        return {
            containers: open('containers'),
            dividers: open('dividers'),
            stacks: open('stacks'),
            grids: open('grids'),
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

    {{-- ============================================================ --}}
    {{-- CONTAINER --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="containers" title="Container" description="Centered content wrapper">
        <div class="space-y-6">

            {{-- Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <x-basekit-ui::container size="sm" class="border border-dashed border-slate-300 p-3">
                                <p class="text-sm text-slate-700">size="sm"</p>
                            </x-basekit-ui::container>
                            <x-basekit-ui::container size="md" class="border border-dashed border-slate-300 p-3">
                                <p class="text-sm text-slate-700">size="md"</p>
                            </x-basekit-ui::container>
                            <x-basekit-ui::container size="lg" class="border border-dashed border-slate-300 p-3">
                                <p class="text-sm text-slate-700">size="lg"</p>
                            </x-basekit-ui::container>
                            <x-basekit-ui::container size="xl" class="border border-dashed border-slate-300 p-3">
                                <p class="text-sm text-slate-700">size="xl"</p>
                            </x-basekit-ui::container>
                            <x-basekit-ui::container size="full" class="border border-dashed border-slate-300 p-3">
                                <p class="text-sm text-slate-700">size="full"</p>
                            </x-basekit-ui::container>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::container size="sm">sm</x-basekit-ui::container>
<x-basekit-ui::container size="md">md</x-basekit-ui::container>
<x-basekit-ui::container size="lg">lg</x-basekit-ui::container>
<x-basekit-ui::container size="xl">xl</x-basekit-ui::container>
<x-basekit-ui::container size="full">full</x-basekit-ui::container>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Not Centered --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Not Centered</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::container size="sm" :is-centered="false"
                            class="border border-dashed border-slate-300 p-3">
                            <p class="text-sm text-slate-700">size="sm" :is-centered="false"</p>
                        </x-basekit-ui::container>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::container size="sm" :is-centered="false">
    Not centered content
</x-basekit-ui::container>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- DIVIDER --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="dividers" title="Divider" description="Visual content separator">
        <div class="space-y-6">

            {{-- Variants --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4 rounded-lg border border-slate-200 bg-white p-4">
                            <p class="text-sm text-slate-500">solid (default)</p>
                            <x-basekit-ui::divider variant="solid" />
                            <p class="text-sm text-slate-500">dashed</p>
                            <x-basekit-ui::divider variant="dashed" />
                            <p class="text-sm text-slate-500">dotted</p>
                            <x-basekit-ui::divider variant="dotted" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::divider variant="solid" />
<x-basekit-ui::divider variant="dashed" />
<x-basekit-ui::divider variant="dotted" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Tones --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Tones</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-4 rounded-lg border border-slate-200 bg-white p-4">
                            <p class="text-sm text-slate-500">light</p>
                            <x-basekit-ui::divider tone="light" />
                            <p class="text-sm text-slate-500">default</p>
                            <x-basekit-ui::divider tone="default" />
                            <p class="text-sm text-slate-500">dark</p>
                            <x-basekit-ui::divider tone="dark" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::divider tone="light" />
<x-basekit-ui::divider tone="default" />
<x-basekit-ui::divider tone="dark" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- With Label --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Label</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="rounded-lg border border-slate-200 bg-white p-4">
                            <x-basekit-ui::divider label="Or continue with" />
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::divider label="Or continue with" />
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Vertical --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Vertical</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="flex h-16 items-center gap-4 rounded-lg border border-slate-200 bg-white p-4">
                            <span class="text-sm text-slate-700">Left</span>
                            <x-basekit-ui::divider orientation="vertical" />
                            <span class="text-sm text-slate-700">Right</span>
                        </div>
                    </x-slot:preview>
                    @verbatim
<div class="flex h-16 items-center gap-4">
    <span>Left</span>
    <x-basekit-ui::divider orientation="vertical" />
    <span>Right</span>
</div>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- STACK --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="stacks" title="Stack" description="Flexible spacing layout">
        <div class="space-y-6">

            {{-- Vertical --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Vertical (default)</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::stack direction="vertical" spacing="md">
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 1</div>
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 2</div>
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 3</div>
                        </x-basekit-ui::stack>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stack direction="vertical" spacing="md">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-basekit-ui::stack>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Horizontal --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Horizontal</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::stack direction="horizontal" spacing="md">
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 1</div>
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 2</div>
                            <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 3</div>
                        </x-basekit-ui::stack>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stack direction="horizontal" spacing="md">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-basekit-ui::stack>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Spacing --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Spacing</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">spacing="xs"</p>
                                <x-basekit-ui::stack direction="horizontal" spacing="xs">
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">spacing="sm"</p>
                                <x-basekit-ui::stack direction="horizontal" spacing="sm">
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">spacing="md"</p>
                                <x-basekit-ui::stack direction="horizontal" spacing="md">
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">spacing="lg"</p>
                                <x-basekit-ui::stack direction="horizontal" spacing="lg">
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">spacing="xl"</p>
                                <x-basekit-ui::stack direction="horizontal" spacing="xl">
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stack direction="horizontal" spacing="xs">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" spacing="sm">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" spacing="lg">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" spacing="xl">...</x-basekit-ui::stack>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Alignment --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Alignment (align)</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">align="start"</p>
                                <x-basekit-ui::stack direction="horizontal" align="start" spacing="md"
                                    class="h-16 rounded-lg border border-slate-200 bg-white px-4">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-3 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">align="center"</p>
                                <x-basekit-ui::stack direction="horizontal" align="center" spacing="md"
                                    class="h-16 rounded-lg border border-slate-200 bg-white px-4">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-3 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">align="end"</p>
                                <x-basekit-ui::stack direction="horizontal" align="end" spacing="md"
                                    class="h-16 rounded-lg border border-slate-200 bg-white px-4">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-3 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">align="stretch"</p>
                                <x-basekit-ui::stack direction="horizontal" align="stretch" spacing="md"
                                    class="h-16 rounded-lg border border-slate-200 bg-white px-4">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-2 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-3 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stack direction="horizontal" align="start" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" align="center" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" align="end" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" align="stretch" spacing="md">...</x-basekit-ui::stack>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Justify --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Justify</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">justify="start"</p>
                                <x-basekit-ui::stack direction="horizontal" justify="start" spacing="md"
                                    class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">justify="center"</p>
                                <x-basekit-ui::stack direction="horizontal" justify="center" spacing="md"
                                    class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">justify="end"</p>
                                <x-basekit-ui::stack direction="horizontal" justify="end" spacing="md"
                                    class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">justify="between"</p>
                                <x-basekit-ui::stack direction="horizontal" justify="between" spacing="md"
                                    class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">justify="around"</p>
                                <x-basekit-ui::stack direction="horizontal" justify="around" spacing="md"
                                    class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                                </x-basekit-ui::stack>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::stack direction="horizontal" justify="start" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" justify="center" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" justify="end" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" justify="between" spacing="md">...</x-basekit-ui::stack>
<x-basekit-ui::stack direction="horizontal" justify="around" spacing="md">...</x-basekit-ui::stack>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

    {{-- ============================================================ --}}
    {{-- GRID --}}
    {{-- ============================================================ --}}
    <x-basekit-ui::styleguide.section-toggle section="grids" title="Grid" description="Responsive column grid">
        <div class="space-y-6">

            {{-- Column Counts --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Column Counts</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">cols="2"</p>
                                <x-basekit-ui::grid :cols="2" gap="sm" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">1</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">2</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">cols="3"</p>
                                <x-basekit-ui::grid :cols="3" gap="sm" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">1</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">2</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">3</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">cols="4"</p>
                                <x-basekit-ui::grid :cols="4" gap="sm" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">1</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">2</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">3</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">4</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">cols="6"</p>
                                <x-basekit-ui::grid :cols="6" gap="sm" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">1</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">2</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">3</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">4</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">5</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">6</div>
                                </x-basekit-ui::grid>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::grid :cols="2" gap="sm" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid :cols="3" gap="sm" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid :cols="4" gap="sm" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid :cols="6" gap="sm" :responsive="false">...</x-basekit-ui::grid>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Gap Sizes --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Gap Sizes</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <div class="space-y-3">
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="xs"</p>
                                <x-basekit-ui::grid cols="3" gap="xs" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="sm"</p>
                                <x-basekit-ui::grid cols="3" gap="sm" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="md"</p>
                                <x-basekit-ui::grid cols="3" gap="md" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="lg"</p>
                                <x-basekit-ui::grid cols="3" gap="lg" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                                </x-basekit-ui::grid>
                            </div>
                            <div>
                                <p class="mb-1 text-xs text-slate-400">gap="xl"</p>
                                <x-basekit-ui::grid cols="3" gap="xl" :responsive="false">
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                                </x-basekit-ui::grid>
                            </div>
                        </div>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::grid cols="3" gap="xs" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="sm" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="md" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="lg" :responsive="false">...</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="xl" :responsive="false">...</x-basekit-ui::grid>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

            {{-- Responsive Grid --}}
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Responsive</p>
                <x-basekit-ui::styleguide.code-example>
                    <x-slot:preview>
                        <x-basekit-ui::styleguide.responsive-preview title="Responsive Grid"
                            subtitle="Resize the preview or use the preset buttons to test responsive behavior."
                            large-label="Desktop" :breakpoint="768" :default-width="520">
                            <div class="my-3">
                                <x-basekit-ui::grid cols="4" gap="md" :responsive="true">
                                    <div class="rounded bg-slate-100 p-4 text-center text-sm text-slate-700">1</div>
                                    <div class="rounded bg-slate-100 p-4 text-center text-sm text-slate-700">2</div>
                                    <div class="rounded bg-slate-100 p-4 text-center text-sm text-slate-700">3</div>
                                    <div class="rounded bg-slate-100 p-4 text-center text-sm text-slate-700">4</div>
                                </x-basekit-ui::grid>
                            </div>
                        </x-basekit-ui::styleguide.responsive-preview>
                    </x-slot:preview>
                    @verbatim
<x-basekit-ui::grid cols="4" gap="md" :responsive="true">
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
</x-basekit-ui::grid>
                    @endverbatim
                </x-basekit-ui::styleguide.code-example>
            </div>

        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
