<div>
    {{-- This wrapper does not include any CSS. It assumes the user's app CSS is loaded globally. --}}
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
