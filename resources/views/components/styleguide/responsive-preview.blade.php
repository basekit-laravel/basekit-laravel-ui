@props([
    'title' => 'Responsive Preview',
    'subtitle' => 'Drag the right handle to resize the container',
    'breakpoint' => 768,
    'smallLabel' => 'Mobile mode',
    'largeLabel' => 'Desktop mode',
    'defaultView' => null,
    'defaultWidth' => 420,
    'minWidth' => 280,
    'maxWidth' => 1100,
    'presets' => [
        ['label' => 'Mobile 320', 'width' => 320],
        ['label' => 'Mobile 480', 'width' => 480],
        ['label' => 'Tablet 768', 'width' => 768],
        ['label' => 'Desktop 1024', 'width' => 1024],
    ],
])

@php
    $minWidth = (int) $minWidth;
    $maxWidth = (int) $maxWidth;
    $breakpoint = (int) $breakpoint;
    $defaultWidth = (int) $defaultWidth;
    $view = is_string($defaultView) ? strtolower(trim($defaultView)) : null;

    // Map size names to preset widths
    $sizeMap = [
        'xs' => 320,
        'sm' => 320,
        'md' => 768,
        'lg' => 1024,
        'xl' => 1024,
    ];

    if ($view && isset($sizeMap[$view])) {
        $defaultWidth = $sizeMap[$view];
    }

    $defaultWidth = max($minWidth, min($maxWidth, $defaultWidth));
@endphp

<div x-data="{
    previewWidth: {{ $defaultWidth }},
    minWidth: {{ $minWidth }},
    maxWidth: {{ $maxWidth }},
    breakpoint: {{ $breakpoint }},
    smallModeLabel: @js($smallLabel),
    largeModeLabel: @js($largeLabel),
    dragging: false,
    startX: 0,
    startWidth: 0,
    setWidth(width) {
        this.previewWidth = Math.max(this.minWidth, Math.min(this.maxWidth, width));
    },
    modeLabel() {
        return this.previewWidth < this.breakpoint ? this.smallModeLabel : this.largeModeLabel;
    },
    isPresetActive(width) {
        return Math.round(this.previewWidth) === width;
    },
    startResize(event) {
        this.dragging = true;
        this.startX = event.clientX;
        this.startWidth = this.previewWidth;

        const onMove = (moveEvent) => {
            const nextWidth = this.startWidth + (moveEvent.clientX - this.startX);
            this.previewWidth = Math.max(this.minWidth, Math.min(this.maxWidth, nextWidth));
        };

        const onUp = () => {
            this.dragging = false;
            window.removeEventListener('mousemove', onMove);
            window.removeEventListener('mouseup', onUp);
        };

        window.addEventListener('mousemove', onMove);
        window.addEventListener('mouseup', onUp);
    },
}">
    <div class="mb-4 rounded-xl border border-slate-200 bg-slate-50/70 p-4">
        <div class="flex flex-wrap items-center gap-3 justify-between">
            <div>
                <p class="text-sm font-medium text-slate-900">{{ $title }}</p>
                <p class="text-xs text-slate-500">{{ $subtitle }}</p>
            </div>
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs">
                <span class="h-2 w-2 rounded-full"
                    :class="previewWidth < breakpoint ? 'bg-amber-500' : 'bg-emerald-500'"></span>
                <span class="font-medium text-slate-700" x-text="modeLabel()"></span>
                <span class="text-slate-400">•</span>
                <span class="font-semibold text-slate-900" x-text="`${Math.round(previewWidth)}px`"></span>
            </div>
        </div>

        <div class="mt-3 flex flex-wrap gap-2">
            @foreach ($presets as $preset)
                @php
                    $presetWidth = (int) ($preset['width'] ?? 0);
                    $presetLabel = $preset['label'] ?? $presetWidth;
                @endphp
                <button type="button"
                    class="inline-flex items-center rounded-md border px-3 py-1.5 text-xs font-medium transition-colors"
                    :class="isPresetActive({{ $presetWidth }}) ?
                        'border-slate-300 bg-white text-slate-900 shadow-sm' :
                        'border-transparent bg-transparent text-slate-600 hover:border-slate-200 hover:bg-white/90 hover:text-slate-900'"
                    @click="setWidth({{ $presetWidth }})">{{ $presetLabel }}</button>
            @endforeach
        </div>
    </div>

    <div class="relative w-full" :style="`max-width: ${previewWidth}px;`">
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition-shadow"
            :class="dragging ? 'shadow-md' : ''">
            {{ $slot }}
        </div>

        <button type="button"
            class="group absolute inset-y-0 -right-3 flex w-6 cursor-col-resize items-center justify-center"
            @mousedown.prevent="startResize($event)"
            :aria-label="dragging ? 'Resizing table preview' : 'Resize table preview'">
            <span
                class="flex h-[calc(100%-1rem)] w-4 flex-col items-center justify-center gap-1 rounded-md border border-slate-300 bg-slate-100 shadow-sm transition-colors"
                :class="dragging ? 'bg-slate-200 border-slate-400' : 'group-hover:bg-slate-200 group-hover:border-slate-400'">
                <span class="h-1 w-1 rounded-full bg-slate-500"></span>
                <span class="h-1 w-1 rounded-full bg-slate-500"></span>
                <span class="h-1 w-1 rounded-full bg-slate-500"></span>
            </span>
        </button>
    </div>
</div>
