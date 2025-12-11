<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers – ALG</title>
    @include('partials.analytics')
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('assets/app-production.css') }}?v={{ @file_exists(public_path('assets/app-production.css')) ? @filemtime(public_path('assets/app-production.css')) : time() }}">
        <script type="module" src="{{ asset('assets/app-production.js') }}?v={{ @file_exists(public_path('assets/app-production.js')) ? @filemtime(public_path('assets/app-production.js')) : time() }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="antialiased bg-white dark:bg-slate-950">
    <x-header />

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-white via-white to-gray-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-position:right -120px top -40px; background-size:820px auto"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800">
                    <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-wider">ALG 2025</span>
                </div>
                <h1 class="mt-5 text-4xl sm:text-5xl md:text-6xl font-normal tracking-tight text-gray-900 dark:text-white">Speakers</h1>
                <p class="mt-6 text-lg sm:text-xl leading-relaxed text-gray-700 dark:text-gray-300">Meet the distinguished leaders, innovators, and changemakers who will share their insights and expertise at the Annual Leaders Gathering 2025.</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-14 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $keynoteSpeakers = $speakers->filter(fn($s) => strtolower($s->category ?? '') === 'keynote');
                $panelSpeakers = $speakers->filter(fn($s) => in_array(strtolower($s->category ?? ''), ['panel', 'panelist', 'speaker', '']));
                $moderators = $speakers->filter(fn($s) => strtolower($s->category ?? '') === 'moderator');
                $hosts = $speakers->filter(fn($s) => in_array(strtolower($s->category ?? ''), ['host', 'co-host']));
            @endphp

            @if($speakers->isEmpty())
                <div class="relative rounded-3xl border border-gray-100 dark:border-slate-800 bg-white dark:bg-slate-900 p-8 sm:p-12 shadow-sm overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-56 h-56 bg-teal-500/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-56 h-56 bg-orange-500/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Coming Soon</h2>
                        <p class="mt-3 text-gray-600 dark:text-gray-300 max-w-2xl">We're curating an exceptional roster of speakers for ALG 2025. Check back shortly, or revisit the highlights from ALG 2024.</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="/events/2024" class="shrink-0 whitespace-nowrap inline-flex items-center justify-center h-11 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold transition-all hover:-translate-y-0.5">Explore ALG 2024</a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Keynote Speakers -->
                @if($keynoteSpeakers->isNotEmpty())
                    <div class="mb-20">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-10">Keynote Speakers</h2>
                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach($keynoteSpeakers as $speaker)
                                @php
                                    $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                                    $initials = collect(explode(' ', $speaker->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                                @endphp
                                <article class="group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-amber-200 dark:border-amber-900">
                                    <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/30 dark:to-amber-800/30 flex items-center justify-center">
                                        @if($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-32 h-32 rounded-full bg-amber-300 dark:bg-amber-700 flex items-center justify-center">
                                                <span class="text-4xl font-bold text-amber-800 dark:text-amber-200">{{ $initials }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <div class="inline-block px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-xs font-bold mb-3">
                                            KEYNOTE SPEAKER
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $speaker->name }}</h3>
                                        @if($speaker->title || $speaker->company)
                                            <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 mb-3">{{ $speaker->title }}@if($speaker->title && $speaker->company), @endif{{ $speaker->company }}</p>
                                        @endif
                                        @if($speaker->short_bio)
                                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">{{ $speaker->short_bio }}</p>
                                        @endif
                                        @if($speaker->twitter || $speaker->linkedin || $speaker->website)
                                            <div class="mt-4 flex gap-3 text-sm">
                                                @if($speaker->twitter)
                                                    <a href="{{ $speaker->twitter }}" target="_blank" class="text-amber-600 dark:text-amber-400 hover:underline">Twitter</a>
                                                @endif
                                                @if($speaker->linkedin)
                                                    <a href="{{ $speaker->linkedin }}" target="_blank" class="text-amber-600 dark:text-amber-400 hover:underline">LinkedIn</a>
                                                @endif
                                                @if($speaker->website)
                                                    <a href="{{ $speaker->website }}" target="_blank" class="text-amber-600 dark:text-amber-400 hover:underline">Website</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Panel Speakers -->
                @if($panelSpeakers->isNotEmpty())
                    <div class="mb-20">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-10">Panel Speakers</h2>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($panelSpeakers as $speaker)
                                @php
                                    $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                                    $initials = collect(explode(' ', $speaker->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                                @endphp
                                <article class="group bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                                    <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                                        @if($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                                                <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">{{ $initials }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $speaker->name }}</h3>
                                        @if($speaker->title || $speaker->company)
                                            <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">{{ $speaker->title }}@if($speaker->title && $speaker->company), @endif{{ $speaker->company }}</p>
                                        @endif
                                        @if($speaker->short_bio)
                                            <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">{{ $speaker->short_bio }}</p>
                                        @endif
                                        @if($speaker->twitter || $speaker->linkedin || $speaker->website)
                                            <div class="mt-3 flex gap-3 text-xs">
                                                @if($speaker->twitter)
                                                    <a href="{{ $speaker->twitter }}" target="_blank" class="text-teal-600 dark:text-teal-400 hover:underline">Twitter</a>
                                                @endif
                                                @if($speaker->linkedin)
                                                    <a href="{{ $speaker->linkedin }}" target="_blank" class="text-teal-600 dark:text-teal-400 hover:underline">LinkedIn</a>
                                                @endif
                                                @if($speaker->website)
                                                    <a href="{{ $speaker->website }}" target="_blank" class="text-teal-600 dark:text-teal-400 hover:underline">Website</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Moderators -->
                @if($moderators->isNotEmpty())
                    <div class="mb-20">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-10">Moderators</h2>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($moderators as $speaker)
                                @php
                                    $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                                    $initials = collect(explode(' ', $speaker->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                                @endphp
                                <article class="group bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-gray-200 dark:border-slate-600">
                                    <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800/30 dark:to-gray-700/30 flex items-center justify-center">
                                        @if($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-24 h-24 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $initials }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded text-xs font-bold mb-2">
                                            MODERATOR
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $speaker->name }}</h3>
                                        @if($speaker->title || $speaker->company)
                                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">{{ $speaker->title }}@if($speaker->title && $speaker->company), @endif{{ $speaker->company }}</p>
                                        @endif
                                        @if($speaker->short_bio)
                                            <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">{{ $speaker->short_bio }}</p>
                                        @endif
                                        @if($speaker->twitter || $speaker->linkedin || $speaker->website)
                                            <div class="mt-3 flex gap-3 text-xs">
                                                @if($speaker->twitter)
                                                    <a href="{{ $speaker->twitter }}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:underline">Twitter</a>
                                                @endif
                                                @if($speaker->linkedin)
                                                    <a href="{{ $speaker->linkedin }}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:underline">LinkedIn</a>
                                                @endif
                                                @if($speaker->website)
                                                    <a href="{{ $speaker->website }}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:underline">Website</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Event Hosts -->
                @if($hosts->isNotEmpty())
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-10">Event Hosts</h2>
                        <div class="grid sm:grid-cols-2 gap-6">
                            @foreach($hosts as $speaker)
                                @php
                                    $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                                    $initials = collect(explode(' ', $speaker->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                                @endphp
                                <article class="group bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-purple-200 dark:border-purple-800">
                                    <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 flex items-center justify-center">
                                        @if($avatar)
                                            <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-24 h-24 rounded-full bg-purple-300 dark:bg-purple-700 flex items-center justify-center">
                                                <span class="text-3xl font-bold text-purple-800 dark:text-purple-200">{{ $initials }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block px-2 py-0.5 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded text-xs font-bold mb-2">
                                            HOST
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $speaker->name }}</h3>
                                        @if($speaker->title || $speaker->company)
                                            <p class="text-xs font-semibold text-purple-600 dark:text-purple-400 mb-2">{{ $speaker->title }}@if($speaker->title && $speaker->company), @endif{{ $speaker->company }}</p>
                                        @endif
                                        @if($speaker->short_bio)
                                            <p class="text-xs text-gray-600 dark:text-gray-300">{{ $speaker->short_bio }}</p>
                                        @endif
                                        @if($speaker->twitter || $speaker->linkedin || $speaker->website)
                                            <div class="mt-3 flex gap-3 text-xs">
                                                @if($speaker->twitter)
                                                    <a href="{{ $speaker->twitter }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:underline">Twitter</a>
                                                @endif
                                                @if($speaker->linkedin)
                                                    <a href="{{ $speaker->linkedin }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:underline">LinkedIn</a>
                                                @endif
                                                @if($speaker->website)
                                                    <a href="{{ $speaker->website }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:underline">Website</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

    <x-footer />
</body>
</html>
