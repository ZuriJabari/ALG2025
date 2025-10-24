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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-700 shadow-sm">
                        <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">ALG 2025</span>
                    </div>
                    <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">Speakers</h1>
                    <p class="mt-3 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">To be announced. We’re curating a world‑class lineup for a luxurious, unforgettable experience.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/events/2024" class="inline-flex items-center gap-2 h-11 px-5 rounded-full border border-gray-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/70 backdrop-blur hover:bg-white dark:hover:bg-slate-900 text-gray-800 dark:text-gray-200 transition-all">View ALG 2024</a>
                    <a href="#" class="inline-flex items-center gap-2 h-11 px-5 rounded-full brand-gradient text-white font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">Get updates</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-10 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($speakers->isEmpty())
                <div class="relative rounded-3xl border border-gray-100 dark:border-slate-800 bg-white dark:bg-slate-900 p-8 sm:p-12 shadow-sm overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-56 h-56 bg-teal-500/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-56 h-56 bg-orange-500/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Coming Soon</h2>
                        <p class="mt-3 text-gray-600 dark:text-gray-300 max-w-2xl">We’re curating an exceptional roster of speakers for ALG 2025. Check back shortly, or revisit the highlights from ALG 2024.</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="/events/2024" class="inline-flex items-center justify-center h-11 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">Explore ALG 2024</a>
                            <a href="#" class="inline-flex items-center justify-center h-11 px-6 rounded-full border-2 border-teal-600 dark:border-teal-400 text-teal-600 dark:text-teal-400 hover:bg-teal-50/50 dark:hover:bg-slate-800 transition-all">Get updates</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($speakers as $speaker)
                        @php
                            $avatar = $speaker->getFirstMediaUrl('headshot', 'avatar') ?: $speaker->getFirstMediaUrl('headshot');
                        @endphp
                        <article class="group bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="aspect-square overflow-hidden bg-gray-50 dark:bg-slate-800">
                                @if($avatar)
                                    <img src="{{ $avatar }}" alt="{{ $speaker->name }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">No image</div>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $speaker->name }}</h3>
                                @if($speaker->title || $speaker->company)
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $speaker->title }}@if($speaker->title && $speaker->company), @endif{{ $speaker->company }}</p>
                                @endif
                                @if($speaker->short_bio)
                                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">{{ $speaker->short_bio }}</p>
                                @endif
                                <div class="mt-4 flex gap-3 text-sm">
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
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Footer minimal -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <p class="text-gray-400">© {{ date('Y') }} Africa Leadership Group</p>
            <a href="/events/{{ now()->year }}" class="text-white/80 hover:text-white transition">Current event</a>
        </div>
    </footer>
</body>
</html>
