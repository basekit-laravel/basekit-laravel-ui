{{-- Styleguide Section Toggle Component --}}
{{--
    Used to display a toggle button for individual collapsible sections in the styleguide.
    
    Props:
    - section: string (required) - The section name in the sections object
    - title: string (required) - The display title for the section
    
    Usage:
    <x-basekit-ui::styleguide.section-toggle section="buttons" title="Buttons" />
--}}

@props(['section', 'title'])

<div id="{{ $section }}">
    <div class="flex items-center justify-between border-b border-slate-100 pb-2 mb-4">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        <button type="button" class="text-sm font-medium text-slate-600 hover:text-slate-900 cursor-pointer"
            @click="sections.{{ $section }} = !sections.{{ $section }}"
            :aria-expanded="sections.{{ $section }}.toString()">
            <span x-text="sections.{{ $section }} ? 'Hide' : 'Show'"></span>
        </button>
    </div>
    <div x-show="sections.{{ $section }}" x-transition>
        {{ $slot }}
    </div>
</div>
