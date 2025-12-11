<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers – ALG</title>
    @include('partials.analytics')
    <script>
        (function(){
            try {
                var persisted = localStorage.getItem('darkMode');
                var isDark = persisted === 'true';
                document.documentElement.classList.toggle('dark', !!isDark);
            } catch (e) {}
        })();
    </script>
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('assets/app-production.css') }}?v={{ @file_exists(public_path('assets/app-production.css')) ? @filemtime(public_path('assets/app-production.css')) : time() }}">
        <script type="module" src="{{ asset('assets/app-production.js') }}?v={{ @file_exists(public_path('assets/app-production.js')) ? @filemtime(public_path('assets/app-production.js')) : time() }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .brand-gradient { background-image: linear-gradient(120deg, #00C2B3 0%, #FF8C00 100%); }
    </style>
    </head>
<body class="antialiased bg-white dark:bg-slate-950" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="document.documentElement.classList.toggle('dark', darkMode); $watch('darkMode', v => { document.documentElement.classList.toggle('dark', v); try{ localStorage.setItem('darkMode', v ? 'true':'false') }catch(e){} })">
    <x-header />

    <!-- Hero band -->
    <section class="relative overflow-hidden -mb-6">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('/assets/artwork.png'); background-repeat:no-repeat; background-position:right center; background-size:contain"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="flex flex-col md:flex-row items-end justify-between gap-6">
                <div class="flex-1">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-700 shadow-sm">
                        <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">ALG 2025</span>
                    </div>
                    <h1 class="mt-4 text-4xl sm:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">Speakers</h1>
                    <p class="mt-3 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">Meet the distinguished leaders, innovators, and changemakers who will share their insights at #ALG2025</p>
                    
                    <!-- Countdown Clock -->
                    <div class="mt-8 flex gap-2 sm:gap-3 max-w-full overflow-x-auto pb-2" x-data="{
                        days: 0, hours: 0, minutes: 0, seconds: 0,
                        updateCountdown() {
                            const target = new Date('2025-12-13T09:00:00').getTime();
                            const now = new Date().getTime();
                            const diff = target - now;
                            if (diff > 0) {
                                this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                this.hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                this.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                this.seconds = Math.floor((diff % (1000 * 60)) / 1000);
                            }
                        }
                    }" x-init="updateCountdown(); setInterval(() => updateCountdown(), 1000)">
                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/30 to-orange-500/30 rounded-xl sm:rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative px-3 sm:px-5 py-2 sm:py-3 rounded-xl sm:rounded-2xl bg-gradient-to-br from-white/80 to-white/60 dark:from-slate-900/80 dark:to-slate-900/60 backdrop-blur-lg">
                                <p class="text-xl sm:text-2xl md:text-3xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent" x-text="String(days).padStart(2, '0')"></p>
                                <p class="mt-0.5 sm:mt-1 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Days</p>
                            </div>
                        </div>
                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/30 to-orange-500/30 rounded-xl sm:rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative px-3 sm:px-5 py-2 sm:py-3 rounded-xl sm:rounded-2xl bg-gradient-to-br from-white/80 to-white/60 dark:from-slate-900/80 dark:to-slate-900/60 backdrop-blur-lg">
                                <p class="text-xl sm:text-2xl md:text-3xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent" x-text="String(hours).padStart(2, '0')"></p>
                                <p class="mt-0.5 sm:mt-1 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Hours</p>
                            </div>
                        </div>
                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/30 to-orange-500/30 rounded-xl sm:rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative px-3 sm:px-5 py-2 sm:py-3 rounded-xl sm:rounded-2xl bg-gradient-to-br from-white/80 to-white/60 dark:from-slate-900/80 dark:to-slate-900/60 backdrop-blur-lg">
                                <p class="text-xl sm:text-2xl md:text-3xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent" x-text="String(minutes).padStart(2, '0')"></p>
                                <p class="mt-0.5 sm:mt-1 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Minutes</p>
                            </div>
                        </div>
                        <div class="group relative flex-shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/30 to-orange-500/30 rounded-xl sm:rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="relative px-3 sm:px-5 py-2 sm:py-3 rounded-xl sm:rounded-2xl bg-gradient-to-br from-white/80 to-white/60 dark:from-slate-900/80 dark:to-slate-900/60 backdrop-blur-lg">
                                <p class="text-xl sm:text-2xl md:text-3xl font-bold bg-gradient-to-r from-teal-600 to-teal-500 bg-clip-text text-transparent" x-text="String(seconds).padStart(2, '0')"></p>
                                <p class="mt-0.5 sm:mt-1 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Seconds</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 text-xs text-gray-500 dark:text-gray-400 font-medium">Until ALG 2025 • December 13, 9:00 AM</p>
                </div>
                <div class="flex flex-wrap items-center gap-3" x-data="{ open:false, email:'', loading:false, submitted:false, error:null, openToggle(){ this.open=!this.open; if(this.open){ this.$nextTick(()=> this.$refs.heroEmail?.focus()); } }, async submit(){ if(!this.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)){ this.error='Please enter a valid email.'; return; } this.loading=true; this.error=null; try{ const res = await fetch('{{ route('newsletter.subscribe') }}', { method:'POST', headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' }, body: JSON.stringify({ email:this.email }) }); if(!res.ok){ const d = await res.json(); throw new Error((d.errors && (d.errors.email?.[0]||'Invalid email'))||'Subscription failed'); } this.submitted=true; this.email=''; setTimeout(()=>{ this.submitted=false; this.open=false; }, 2200); }catch(e){ this.error = e.message || 'Something went wrong'; } finally{ this.loading=false; } } }">
                    <a href="/events/2024" class="shrink-0 whitespace-nowrap inline-flex items-center gap-2 h-11 px-5 rounded-full border border-gray-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/70 backdrop-blur hover:bg-white dark:hover:bg-slate-900 text-gray-800 dark:text-gray-200 transition-all">View ALG 2024</a>
                    <button type="button" @click="openToggle()" class="shrink-0 whitespace-nowrap inline-flex items-center gap-2 h-11 px-5 rounded-full brand-gradient text-white font-semibold transition-all hover:-translate-y-0.5" :aria-expanded="open.toString()">Get updates</button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                         class="basis-full w-full">
                        <div class="mt-3 sm:mt-0 rounded-2xl bg-white/80 backdrop-blur px-3 py-2">
                        <form @submit.prevent="submit" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2" @keydown.enter.prevent="submit">
                            <label for="spk-hero-email" class="sr-only">Email</label>
                            <input id="spk-hero-email" x-ref="heroEmail" x-model="email" type="email" required placeholder="you@example.com" class="flex-1 h-11 rounded-full bg-white text-gray-900 placeholder-gray-500 px-4 outline-none text-sm sm:text-base" />
                            <button type="submit" :disabled="loading" class="inline-flex items-center justify-center h-11 px-5 rounded-full bg-teal-600 text-white font-semibold transition disabled:opacity-60 whitespace-nowrap">
                                <span x-show="!loading">Subscribe</span>
                                <span x-show="loading">Subscribing…</span>
                            </button>
                        </form>
                        </div>
                        <p x-show="submitted" x-transition.opacity.duration.200ms class="mt-2 text-xs sm:text-sm text-teal-600 dark:text-teal-300" aria-live="polite">Thanks! You're on the list.</p>
                        <p x-show="error" x-transition.opacity.duration.200ms x-text="error" class="mt-1 text-xs sm:text-sm text-orange-500" aria-live="assertive"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-10 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Keynote Speakers -->
            <div class="mb-16">
                <div class="flex items-center justify-center gap-3 mb-8">
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                    <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Keynote Speakers</h2>
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- Dr. Korir Sing'oei -->
                    <div class="group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-amber-200 dark:border-amber-900">
                        <div class="aspect-[4/3] bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/30 dark:to-amber-800/30 flex items-center justify-center">
                            <div class="w-32 h-32 rounded-full bg-amber-300 dark:bg-amber-700 flex items-center justify-center">
                                <span class="text-4xl font-bold text-amber-800 dark:text-amber-200">KS</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="inline-block px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-xs font-bold mb-3">
                                KEYNOTE SPEAKER
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Dr. Korir Sing'oei</h3>
                            <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 mb-3">Principal Secretary, Ministry of Foreign Affairs, Kenya</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">
                                Legal and policy expert with a focus on human rights law, minority and indigenous rights, decentralization, land and resource governance. PhD in Energy, Environment and Resources Law from the University of Cape Town.
                            </p>
                        </div>
                    </div>

                    <!-- Charles Mudiwa -->
                    <div class="group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-amber-200 dark:border-amber-900">
                        <div class="aspect-[4/3] bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/30 dark:to-amber-800/30 flex items-center justify-center">
                            <div class="w-32 h-32 rounded-full bg-amber-300 dark:bg-amber-700 flex items-center justify-center">
                                <span class="text-4xl font-bold text-amber-800 dark:text-amber-200">CM</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="inline-block px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-xs font-bold mb-3">
                                KEYNOTE SPEAKER
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Charles Mudiwa</h3>
                            <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 mb-3">CEO & MD, DFCU Bank, Uganda</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">
                                Experienced banker with a career spanning over three decades across Eastern and Southern Africa. Credited as a transformational leader and turn-around expert. Top Executive Coach working with professionals to enhance their Executive presence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Speakers & Moderators -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-teal-600 dark:text-teal-400 text-center mb-8 uppercase tracking-wider">Panel Speakers & Moderators</h2>
                
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Magnus Mchunguzi -->
                <!-- Keynote Speakers -->
                @if($keynoteSpeakers->isNotEmpty())
                    <div class="mb-16">
                        <div class="flex items-center justify-center gap-3 mb-8">
                            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                            <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Keynote Speakers</h2>
                            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
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
                    <div class="mb-16">
                        <h2 class="text-2xl font-bold text-teal-600 dark:text-teal-400 text-center mb-8 uppercase tracking-wider">Panel Speakers</h2>
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
                    <div class="mb-16">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-8 uppercase tracking-wider">Moderators</h2>
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
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-8 uppercase tracking-wider">Event Hosts</h2>
                        <div class="grid sm:grid-cols-2 gap-6 max-w-3xl mx-auto">
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
