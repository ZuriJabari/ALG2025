<header class="absolute top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent pointer-events-none" x-data="{ mobileMenuOpen: false }" x-effect="document.body.classList.toggle('overflow-hidden', mobileMenuOpen)">
    <nav class="w-full px-0 sm:px-0 lg:px-0 py-2 sm:py-3 md:py-4 grid grid-cols-3 items-center bg-transparent pointer-events-auto">
        <!-- Left: Hamburger -->
        <div class="flex items-center pl-4 sm:pl-4 md:pl-6">
            <button class="inline-flex items-center justify-center h-9 w-9 sm:h-10 sm:w-10 text-gray-200 hover:text-white transition-all duration-300" @click="mobileMenuOpen = !mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()" aria-label="Open menu">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 transition-all duration-300" :class="mobileMenuOpen ? 'opacity-0 rotate-90 scale-75' : 'opacity-100 rotate-0 scale-100'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M6.75 12h10.5m-13.5 5.25h16.5"></path>
                </svg>
                <svg class="w-6 h-6 sm:w-7 sm:h-7 absolute transition-all duration-300" :class="mobileMenuOpen ? 'opacity-100 rotate-0 scale-100' : 'opacity-0 -rotate-90 scale-75'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Center: Logo -->
        <div class="flex items-center justify-center">
            <a href="/" class="flex items-center gap-2 group flex-shrink-0">
                <img src="/assets/logos/ALG-light.svg" alt="ALG" class="h-10 sm:h-12 md:h-14 lg:h-16 w-auto transition-transform group-hover:scale-105">
            </a>
        </div>

        <!-- Right: #ALG2025 Button -->
        <div class="flex items-center justify-end pr-4 sm:pr-4 md:pr-6">
            <a href="{{ url('/alg-2025') }}" class="group relative inline-flex items-center gap-1 sm:gap-1.5 md:gap-2 h-8 sm:h-9 md:h-10 lg:h-11 px-2.5 sm:px-3 md:px-4 lg:px-5 rounded-full bg-teal-600 text-white font-semibold text-xs sm:text-sm md:text-base shadow-lg hover:bg-teal-500 transition-all duration-300 hover:-translate-y-0.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40">
                <span class="whitespace-nowrap">#ALG2025</span>
                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 opacity-90 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </nav>

    <!-- Overlay Menu -->
    <div class="pointer-events-auto">
        <!-- Backdrop -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen=false"
             class="fixed inset-0 z-[59] bg-black/40 backdrop-blur-sm"></div>
        
        <!-- Panel -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition transform ease-[cubic-bezier(0.16,1,0.3,1)] duration-400"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition transform ease-[cubic-bezier(0.7,0,0.84,0)] duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed inset-y-0 left-0 w-full md:w-[70%] z-[60] bg-slate-950 text-white shadow-[8px_0_30px_rgba(0,0,0,0.45)]"
             role="dialog" aria-modal="true" @keydown.window.escape="mobileMenuOpen=false">
            <div class="relative h-full" x-data="{ focusInit:false }" x-init="$nextTick(()=>{ const i=$refs.search; if(i){ i.focus(); } focusInit=true })">
                <div class="h-full px-0 py-0" role="document">
                    <!-- Top bar: Close + Search -->
                    <div class="flex items-center gap-4 border-b border-slate-800 px-6 py-5 mb-0">
                        <button @click="mobileMenuOpen=false" class="inline-flex items-center justify-center h-10 w-10 text-white hover:text-white/80 transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        <div class="flex-1">
                            <label class="sr-only" for="global-search">Search</label>
                            <div class="relative mb-0">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/></svg>
                                <input id="global-search" x-ref="search" type="text" placeholder="Search"
                                       class="w-full h-11 pl-11 pr-32 bg-transparent text-white placeholder-white/60 border-0 focus:outline-none focus:ring-0">
                                <div class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-2 text-[11px] text-white/70">
                                    <kbd class="px-2 py-0.5">⌘K</kbd>
                                    <span class="text-white/40">or</span>
                                    <kbd class="px-2 py-0.5 rounded border border-white/20 bg-white/5">ESC</kbd>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $primaryMenu = \App\Models\Domain\Menu::query()
                            ->where('handle', 'primary')
                            ->with(['items.children'])
                            ->first();
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-0 h-[calc(100vh-120px)]" x-data="{ active: null }" @keydown.window.arrow-down.prevent="active = Math.min(((active ?? -1) + 1), {{ max(0, ($primaryMenu?->items?->count() ?? 1) - 1) }})" @keydown.window.arrow-up.prevent="active = Math.max(((active ?? 0) - 1), 0)" @mouseleave="active=null">
                        <!-- Left rail -->
                        <aside class="md:col-span-5 lg:col-span-5 bg-slate-950 overflow-auto sticky top-24 self-start max-h-[calc(100vh-168px)] border-r border-slate-800">
                            @if($primaryMenu && $primaryMenu->items->count())
                                @foreach($primaryMenu->items->values() as $idx => $item)
                                    @if(! $item->active) @continue @endif
                                    @php
                                        $isButton = stripos($item->label, 'reserve') !== false || stripos($item->label, 'register') !== false;
                                    @endphp
                                    <a href="{{ $isButton ? url('/reserve-seat') : ($item->url ?? '#') }}" target="{{ $item->target ?? '_self' }}"
                                       @mouseenter="active={{ $idx }}"
                                       x-data="{ show: false }"
                                       x-init="setTimeout(() => show = true, {{ 50 + ($idx * 30) }})"
                                       x-show="show"
                                       x-transition:enter="transition ease-out duration-300"
                                       x-transition:enter-start="opacity-0 -translate-x-4"
                                       x-transition:enter-end="opacity-100 translate-x-0"
                                       @if($isButton)
                                       class="group flex items-center justify-center mx-8 my-4 px-6 py-3 text-white bg-teal-600 hover:bg-teal-500 rounded-lg transition-all duration-200 font-semibold text-[17px]"
                                       @else
                                       class="group flex items-center justify-between px-8 py-4 text-white/60 border-l-2 hover:bg-slate-900 hover:text-white/95 transition-all duration-200"
                                       :class="active==={{ $idx }} ? 'border-teal-500 bg-slate-900 text-white/95' : 'border-transparent'"
                                       @endif>
                                        @php
                                            $displayLabel = (str_ireplace(' ', '', $item->label) === str_ireplace(' ', '', '2025 ALG')) ? '#ALG2025' : $item->label;
                                        @endphp
                                        <span class="{{ $isButton ? '' : 'text-[19px] font-medium' }}">{{ $displayLabel }}</span>
                                        @if(!$isButton)
                                        <svg class="w-4 h-4 text-white/50 group-hover:text-white/80 transition-all duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        @endif
                                    </a>
                                @endforeach
                            @else
                                <a href="/speakers" class="group flex items-center justify-between px-4 py-4 text-white/90 hover:bg-white/10"><span class="text-base font-medium">Speakers</span><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                                <a href="/alg-2024" class="group flex items-center justify-between px-4 py-4 text-white/90 hover:bg-white/10"><span class="text-base font-medium">ALG 2024</span><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                                <a href="/about" class="group flex items-center justify-between px-4 py-4 text-white/90 hover:bg-white/10"><span class="text-base font-medium">About</span><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                            @endif
                        </aside>

                        <!-- Right panel -->
                        <section class="md:col-span-7 lg:col-span-7 bg-slate-900 px-6 py-6 overflow-auto relative">
                            @if($primaryMenu && $primaryMenu->items->count())
                                @foreach($primaryMenu->items->values() as $idx => $item)
                                    @php
                                        $isButton = stripos($item->label, 'reserve') !== false || stripos($item->label, 'register') !== false;
                                        $isAbout = str_ireplace(' ', '', $item->label) === str_ireplace(' ', '', 'About ALG');
                                        $norm = str_ireplace([' ', '#'], '', $item->label);
                                        $isALG2025 = in_array(strtolower($norm), ['alg2025','2025alg']);
                                        $isPast = strtolower($norm) === 'pasteditions';
                                    @endphp
                                    @if(!$isButton)
                                    <div x-show="active==={{ $idx }}" x-transition.opacity.duration.200ms>
                                        @if($isAbout)
                                            <div class="relative overflow-hidden p-0 sm:p-0">
                                                <div class="flex items-start gap-6">
                                                    <div class="shrink-0">
                                                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl bg-white/5 flex items-center justify-center">
                                                            <img src="/assets/dark-logo.png" alt="ALG" class="w-14 sm:w-16 h-auto object-contain" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-white/85 leading-relaxed text-[15px] sm:text-base">
                                                            The Annual Leaders Gathering is the LéO Africa Institute’s signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day's challenges.
                                                        </p>
                                                        <a href="{{ url('/about') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-white border border-white/20 hover:bg-white/15 hover:border-white/30 transition">
                                                            <span>Learn more</span>
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($isALG2025)
                                            <div class="relative overflow-hidden p-0 sm:p-0">
                                                <div class="flex flex-col gap-5">
                                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 w-max">
                                                        <span class="text-xs font-semibold tracking-wider">6th Annual Leaders Gathering 2025</span>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-2xl sm:text-3xl font-semibold tracking-tight text-white">#ALG2025</h3>
                                                        <p class="mt-1 text-white/85 text-[15px] sm:text-base">Theme: <span class="text-white">Building Together For Impact: Inspiring Excellence Through Transformative Leadership</span></p>
                                                    </div>
                                                    <div class="flex flex-wrap items-center gap-2">
                                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/8 border border-white/15 text-white/90">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                            <span class="text-sm">13th December 2025</span>
                                                        </span>
                                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/8 border border-white/15 text-white/90">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 00-7 7c0 5.25 7 11 7 11s7-5.75 7-11a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
                                                            <span class="text-sm">Victoria Hall, Kampala Sheraton Hotel</span>
                                                        </span>
                                                    </div>
                                                    <div class="my-4 border-t border-white/10"></div>
                                                    <p class="text-white/85 leading-relaxed text-[15px] sm:text-base max-w-3xl">
                                                        In an era marked by rapid change, complex challenges, and unprecedented opportunities, the imperative for collaborative and transformative leadership has never been greater. The 2025 gathering recognizes that sustainable impact is not achieved in isolation but through collective effort, shared vision, and a commitment to excellence that transcends individual achievements.
                                                    </p>
                                                    <div class="flex items-center gap-3">
                                                        <span class="text-white/70 text-sm">In partnership with</span>
                                                        <span class="inline-flex items-center rounded-lg px-2 py-1 bg-white/5 border border-white/10">
                                                            <img src="/assets/logos/KAS.png" alt="Konrad Adenauer Stiftung" class="h-8 w-auto object-contain"/>
                                                        </span>
                                                        <span class="inline-flex items-center rounded-lg px-2 py-1 bg-white/5 border border-white/10">
                                                            <img src="/assets/logos/Segal-light.svg" alt="Segal Family Foundation" class="h-8 w-auto object-contain"/>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($isPast)
                                            <div class="relative overflow-hidden p-0 sm:p-0">
                                                <div class="flex flex-col gap-4">
                                                    <h3 class="sr-only">Past Editions</h3>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                        <a href="/events/2024" class="group flex items-center justify-between rounded-xl border border-slate-800 bg-slate-900 p-4 hover:bg-slate-800 transition">
                                                            <span class="text-white font-medium">2024 Edition</span>
                                                            <svg class="w-4 h-4 text-white/60 group-hover:text-white/80 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                        </a>
                                                        <div class="flex items-center rounded-xl border border-slate-800 bg-slate-900/70 p-4">
                                                            <span class="text-white/80 font-medium">2023 Edition</span>
                                                        </div>
                                                        <div class="flex items-center rounded-xl border border-slate-800 bg-slate-900/70 p-4">
                                                            <span class="text-white/80 font-medium">2022 Edition</span>
                                                        </div>
                                                        <div class="flex items-center rounded-xl border border-slate-800 bg-slate-900/70 p-4">
                                                            <span class="text-white/80 font-medium">2021 Edition</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($item->children->count())
                                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                                @foreach($item->children as $child)
                                                    @if(! $child->active) @continue @endif
                                                    <a href="{{ $child->url ?? '#' }}" target="{{ $child->target ?? '_self' }}" class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 p-4 hover:bg-slate-800 transition">
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-12 h-12 rounded-lg bg-teal-600"></div>
                                                            <div class="flex-1">
                                                                <p class="text-[11px] uppercase tracking-wide text-white/60">Explore</p>
                                                                <p class="text-white font-semibold">{{ $child->label }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="text-white/80">No sub-links available.</div>
                                        @endif
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <a href="/speakers" class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 p-4 hover:bg-slate-800 transition">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-teal-600"></div>
                                            <div>
                                                <p class="text-[11px] uppercase tracking-wide text-white/60">Explore</p>
                                                <p class="text-white font-semibold">Speakers</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/alg-2024" class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 p-4 hover:bg-slate-800 transition">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-orange-500"></div>
                                            <div>
                                                <p class="text-[11px] uppercase tracking-wide text-white/60">See</p>
                                                <p class="text-white font-semibold">ALG 2024 Highlights</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </section>
                    </div>
                    
                    <!-- Social Media Links - Bottom -->
                    <div class="absolute bottom-0 left-0 right-0 border-t border-slate-800 bg-slate-950 px-6 py-4"
                         x-data="{ show: false }"
                         x-init="setTimeout(() => show = true, 800)"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="flex items-center gap-3">
                            <h5 class="text-xs font-semibold tracking-wider text-white/40 uppercase">Connect</h5>
                            <div class="flex items-center gap-2">
                                <a href="https://x.com/LeoAfricaInst" target="_blank" rel="noopener" aria-label="X (Twitter)" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2H21l-6.53 7.46L22.5 22h-6.69l-5.24-6.74L4.5 22H2l7.1-8.1L1.5 2h6.86l4.73 6.2L18.244 2Zm-1.17 18h1.86L7.01 4H5.06l12.014 16Z"/></svg>
                                </a>
                                <a href="https://www.facebook.com/LeOAfricaInstitute/" target="_blank" rel="noopener" aria-label="Facebook" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7H7v-3h3.5V9.5A4.5 4.5 0 0 1 15 5h2.5v3H15a1 1 0 0 0-1 1V12h3.5l-.5 3H14v7A10 10 0 0 0 22 12Z"/></svg>
                                </a>
                                <a href="https://www.instagram.com/leoafricainst/" target="_blank" rel="noopener" aria-label="Instagram" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.2A2.8 2.8 0 1 0 12 17.8 2.8 2.8 0 0 0 12 9.2Zm5.5-.95a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z"/></svg>
                                </a>
                                <a href="https://www.linkedin.com/company/18203194/admin/page-posts/published/" target="_blank" rel="noopener" aria-label="LinkedIn" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5ZM.5 8h4V24h-4V8ZM8.5 8h3.8v2.2h.05c.53-1 1.83-2.2 3.77-2.2 4.03 0 4.78 2.65 4.78 6.1V24h-4v-7.1c0-1.7-.03-3.9-2.4-3.9-2.4 0-2.77 1.86-2.77 3.8V24h-4V8Z"/></svg>
                                </a>
                                <a href="https://www.flickr.com/photos/africaforum/" target="_blank" rel="noopener" aria-label="Flickr" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><circle cx="7.5" cy="12" r="3.5"/><circle cx="16.5" cy="12" r="3.5"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
