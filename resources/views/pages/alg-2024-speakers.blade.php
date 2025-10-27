<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers – ALG 2024</title>
    @include('partials.analytics')
    <script>
        (function(){
            try {
                var persisted = localStorage.getItem('darkMode');
                var isDark = (persisted === null) ? true : (persisted === 'true');
                document.documentElement.classList.toggle('dark', !!isDark);
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .brand-gradient { background-image: linear-gradient(120deg, #00C2B3 0%, #FF8C00 100%); }
    </style>
</head>
<body class="antialiased bg-white dark:bg-slate-950" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="document.documentElement.classList.toggle('dark', darkMode); $watch('darkMode', v => { document.documentElement.classList.toggle('dark', v); try{ localStorage.setItem('darkMode', v ? 'true':'false') }catch(e){} })">
    <x-header />

    <!-- Hero Section -->
    <section class="relative overflow-hidden -mb-6">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('/assets/artwork.png'); background-repeat:no-repeat; background-position:right center; background-size:contain"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="flex flex-col md:flex-row items-end justify-between gap-6">
                <div class="flex-1">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-700 shadow-sm">
                        <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">ALG 2024 Speakers</span>
                    </div>
                    <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">Visionary Leaders & Innovators</h1>
                    <p class="mt-3 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">Meet the extraordinary minds who shaped ALG 2024. Thought leaders, changemakers, and visionaries from across the continent, united by a passion for transformative leadership and continental impact.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="/events/2024" class="shrink-0 whitespace-nowrap inline-flex items-center gap-2 h-11 px-5 rounded-full border border-gray-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/70 backdrop-blur hover:bg-white dark:hover:bg-slate-900 text-gray-800 dark:text-gray-200 transition-all">Back to Event</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Grid -->
    <section class="py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($speakers->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($speakers as $speaker)
                        @php 
                            $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                            $hasSocial = filled($speaker->twitter) || filled($speaker->linkedin) || filled($speaker->website);
                        @endphp
                        <div class="group cursor-pointer" @click="$dispatch('open-speaker-modal', { speaker: {{ json_encode([
                            'id' => $speaker->id,
                            'name' => $speaker->name,
                            'title' => $speaker->title,
                            'company' => $speaker->company,
                            'role' => optional($speaker->pivot)->role,
                            'bio' => $speaker->short_bio,
                            'avatar' => $avatar,
                            'twitter' => $speaker->twitter,
                            'linkedin' => $speaker->linkedin,
                            'website' => $speaker->website,
                            'quote' => $speaker->quote
                        ]) }} })">
                            <article class="relative bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <!-- Image -->
                                <div class="aspect-square overflow-hidden bg-gray-50 dark:bg-slate-800">
                                    @if($avatar)
                                        <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-4xl font-bold">{{ Str::of($speaker->name)->substr(0,1) }}</div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="p-5">
                                    @if(optional($speaker->pivot)->role)
                                        <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-wide mb-2">{{ optional($speaker->pivot)->role }}</p>
                                    @endif
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors">{{ $speaker->name }}</h3>
                                    @if($speaker->title || $speaker->company)
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $speaker->title }}@if($speaker->title && $speaker->company) • @endif{{ $speaker->company }}</p>
                                    @endif
                                    
                                    @if($speaker->quote)
                                        <p class="mt-3 text-sm italic text-gray-700 dark:text-gray-300 line-clamp-2">"{{ $speaker->quote }}"</p>
                                    @endif

                                    <!-- Social Links -->
                                    @if($hasSocial)
                                        <div class="mt-4 flex items-center gap-2 pt-4 border-t border-gray-100 dark:border-slate-800">
                                            @if($speaker->twitter)
                                                <a href="{{ $speaker->twitter }}" target="_blank" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 text-gray-600 dark:text-gray-400 hover:text-teal-600 dark:hover:text-teal-400 transition-colors" aria-label="Twitter">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.8c-.7.3-1.5.6-2.3.7.8-.5 1.4-1.3 1.7-2.2-.7.5-1.6.8-2.5 1-1.4-1.5-3.7-1.6-5.2-.2-1 .9-1.4 2.2-1.2 3.5-3-.2-5.7-1.6-7.5-3.9-1 1.7-.5 3.9 1.1 5 .6.4 1.3.7 2 .8-.6 0-1.1-.2-1.6-.4 0 2.1 1.5 3.9 3.6 4.3-.7.2-1.4.2-2.1.1.6 1.8 2.3 3 4.2 3-1.6 1.3-3.6 2.1-5.7 2.1H3c2 1.3 4.4 2 6.9 2 8.3 0 12.8-7 12.8-13.1v-.6c.9-.7 1.6-1.4 2.2-2.3z"/></svg>
                                                </a>
                                            @endif
                                            @if($speaker->linkedin)
                                                <a href="{{ $speaker->linkedin }}" target="_blank" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 text-gray-600 dark:text-gray-400 hover:text-teal-600 dark:hover:text-teal-400 transition-colors" aria-label="LinkedIn">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V24h-4V8zm7.5 0h3.8v2.2h.1c.5-1 1.9-2.2 3.9-2.2 4.2 0 5 2.8 5 6.4V24h-4v-7.3c0-1.7 0-3.8-2.3-3.8-2.3 0-2.7 1.8-2.7 3.7V24h-4V8z"/></svg>
                                                </a>
                                            @endif
                                            @if($speaker->website)
                                                <a href="{{ $speaker->website }}" target="_blank" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 text-gray-600 dark:text-gray-400 hover:text-teal-600 dark:hover:text-teal-400 transition-colors" aria-label="Website">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 17.9V20h-2v-.1A8.002 8.002 0 014 12H2v-2h2a8.002 8.002 0 017-7.9V2h2v.1A8.002 8.002 0 0120 10h2v2h-2a8.002 8.002 0 01-7 7.9z"/></svg>
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <!-- Click Indicator -->
                                <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-teal-500/50 transition-colors pointer-events-none"></div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 dark:text-gray-400">No speakers found for this event.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Speaker Modal -->
    <div class="fixed inset-0 z-50 flex items-end sm:items-center justify-center" x-data="{ open: false, speaker: null }" @open-speaker-modal.window="open = true; speaker = $event.detail.speaker" @keydown.escape="open = false" x-show="open" x-transition.opacity class="p-0 sm:p-4 bg-black/50 backdrop-blur-sm" @click.self="open = false" style="display: none;">
        <div x-show="open" x-transition class="relative w-full sm:max-w-2xl bg-white dark:bg-slate-900 rounded-t-3xl sm:rounded-3xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">
            <!-- Close Button with Tooltip -->
            <div class="absolute top-4 right-4 sm:top-6 sm:right-6 z-10 group">
                <button @click="open = false" class="p-2 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-700 transition-colors">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <div class="hidden sm:block absolute right-0 mt-2 px-3 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                    Press ESC to close
                </div>
            </div>

            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 p-5 sm:p-8 md:p-12">
                <!-- Image -->
                <div class="md:col-span-1">
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 dark:bg-slate-800 sticky top-8">
                        <img :src="speaker.avatar" :alt="speaker.name" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Details -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Name & Title -->
                    <div>
                        <p x-show="speaker.role" class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-wide mb-2" x-text="speaker.role"></p>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white" x-text="speaker.name"></h2>
                        <p class="mt-2 text-sm sm:text-base md:text-lg text-teal-600 dark:text-teal-400 font-semibold">
                            <span x-text="speaker.title"></span>
                            <span x-show="speaker.title && speaker.company"> • </span>
                            <span x-text="speaker.company"></span>
                        </p>
                    </div>

                    <!-- Quote -->
                    <div x-show="speaker.quote" class="border-l-4 border-teal-500 pl-4 py-2">
                        <p class="text-sm sm:text-base md:text-lg italic text-gray-700 dark:text-gray-300">
                            <span class="text-lg sm:text-xl md:text-2xl text-teal-500 mr-2">"</span>
                            <span x-text="speaker.quote"></span>
                            <span class="text-lg sm:text-xl md:text-2xl text-teal-500 ml-2">"</span>
                        </p>
                    </div>

                    <!-- Bio -->
                    <div x-show="speaker.bio">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-3">About</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed" x-text="speaker.bio"></p>
                    </div>

                    <!-- Social Links -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4 pt-4">
                        <span class="text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-400">Connect:</span>
                        <div class="flex items-center gap-2 sm:gap-3">
                            <a :href="speaker.twitter" x-show="speaker.twitter" target="_blank" class="p-2 sm:p-3 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-teal-100 dark:hover:bg-teal-900/30 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.8c-.7.3-1.5.6-2.3.7.8-.5 1.4-1.3 1.7-2.2-.7.5-1.6.8-2.5 1-1.4-1.5-3.7-1.6-5.2-.2-1 .9-1.4 2.2-1.2 3.5-3-.2-5.7-1.6-7.5-3.9-1 1.7-.5 3.9 1.1 5 .6.4 1.3.7 2 .8-.6 0-1.1-.2-1.6-.4 0 2.1 1.5 3.9 3.6 4.3-.7.2-1.4.2-2.1.1.6 1.8 2.3 3 4.2 3-1.6 1.3-3.6 2.1-5.7 2.1H3c2 1.3 4.4 2 6.9 2 8.3 0 12.8-7 12.8-13.1v-.6c.9-.7 1.6-1.4 2.2-2.3z"/></svg>
                            </a>
                            <a :href="speaker.linkedin" x-show="speaker.linkedin" target="_blank" class="p-2 sm:p-3 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-teal-100 dark:hover:bg-teal-900/30 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V24h-4V8zm7.5 0h3.8v2.2h.1c.5-1 1.9-2.2 3.9-2.2 4.2 0 5 2.8 5 6.4V24h-4v-7.3c0-1.7 0-3.8-2.3-3.8-2.3 0-2.7 1.8-2.7 3.7V24h-4V8z"/></svg>
                            </a>
                            <a :href="speaker.website" x-show="speaker.website" target="_blank" class="p-2 sm:p-3 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-teal-100 dark:hover:bg-teal-900/30 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 17.9V20h-2v-.1A8.002 8.002 0 014 12H2v-2h2a8.002 8.002 0 017-7.9V2h2v.1A8.002 8.002 0 0120 10h2v2h-2a8.002 8.002 0 01-7 7.9z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>
</html>
