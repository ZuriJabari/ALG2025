<header class="sticky top-0 z-50 bg-white/90 dark:bg-slate-950/90 backdrop-blur transition-all duration-300 supports-[backdrop-filter]:backdrop-saturate-150" x-data="{ mobileMenuOpen: false }">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 group flex-shrink-0">
            <img src="/assets/logo.png" alt="ALG" class="h-8 sm:h-10 w-auto transition-transform group-hover:scale-105 dark:hidden">
            <img src="/assets/dark-logo.png" alt="ALG" class="h-8 sm:h-10 w-auto transition-transform group-hover:scale-105 hidden dark:block">
        </a>

        <!-- Center Nav Links -->
        <div class="hidden md:flex items-center gap-6 lg:gap-8">
            @php
                $primaryMenu = \App\Models\Domain\Menu::query()
                    ->where('handle', 'primary')
                    ->with(['items.children'])
                    ->first();
            @endphp

            @if($primaryMenu && $primaryMenu->items->count())
                @foreach($primaryMenu->items as $item)
                    @if(! $item->active) @continue @endif
                    @if($item->children->count())
                        <div class="relative group">
                            <a href="{{ $item->url ?? '#' }}" target="{{ $item->target ?? '_self' }}" class="relative inline-flex items-center gap-1 text-gray-700 dark:text-gray-300 hover:text-teal-500 dark:hover:text-teal-400 font-medium text-sm transition-colors duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 rounded">
                                {{ $item->label }}
                                <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </a>
                            <div class="absolute left-0 mt-3 w-52 rounded-lg border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out">
                                <div class="py-2">
                                    @foreach($item->children as $child)
                                        @if(! $child->active) @continue @endif
                                        <a href="{{ $child->url ?? '#' }}" target="{{ $child->target ?? '_self' }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800">
                                            {{ $child->label }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $item->url ?? '#' }}" target="{{ $item->target ?? '_self' }}" class="relative text-gray-700 dark:text-gray-300 hover:text-teal-500 dark:hover:text-teal-400 font-medium text-sm transition-colors duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 rounded">
                            {{ $item->label }}
                        </a>
                    @endif
                @endforeach
            @else
                <a href="/" class="text-gray-700 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 font-medium text-sm transition-colors">Home</a>
                <a href="/speakers" class="text-gray-700 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 font-medium text-sm transition-colors">Speakers</a>
                <a href="/alg-2024" class="text-gray-700 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 font-medium text-sm transition-colors">ALG 2024</a>
                <a href="/about" class="text-gray-700 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 font-medium text-sm transition-colors">About</a>
                <a href="/contact" class="text-gray-700 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 font-medium text-sm transition-colors">Contact</a>
            @endif
        </div>

        <!-- Right Side: Dark Mode Toggle & CTA -->
        <div class="flex items-center gap-2 sm:gap-4">
            <!-- Dark Mode Toggle -->
            <button 
                @click="
                    const isDark = !document.documentElement.classList.contains('dark');
                    document.documentElement.classList.toggle('dark', isDark);
                    try { localStorage.setItem('darkMode', isDark ? 'true' : 'false'); } catch(e) {}
                "
                class="p-2 rounded-lg bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-700 transition-colors"
                aria-label="Toggle dark mode"
            >
                <svg class="w-5 h-5 dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.536l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.828-2.828a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707.707zm.707 5.657a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 1.414l-.707.707zM9 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- CTA Button -->
            <a href="{{ route('seat-reservations.create') }}" class="hidden sm:inline-flex px-4 sm:px-6 py-2 text-xs sm:text-sm bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-semibold rounded-full transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 whitespace-nowrap">
                Reserve your seat
            </a>

            <!-- Mobile Menu Button -->
            <button class="md:hidden p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors" @click="mobileMenuOpen = !mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()">
                <svg class="w-6 h-6" :class="{ 'hidden': mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-6 h-6" :class="{ 'hidden': !mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden">
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.outside="mobileMenuOpen = false"
             class="absolute top-full left-0 right-0 bg-white dark:bg-slate-950 border-b border-gray-200 dark:border-slate-800 shadow-xl z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-3">
                @php
                    $primaryMenu = \App\Models\Domain\Menu::query()
                        ->where('handle', 'primary')
                        ->with(['items.children'])
                        ->first();
                @endphp

                @if($primaryMenu && $primaryMenu->items->count())
                    @foreach($primaryMenu->items as $item)
                        @if(! $item->active) @continue @endif
                        <div>
                            <a href="{{ $item->url ?? '#' }}" target="{{ $item->target ?? '_self' }}" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">
                                {{ $item->label }}
                            </a>
                            @if($item->children->count())
                                <div class="pl-6 space-y-2 mt-2">
                                    @foreach($item->children as $child)
                                        @if(! $child->active) @continue @endif
                                        <a href="{{ $child->url ?? '#' }}" target="{{ $child->target ?? '_self' }}" class="block px-3 py-2 text-xs font-medium text-gray-600 dark:text-gray-400 hover:text-teal-600 dark:hover:text-teal-400 hover:bg-gray-50 dark:hover:bg-slate-800/50 rounded-lg transition-all duration-200">
                                            {{ $child->label }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <a href="/" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">Home</a>
                    <a href="/speakers" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">Speakers</a>
                    <a href="/alg-2024" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">ALG 2024</a>
                    <a href="/about" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">About</a>
                    <a href="/contact" class="block px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent dark:hover:from-teal-900/20 dark:hover:to-transparent rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-teal-500">Contact</a>
                @endif
                <div class="border-t border-gray-200 dark:border-slate-800 pt-4 mt-4">
                    <a href="{{ route('seat-reservations.create') }}" class="block w-full px-4 py-3 text-sm font-semibold text-white bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-lg text-center transition-all duration-200 transform hover:shadow-lg active:scale-95">
                        Reserve your seat
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
