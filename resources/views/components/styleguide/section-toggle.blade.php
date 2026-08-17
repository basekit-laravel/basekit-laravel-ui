@props(['section', 'title', 'name' => null, 'description' => null])

@php
    $matchName = strtolower($name ?? $title);
    $matchDesc = strtolower($description ?? '');
@endphp

<div id="{{ $section }}" class="sg-section" data-search-terms="{{ $matchName }} {{ $matchDesc }}" style="scroll-margin-top: calc(var(--sg-header-h, 64px) + 1rem);">
    <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--sg-border, #e2e8f0); padding-bottom: 0.5rem; margin-bottom: 1rem;">
        <h3 style="font-size: 1rem; font-weight: 600; margin: 0;">{{ $title }}</h3>
        <button type="button" style="font-size: 0.75rem; font-weight: 500; color: var(--sg-text-secondary, #475569); background: none; border: none; cursor: pointer; padding: 0.25rem 0.5rem; border-radius: 0.375rem; transition: color 0.1s;"
            @click="sections.{{ $section }} = !sections.{{ $section }}"
            :aria-expanded="sections.{{ $section }}.toString()"
            onmouseover="this.style.color='var(--sg-primary, #4f46e5)'" onmouseout="this.style.color='var(--sg-text-secondary, #475569)'">
            <span x-text="sections.{{ $section }} ? 'Hide' : 'Show'"></span>
        </button>
    </div>
    <div x-show="sections.{{ $section }}" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
        {{ $slot }}
    </div>
</div>
