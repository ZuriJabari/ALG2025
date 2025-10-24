<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $event->title }} - ALG</title>
    @include('partials.analytics')
    <script>
        // Initialize theme before CSS loads: default light (no class), enable dark if persisted
        (function(){
            try {
                var persisted = localStorage.getItem('darkMode');
                var isDark = persisted === 'true';
                document.documentElement.classList.toggle('dark', !!isDark);
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Plyr Video Player -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>
<body class="antialiased bg-white dark:bg-slate-950" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="
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
            $speakerCount = $event->speakers?->count() ?? 0;
            $dayCount = $event->days?->count() ?? 0;
            $sessionCount = $event->days?->flatMap(fn($d) => $d->sessions)->count()
                ?: ($event->sessions?->count() ?? 0);
            $topSpeakers = $event->speakers?->take(6) ?? collect();
        @endphp

        <!-- ALG 2024 Highlights -->
        <section class="py-16 sm:py-20 bg-white dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 mb-10">
                    <div>
                        <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white">ALG 2024 Highlights</h2>
                        @if($event->subtitle)
                            <p class="mt-3 text-gray-600 dark:text-gray-300 max-w-2xl">{{ $event->subtitle }}</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-3 gap-4 w-full lg:w-auto">
                        <div class="p-4 rounded-2xl bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                            <p class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $speakerCount }}</p>
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Speakers</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                            <p class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $sessionCount }}</p>
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Sessions</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-center">
                            <p class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $dayCount }}</p>
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Days</p>
                        </div>
                    </div>
                </div>

                @if($topSpeakers->count())
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                        @foreach($topSpeakers as $sp)
                            @php $img = $sp->getFirstMediaUrl('headshot', 'avatar') ?: $sp->getFirstMediaUrl('headshot'); @endphp
                            <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-100 dark:bg-slate-900 border border-gray-200 dark:border-slate-800">
                                @if($img)
                                    <img src="{{ $img }}" alt="{{ $sp->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">{{ Str::of($sp->name)->substr(0,1) }}</div>
                                @endif
                                <div class="absolute inset-x-0 bottom-0 p-2 bg-gradient-to-t from-black/60 to-transparent">
                                    <p class="text-xs font-semibold text-white truncate">{{ $sp->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
                <h3 class="text-2xl md:text-3xl font-bold text-white">Be part of ALG {{ $event->year }} — reserve your seat today.</h3>
                <a href="{{ $ctaUrl }}" class="px-8 py-4 bg-white/95 text-teal-700 font-semibold rounded-full shadow-lg hover:bg-white transition">
                    {{ $ctaLabel }}
                </a>
            </div>
        </section>
    @endif

    <!-- Program Section -->
    <section class="py-24 bg-gray-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-semibold text-gray-900 dark:text-white tracking-tight mb-3">Program</h2>
                <div class="h-1 w-20 mx-auto rounded-full bg-teal-500"></div>
            </div>

            @if($event->days->count())
                <div class="space-y-16">
                    @foreach($event->days as $day)
                        <div>
                            <div class="flex items-baseline justify-between mb-8">
                                <h3 class="text-2xl md:text-3xl font-semibold text-gray-900 dark:text-white">
                                    {{ $day->title ?? ('Day ' . ($loop->index + 1)) }}
                                </h3>
                                @if($day->date_text || $day->date)
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-sm text-gray-700 dark:text-gray-300">
                                        <svg class="w-4 h-4 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $day->date_text ?? $day->date->format('M d, Y') }}
                                    </span>
                                @endif
                            </div>

                            <div class="relative">
                                <div class="absolute left-3 top-0 bottom-0 w-px bg-gray-200 dark:bg-slate-800"></div>
                                <div class="space-y-8">
                                    @forelse($day->sessions as $session)
                                        <div class="relative pl-10">
                                            <div class="absolute left-0 top-4 w-2.5 h-2.5 rounded-full bg-teal-500 shadow"></div>
                                            <div class="p-6 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg focus-within:ring-2 focus-within:ring-teal-500/40">
                                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                                    <div>
                                                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $session->title }}</h4>
                                                        @if($session->theme)
                                                            <p class="text-teal-700 dark:text-teal-300 font-medium">{{ $session->theme }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-sm text-gray-700 dark:text-gray-300">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                        {{ $session->start_time?->format('g:i A') }} - {{ $session->end_time?->format('g:i A') }}
                                                    </div>
                                                </div>

                                                @if($session->speakers && $session->speakers->count())
                                                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        @foreach($session->speakers as $sp)
                                                            <div class="flex items-start gap-3 rounded-xl bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-4 transition-all duration-300 hover:bg-white/90 dark:hover:bg-slate-900/70">
                                                                @php $avatar = $sp->getFirstMediaUrl('headshot'); @endphp
                                                                @if($avatar)
                                                                    <img src="{{ $avatar }}" alt="{{ $sp->name }}" class="w-10 h-10 rounded-full object-cover" />
                                                                @else
                                                                    <div class="w-10 h-10 rounded-full bg-teal-500"></div>
                                                                @endif
                                                                <div class="flex-1">
                                                                    @if($sp->pivot?->role)
                                                                        <p class="text-xs font-semibold text-teal-700 dark:text-teal-300 mb-0.5">{{ $sp->pivot->role }}</p>
                                                                    @endif
                                                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $sp->name }}</p>
                                                                    @if($sp->title || $sp->company)
                                                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $sp->title }}@if($sp->title && $sp->company) - @endif{{ $sp->company }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if($session->items->count())
                                                    <div class="mt-5 divide-y divide-gray-100 dark:divide-slate-800">
                                                        @foreach($session->items as $item)
                                                            <div class="py-4 flex flex-col md:flex-row md:items-start md:justify-between gap-3">
                                                                <div>
                                                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $item->title }}</p>
                                                                    @if($item->subtitle)
                                                                        <p class="text-gray-600 dark:text-gray-400">{{ $item->subtitle }}</p>
                                                                    @endif
                                                                    @if($item->speakers->count())
                                                                        <div class="mt-2 flex flex-wrap gap-2">
                                                                            @foreach($item->speakers as $sp)
                                                                                <span class="px-3 py-1 text-xs rounded-full bg-teal-50 dark:bg-teal-900/30 text-teal-700 dark:text-teal-300 border border-teal-200 dark:border-teal-800">
                                                                                    {{ $sp->name }}@if($sp->pivot?->role) • {{ $sp->pivot->role }}@endif
                                                                                </span>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if($item->moderator)
                                                                    <div class="text-sm text-gray-600 dark:text-gray-400 md:text-right">
                                                                        <span class="font-semibold text-gray-900 dark:text-white">Moderator:</span>
                                                                        {{ $item->moderator->name }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-gray-600 dark:text-gray-400">No sessions added yet for this day.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="space-y-6">
                    @forelse($event->sessions as $session)
                        <div class="p-6 rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $session->title }}</h4>
                                    @if($session->theme)
                                        <p class="text-teal-700 dark:text-teal-300 font-medium">{{ $session->theme }}</p>
                                    @endif
                                </div>
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-sm text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $session->start_time?->format('g:i A') }} - {{ $session->end_time?->format('g:i A') }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400">Program details will be announced soon.</p>
                    @endforelse
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-slate-950 text-white relative overflow-hidden">
        <div class="pointer-events-none absolute -top-24 -right-16 w-[720px] h-[720px] opacity-[0.08]" style="background-image:url('{{ asset('assets/1x/hero-bg1.png') }}'); background-repeat:no-repeat; background-size:contain; background-position:center;"></div>
        <div class="pointer-events-none absolute -bottom-28 -left-20 w-[680px] h-[680px] opacity-[0.08]" style="background-image:url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-size:contain; background-position:center;"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="space-y-4">
                    <a href="https://leoafricainstitute.org/" target="_blank" rel="noopener" aria-label="LéO Africa Institute" class="inline-flex items-center p-2 rounded-lg bg-white shadow-sm">
                        <img src="/assets/logos/leo-africa-institute.png" alt="LéO Africa Institute" class="h-10 w-auto object-contain" loading="lazy">
                    </a>
                    <p class="text-gray-300 text-sm leading-relaxed">The Annual Leaders Gathering is LéO Africa Institute's flagship event.</p>
                </div>

                <!-- Newsletter -->
                <div x-data="{
                        email: '', submitted: false, error: null, loading: false,
                        async submit() {
                            this.loading = true; this.error = null;
                            try {
                                const res = await fetch('{{ route('newsletter.subscribe') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({ email: this.email })
                                });
                                if (!res.ok) {
                                    const data = await res.json();
                                    throw new Error((data.errors && (data.errors.email?.[0] || 'Invalid email')) || 'Subscription failed');
                                }
                                this.submitted = true; this.email = '';
                            } catch (e) {
                                this.error = e.message || 'Something went wrong';
                            } finally {
                                this.loading = false;
                            }
                        }
                    }" class="md:col-span-2">
                    <h4 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Newsletter</h4>
                    <p class="mt-3 text-gray-300 text-sm">Get ALG updates, highlights, and announcements.</p>
                    <form class="mt-5 max-w-2xl" @submit.prevent="submit">
                        <div class="flex items-center gap-3">
                            <label for="footer-email" class="sr-only">Email</label>
                            <input id="footer-email" x-model="email" type="email" required placeholder="you@example.com" class="w-full h-12 rounded-full bg-white text-gray-900 placeholder-gray-500 px-5 ring-1 ring-gray-300 focus:ring-2 focus:ring-teal-500 outline-none transition text-base" />
                            <button type="submit" :disabled="loading" class="shrink-0 inline-flex items-center justify-center h-12 px-7 rounded-full bg-teal-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 disabled:opacity-60 disabled:cursor-not-allowed">
                                <span x-show="!loading">Subscribe</span>
                                <span x-show="loading">Subscribing…</span>
                            </button>
                        </div>
                        <p x-show="submitted" x-transition.opacity.duration.300ms class="mt-3 text-sm text-teal-300">Thanks! You’re on the list.</p>
                        <p x-show="error" x-transition.opacity.duration.300ms class="mt-2 text-sm text-orange-300" x-text="error"></p>
                        <p class="mt-2 text-xs text-gray-400">We respect your privacy.</p>
                    </form>
                </div>

                <!-- Programs -->
                <div>
                    <h4 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Programs</h4>
                    <div class="mt-5 grid grid-cols-1 gap-4">
                        <a href="https://leoafricainstitute.org/huduma/" target="_blank" rel="noopener" class="group flex items-center justify-between gap-4 p-3 h-16 rounded-xl bg-white dark:bg-white border border-gray-200/50 shadow-sm hover:shadow-lg transition">
                            <span class="flex-1 flex items-center justify-center">
                                <img src="/assets/logos/huduma-fellowship.svg" alt="Huduma Fellowship" class="max-h-10 w-auto object-contain" loading="lazy">
                            </span>
                            <svg class="w-4 h-4 text-white/60 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="https://leoafricainstitute.org/yelp/" target="_blank" rel="noopener" class="group flex items-center justify-between gap-4 p-3 h-16 rounded-xl bg-white dark:bg-white border border-gray-200/50 shadow-sm hover:shadow-lg transition">
                            <span class="flex-1 flex items-center justify-center">
                                <img src="/assets/logos/yelp.svg" alt="Young & Emerging Leaders Project (YELP)" class="max-h-12 w-auto object-contain" loading="lazy">
                            </span>
                            <svg class="w-4 h-4 text-white/60 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="https://leoafricareview.com" target="_blank" rel="noopener" class="group flex items-center justify-between gap-4 p-3 h-16 rounded-xl bg-white dark:bg-white border border-gray-200/50 shadow-sm hover:shadow-lg transition">
                            <span class="flex-1 flex items-center justify-center">
                                <img src="/assets/logos/leo-africa-review.png" alt="LéO Africa Review" class="max-h-10 w-auto object-contain" loading="lazy">
                            </span>
                            <svg class="w-4 h-4 text-white/60 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Connect -->
                <div>
                    <h4 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Connect</h4>
                    <div class="mt-5 grid grid-cols-5 gap-3">
                        <a href="https://x.com/LeoAfricaInst" target="_blank" rel="noopener" aria-label="X (Twitter)" class="group inline-flex items-center justify-center h-10 rounded-lg border border-white/10 text-gray-300 hover:text-white hover:border-white/30 transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2H21l-6.53 7.46L22.5 22h-6.69l-5.24-6.74L4.5 22H2l7.1-8.1L1.5 2h6.86l4.73 6.2L18.244 2Zm-1.17 18h1.86L7.01 4H5.06l12.014 16Z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/LeOAfricaInstitute/" target="_blank" rel="noopener" aria-label="Facebook" class="group inline-flex items-center justify-center h-10 rounded-lg border border-white/10 text-gray-300 hover:text-white hover:border-white/30 transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7H7v-3h3.5V9.5A4.5 4.5 0 0 1 15 5h2.5v3H15a1 1 0 0 0-1 1V12h3.5l-.5 3H14v7A10 10 0 0 0 22 12Z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/leoafricainst/" target="_blank" rel="noopener" aria-label="Instagram" class="group inline-flex items-center justify-center h-10 rounded-lg border border-white/10 text-gray-300 hover:text-white hover:border-white/30 transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.2A2.8 2.8 0 1 0 12 17.8 2.8 2.8 0 0 0 12 9.2Zm5.5-.95a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/company/18203194/admin/page-posts/published/" target="_blank" rel="noopener" aria-label="LinkedIn" class="group inline-flex items-center justify-center h-10 rounded-lg border border-white/10 text-gray-300 hover:text-white hover:border-white/30 transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5ZM.5 8h4V24h-4V8ZM8.5 8h3.8v2.2h.05c.53-1 1.83-2.2 3.77-2.2 4.03 0 4.78 2.65 4.78 6.1V24h-4v-7.1c0-1.7-.03-3.9-2.4-3.9-2.4 0-2.77 1.86-2.77 3.8V24h-4V8Z"/></svg>
                        </a>
                        <a href="https://www.flickr.com/photos/africaforum/" target="_blank" rel="noopener" aria-label="Flickr" class="group inline-flex items-center justify-center h-10 rounded-lg border border-white/10 text-gray-300 hover:text-white hover:border-white/30 transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><circle cx="7.5" cy="12" r="3.5"/><circle cx="16.5" cy="12" r="3.5"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative z-10 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-gray-400">© 2025 All rights reserved.</p>
                <p class="text-gray-500 text-sm">Crafted with passion by <a href="https://www.index.ug" target="_blank" rel="noopener" class="text-teal-400 hover:text-teal-300 transition">Index Digital</a></p>
            </div>
        </div>
    </footer>

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
