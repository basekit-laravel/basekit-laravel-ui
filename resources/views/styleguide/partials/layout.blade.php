<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return h === '' || h === key; };
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

    <x-basekit-ui::styleguide.section-toggle section="containers" title="Container">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Sizes</p>
                <div class="space-y-3">
                    @foreach (['sm', 'md', 'lg', 'xl', 'full'] as $size)
                        <x-basekit-ui::container :size="$size" class="border border-dashed border-slate-300 p-3">
                            <p class="text-sm text-slate-700">size="{{ $size }}"</p>
                        </x-basekit-ui::container>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Not Centered</p>
                <x-basekit-ui::container size="sm" :is-centered="false"
                    class="border border-dashed border-slate-300 p-3">
                    <p class="text-sm text-slate-700">size="sm" :is-centered="false"</p>
                </x-basekit-ui::container>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="dividers" title="Divider">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Variants</p>
                <div class="space-y-4 rounded-lg border border-slate-200 bg-white p-4">
                    <p class="text-sm text-slate-500">solid (default)</p>
                    <x-basekit-ui::divider variant="solid" />
                    <p class="text-sm text-slate-500">dashed</p>
                    <x-basekit-ui::divider variant="dashed" />
                    <p class="text-sm text-slate-500">dotted</p>
                    <x-basekit-ui::divider variant="dotted" />
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Tones</p>
                <div class="space-y-4 rounded-lg border border-slate-200 bg-white p-4">
                    <p class="text-sm text-slate-500">light</p>
                    <x-basekit-ui::divider tone="light" />
                    <p class="text-sm text-slate-500">default</p>
                    <x-basekit-ui::divider tone="default" />
                    <p class="text-sm text-slate-500">dark</p>
                    <x-basekit-ui::divider tone="dark" />
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">With Label</p>
                <div class="rounded-lg border border-slate-200 bg-white p-4">
                    <x-basekit-ui::divider label="Or continue with" />
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Vertical</p>
                <div class="flex h-16 items-center gap-4 rounded-lg border border-slate-200 bg-white p-4">
                    <span class="text-sm text-slate-700">Left</span>
                    <x-basekit-ui::divider orientation="vertical" />
                    <span class="text-sm text-slate-700">Right</span>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="stacks" title="Stack">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Vertical (default)</p>
                <x-basekit-ui::stack direction="vertical" spacing="md">
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 1</div>
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 2</div>
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 3</div>
                </x-basekit-ui::stack>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Horizontal</p>
                <x-basekit-ui::stack direction="horizontal" spacing="md">
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 1</div>
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 2</div>
                    <div class="rounded-lg bg-slate-100 p-3 text-sm text-slate-700">Item 3</div>
                </x-basekit-ui::stack>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Spacing</p>
                <div class="space-y-3">
                    @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $spacing)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">spacing="{{ $spacing }}"</p>
                            <x-basekit-ui::stack direction="horizontal" :spacing="$spacing">
                                <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">A</div>
                                <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">B</div>
                                <div class="rounded bg-slate-100 p-2 text-xs text-slate-700">C</div>
                            </x-basekit-ui::stack>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Alignment (align)</p>
                <div class="space-y-3">
                    @foreach (['start', 'center', 'end', 'stretch'] as $align)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">align="{{ $align }}"</p>
                            <x-basekit-ui::stack direction="horizontal" :align="$align" spacing="md"
                                class="h-16 rounded-lg border border-slate-200 bg-white px-4">
                                <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                <div class="rounded bg-slate-100 px-3 py-2 text-xs text-slate-700">B</div>
                                <div class="rounded bg-slate-100 px-3 py-3 text-xs text-slate-700">C</div>
                            </x-basekit-ui::stack>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Justify</p>
                <div class="space-y-3">
                    @foreach (['start', 'center', 'end', 'between', 'around'] as $justify)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">justify="{{ $justify }}"</p>
                            <x-basekit-ui::stack direction="horizontal" :justify="$justify" spacing="md"
                                class="rounded-lg border border-slate-200 bg-white px-4 py-3">
                                <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">A</div>
                                <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">B</div>
                                <div class="rounded bg-slate-100 px-3 py-1 text-xs text-slate-700">C</div>
                            </x-basekit-ui::stack>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <x-basekit-ui::styleguide.section-toggle section="grids" title="Grid">
        <div class="space-y-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Column Counts</p>
                <div class="space-y-3">
                    @foreach ([2, 3, 4, 6] as $cols)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">cols="{{ $cols }}"</p>
                            <x-basekit-ui::grid :cols="$cols" gap="sm" :responsive="false">
                                @for ($i = 1; $i <= $cols; $i++)
                                    <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">
                                        {{ $i }}</div>
                                @endfor
                            </x-basekit-ui::grid>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Gap Sizes</p>
                <div class="space-y-3">
                    @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $gap)
                        <div>
                            <p class="mb-1 text-xs text-slate-400">gap="{{ $gap }}"</p>
                            <x-basekit-ui::grid cols="3" :gap="$gap" :responsive="false">
                                <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">A</div>
                                <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">B</div>
                                <div class="rounded bg-slate-100 p-3 text-center text-xs text-slate-700">C</div>
                            </x-basekit-ui::grid>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
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
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

</div>
