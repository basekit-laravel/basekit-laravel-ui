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
    </style>
@endonce

<div>
    <div class="max-w-7xl mx-auto space-y-12">
        <!-- Header -->
        <header class="border-b border-slate-200 pb-8">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-indigo-600">
                Basekit Laravel UI
            </h1>
            <p class="text-slate-500 mt-2 text-lg">Component Styleguide & Examples</p>
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
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8 space-y-8">
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
