@props(['slides' => null, 'event' => null, 'hero' => null, 'title' => null, 'description' => null, 'exclude' => null])

@php
    /** @var \App\Models\Domain\Event|null $event */
    // 1) If slides are explicitly passed in, use them
    $resolvedSlides = is_array($slides) && !empty($slides) ? $slides : [];

    // 2) Else try media library on event/hero
    if (empty($resolvedSlides)) {
        try {
            $media = $event?->getMedia('hero') ?? collect();
            if ($media->isNotEmpty()) {
                $resolvedSlides = $media->map(fn($m) => [
                    'src' => $m->getUrl(),
                    'alt' => $m->name ?: (($event->title ?? 'ALG') . ' hero'),
                ])->values()->toArray();
            }
        } catch (\Throwable $e) {
            // ignore
        }
    }

    // 3) Else auto-discover public assets: assets/hero/hero01..05.(avif|webp|jpg|jpeg)
    if (empty($resolvedSlides)) {
        $found = [];
        foreach (range(1, 5) as $n) {
            $basename = sprintf('hero%02d', $n);
            foreach (['avif','webp','jpg','jpeg'] as $ext) {
                $publicPath = public_path("assets/hero/{$basename}.{$ext}");
                if (file_exists($publicPath)) {
                    $found[] = [
                        'src' => asset("assets/hero/{$basename}.{$ext}"),
                        'alt' => ($event->title ?? 'ALG') . " hero {$n}",
                    ];
                    break; // stop at first existing extension
                }
            }
        }
        if (!empty($found)) {
            $resolvedSlides = $found;
        }
    }

    // 4) Fallback to single image (from hero or event or default artwork)
    if (empty($resolvedSlides)) {
        $fallback = $hero?->getFirstMediaUrl('hero') ?: ($event?->getFirstMediaUrl('hero') ?: asset('assets/hero-bg1.png'));
        $resolvedSlides = [[ 'src' => $fallback, 'alt' => ($event->title ?? 'ALG') . ' hero' ]];
    }

    // 5) Optionally exclude slides by 1-based indices (e.g., [2] removes second slide)
    if (is_array($exclude) && !empty($exclude)) {
        $resolvedSlides = array_values(array_filter($resolvedSlides, function($s, $i) use ($exclude) {
            return !in_array($i + 1, $exclude);
        }, ARRAY_FILTER_USE_BOTH));
    }
@endphp

<section class="relative overflow-hidden bg-black text-white">
    <!-- Subtle noise overlay for luxurious texture -->
    <div class="pointer-events-none absolute inset-0 opacity-[0.08] mix-blend-overlay" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 100 100\"><filter id=\"n\"><feTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"2\" stitchTiles=\"stitch\"/></filter><rect width=\"100%\" height=\"100%\" filter=\"url(%23n)\" opacity=\"0.35\"/></svg>');"></div>

    <div class="relative w-full h-[80vh] sm:h-[75vh] lg:h-[78vh]" x-data="{
        i: 0,
        size: {{ count($resolvedSlides) }},
        auto: true,
        intervalMs: 6500,
        timer: null,
        reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
        start(){ this.stop(); if(this.size > 1 && this.auto && !this.reduced){ this.timer = setInterval(()=> this.next(), this.intervalMs); } },
        stop(){ if(this.timer){ clearInterval(this.timer); this.timer = null; } },
        next(){ this.i = (this.i + 1) % this.size },
        prev(){ this.i = (this.i - 1 + this.size) % this.size },
        // touch swipe support
        _sx: 0,
        _dx: 0,
        ts(e){ this._sx = e.touches[0].clientX },
        tm(e){ this._dx = e.touches[0].clientX - this._sx },
        te(){ if(Math.abs(this._dx) > 40){ this._dx < 0 ? this.next() : this.prev() } this._sx = 0; this._dx = 0; }
    }" x-init="start()" @mouseenter="stop()" @mouseleave="start()" @touchstart.passive="ts($event)" @touchmove.passive="tm($event)" @touchend.passive="te()">
        <!-- Slides -->
        <div class="absolute inset-0">
            @foreach($resolvedSlides as $idx => $s)
                <div x-show="i === {{ $idx }}" x-transition.opacity.duration.800ms class="absolute inset-0">
                    <div class="absolute inset-0">
                        <img src="{{ $s['src'] }}" alt="{{ $s['alt'] }}" class="w-full h-full object-cover" @if($idx===0) fetchpriority="high" @endif loading="lazy" decoding="async" :class="reduced ? '' : 'will-change-transform'" :style="(reduced || window.innerWidth < 640) ? '' : 'animation: kenburns 12s ease-in-out both'">
                    </div>
                    <!-- Dark gradient for legibility (stronger on mobile) -->
                    <div class="absolute inset-0">
                        <div class="block sm:hidden absolute inset-0 bg-gradient-to-t from-black/70 via-black/35 to-black/10"></div>
                        <div class="hidden sm:block absolute inset-0 bg-gradient-to-t from-black/60 via-black/25 to-black/5"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Decorative artwork at bottom-right -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-15 md:opacity-25"
             style="background-image:url('{{ asset('assets/1x/artwork.png') }}');
                    background-repeat:no-repeat;
                    background-position:right -40px bottom -20px;
                    background-size:clamp(260px,40%,520px) auto;"></div>

        <!-- Content -->
        <div class="relative z-10 h-full">
            <div class="h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 items-end pb-8 sm:pb-12 relative">
                <div class="lg:col-span-9 relative">
                    <!-- Local text scrim for legibility (focused under text only) -->
                    <div aria-hidden="true" class="absolute -inset-x-4 -top-5 bottom-[-12px] sm:inset-x-auto sm:-left-6 sm:top-[-16px] sm:bottom-[-16px] sm:max-w-3xl rounded-[28px] pointer-events-none"
                         style="background: linear-gradient(90deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.42) 45%, rgba(0,0,0,0.25) 70%, rgba(0,0,0,0) 100%); filter: saturate(105%); backdrop-filter: blur(2px);"></div>
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur border border-white/20">
                        <span class="w-2 h-2 rounded-full bg-teal-400"></span>
                        <span class="text-xs font-semibold tracking-wider text-white/90">{{ $event->subtitle ?: 'ALG ' . ($event->year ?? '2025') }}</span>
                    </div>
                    @php
                        $displayTitle = $title ?: ($event->title ?? 'Annual Leaders Gathering');
                        $desc = $description ?: ($hero?->description ?: ($event->hero_description ?: $event->description));
                    @endphp
                    <h1 class="mt-4 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-normal leading-[1.08] sm:leading-[1.05] tracking-tight text-white">
                        {{ $displayTitle }}
                    </h1>
                    @if($desc)
                        <p class="mt-3 sm:mt-4 max-w-3xl text-[15px] sm:text-lg md:text-xl text-white/85">
                            {{ $desc }}
                        </p>
                    @endif

                    @php
                        $dt = $event?->start_at ? \Illuminate\Support\Carbon::parse($event->start_at) : \Illuminate\Support\Carbon::create(2025,12,13,9,0);
                        $when = $dt->format('F j, Y • g:i A');
                        $where = $event->location ?: 'Kampala, Uganda';
                    @endphp
                    <div class="mt-5 flex flex-col sm:flex-row gap-2 sm:gap-3 text-white">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-black/40 border border-white/35 backdrop-blur-sm shadow-md shadow-black/10">
                            <svg class="w-4 h-4 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-[12.5px] sm:text-[13.5px] font-medium tracking-normal leading-none">{{ $when }}</span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-black/40 border border-white/35 backdrop-blur-sm shadow-md shadow-black/10">
                            <svg class="w-4 h-4 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 00-7 7c0 5.25 7 11 7 11s7-5.75 7-11a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
                            <span class="text-[12.5px] sm:text-[13.5px] font-medium tracking-normal leading-none">{{ $where }}</span>
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row w-full sm:w-auto gap-3">
                        @php
                            $primaryCtaLabel = $event->primary_cta_label ?: 'Reserve your seat';
                            $primaryCtaUrl = $event->primary_cta_url ?: route('seat-reservations.create');
                            $secondaryCtaLabel = $event->secondary_cta_label ?: 'Learn more';
                            $secondaryCtaUrl = $event->secondary_cta_url ?: url('/about');
                        @endphp
                        <a href="{{ $primaryCtaUrl }}" class="h-12 sm:h-11 px-6 inline-flex items-center justify-center bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-semibold rounded-full transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 text-center gap-2 w-full sm:w-auto">
                            <span>{{ $primaryCtaLabel }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ $secondaryCtaUrl }}" class="h-12 sm:h-11 px-6 inline-flex items-center justify-center bg-white/10 text-white hover:bg-white/15 font-semibold rounded-full border border-white/30 transition-all duration-300 hover:-translate-y-0.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 text-center w-full sm:w-auto">
                            {{ $secondaryCtaLabel }}
                        </a>
                    </div>
                </div>

                <!-- Controls / Indicators -->
                <div class="lg:col-span-3 flex lg:justify-end items-end mt-6 lg:mt-0 absolute bottom-4 right-4 sm:bottom-5 sm:right-5 z-20 lg:static">
                    <div class="flex items-center gap-3 bg-white/10 border border-white/15 rounded-full px-2 py-1 backdrop-blur shadow-md shadow-black/20">
                        <button type="button" @click="prev()" class="h-9 w-9 inline-flex items-center justify-center rounded-full text-white hover:bg-white/10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="flex items-center gap-1.5">
                            @foreach($resolvedSlides as $idx => $_)
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
