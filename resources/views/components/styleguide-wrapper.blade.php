{{-- Define CSS custom properties for the Tailwind color names used in Custom Colors examples --}}
@once
    <style>
        :root {
            --color-indigo-50: #eef2ff;
            --color-indigo-100: #e0e7ff;
            --color-indigo-200: #c7d2fe;
            --color-indigo-300: #a5b4fc;
            --color-indigo-400: #818cf8;
            --color-indigo-500: #6366f1;
            --color-indigo-600: #4f46e5;
            --color-indigo-700: #4338ca;
            --color-indigo-800: #3730a3;
            --color-indigo-900: #312e81;
            --color-pink-50: #fdf2f8;
            --color-pink-100: #fce7f3;
            --color-pink-200: #fbcfe8;
            --color-pink-300: #f9a8d4;
            --color-pink-400: #f472b6;
            --color-pink-500: #ec4899;
            --color-pink-600: #db2777;
            --color-pink-700: #be185d;
            --color-pink-800: #9d174d;
            --color-pink-900: #831843;
            --color-emerald-50: #ecfdf5;
            --color-emerald-100: #d1fae5;
            --color-emerald-200: #a7f3d0;
            --color-emerald-300: #6ee7b7;
            --color-emerald-400: #34d399;
            --color-emerald-500: #10b981;
            --color-emerald-600: #059669;
            --color-emerald-700: #047857;
            --color-emerald-800: #065f46;
            --color-emerald-900: #064e3b;
        }

        html, body {
            transition: background-color 0.2s ease;
        }

        html.dark,
        html.dark body {
            background-color: #0f172a !important;
            color: #e2e8f0;
        }

        html.dark .styleguide-layout {
            color: #e2e8f0;
        }

        html.dark .styleguide-layout header {
            border-color: #334155;
        }

        .styleguide-card {
            background-color: #fff;
        }

        html.dark .styleguide-layout .styleguide-card {
            background-color: #1e293b;
            border-color: #334155;
        }

        html.dark .styleguide-layout .bg-white {
            background-color: #1e293b;
        }

        html.dark .styleguide-layout .bg-white\/90 {
            background-color: rgba(30, 41, 59, 0.9);
        }

        html.dark .styleguide-layout .bg-slate-50,
        html.dark .styleguide-layout .bg-slate-50\/70 {
            background-color: #1e293b;
        }

        html.dark .styleguide-layout .bg-slate-100 {
            background-color: #334155;
        }

        html.dark .styleguide-layout .bg-slate-200 {
            background-color: #475569;
        }

        html.dark .styleguide-layout .border-slate-200 {
            border-color: #334155;
        }

        html.dark .styleguide-layout .border-slate-300 {
            border-color: #475569;
        }

        html.dark .styleguide-layout .border-slate-400 {
            border-color: #64748b;
        }

        html.dark .styleguide-layout footer {
            border-color: #334155;
        }

        html.dark .styleguide-layout h2 {
            color: #f1f5f9;
        }

        html.dark .styleguide-layout .text-slate-500,
        html.dark .styleguide-layout .text-slate-600,
        html.dark .styleguide-layout .text-slate-700,
        html.dark .styleguide-layout .text-slate-800,
        html.dark .styleguide-layout .text-slate-900,
        html.dark .styleguide-layout .text-slate-400 {
            color: #cbd5e1;
        }

        html.dark .styleguide-layout nav a {
            color: #94a3b8;
        }

        html.dark .styleguide-layout nav a:hover {
            color: #818cf8;
        }
    </style>
@endonce

<div x-data="{ dark: document.documentElement.classList.contains('dark') }" x-init="$watch('dark', val => { document.documentElement.classList.toggle('dark', val); })">
    <div class="styleguide-layout max-w-7xl mx-auto space-y-12">
        <!-- Header -->
        <header class="border-b border-slate-200 pb-8">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-indigo-600">
                        Basekit Laravel UI
                    </h1>
                    <p class="text-slate-500 mt-2 text-lg">Component Styleguide & Examples</p>
                </div>
                <div class="flex items-center gap-3 mt-1">
                    <span class="text-xs font-medium text-slate-400" x-text="dark ? 'Dark' : 'Light'"></span>
                    <button type="button" @click="dark = !dark"
                        class="relative inline-flex h-6 w-11 items-center rounded-full cursor-pointer transition-colors"
                        :class="dark ? 'bg-primary-600' : 'bg-slate-300'"
                        role="switch" :aria-checked="dark">
                        <span class="inline-block h-4 w-4 rounded-full bg-white transition-transform"
                            :class="dark ? 'translate-x-[1.375rem]' : 'translate-x-[0.25rem]'"></span>
                    </button>
                </div>
            </div>
            <nav class="flex flex-wrap gap-4 mt-6">
                @foreach ($sections as $name => $partial)
                    <a href="#{{ Str::slug($name) }}"
                        class="text-sm font-medium text-slate-600 hover:text-primary-600 hover:underline">
                        {{ $name }}
                    </a>
                @endforeach
            </nav>
        </header>
        <!-- Components -->
        <div class="space-y-16">
            @foreach ($sections as $name => $partial)
                <section id="{{ Str::slug($name) }}" class="section-anchor">
                    <div class="mb-6 flex items-center gap-3">
                        <h2 class="text-2xl font-bold text-slate-800">{{ $name }}</h2>
                    </div>
                    <div class="styleguide-card rounded-xl shadow-sm border border-slate-200 p-6 md:p-8 space-y-8">
                        @include($partial)
                    </div>
                </section>
            @endforeach
        </div>
        <footer class="text-center text-slate-400 text-sm py-8 border-t border-slate-200">
            Basekit Laravel UI Styleguide
        </footer>
    </div>
</div>
