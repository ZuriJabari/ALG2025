@php
    /** @var \App\Models\Domain\Event $event */
    $media = collect();
    try {
        $media = $event?->getMedia('hero') ?? collect();
    } catch (\Throwable $e) {
        $media = collect();
    }

    $fallback = $hero?->getFirstMediaUrl('hero') ?: ($event?->getFirstMediaUrl('hero') ?: '/assets/hero-bg1.png');
    $slides = $media->isNotEmpty() ? $media->map(fn($m) => [
        'src' => $m->getUrl(),
        'alt' => $m->name ?: ($event->title . ' hero'),
    ])->values()->toArray() : [
        ['src' => $fallback, 'alt' => $event->title . ' hero'],
    ];
@endphp

<section class="relative overflow-hidden bg-black text-white">
    <!-- Subtle noise overlay for luxurious texture -->
    <div class="pointer-events-none absolute inset-0 opacity-[0.08] mix-blend-overlay" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 100 100\"><filter id=\"n\"><feTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"2\" stitchTiles=\"stitch\"/></filter><rect width=\"100%\" height=\"100%\" filter=\"url(%23n)\" opacity=\"0.35\"/></svg>');"></div>

    <div class="relative w-full h-[68vh] sm:h-[72vh] lg:h-[78vh]" x-data="{
        i: 0,
        size: {{ count($slides) }},
        auto: true,
        intervalMs: 6500,
        timer: null,
        reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
        start(){ this.stop(); if(this.size > 1 && this.auto && !this.reduced){ this.timer = setInterval(()=> this.next(), this.intervalMs); } },
        stop(){ if(this.timer){ clearInterval(this.timer); this.timer = null; } },
        next(){ this.i = (this.i + 1) % this.size },
        prev(){ this.i = (this.i - 1 + this.size) % this.size }
    }" x-init="start()" @mouseenter="stop()" @mouseleave="start()">
        <!-- Slides -->
        <div class="absolute inset-0">
            @foreach($slides as $idx => $s)
                <div x-show="i === {{ $idx }}" x-transition.opacity.duration.800ms class="absolute inset-0">
                    <div class="absolute inset-0">
                        <img src="{{ $s['src'] }}" alt="{{ $s['alt'] }}" class="w-full h-full object-cover" :class="reduced ? '' : 'will-change-transform'" :style="reduced ? '' : 'animation: kenburns 12s ease-in-out both'">
                    </div>
                    <!-- Dark gradient for legibility -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                </div>
            @endforeach
        </div>

        <!-- Content -->
        <div class="relative z-10 h-full">
            <div class="h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 items-end pb-10 sm:pb-14">
                <div class="lg:col-span-9">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur border border-white/20">
                        <span class="w-2 h-2 rounded-full bg-teal-400"></span>
                        <span class="text-xs font-semibold tracking-wider text-white/90">{{ $event->subtitle ?: 'ALG ' . ($event->year ?? '2025') }}</span>
                    </div>
                    <h1 class="mt-4 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-normal leading-[1.05] tracking-tight text-white">
                        {{ $event->title }}
                    </h1>
                    @php $desc = $hero?->description ?: ($event->hero_description ?: $event->description); @endphp
                    @if($desc)
                        <p class="mt-4 max-w-3xl text-base sm:text-lg md:text-xl text-white/80">
                            {{ $desc }}
                        </p>
                    @endif
                    <div class="mt-8 flex flex-wrap gap-3">
                        @php
                            $primaryCtaLabel = $event->primary_cta_label ?: 'Reserve your seat';
                            $primaryCtaUrl = $event->primary_cta_url ?: route('seat-reservations.create');
                            $secondaryCtaLabel = $event->secondary_cta_label ?: 'Learn more';
                            $secondaryCtaUrl = $event->secondary_cta_url ?: url('/about');
                        @endphp
                        <a href="{{ $primaryCtaUrl }}" class="h-11 px-6 inline-flex items-center justify-center bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-semibold rounded-full transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 text-center gap-2">
                            <span>{{ $primaryCtaLabel }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ $secondaryCtaUrl }}" class="h-11 px-6 inline-flex items-center justify-center bg-white/10 text-white hover:bg-white/15 font-semibold rounded-full border border-white/30 transition-all duration-300 hover:-translate-y-0.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 text-center">
                            {{ $secondaryCtaLabel }}
                        </a>
                    </div>
                </div>

                <!-- Controls / Indicators -->
                <div class="lg:col-span-3 flex lg:justify-end items-end mt-6 lg:mt-0">
                    <div class="flex items-center gap-3 bg-white/10 border border-white/15 rounded-full px-2 py-1 backdrop-blur">
                        <button type="button" @click="prev()" class="h-9 w-9 inline-flex items-center justify-center rounded-full text-white hover:bg-white/10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="flex items-center gap-1.5">
                            @foreach($slides as $idx => $_)
                                <button type="button" @click="i={{ $idx }}" class="h-2.5 w-2.5 rounded-full" :class="i==={{ $idx }} ? 'bg-white' : 'bg-white/40'" aria-label="Go to slide {{ $idx+1 }}"></button>
                            @endforeach
                        </div>
                        <button type="button" @click="next()" class="h-9 w-9 inline-flex items-center justify-center rounded-full text-white hover:bg-white/10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (prefers-reduced-motion: no-preference) {
            @keyframes kenburns {
                0% { transform: scale(1.02) translateZ(0); }
                55% { transform: scale(1.07) translateZ(0); }
                100% { transform: scale(1.02) translateZ(0); }
            }
        }
    </style>
</section>
