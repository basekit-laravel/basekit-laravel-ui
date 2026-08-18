@php
    $componentIndex = [
        'Form' => [
            ['name' => 'Button', 'description' => 'Actions and triggers', 'anchor' => 'buttons'],
            ['name' => 'Copy Button', 'description' => 'Copy content to clipboard', 'anchor' => 'copybuttons'],
            ['name' => 'Input', 'description' => 'Text field with labels and validation', 'anchor' => 'inputs'],
            ['name' => 'Select', 'description' => 'Single-value dropdown selector', 'anchor' => 'selects'],
            ['name' => 'Multi-Select', 'description' => 'Multi-value dropdown selector', 'anchor' => 'multiselects'],
            ['name' => 'Textarea', 'description' => 'Multi-line text input', 'anchor' => 'textareas'],
            ['name' => 'Checkbox', 'description' => 'Binary choice input', 'anchor' => 'checkboxes'],
            ['name' => 'Radio', 'description' => 'Single choice from options', 'anchor' => 'radios'],
            ['name' => 'Fieldset', 'description' => 'Grouped form controls', 'anchor' => 'fieldsets'],
            ['name' => 'Toggle', 'description' => 'On/off switch control', 'anchor' => 'toggles'],
        ],
        'Feedback' => [
            ['name' => 'Alert', 'description' => 'Inline status messages', 'anchor' => 'alerts'],
            ['name' => 'Empty State', 'description' => 'Empty content placeholder', 'anchor' => 'empty'],
            ['name' => 'Spinner', 'description' => 'Loading indicator', 'anchor' => 'spinners'],
            ['name' => 'Progress', 'description' => 'Progress bar indicator', 'anchor' => 'progress'],
            ['name' => 'Skeleton', 'description' => 'Content loading placeholder', 'anchor' => 'skeletons'],
            ['name' => 'Tooltip', 'description' => 'Hover/focus hint content', 'anchor' => 'tooltips'],
            ['name' => 'Toast', 'description' => 'Transient notifications', 'anchor' => 'toasts'],
        ],
        'Navigation' => [
            ['name' => 'Tabs', 'description' => 'Tabbed content panels', 'anchor' => 'tabs'],
            ['name' => 'Breadcrumb', 'description' => 'Hierarchical page trail', 'anchor' => 'breadcrumbs'],
            ['name' => 'Dropdown Menu', 'description' => 'Action menu with items', 'anchor' => 'dropdowns'],
            ['name' => 'Link', 'description' => 'Styled navigation link', 'anchor' => 'links'],
            ['name' => 'Pagination', 'description' => 'Page navigation control', 'anchor' => 'pagination'],
        ],
        'Layout' => [
            ['name' => 'Container', 'description' => 'Centered content wrapper', 'anchor' => 'containers'],
            ['name' => 'Divider', 'description' => 'Visual content separator', 'anchor' => 'dividers'],
            ['name' => 'Stack', 'description' => 'Flexible spacing layout', 'anchor' => 'stacks'],
            ['name' => 'Grid', 'description' => 'Responsive column grid', 'anchor' => 'grids'],
        ],
        'Display' => [
            ['name' => 'Card', 'description' => 'Content container with header/footer', 'anchor' => 'cards'],
            ['name' => 'Badge', 'description' => 'Label and status indicator', 'anchor' => 'badges'],
            ['name' => 'Avatar', 'description' => 'User image or initials', 'anchor' => 'avatars'],
            ['name' => 'Table', 'description' => 'Data table with responsive modes', 'anchor' => 'table'],
            ['name' => 'List', 'description' => 'Ordered and unordered lists', 'anchor' => 'lists'],
            ['name' => 'Description List', 'description' => 'Key-value pair display', 'anchor' => 'descriptionLists'],
            ['name' => 'Stat', 'description' => 'Metric with trend indicator', 'anchor' => 'stats'],
        ],
        'Dialog' => [
            ['name' => 'Accordion', 'description' => 'Collapsible content sections', 'anchor' => 'accordion'],
            ['name' => 'Modal', 'description' => 'Overlay dialog window', 'anchor' => 'modals'],
        ],
    ];
    $componentCount = collect($componentIndex)->sum(fn ($cats) => count($cats));
    $anchorToCategory = [];
    foreach ($componentIndex as $cat => $components) {
        $slug = \Illuminate\Support\Str::slug($cat);
        foreach ($components as $comp) {
            $anchorToCategory[$comp['anchor']] = $slug;
        }
    }
@endphp

<style>
/* =========================================================================
   Basekit Styleguide — Design System
   ========================================================================= */
:root {
    --sg-surface: #ffffff;
    --sg-surface-secondary: #f8fafc;
    --sg-surface-tertiary: #f1f5f9;
    --sg-border: #e2e8f0;
    --sg-border-light: #f1f5f9;
    --sg-text: #1e293b;
    --sg-text-secondary: #475569;
    --sg-text-muted: #94a3b8;
    --sg-primary: #4f46e5;
    --sg-primary-light: #eef2ff;
    --sg-radius: 0.75rem;
    --sg-radius-sm: 0.5rem;
    --sg-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.06), 0 1px 2px -1px rgb(0 0 0 / 0.06);
    --sg-shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.07), 0 2px 4px -2px rgb(0 0 0 / 0.05);
    --sg-sidebar-w: 280px;
    --sg-header-h: 64px;
}

html.dark {
    --sg-surface: #0f172a;
    --sg-surface-secondary: #1e293b;
    --sg-surface-tertiary: #334155;
    --sg-border: #334155;
    --sg-border-light: #1e293b;
    --sg-text: #e2e8f0;
    --sg-text-secondary: #94a3b8;
    --sg-text-muted: #64748b;
    --sg-primary: #818cf8;
    --sg-primary-light: rgba(79, 70, 229, 0.15);
    --sg-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.3);
    --sg-shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.4);
}

html.dark .styleguide-layout { color: var(--sg-text); }

/* Base styles */
.sg-body {
    margin: 0;
    font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    font-size: 15px;
    line-height: 1.6;
    background: var(--sg-surface-secondary);
    color: var(--sg-text);
    transition: background-color 0.15s ease, color 0.15s ease;
}

/* Landing hero */
.sg-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: white;
    padding: 3.5rem 2rem;
    border-radius: var(--sg-radius);
    position: relative;
    overflow: hidden;
}
.sg-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 80% 20%, rgba(255,255,255,0.12) 0%, transparent 50%);
}
html.dark .sg-hero {
    background: linear-gradient(135deg, #020617 0%, #0f172a 50%, #1e293b 100%);
}

/* Category cards */
.sg-category-card {
    background: var(--sg-surface);
    border: 1px solid var(--sg-border);
    border-radius: var(--sg-radius);
    padding: 1.25rem;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
    text-decoration: none;
    color: inherit;
    display: block;
}
.sg-category-card:hover {
    box-shadow: var(--sg-shadow-md);
    border-color: var(--sg-primary);
}

/* Component index cards */
.sg-component-card {
    background: var(--sg-surface);
    border: 1px solid var(--sg-border);
    border-radius: var(--sg-radius-sm);
    padding: 1rem;
    transition: all 0.15s ease;
    text-decoration: none;
    color: inherit;
    display: block;
}
.sg-component-card:hover {
    box-shadow: var(--sg-shadow-md);
    border-color: var(--sg-primary);
    transform: translateY(-1px);
}

/* Sidebar navigation */
.sg-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--sg-sidebar-w);
    height: 100vh;
    background: var(--sg-surface);
    border-right: 1px solid var(--sg-border);
    overflow-y: auto;
    z-index: 40;
    transition: transform 0.2s ease, background-color 0.15s ease;
    scrollbar-width: thin;
    scrollbar-color: var(--sg-border) transparent;
}
.sg-sidebar::-webkit-scrollbar { width: 4px; }
.sg-sidebar::-webkit-scrollbar-thumb { background: var(--sg-border); border-radius: 4px; }

/* Main content */
.sg-main {
    margin-left: var(--sg-sidebar-w);
    min-height: 100vh;
    transition: margin-left 0.2s ease;
}

/* Header bar */
.sg-topbar {
    position: sticky;
    top: 0;
    z-index: 30;
    height: var(--sg-header-h);
    background: var(--sg-surface);
    border-bottom: 1px solid var(--sg-border);
    display: flex;
    align-items: center;
    padding: 0 1.5rem;
    gap: 1rem;
    transition: background-color 0.15s ease;
    backdrop-filter: blur(8px);
}
html.dark .sg-topbar { background: rgba(15, 23, 42, 0.92); }

/* Search input */
.sg-search {
    background: var(--sg-surface-secondary);
    border: 1px solid var(--sg-border);
    border-radius: var(--sg-radius-sm);
    padding: 0.4rem 0.75rem 0.4rem 2.25rem;
    font-size: 0.8125rem;
    color: var(--sg-text);
    width: 100%;
    max-width: 260px;
    outline: none;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: 0.625rem center;
    background-size: 1rem;
}
.sg-search:focus {
    border-color: var(--sg-primary);
    box-shadow: 0 0 0 3px var(--sg-primary-light);
}
.sg-search::placeholder { color: var(--sg-text-muted); }

/* Theme toggle */
.sg-theme-toggle {
    position: relative;
    width: 2.75rem;
    height: 1.5rem;
    border-radius: 9999px;
    cursor: pointer;
    border: none;
    padding: 0;
    transition: background-color 0.2s ease;
    flex-shrink: 0;
}
.sg-theme-toggle .sg-theme-toggle-knob {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 9999px;
    background: white;
    transition: left 0.2s ease;
    box-shadow: 0 1px 3px rgb(0 0 0 / 0.15);
}

/* Copy button */
.sg-copy-btn {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.1);
    color: #94a3b8;
    border-radius: 0.375rem;
    padding: 0.25rem 0.5rem;
    font-size: 0.6875rem;
    cursor: pointer;
    transition: all 0.15s ease;
    font-family: ui-sans-serif, system-ui, sans-serif;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}
.sg-copy-btn:hover { background: rgba(255,255,255,0.15); color: #e2e8f0; }
.sg-copy-btn.copied { color: #34d399; border-color: rgba(52, 211, 153, 0.3); }

/* Cloak */
[x-cloak] { display: none !important; }

/* Example wrapper */
.sg-example {
    border: 1px solid var(--sg-border);
    border-radius: var(--sg-radius);
    margin-top: 0.75rem;
    overflow: visible;
}
.sg-example-preview {
    padding: 1.5rem;
    background: var(--sg-surface);
    overflow: visible;
}
html.dark .sg-example-preview { background: var(--sg-surface-secondary); }
.sg-example-tabs {
    display: flex;
    gap: 0;
    background: var(--sg-surface-secondary);
    border-bottom: 1px solid var(--sg-border);
}
.sg-example-tab {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border: none;
    background: transparent;
    color: var(--sg-text-muted);
    cursor: pointer;
    transition: color 0.1s, box-shadow 0.1s;
    border-bottom: 2px solid transparent;
    margin-bottom: -1px;
    font-family: inherit;
}
.sg-example-tab:hover { color: var(--sg-text-secondary); }
.sg-example-tab.active {
    color: var(--sg-primary);
    border-bottom-color: var(--sg-primary);
}
.sg-example-tab:focus-visible {
    outline: 2px solid var(--sg-primary);
    outline-offset: -2px;
    border-radius: 0.25rem 0.25rem 0 0;
}
.sg-example-code {
    position: relative;
    background: #0d1117;
    border-top: 1px solid var(--sg-border);
}
html.dark .sg-example-code { background: #0d1117; }
#hljs-light { display: none !important; }
.sg-example-code pre {
    margin: 0;
    padding: 1rem;
    overflow-x: auto;
    font-family: "SF Mono", "Fira Code", "Fira Mono", Menlo, Consolas, monospace;
    font-size: 0.8125rem;
    line-height: 1.7;
    color: #e2e8f0;
    background: transparent;
    tab-size: 4;
}
.sg-example-code code { font-family: inherit; background: transparent; }

/* Section */
.sg-section {
    scroll-margin-top: calc(var(--sg-header-h) + 1rem);
}

/* Sidebar nav items */
.sg-nav-category {
    font-size: 0.6875rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--sg-text-muted);
    padding: 1rem 1.25rem 0.375rem;
}
.sg-nav-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.375rem 1.25rem;
    font-size: 0.8125rem;
    color: var(--sg-text-secondary);
    text-decoration: none;
    transition: all 0.1s ease;
    border-left: 2px solid transparent;
}
.sg-nav-item:hover {
    color: var(--sg-text);
    background: var(--sg-surface-secondary);
}
.sg-nav-item.active {
    color: var(--sg-primary);
    border-left-color: var(--sg-primary);
    background: var(--sg-primary-light);
    font-weight: 500;
}
.sg-nav-count {
    margin-left: auto;
    font-size: 0.625rem;
    background: var(--sg-surface-tertiary);
    color: var(--sg-text-muted);
    border-radius: 9999px;
    padding: 0.0625rem 0.375rem;
    font-weight: 600;
}

/* Mobile menu */
.sg-mobile-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 35;
}
.sg-mobile-overlay.active { display: block; }

/* Badge component style */
.sg-badge {
    display: inline-flex;
    align-items: center;
    border-radius: 9999px;
    font-size: 0.6875rem;
    font-weight: 600;
    padding: 0.125rem 0.5rem;
    background: var(--sg-primary-light);
    color: var(--sg-primary);
}

/* Responsive */
@media (max-width: 1023px) {
    .sg-sidebar { transform: translateX(-100%); }
    .sg-sidebar.open { transform: translateX(0); }
    .sg-main { margin-left: 0; }
}
@media (min-width: 1024px) {
    .sg-mobile-toggle { display: none !important; }
    [x-ref="desktopSearch"] { display: block !important; }
}

/* Utility: hide scrollbar for search results */
.sg-search-results::-webkit-scrollbar { width: 4px; }
.sg-search-results::-webkit-scrollbar-thumb { background: var(--sg-border); border-radius: 4px; }

/* Animations */
@keyframes sg-fade-in {
    from { opacity: 0; transform: translateY(4px); }
    to { opacity: 1; transform: translateY(0); }
}
.sg-animate-in { animation: sg-fade-in 0.2s ease forwards; }

/* =========================================================================
   Dark Mode — Tailwind utility overrides for styleguide chrome
   Scope: only within .styleguide-layout to avoid affecting Basekit components
   ========================================================================= */
html.dark .styleguide-layout .text-slate-400 { color: #94a3b8; }
html.dark .styleguide-layout .text-slate-500 { color: #94a3b8; }
html.dark .styleguide-layout .text-slate-600 { color: #cbd5e1; }
html.dark .styleguide-layout .text-slate-700 { color: #e2e8f0; }
html.dark .styleguide-layout .text-slate-900 { color: #f1f5f9; }
html.dark .styleguide-layout .bg-white { background-color: var(--sg-surface-secondary); }
html.dark .styleguide-layout .bg-slate-50 { background-color: var(--sg-surface-secondary); }
html.dark .styleguide-layout .bg-slate-50\/70 { background-color: rgba(30, 41, 59, 0.7); }
html.dark .styleguide-layout .bg-slate-100 { background-color: var(--sg-surface-tertiary); }
html.dark .styleguide-layout .bg-slate-200 { background-color: #475569; }
html.dark .styleguide-layout .hover\:bg-white\/90:hover { background-color: rgba(30, 41, 59, 0.9); }
html.dark .styleguide-layout .hover\:bg-white:hover { background-color: var(--sg-surface-tertiary); }
html.dark .styleguide-layout .hover\:text-slate-900:hover { color: #f1f5f9; }
html.dark .styleguide-layout .hover\:border-slate-200:hover { border-color: var(--sg-border); }
html.dark .styleguide-layout .hover\:border-slate-400:hover { border-color: #64748b; }
html.dark .styleguide-layout .border-slate-400 { border-color: #64748b; }
html.dark .styleguide-layout .bg-yellow-50 { background-color: rgba(161, 98, 7, 0.15); }
html.dark .styleguide-layout .bg-red-50 { background-color: rgba(185, 28, 28, 0.15); }
html.dark .styleguide-layout .border-slate-100 { border-color: var(--sg-border); }
html.dark .styleguide-layout .border-slate-200 { border-color: var(--sg-border); }
html.dark .styleguide-layout .border-slate-300 { border-color: var(--sg-border); }
html.dark .styleguide-layout .border-yellow-200 { border-color: rgba(161, 98, 7, 0.3); }
html.dark .styleguide-layout .border-red-200 { border-color: rgba(185, 28, 28, 0.3); }
html.dark .styleguide-layout .text-yellow-800 { color: #fbbf24; }
html.dark .styleguide-layout .text-red-600 { color: #f87171; }
html.dark .styleguide-layout .text-primary-600 { color: var(--sg-primary); }
html.dark .styleguide-layout .hover\:text-primary-700:hover { color: #a5b4fc; }
html.dark .styleguide-layout .hover\:bg-red-50:hover { background-color: rgba(185, 28, 28, 0.15); }
html.dark .styleguide-layout .shadow-sm { box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.2); }
html.dark .styleguide-layout .shadow-md { box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.3), 0 2px 4px -2px rgb(0 0 0 / 0.3); }
html.dark .styleguide-layout .hover\:shadow-md:hover { box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.3); }
html.dark .styleguide-layout .group-hover\:bg-slate-200:hover { background-color: #475569; }
html.dark .styleguide-layout .group-hover\:border-slate-400:hover { border-color: #64748b; }
html.dark .styleguide-layout .text-slate-200 { color: #e2e8f0; }
html.dark .styleguide-layout .text-slate-300 { color: #cbd5e1; }

/* Dark mode code blocks */
html.dark .sg-example-code {
    background: #0d1117;
}
</style>

<div x-data="styleguideApp()" x-init="init()" class="styleguide-layout">
    <!-- Mobile overlay -->
    <div class="sg-mobile-overlay" :class="{ active: sidebarOpen }" @click="sidebarOpen = false" x-show="sidebarOpen" x-transition.opacity></div>

    <!-- Sidebar -->
    <aside class="sg-sidebar" :class="{ open: sidebarOpen }" role="navigation" aria-label="Component navigation">
        <div style="padding: 1.25rem;">
            <!-- Logo -->
            <a href="#top" @click.prevent="scrollToSection('top')" style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none; color: inherit; margin-bottom: 0.25rem;">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" style="flex-shrink: 0;">
                    <rect width="28" height="28" rx="6" fill="url(#sg-logo-grad)"/>
                    <path d="M8 14.5L12 18.5L20 10.5" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs><linearGradient id="sg-logo-grad" x1="0" y1="0" x2="28" y2="28"><stop stop-color="#4f46e5"/><stop offset="1" stop-color="#7c3aed"/></linearGradient></defs>
                </svg>
                <span style="font-weight: 700; font-size: 0.9375rem;">Basekit UI</span>
            </a>
            <p style="font-size: 0.6875rem; color: var(--sg-text-muted); margin: 0.25rem 0 0;">{{ $componentCount }} components</p>
        </div>

        <!-- Search -->
        <div style="padding: 0 1.25rem 0.75rem;">
            <input type="text" class="sg-search" placeholder="Search components..." x-model="searchQuery" @input="filterComponents()" @keydown.escape="searchQuery = ''; filterComponents()" aria-label="Search components">
        </div>

        <!-- Nav items -->
        <nav>
            @foreach ($sections as $categoryName => $partial)
                @php
                    $categoryComponents = $componentIndex[$categoryName] ?? [];
                @endphp

                <div x-show="!searchQuery || hasCategoryMatch('{{ $categoryName }}', {{ json_encode($categoryComponents) }})">
                    <a href="#{{ Str::slug($categoryName) }}"
                       class="sg-nav-category"
                       @click.prevent="scrollToSection('{{ Str::slug($categoryName) }}')"
                       style="cursor: pointer; text-decoration: none; display: flex; align-items: center; justify-content: space-between; transition: color 0.1s;"
                       onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-muted)'">
                        {{ $categoryName }}
                        <span class="sg-nav-count">{{ count($categoryComponents) }}</span>
                    </a>
                    @foreach ($categoryComponents as $comp)
                        <a href="#{{ $comp['anchor'] }}"
                           class="sg-nav-item"
                           :class="{ active: activeSection === '{{ $comp['anchor'] }}' }"
                           @click.prevent="scrollToSection('{{ $comp['anchor'] }}')"
                           x-show="!searchQuery || '{{ strtolower($comp['name']) }}'.includes(searchQuery.toLowerCase()) || '{{ strtolower($comp['description'] ?? '') }}'.includes(searchQuery.toLowerCase())">
                            <span>{{ $comp['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </nav>

        <!-- Footer links -->
        <div style="padding: 1.5rem 1.25rem; margin-top: auto; border-top: 1px solid var(--sg-border);">
            <div style="display: flex; flex-direction: column; gap: 0.375rem;">
                <a href="../" style="font-size: 0.75rem; color: var(--sg-text-secondary); text-decoration: none;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-secondary)'">Documentation</a>
                <a href="https://github.com/basekit-laravel/basekit-laravel-ui" target="_blank" rel="noopener" style="font-size: 0.75rem; color: var(--sg-text-secondary); text-decoration: none;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-secondary)'">GitHub</a>
            </div>
        </div>
    </aside>

    <!-- Main content -->
    <div class="sg-main">
        <!-- Top bar -->
        <header class="sg-topbar">
            <button type="button" @click="sidebarOpen = !sidebarOpen" class="sg-mobile-toggle" style="background: none; border: none; cursor: pointer; padding: 0.375rem; color: var(--sg-text);" aria-label="Toggle navigation">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>

            <div style="flex: 1;"></div>

            <!-- Search (top bar, desktop) -->
            <input type="text" class="sg-search" placeholder="Search..." x-model="searchQuery" @input="filterComponents()" @keydown.escape="searchQuery = ''; filterComponents()" aria-label="Search components" style="display: none;" x-ref="desktopSearch">

            <!-- Theme toggle -->
            <span style="font-size: 0.6875rem; color: var(--sg-text-muted); white-space: nowrap;" x-text="dark ? 'Dark' : 'Light'"></span>
            <button type="button" class="sg-theme-toggle" @click="toggleTheme()" :style="dark ? 'background: var(--sg-primary)' : 'background: #cbd5e1'" role="switch" :aria-checked="dark.toString()" :aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'">
                <span class="sg-theme-toggle-knob" :style="dark ? 'left: calc(100% - 1.25rem - 2px)' : 'left: 2px'"></span>
            </button>

            <!-- External link -->
            <a href="../" style="font-size: 0.75rem; color: var(--sg-text-secondary); text-decoration: none; white-space: nowrap; display: flex; align-items: center; gap: 0.25rem;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-secondary)'">
                Docs
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3.5 2H10V8.5M10 2L2 10"/></svg>
            </a>
        </header>

        <!-- Content area -->
        <div style="padding: 1.5rem; max-width: 80rem; margin: 0 auto;">
            <!-- Landing hero -->
            <div id="top" class="sg-hero sg-section" style="margin-bottom: 2rem;">
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                        <span class="sg-badge" style="background: rgba(255,255,255,0.2); color: white;">v1</span>
                        <span style="font-size: 0.8125rem; opacity: 0.85;">Laravel 12/13 &middot; PHP 8.3+</span>
                    </div>
                    <h1 style="font-size: 2rem; font-weight: 800; margin: 0 0 0.5rem; letter-spacing: -0.02em;">Basekit Laravel UI</h1>
                    <p style="font-size: 1.0625rem; opacity: 0.9; max-width: 38rem; margin: 0 0 1.5rem; line-height: 1.6;">
                        A modular Blade component library with Tailwind CSS 4 theming and Alpine.js interactivity.
                        {{ $componentCount }} production-ready components for forms, navigation, feedback, layout, display, and overlays.
                    </p>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                        <a href="#components" @click.prevent="scrollToSection('components')" style="display: inline-flex; align-items: center; gap: 0.375rem; background: white; color: #4f46e5; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; text-decoration: none; transition: transform 0.1s;" onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='none'">
                            Browse Components
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 7h10M8 3l4 4-4 4"/></svg>
                        </a>
                        <a href="https://github.com/basekit-laravel/basekit-laravel-ui" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 0.375rem; background: rgba(255,255,255,0.15); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 500; text-decoration: none; border: 1px solid rgba(255,255,255,0.2); transition: background 0.15s;" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0016 8c0-4.42-3.58-8-8-8z"/></svg>
                            GitHub
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick stats -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 0.75rem; margin-bottom: 2rem;">
                @foreach ($sections as $name => $partial)
                    @php
                        $catCount = count($componentIndex[$name] ?? []);
                    @endphp
                    <a href="#{{ Str::slug($name) }}" @click.prevent="scrollToSection('{{ Str::slug($name) }}')" class="sg-category-card">
                        <div style="font-weight: 700; font-size: 0.875rem; margin-bottom: 0.125rem;">{{ $name }}</div>
                        <div style="font-size: 0.75rem; color: var(--sg-text-muted);">{{ $catCount }} component{{ $catCount !== 1 ? 's' : '' }}</div>
                    </a>
                @endforeach
            </div>

            <!-- Component index -->
            <div id="components" class="sg-section" style="margin-bottom: 2rem;">
                <h2 style="font-size: 1.125rem; font-weight: 700; margin: 0 0 0.75rem;">All Components</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 0.5rem;">
                    @foreach ($componentIndex as $category => $components)
                        @foreach ($components as $comp)
                            <a href="#{{ $comp['anchor'] }}" @click.prevent="scrollToSection('{{ $comp['anchor'] }}')" class="sg-component-card"
                               x-show="!searchQuery || '{{ strtolower($comp['name']) }}'.includes(searchQuery.toLowerCase()) || '{{ strtolower($comp['description'] ?? '') }}'.includes(searchQuery.toLowerCase())">
                                <div style="font-weight: 600; font-size: 0.8125rem;">{{ $comp['name'] }}</div>
                                <div style="font-size: 0.6875rem; color: var(--sg-text-muted); margin-top: 0.125rem;">{{ $comp['description'] ?? '' }}</div>
                                <div style="margin-top: 0.375rem;"><span class="sg-badge">{{ $category }}</span></div>
                            </a>
                        @endforeach
                    @endforeach
                </div>
                <!-- Empty search state -->
                <div x-show="searchQuery && filteredCount === 0" style="text-align: center; padding: 2rem; color: var(--sg-text-muted); font-size: 0.875rem;">
                    No components match "<span x-text="searchQuery"></span>"
                </div>
            </div>

            <!-- Component sections -->
            <div class="space-y-4" @expand-all.window="document.querySelectorAll('[data-category]').forEach(el => el._x_dataStack[0].open = true)" @collapse-all.window="document.querySelectorAll('[data-category]').forEach(el => el._x_dataStack[0].open = false)">
                <div style="display: flex; justify-content: flex-end; gap: 0.5rem; margin-bottom: 0.5rem;" x-show="!searchQuery">
                    <button type="button" @click="$dispatch('expand-all')" style="font-size: 0.75rem; color: var(--sg-text-muted); background: none; border: none; cursor: pointer; padding: 0.25rem 0.5rem; border-radius: 0.375rem; transition: color 0.1s;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-muted)'">Expand all</button>
                    <span style="color: var(--sg-border);">|</span>
                    <button type="button" @click="$dispatch('collapse-all')" style="font-size: 0.75rem; color: var(--sg-text-muted); background: none; border: none; cursor: pointer; padding: 0.25rem 0.5rem; border-radius: 0.375rem; transition: color 0.1s;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-muted)'">Collapse all</button>
                </div>
                @foreach ($sections as $name => $partial)
                    @php
                        $categoryComponents = $componentIndex[$name] ?? [];
                    @endphp
                    <section id="{{ Str::slug($name) }}" class="sg-section" x-data="{ open: true }" x-init="$watch('searchQuery', (val) => { if (val && hasCategoryMatch('{{ $name }}', {{ json_encode($categoryComponents) }})) open = true; })" x-show="!searchQuery || hasCategoryMatch('{{ $name }}', {{ json_encode($categoryComponents) }})" data-category style="background: var(--sg-surface); border: 1px solid var(--sg-border); border-radius: var(--sg-radius);">
                        <button type="button" @click="open = !open" style="width: 100%; display: flex; align-items: center; gap: 0.75rem; padding: 1rem 1.5rem; background: none; border: none; cursor: pointer; text-align: left; transition: background 0.1s;" onmouseover="this.style.background='var(--sg-surface-secondary)'" onmouseout="this.style.background='transparent'">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink: 0; transition: transform 0.2s ease;" :style="open ? 'transform: rotate(90deg)' : ''"><path d="M5 3l4 4-4 4"/></svg>
                            <h2 style="font-size: 1.125rem; font-weight: 700; margin: 0;">{{ $name }}</h2>
                            <span class="sg-badge">{{ count($categoryComponents) }} component{{ count($categoryComponents) !== 1 ? 's' : '' }}</span>
                        </button>
                        <div x-show="open" x-collapse x-cloak style="padding: 0 1.5rem 1.5rem;">
                            @include($partial)
                        </div>
                    </section>
                @endforeach
            </div>

            <!-- Footer -->
            <footer style="text-align: center; padding: 2.5rem 0 1.5rem; margin-top: 2rem; border-top: 1px solid var(--sg-border);">
                <p style="font-size: 0.8125rem; color: var(--sg-text-muted); margin: 0 0 0.375rem;">Basekit Laravel UI Styleguide</p>
                <div style="display: flex; justify-content: center; gap: 1rem;">
                    <a href="../" style="font-size: 0.75rem; color: var(--sg-text-secondary); text-decoration: none;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-secondary)'">Documentation</a>
                    <a href="https://github.com/basekit-laravel/basekit-laravel-ui" target="_blank" rel="noopener" style="font-size: 0.75rem; color: var(--sg-text-secondary); text-decoration: none;" onmouseover="this.style.color='var(--sg-primary)'" onmouseout="this.style.color='var(--sg-text-secondary)'">GitHub</a>
                </div>
            </footer>
        </div>
    </div>
</div>

<script>
function styleguideApp() {
    return {
        dark: false,
        sidebarOpen: false,
        searchQuery: '',
        activeSection: '',
        filteredCount: 0,
        anchorToCategory: {!! json_encode($anchorToCategory) !!},

        init() {
            // Read theme from VitePress localStorage or system preference
            this.dark = this.getThemePreference();

            // Apply theme immediately
            document.documentElement.classList.toggle('dark', this.dark);

            // Watch for changes and persist
            this.$watch('dark', (val) => {
                document.documentElement.classList.toggle('dark', val);
                localStorage.setItem('vitepress-theme-appearance', val ? 'dark' : 'light');
            });

            // Track active section on scroll
            this.setupScrollSpy();

            // Handle hash on load
            const hash = window.__bkHash || window.location.hash.replace('#', '');
            if (hash) {
                this.$nextTick(() => this.scrollToSection(hash));
            }
        },

        getThemePreference() {
            // 1. Check VitePress localStorage key (shared with docs)
            const stored = localStorage.getItem('vitepress-theme-appearance');
            if (stored === 'dark') return true;
            if (stored === 'light') return false;

            // 2. Check system preference
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                return true;
            }

            return false;
        },

        toggleTheme() {
            this.dark = !this.dark;
        },

        scrollToSection(id) {
            const categorySlug = this.anchorToCategory[id];
            if (categorySlug) {
                // Component link — open parent category accordion
                const section = document.getElementById(categorySlug);
                if (section && section._x_dataStack) {
                    section._x_dataStack[0].open = true;
                }
                // Open the component subsection — find the partial's root x-data with `sections`
                const compEl = document.getElementById(id);
                if (compEl) {
                    let parent = compEl.parentElement;
                    while (parent) {
                        if (parent._x_dataStack && parent._x_dataStack[0].sections && id in parent._x_dataStack[0].sections) {
                            parent._x_dataStack[0].sections[id] = true;
                            break;
                        }
                        parent = parent.parentElement;
                    }
                }
                // Wait for accordion + subsection animations, then scroll
                setTimeout(() => {
                    const el = document.getElementById(id);
                    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 200);
            } else {
                // Category link — open the accordion if collapsed
                const el = document.getElementById(id);
                if (el && el._x_dataStack && 'open' in el._x_dataStack[0]) {
                    el._x_dataStack[0].open = true;
                }
                setTimeout(() => {
                    const target = document.getElementById(id);
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 200);
            }
            this.activeSection = id;
            this.sidebarOpen = false;
            history.pushState(null, '', '#' + id);
        },

        setupScrollSpy() {
            const sections = document.querySelectorAll('.sg-section[id]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.activeSection = entry.target.id;
                    }
                });
            }, { rootMargin: '-80px 0px -60% 0px', threshold: 0 });

            sections.forEach(s => observer.observe(s));
        },

        filterComponents() {
            const q = this.searchQuery.toLowerCase();
            // Toggle section-toggle subsections
            document.querySelectorAll('.sg-section[data-search-terms]').forEach(el => {
                const terms = el.getAttribute('data-search-terms');
                const match = !q || terms.includes(q);
                el.style.display = match ? '' : 'none';
                // Auto-expand matching subsections
                if (match && q && el._x_dataStack) {
                    const key = Object.keys(el._x_dataStack[0].sections || {}).find(k => el.id === k);
                    if (key) el._x_dataStack[0].sections[key] = true;
                }
            });
            // Count visible component cards
            if (!q) {
                this.filteredCount = 0;
                return;
            }
            const cards = document.querySelectorAll('.sg-component-card');
            let count = 0;
            cards.forEach(card => {
                if (card.style.display !== 'none') count++;
            });
            this.filteredCount = count;
        },

        hasCategoryMatch(categoryName, components) {
            if (!this.searchQuery) return true;
            const q = this.searchQuery.toLowerCase();
            if (categoryName.toLowerCase().includes(q)) return true;
            return components.some(c =>
                c.name.toLowerCase().includes(q) ||
                (c.description || '').toLowerCase().includes(q)
            );
        }
    };
}

function copyCode(btn) {
    const block = btn.closest('.sg-example');
    const code = block.querySelector('code');
    const text = code.textContent;

    navigator.clipboard.writeText(text).then(() => {
        btn.classList.add('copied');
        btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg> Copied';
        const originalHTML = btn.innerHTML;
        setTimeout(() => {
            btn.classList.remove('copied');
            btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3.5" y="3.5" width="7" height="7" rx="1"/><path d="M8.5 3.5h-5a1 1 0 00-1 1v5"/></svg> Copy';
        }, 2000);
    }).catch(() => {
        // Fallback for older browsers
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        btn.classList.add('copied');
        btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg> Copied';
        setTimeout(() => {
            btn.classList.remove('copied');
            btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3.5" y="3.5" width="7" height="7" rx="1"/><path d="M8.5 3.5h-5a1 1 0 00-1 1v5"/></svg> Copy';
        }, 2000);
    });
}
</script>
