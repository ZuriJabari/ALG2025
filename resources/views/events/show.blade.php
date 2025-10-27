<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $event->title }} - ALG</title>
    @include('partials.analytics')
    <script>
        // Initialize theme before CSS loads: default DARK unless user explicitly set otherwise
        (function(){
            try {
                var persisted = localStorage.getItem('darkMode');
                var isDark = (persisted === null) ? true : (persisted === 'true');
                document.documentElement.classList.toggle('dark', !!isDark);
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Plyr Video Player -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>
<body class="antialiased bg-white dark:bg-slate-950" x-data="{ darkMode: (localStorage.getItem('darkMode') === null) ? true : (localStorage.getItem('darkMode') === 'true') }" x-init="
    // Ensure html reflects state on init
    document.documentElement.classList.toggle('dark', darkMode);
    // Watch for changes to keep html class and localStorage in sync
    $watch('darkMode', value => {
        document.documentElement.classList.toggle('dark', value);
        try { localStorage.setItem('darkMode', value ? 'true' : 'false'); } catch(e) {}
    });
">
    <x-header />
    
    <x-hero :event="$event" :hero="$hero" />

    @if((int) $event->year === 2025)
        @php
            $themeTitle = 'Theme: Building Together for Impact';
            $themeBody = $hero?->description
                ?: ($event->hero_description ?: $event->description);
            $quote = 'The most enduring change is never the work of solitary heroes, but of communities bound by shared purpose and mutual commitment.';
        @endphp
        <!-- Theme Section -->
        <section class="py-20 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="inline-flex h-1 w-24 rounded-full bg-teal-500"></div>
                <h2 class="mt-6 text-3xl md:text-5xl font-semibold text-gray-900 dark:text-white tracking-tight">{{ $themeTitle }}</h2>
                @if($themeBody)
                    <p class="mt-4 text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-4xl">{{ $themeBody }}</p>
                @endif

    <!-- Contact Micro-CTA (refined) -->
    <section class="py-10 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative group">
                <!-- glow -->
                <div class="absolute -inset-px rounded-2xl bg-gradient-to-r from-teal-500/25 via-emerald-500/20 to-cyan-500/25 blur opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <!-- card -->
                <div class="relative rounded-2xl border border-teal-200/50 dark:border-teal-800/40 bg-white/70 dark:bg-slate-950/60 backdrop-blur px-5 py-5 sm:px-8 sm:py-6 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 items-center">
                        <div class="md:col-span-2">
                            <div class="inline-flex items-center gap-2 text-teal-600 dark:text-teal-400 font-semibold text-xs tracking-widest uppercase">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                                <span>Available on email</span>
                            </div>
                            <p class="mt-1 text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Questions about ALG {{ $event->year }}?</p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Reach us anytime — we aim to respond promptly.</p>
                        </div>
                        <div class="md:justify-self-end">
                            <a href="mailto:alg@laoafricainstiute.org" class="relative inline-flex items-center gap-2 h-11 px-5 rounded-full text-white font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400/60 transition-all duration-300 shadow-lg hover:shadow-xl bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 hover:-translate-y-0.5">
                                <svg class="w-4 h-4 opacity-95" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4"/></svg>
                                <span class="truncate">alg@laoafricainstiute.org</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

                <!-- Quote block -->
                <div class="mt-10 relative max-w-3xl group">
                    <div class="rounded-[28px] bg-teal-600 text-white p-6 sm:p-8 shadow-2xl transition-all duration-500 ease-out transform group-hover:-translate-y-0.5 group-hover:shadow-[0_20px_40px_-20px_rgba(0,0,0,0.5)]">
                        <div class="flex gap-4 items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-10 h-10 opacity-80" fill="currentColor" viewBox="0 0 24 24"><path d="M7 17h3l2-4V7H6v6h3l-2 4zm7 0h3l2-4V7h-6v6h3l-2 4z"/></svg>
                            </div>
                            <p class="text-xl sm:text-2xl font-semibold leading-relaxed">"{{ $quote }}"</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-5 left-6 inline-flex items-center gap-2 px-3 py-2 rounded-full bg-white/90 dark:bg-slate-900/90 text-teal-700 dark:text-teal-300 border border-teal-200/60 dark:border-teal-800/60 shadow-md transition-all duration-300 group-hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0 0a4 4 0 004-4 4 4 0 00-4-4m0 8v-8m0 8a4 4 0 004 4"/></svg>
                        <span class="text-sm font-semibold">Community: 200+ Fellows</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Concept Note: Overview, Participants, Outcomes -->
        <section class="py-20 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="space-y-4">
                        <div class="inline-flex h-1 w-16 rounded-full bg-teal-500"></div>
                        <h3 class="text-2xl md:text-3xl font-semibold text-gray-900 dark:text-white">Concept Overview</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">ALG {{ $event->year }} convenes cross‑sector leaders to explore how collaboration, impact, and excellence can accelerate transformation across Africa. Through dialogue and connection, participants co‑create partnerships and actions that move ideas to outcomes.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="inline-flex h-1 w-16 rounded-full bg-teal-500"></div>
                        <h3 class="text-2xl md:text-3xl font-semibold text-gray-900 dark:text-white">Target Participants</h3>
                        <ul class="text-gray-700 dark:text-gray-300 leading-relaxed space-y-2">
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Public sector leaders and policy shapers</span></li>
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Private sector executives and entrepreneurs</span></li>
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Civil society and philanthropy leaders</span></li>
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Academia, media, and innovation ecosystem builders</span></li>
                        </ul>
                    </div>
                    <div class="space-y-4">
                        <div class="inline-flex h-1 w-16 rounded-full bg-teal-500"></div>
                        <h3 class="text-2xl md:text-3xl font-semibold text-gray-900 dark:text-white">Expected Outcomes</h3>
                        <ul class="text-gray-700 dark:text-gray-300 leading-relaxed space-y-2">
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>New partnerships formed and strengthened networks</span></li>
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Actionable commitments and follow‑up collaboration tracks</span></li>
                            <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-teal-500"></span><span>Shared agenda for advancing collaborative leadership</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Strip -->
        <section class="py-10 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6">
                    <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 whitespace-nowrap">Convened in partnership with</p>
                    <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                        <a href="https://www.kas.de/en/web/uganda" target="_blank" rel="noopener" class="inline-flex items-center" aria-label="Konrad Adenauer Stiftung">
                            <span class="inline-flex items-center px-3 py-2 rounded-md bg-white dark:bg-white border border-gray-200 shadow-sm ring-1 ring-black/5">
                                <img src="/assets/logos/konrad-adenauer-stiftung.png" alt="Konrad Adenauer Stiftung" class="h-8 sm:h-10 w-auto object-contain" loading="lazy">
                            </span>
                        </a>
                        <a href="https://www.segalfamilyfoundation.org/" target="_blank" rel="noopener" class="inline-flex items-center" aria-label="Segal Family Foundation">
                            <span class="inline-flex items-center px-3 py-2 rounded-md bg-white dark:bg-white border border-gray-200 shadow-sm ring-1 ring-black/5">
                                <img src="/assets/logos/segal-family-foundation.svg" alt="Segal Family Foundation" class="h-8 sm:h-10 w-auto object-contain" loading="lazy">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                    <div>
                        <div class="inline-flex h-1 w-20 rounded-full bg-teal-500"></div>
                        <h3 class="mt-4 text-2xl md:text-4xl font-semibold text-gray-900 dark:text-white tracking-tight">Theme Rationale</h3>
                        <ul class="mt-5 space-y-4 text-gray-700 dark:text-gray-300 text-base leading-relaxed">
                            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span><span>Collaboration as foundation — multi‑sector partnerships and inclusive approaches that harness diverse perspectives.</span></li>
                            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span><span>Impact as measure — results‑oriented leadership focused on tangible outcomes for communities and institutions.</span></li>
                            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span><span>Excellence as standard — leaders who set high bars, innovate continuously, and model integrity.</span></li>
                        </ul>
                    </div>
                    <div class="relative p-6 sm:p-8 rounded-3xl border border-gray-200 dark:border-slate-800 bg-white/80 dark:bg-slate-950/80 overflow-hidden">
                        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image:url('/assets/artwork.png');background-repeat:no-repeat;background-position:right bottom;background-size:520px auto"></div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Concept Snapshot</h4>
                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900">
                                <p class="text-sm font-semibold text-teal-600 dark:text-teal-400">Why now</p>
                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Rapid change demands collaborative, transformative leadership across Africa.</p>
                            </div>
                            <div class="p-4 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900">
                                <p class="text-sm font-semibold text-teal-600 dark:text-teal-400">What you’ll experience</p>
                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Keynotes, panels, and curated networking to forge partnerships and action.</p>
                            </div>
                            <div class="p-4 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900">
                                <p class="text-sm font-semibold text-teal-600 dark:text-teal-400">Who attends</p>
                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">100–150 cross‑sector leaders: public, private, civil society, academia, and innovators.</p>
                            </div>
                            <div class="p-4 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900">
                                <p class="text-sm font-semibold text-teal-600 dark:text-teal-400">Outcomes</p>
                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">New partnerships, actionable plans, and a shared agenda for impact.</p>
                            </div>
                        </div>
                        <div class="mt-5 flex items-center gap-3">
                            <a href="{{ route('seat-reservations.create') }}" class="px-5 h-11 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">Reserve your seat</a>
                            <a href="{{ route('events.show', ['year' => 2025]) }}" class="px-5 h-11 inline-flex items-center justify-center rounded-full border-2 border-teal-600 dark:border-teal-400 text-teal-700 dark:text-teal-300 bg-white dark:bg-slate-900 hover:bg-gray-50 dark:hover:bg-slate-800 font-semibold transition-all">Read full overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Speakers (TBA) -->
        <section class="py-20 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-10">
                    <h3 class="text-3xl md:text-4xl font-semibold text-gray-900 dark:text-white tracking-tight">Featured Speakers</h3>
                    <a href="/speakers" class="inline-flex items-center gap-2 h-11 px-5 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-800 dark:text-gray-200 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40">View Full Lineup
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
                <div class="relative rounded-3xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-12 text-center shadow-lg transition-all duration-500 hover:shadow-xl">
                        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">To be announced soon.</p>
                        <div class="mt-6 flex items-center justify-center gap-3">
                            <a href="/speakers" class="inline-flex items-center gap-2 h-11 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">Get notified</a>
                            <a href="/alg-2024" class="inline-flex items-center gap-2 h-11 px-6 rounded-full border-2 border-teal-600 dark:border-teal-400 text-teal-700 dark:text-teal-300 hover:bg-teal-50/60 dark:hover:bg-slate-800 transition-all">See 2024 Highlights</a>
                        </div>
                </div>
            </div>
        </section>
    @endif

    @if((int) $event->year === 2024)
        @php
            // Get speakers from event days (not direct event relationship)
            $allSpeakers = ($event->days ?? collect())->flatMap(fn($d) => $d->speakers ?? collect())->unique('id');
            $speakerCount = $allSpeakers->count();
            $dayCount = $event->days?->count() ?? 0;
            $sessionCount = $event->days?->flatMap(fn($d) => $d->sessions)->count()
                ?: ($event->sessions?->count() ?? 0);
            $topSpeakers = $allSpeakers->take(6);
            $themeTitle = $event->hero_title ?: ($event->subtitle ?: 'ALG 2024 Theme');
            $themeBody = $event->hero_description ?: ($event->description ?: null);
            $quotes = $allSpeakers->filter(fn($s) => filled($s->quote ?? null))->values();
        @endphp

        <!-- ALG 2024 Highlights -->
        <section class="py-16 sm:py-20 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Highlights Description -->
                <div>
                    <div class="inline-flex h-1 w-24 rounded-full bg-teal-500"></div>
                    <h3 class="mt-6 text-2xl md:text-4xl font-semibold text-gray-900 dark:text-white tracking-tight">ALG 2024 Highlights</h3>
                    <div class="mt-4 prose prose-invert max-w-4xl text-gray-700 dark:text-gray-300 text-lg leading-relaxed space-y-4">
                        <p>The Annual Leaders Gathering 2024, held on November 14 and 16 at the Sheraton Kampala Hotel, brought together a remarkable assembly of leaders, innovators, and thinkers from diverse fields and regions.</p>
                        <p>This year's theme centered around driving impactful leadership and fostering global collaborations to tackle pressing challenges. Through dynamic sessions, keynotes, and interactive workshops, #ALG2024 empowered participants with actionable strategies and insights to create sustainable solutions for today's global issues.</p>
                        <p>By connecting over 500 attendees from 15+ countries, #ALG2024 provided a platform to share innovative ideas, forge meaningful partnerships, and chart a path for transformative leadership in an interconnected world.</p>
                    </div>

                    <!-- Statistics -->
                    <div class="mt-10 flex gap-2 sm:gap-3 max-w-full overflow-x-auto pb-2">
                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-teal-600/10 rounded-lg blur-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative p-3 rounded-lg bg-white/50 dark:bg-slate-900/50 border border-teal-200/30 dark:border-teal-800/30 backdrop-blur-sm hover:border-teal-300/60 dark:hover:border-teal-700/60 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <p class="text-lg sm:text-xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent">{{ $speakerCount }}</p>
                                    <p class="mt-0.5 text-xs font-semibold text-gray-700 dark:text-gray-300 tracking-wide uppercase">Speakers</p>
                                </div>
                            </div>
                        </div>

                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-teal-600/10 rounded-lg blur-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative p-3 rounded-lg bg-white/50 dark:bg-slate-900/50 border border-teal-200/30 dark:border-teal-800/30 backdrop-blur-sm hover:border-teal-300/60 dark:hover:border-teal-700/60 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <p class="text-lg sm:text-xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent">{{ $sessionCount }}</p>
                                    <p class="mt-0.5 text-xs font-semibold text-gray-700 dark:text-gray-300 tracking-wide uppercase">Sessions</p>
                                </div>
                            </div>
                        </div>

                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-teal-600/10 rounded-lg blur-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative p-3 rounded-lg bg-white/50 dark:bg-slate-900/50 border border-teal-200/30 dark:border-teal-800/30 backdrop-blur-sm hover:border-teal-300/60 dark:hover:border-teal-700/60 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <p class="text-lg sm:text-xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent">{{ $dayCount }}</p>
                                    <p class="mt-0.5 text-xs font-semibold text-gray-700 dark:text-gray-300 tracking-wide uppercase">Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($themeBody)
                <!-- Theme block -->
                <div class="mt-10">
                    <div class="inline-flex h-1 w-24 rounded-full bg-teal-500"></div>
                    <h3 class="mt-6 text-2xl md:text-4xl font-semibold text-gray-900 dark:text-white tracking-tight">{{ $themeTitle }}</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-4xl">{{ $themeBody }}</p>
                </div>
                @endif

            </div>
        </section>



        @if($quotes->count())
        <!-- Quotes Section (before Program) -->
        <section class="py-16 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-10">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">In their words</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Reflections from ALG 2024 speakers</p>
                </div>
                <div x-data="{
                        i: 0,
                        size: {{ $quotes->count() }},
                        timer: null,
                        intervalMs: 8000,
                        hovering: false,
                        maxHeight: 0,
                        start(){ this.stop(); this.timer = setInterval(()=>{ if(!this.hovering){ this.next() } }, this.intervalMs) },
                        stop(){ if(this.timer){ clearInterval(this.timer); this.timer = null } },
                        next(){ this.i = (this.i + 1) % this.size; this.$nextTick(()=>this.compute()) },
                        prev(){ this.i = (this.i - 1 + this.size) % this.size; this.$nextTick(()=>this.compute()) },
                        go(n){ this.i = n; this.$nextTick(()=>this.compute()) },
                        compute(){
                            this.$nextTick(()=>{
                                const c = this.$refs.slides;
                                if(!c) return;
                                const hs = Array.from(c.children).map(el => el.scrollHeight || 0);
                                const m = Math.max(0, ...hs);
                                this.maxHeight = m;
                            });
                        }
                    }"
                     x-init="compute(); start()"
                     @mouseenter="hovering=true"
                     @mouseleave="hovering=false; start()"
                     @resize.window="compute()"
                     class="relative"
                >
                    <div class="overflow-hidden rounded-3xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-lg">
                        <div x-ref="slides" class="relative" :style="{ height: maxHeight + 'px' }" aria-live="polite">
                            @foreach($quotes as $idx => $s)
                                @php $avatar = $s->getFirstMediaUrl('headshot', 'avatar') ?: $s->getFirstMediaUrl('headshot'); @endphp
                                <div x-show="i === {{ $idx }}" x-transition.opacity.duration.500ms class="absolute inset-0 p-8 sm:p-12">
                                    <svg class="w-10 h-10 text-teal-500" fill="currentColor" viewBox="0 0 24 24"><path d="M7 17h3l2-4V7H6v6h3l-2 4zm7 0h3l2-4V7h-6v6h3l-2 4z"/></svg>
                                    <p class="mt-4 text-xl sm:text-2xl text-gray-800 dark:text-gray-100 leading-relaxed">"{{ $s->quote }}"</p>
                                    <div class="mt-6 flex items-center gap-4">
                                        @if($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $s->name }}" class="w-12 h-12 rounded-full object-cover">
                                        @endif
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">{{ $s->name }}</p>
                                            @if($s->title || $s->company)
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $s->title }}@if($s->title && $s->company) • @endif{{ $s->company }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <button @click="prev()" class="h-10 w-10 inline-flex items-center justify-center rounded-full border border-gray-200 dark:border-slate-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800" aria-label="Previous">‹</button>
                        <div class="flex items-center gap-3">
                            @foreach($quotes as $idx => $s)
                                <button @click="go({{ $idx }})" class="relative w-6 h-2 rounded-full bg-gray-300 dark:bg-slate-700 overflow-hidden" :aria-current="i==={{ $idx }}">
                                    <span class="absolute inset-y-0 left-0 bg-teal-600" :style="i==={{ $idx }} ? 'width:100%; transition: width 8s linear' : 'width:0'" ></span>
                                </button>
                            @endforeach
                        </div>
                        <button @click="next()" class="h-10 w-10 inline-flex items-center justify-center rounded-full border border-gray-200 dark:border-slate-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800" aria-label="Next">›</button>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @php
            $days = $event->days ?? collect();
        @endphp
        @if($days->count())
        <!-- Program Timeline -->
        <section class="py-16 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3">Program / Speakers</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed max-w-3xl mb-8">Through impactful discussions, keynote addresses, and hands-on workshops, experience a gathering dedicated to advancing leadership, institutional growth, and human capital development across the continent.</p>
                <div class="space-y-8">
                    @foreach($days as $day)
                        @php $sessions = ($day->sessions ?? collect())->sortBy('start_at'); @endphp
                        <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 overflow-hidden">
                            <button type="button" class="w-full flex items-center justify-between px-5 py-4 text-left" x-data="{open:true}" @click="open=!open" :aria-expanded="open.toString()">
                                <div>
                                    <p class="text-sm font-semibold text-teal-600 dark:text-teal-400">{{ optional($day->date)->format('M j, Y') ?: 'Day' }}</p>
                                    @if($day->title)
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-white">{{ $day->title }}</h4>
                                    @endif
                                </div>
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="px-5 pb-5" x-show="open" x-transition>
                                <ol class="relative border-s border-gray-200 dark:border-slate-800">
                                    @forelse($sessions as $session)
                                        <li class="pl-6 py-6 border-b border-gray-200 dark:border-slate-800 last:border-b-0">
                                            <span class="absolute -left-1.5 mt-3 w-3 h-3 rounded-full bg-teal-500"></span>
                                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-3 mb-3">
                                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300 text-xs font-semibold border border-teal-200/60 dark:border-teal-800/60">
                                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                            {{ optional($session->start_time)->format('g:i A') }} @if($session->end_time)– {{ optional($session->end_time)->format('g:i A') }}@endif
                                                        </span>
                                                    </div>
                                                    <h5 class="text-gray-900 dark:text-white">
                                                        @php
                                                            $parts = preg_split('/([\d]+|[IVX]+)/', $session->title, -1, PREG_SPLIT_DELIM_CAPTURE);
                                                        @endphp
                                                        @foreach($parts as $part)
                                                            @if(preg_match('/^[\d]+$/', $part) || preg_match('/^[IVX]+$/', $part))
                                                                <span class="text-5xl font-bold">{{ $part }}</span>
                                                            @elseif(trim($part) !== '')
                                                                <span class="text-lg font-semibold">{{ $part }}</span>
                                                            @endif
                                                        @endforeach
                                                    </h5>
                                                    @if($session->theme)
                                                        <div class="mt-2 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-teal-50 to-teal-100 dark:from-teal-900/30 dark:to-teal-800/30 border border-teal-200/60 dark:border-teal-800/60">
                                                            <svg class="w-4 h-4 text-teal-600 dark:text-teal-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                                            <span class="text-sm font-semibold text-teal-700 dark:text-teal-300">{{ $session->theme }}</span>
                                                        </div>
                                                    @endif
                                                    @if($session->description)
                                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">{{ $session->description }}</p>
                                                    @endif
                                                </div>
                                                @if(($session->speakers ?? collect())->count())
                                                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                        @foreach($session->speakers as $ss)
                                                            @php $a = $ss->getFirstMediaUrl('headshot', 'avatar') ?: $ss->getFirstMediaUrl('headshot'); @endphp
                                                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-white dark:bg-slate-950 border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-md transition-all duration-300">
                                                                @if($a)
                                                                    <img src="{{ $a }}" class="w-16 h-16 rounded-xl object-cover flex-shrink-0" alt="{{ $ss->name }}">
                                                                @else
                                                                    <div class="w-16 h-16 rounded-xl bg-gray-200 dark:bg-slate-700 flex items-center justify-center text-lg font-semibold text-gray-600 flex-shrink-0">{{ Str::of($ss->name)->substr(0,1) }}</div>
                                                                @endif
                                                                <div class="flex-1 min-w-0">
                                                                    @if(optional($ss->pivot)->role)
                                                                        <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-wide">{{ $ss->pivot->role }}</p>
                                                                    @endif
                                                                    <h6 class="mt-1 text-sm font-semibold text-gray-900 dark:text-white truncate">{{ $ss->name }}</h6>
                                                                    @if($ss->title || $ss->company)
                                                                        <p class="mt-0.5 text-xs text-gray-600 dark:text-gray-400 truncate">{{ $ss->title }}@if($ss->title && $ss->company) • @endif{{ $ss->company }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @empty
                                        <li class="pl-6 py-5 text-gray-500 dark:text-gray-400">No sessions found for this day.</li>
                                    @endforelse
                                </ol>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    @endif

    <!-- Featured Speakers Section -->
    @if($event->speakers->count() > 0)
        <section class="py-20 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                        Featured Speakers
                    </h2>
                    <div class="w-16 h-1 bg-gradient-to-r from-teal-500 to-orange-500 mx-auto"></div>
                </div>

                <!-- Speakers Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($event->speakers->take(4) as $speaker)
                        <div class="group bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <!-- Speaker Image -->
                            <div class="relative h-64 overflow-hidden bg-gray-200 dark:bg-slate-700">
                                @if($speaker->getFirstMediaUrl('headshot'))
                                    <img 
                                        src="{{ $speaker->getFirstMediaUrl('headshot') }}" 
                                        alt="{{ $speaker->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    >
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-teal-400 to-orange-400 flex items-center justify-center">
                                        <svg class="w-24 h-24 text-white opacity-30" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Speaker Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">
                                    {{ $speaker->name }}
                                </h3>
                                @if($speaker->title || $speaker->company)
                                    <p class="text-sm text-teal-600 dark:text-teal-400 font-semibold mb-3">
                                        {{ $speaker->title }}@if($speaker->title && $speaker->company) • @endif{{ $speaker->company }}
                                    </p>
                                @endif
                                @if($speaker->short_bio)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2 mb-4">
                                        {{ $speaker->short_bio }}
                                    </p>
                                @endif

                                <!-- Social Links -->
                                <div class="flex gap-3">
                                    @if($speaker->twitter)
                                        <a href="{{ $speaker->twitter }}" target="_blank" class="text-gray-400 hover:text-teal-500 transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7"></path></svg>
                                        </a>
                                    @endif
                                    @if($speaker->linkedin)
                                        <a href="{{ $speaker->linkedin }}" target="_blank" class="text-gray-400 hover:text-teal-500 transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path><circle cx="4" cy="4" r="2"></circle></svg>
                                        </a>
                                    @endif
                                    @if($speaker->website)
                                        <a href="{{ $speaker->website }}" target="_blank" class="text-gray-400 hover:text-teal-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- What to Expect Section -->
    @if($event->features->count() > 0)
        <section class="py-20 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                        What to Expect
                    </h2>
                    <div class="w-16 h-1 bg-gradient-to-r from-teal-500 to-orange-500 mx-auto"></div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($event->features as $feature)
                        <div class="group p-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-slate-800 dark:to-slate-900 rounded-xl hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-slate-700 hover:border-teal-500 dark:hover:border-teal-400">
                            <!-- Icon -->
                            <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-orange-500 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>

                            <!-- Content -->
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                                {{ $feature->title }}
                            </h3>
                            @if($feature->description)
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                    {{ $feature->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Band -->
    @php
        $ctaLabel = $event->hero_cta_label ?? $event->primary_cta_label;
        $ctaUrl = $event->hero_cta_url ?? $event->primary_cta_url;
    @endphp
    @if($ctaLabel && $ctaUrl)
        <section class="py-16 bg-gradient-to-r from-teal-500 to-orange-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6"
                     x-data="{ open:false, email:'', loading:false, submitted:false, error:null, openToggle(){ this.open=!this.open; if(this.open){ this.$nextTick(()=> this.$refs.ctaEmail?.focus()); } }, async submit(){ if(!this.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)){ this.error='Please enter a valid email.'; return; } this.loading=true; this.error=null; try{ const res = await fetch('{{ route('newsletter.subscribe') }}', { method:'POST', headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' }, body: JSON.stringify({ email:this.email }) }); if(!res.ok){ const d = await res.json(); throw new Error((d.errors && (d.errors.email?.[0]||'Invalid email'))||'Subscription failed'); } this.submitted=true; this.email=''; setTimeout(()=>{ this.submitted=false; this.open=false; }, 2200); }catch(e){ this.error = e.message || 'Something went wrong'; } finally{ this.loading=false; } } }">
                    <h3 class="text-2xl md:text-3xl font-bold text-white">Be part of ALG {{ $event->year }} — reserve your seat today.</h3>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ $ctaUrl }}" class="shrink-0 whitespace-nowrap px-8 py-4 bg-white/95 text-teal-700 font-semibold rounded-full hover:bg-white transition">{{ $ctaLabel }}</a>
                        <button type="button" @click="openToggle()" :aria-expanded="open.toString()" class="shrink-0 whitespace-nowrap px-8 py-4 rounded-full bg-teal-700/20 text-white font-semibold hover:bg-teal-700/30 transition">Get updates</button>
                        <div class="basis-full w-full" x-show="open"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-400"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-1 scale-95">
                            <div class="mt-3 rounded-2xl bg-white/90 backdrop-blur px-3 py-2">
                                <form @submit.prevent="submit" class="flex items-center gap-2" @keydown.enter.prevent="submit">
                                    <label for="cta-email" class="sr-only">Email</label>
                                    <input id="cta-email" x-ref="ctaEmail" x-model="email" type="email" required placeholder="you@example.com" class="w-full sm:w-96 h-12 rounded-full bg-white text-gray-900 placeholder-gray-500 px-4 outline-none text-base" />
                                    <button type="submit" :disabled="loading" class="inline-flex items-center justify-center h-12 px-6 rounded-full bg-teal-600 text-white font-semibold transition disabled:opacity-60">
                                        <span x-show="!loading">Subscribe</span>
                                        <span x-show="loading">Subscribing…</span>
                                    </button>
                                </form>
                                <p x-show="submitted" x-transition.opacity.duration.200ms class="mt-2 text-sm text-teal-700" aria-live="polite">Thanks! You’re on the list.</p>
                                <p x-show="error" x-transition.opacity.duration.200ms x-text="error" class="mt-1 text-sm text-orange-700" aria-live="assertive"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    

    <x-footer />

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script>
        // Initialize Plyr video player
        const players = Array.from(document.querySelectorAll('[data-plyr-provider]')).map(el => new Plyr(el, {
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
            settings: ['captions', 'quality', 'speed'],
            quality: { default: 720, options: [360, 720, 1080] },
            speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] },
            tooltips: { controls: true, seek: true },
            keyboard: { focused: true, global: false },
            fullscreen: { enabled: true, fallback: true },
        }));

        // Dark mode persistence
        const darkModeToggle = document.querySelector('[aria-label="Toggle dark mode"]');
        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');
                localStorage.setItem('darkMode', !isDark);
            });
        }
    </script>
</body>
</html>
