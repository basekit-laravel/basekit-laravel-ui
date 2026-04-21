{{-- Styleguide Section Controls Component --}}
{{--
    Used to display "Open all" / "Hide all" buttons for collapsible sections in the styleguide.
    
    Usage:
    <x-basekit-ui::styleguide.section-controls />
--}}

<div class="flex flex-wrap items-center justify-end gap-3">
    <x-basekit-ui::button type="button" size="sm" variant="secondary" @click="expandAll()">
        Open all
    </x-basekit-ui::button>
    <x-basekit-ui::button type="button" size="sm" variant="ghost" @click="collapseAll()">
        Hide all
    </x-basekit-ui::button>
</div>
