@props([
    'slides' => null,
    'event' => null,
    'hero' => null,
    'title' => null,
    'description' => null,
    'exclude' => null,
    // new optional customizations
    'primaryCtaUrl' => null,
    'primaryCtaLabel' => null,
    'showPartners' => false,
    'full' => false,
    'fullOffset' => null,
])

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
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(60%_60%_at_80%_10%,rgba(20,184,166,0.18),transparent_60%)]"></div>

    <div class="relative w-full {{ $full ? ($fullOffset ? 'h-auto' : 'h-screen') : 'h-[70vh] sm:h-[75vh] lg:h-[78vh]' }}" x-data="{
        i: 0,
        size: Math.min({{ count($resolvedSlides) }}, 2),
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
    }" x-init="start()" @mouseenter="stop()" @mouseleave="start()" @touchstart.passive="ts($event)" @touchmove.passive="tm($event)" @touchend.passive="te()" style="{{ $full && $fullOffset ? 'min-height: calc(100vh - ' . intval($fullOffset) . 'px)' : '' }}">
        <!-- Slides -->
        <div class="absolute inset-0">
            @foreach($resolvedSlides as $idx => $s)
                <div x-show="i === {{ $idx }}" x-transition.opacity.duration.800ms class="absolute inset-0">
                    <div class="absolute inset-0">
                        <img src="{{ $s['src'] }}" alt="{{ $s['alt'] }}" class="w-full h-full object-cover" @if($idx===0) fetchpriority="high" @endif loading="lazy" decoding="async" :class="reduced ? '' : 'will-change-transform'" :style="(reduced || window.innerWidth < 640) ? '' : 'animation: kenburns 12s ease-in-out both'">
                    </div>
                    <!-- Dark gradient for legibility (balanced on mobile) -->
                    <div class="absolute inset-0">
                        <div class="block sm:hidden absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-black/0"></div>
                        <div class="hidden sm:block absolute inset-0 bg-gradient-to-t from-black/70 via-black/35 to-black/10"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Decorative artwork at bottom-right (hide on mobile for clarity) -->
        <div aria-hidden="true" class="hidden sm:block pointer-events-none absolute inset-0 opacity-15 md:opacity-25"
             style="background-image:url('{{ asset('assets/1x/artwork.png') }}');
                    background-repeat:no-repeat;
                    background-position:right 0 bottom -20px;
                    background-size:clamp(390px,60%,780px) auto;"></div>

        <!-- Content -->
        <div class="relative z-10 h-full">
            <div class="h-full max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 items-center lg:items-end pt-16 sm:pt-20 pb-10 sm:pb-16 md:pb-20 relative">
                <div class="lg:col-span-9 relative">
                    <!-- Local text scrim for legibility (focused under text only) -->
                    <div aria-hidden="true" class="hidden sm:block absolute -inset-x-4 -top-6 bottom-[-16px] sm:inset-x-auto sm:-left-8 sm:top-[-20px] sm:bottom-[-20px] sm:max-w-3xl rounded-[32px] pointer-events-none"
                         style="background: linear-gradient(90deg, rgba(0,0,0,0.68) 0%, rgba(0,0,0,0.52) 40%, rgba(0,0,0,0.32) 65%, rgba(0,0,0,0) 100%); backdrop-filter: blur(3px);"></div>
                    <div class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 sm:px-3 md:px-4 py-1 sm:py-1.5 rounded-full bg-white/10 backdrop-blur border border-white/20 shadow-[0_0_0_1px_rgba(255,255,255,0.06)]">
                        <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-teal-400"></span>
                        <template x-if="i !== 1">
                            <span class="text-[10px] sm:text-xs font-semibold tracking-wider text-white/90">6th Annual Leaders Gathering 2025</span>
                        </template>
                        <template x-if="i === 1">
                            <span class="text-[10px] sm:text-xs font-semibold tracking-wider text-white/90">The Annual Leaders Gathering (ALG)</span>
                        </template>
                    </div>
                    @php
                        $desc = $description ?: ($hero?->description ?: ($event->hero_description ?: $event->description));
                    @endphp
                    <!-- Slide 0: Building Together For Impact (no long paragraph) -->
                    <template x-if="i === 0">
                        <div>
                            <h1 class="mt-1.5 sm:mt-3 md:mt-4 text-[26px] leading-tight sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold sm:leading-[1.08] md:leading-[1.05] tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-white to-teal-200/90 drop-shadow-[0_6px_24px_rgba(0,0,0,0.25)]">Building Together For Impact</h1>
                            <p class="mt-1.5 sm:mt-3 text-[14px] sm:text-lg md:text-xl lg:text-2xl text-white/90">Inspiring Excellence Through <span class="text-teal-300">Transformative Leadership</span></p>
                        </div>
                    </template>
                    <!-- Slide 1: About ALG (with long paragraph) -->
                    <template x-if="i === 1">
                        <div>
                            <h1 class="mt-1.5 sm:mt-3 md:mt-4 text-[26px] leading-tight sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold sm:leading-[1.08] md:leading-[1.05] tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-white to-teal-200/90">About ALG</h1>
                            <p class="mt-1.5 sm:mt-3 md:mt-4 max-w-3xl text-[13.5px] sm:text-[15px] md:text-lg lg:text-xl text-white/90">
                                The Annual Leaders Gathering is the LéO Africa Institute's signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day's challenges.
                            </p>
                        </div>
                    </template>
                    <!-- Slide 2: Announcing 2025 ALG Speakers -->
                    <template x-if="i === 2">
                        <div>
                            <h1 class="mt-2 sm:mt-3 md:mt-4 text-[28px] leading-[1.15] sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-normal sm:leading-[1.08] md:leading-[1.05] tracking-tight text-white">Announcing 2025 ALG Speakers</h1>
                        </div>
                    </template>
                    <!-- Slide 3: Previous ALG Editions -->
                    <template x-if="i === 3">
                        <div>
                            <h1 class="mt-2 sm:mt-3 md:mt-4 text-[28px] leading-[1.15] sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-normal sm:leading-[1.08] md:leading-[1.05] tracking-tight text-white">Previous ALG Editions</h1>
                        </div>
                    </template>

                    @php
                        $dt = $event?->start_at ? \Illuminate\Support\Carbon::parse($event->start_at) : \Illuminate\Support\Carbon::create(2025,12,13,9,0);
                        $when = $dt->format('F j, Y • g:i A');
                        $where = $event->location ?: 'Kampala, Uganda';
                    @endphp
                    <div class="mt-3.5 sm:mt-5 md:mt-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-2.5 md:gap-3 text-white">
                        <div class="inline-flex items-center justify-center sm:justify-start gap-2 sm:gap-2.5 px-3 sm:px-3.5 md:px-4 py-1.5 sm:py-1.5 rounded-full bg-black/55 border border-white/35 backdrop-blur-sm shadow-md shadow-black/10">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/10 border border-white/20">
                                <svg class="w-3.5 h-3.5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </span>
                            <span class="text-[12.5px] sm:text-[13px] md:text-[14px] font-medium leading-none">{{ $when }}</span>
                        </div>
                        <div class="inline-flex items-center justify-center sm:justify-start gap-2 sm:gap-2.5 px-3 sm:px-3.5 md:px-4 py-1.5 sm:py-1.5 rounded-full bg-black/55 border border-white/35 backdrop-blur-sm shadow-md shadow-black/10">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/10 border border-white/20">
                                <svg class="w-3.5 h-3.5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 00-7 7c0 5.25 7 11 7 11s7-5.75 7-11a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
                            </span>
                            <span class="text-[12.5px] sm:text-[13px] md:text-[14px] font-medium leading-none">{{ $where }}</span>
                        </div>
                    </div>
                    <div class="relative z-10 mt-4 sm:mt-6 md:mt-8 flex flex-col sm:flex-row w-full sm:w-auto gap-2 sm:gap-2.5 md:gap-3">
                        @php
                            // Always use a clear Reserve CTA for the primary action
                            $computedPrimaryLabel = 'Reserve your seat';
                            $computedPrimaryUrl = url('/reserve-seat');
                            $secondaryCtaLabel = $event->secondary_cta_label ?: 'Learn more';
                            $secondaryCtaUrl = $event->secondary_cta_url ?: url('/about');
                        @endphp
                        <a href="{{ $computedPrimaryUrl }}" class="group relative h-12 sm:h-12 md:h-12 px-5 sm:px-7 inline-flex items-center justify-center bg-teal-600 hover:bg-teal-500 text-white font-semibold text-sm sm:text-base rounded-full transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-[0_10px_30px_rgba(20,184,166,0.35)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 text-center gap-2 w-full sm:w-auto">
                            <span class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/10"></span>
                            <span class="relative">{{ $computedPrimaryLabel }}</span>
                            <svg class="relative w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ $secondaryCtaUrl }}" class="h-12 sm:h-12 md:h-12 px-5 sm:px-7 inline-flex items-center justify-center bg-white/10 text-white hover:bg-white/15 font-semibold text-sm sm:text-base rounded-full border border-white/30 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 text-center w-full sm:w-auto">
                        {{ $secondaryCtaLabel }}
                        </a>
                    </div>

                    

                    @if($showPartners)
                        <div class="mt-4 sm:mt-6 md:mt-7 flex flex-wrap items-center justify-center sm:justify-start gap-x-2 sm:gap-x-3 gap-y-1.5 sm:gap-y-2">
                            <span class="text-[10px] sm:text-[13px] md:text-sm font-medium text-white/90">ALG is an Initiative of</span>
                            <span class="inline-flex items-center group">
                                <a href="https://leoafricainstitute.org/" target="_blank" rel="noopener" aria-label="LéO Africa Institute" class="inline-flex items-center">
                                    <img src="/assets/logos/Leo-africa-institute-light.svg" alt="LéO Africa Institute" class="h-8 sm:h-10 md:h-11 lg:h-12 w-auto object-contain align-middle drop-shadow transition-transform duration-300 hover:scale-105 group-hover:scale-105 cursor-pointer" loading="lazy">
                                </a>
                            </span>
                            <span class="text-[10px] sm:text-[13px] md:text-sm font-medium text-white/90 block sm:inline mt-0.5 sm:mt-0">convened in partnership with</span>
                            <span class="inline-flex items-center gap-x-2 sm:gap-x-3 gap-y-1.5 w-full sm:w-auto justify-center sm:justify-start flex-wrap">
                                <span class="inline-flex items-center group">
                                    <a href="https://www.kas.de/en/web/uganda" target="_blank" rel="noopener" aria-label="Konrad Adenauer Stiftung">
                                        <img src="/assets/logos/KAS.png" alt="Konrad Adenauer Stiftung" class="h-8 sm:h-10 md:h-11 lg:h-12 w-auto object-contain align-middle drop-shadow transition-transform duration-300 hover:scale-105 group-hover:scale-105 cursor-pointer" loading="lazy">
                                    </a>
                                </span>
                                <span class="inline-flex items-center group ml-2 sm:ml-3 md:ml-4">
                                    <a href="https://www.segalfamilyfoundation.org/" target="_blank" rel="noopener" aria-label="Segal Family Foundation">
                                        <img src="/assets/logos/Segal-light.svg" alt="Segal Family Foundation" class="h-9 sm:h-12 md:h-14 lg:h-16 w-auto object-contain align-middle drop-shadow transition-transform duration-300 will-change-transform scale-110 hover:scale-125 group-hover:scale-125 cursor-pointer" loading="lazy">
                                    </a>
                                </span>
                            </span>
                        </div>
                    @endif

                    
                </div>

                <!-- Controls / Indicators -->
                <div class="lg:col-span-3 hidden sm:flex justify-center lg:justify-end items-end mt-8 lg:mt-6 sm:absolute sm:z-20 lg:static sm:bottom-5 sm:right-5">
                    <div class="flex items-center gap-3 bg-white/10 border border-white/15 rounded-full px-2 py-1 backdrop-blur shadow-md shadow-black/20">
                        <button type="button" @click="prev()" class="h-9 w-9 inline-flex items-center justify-center rounded-full text-white hover:bg-white/15 transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="flex items-center gap-1.5">
                            @foreach($resolvedSlides as $idx => $_)
                                @if($idx > 1)
                                    @break
                                @endif
                                <button type="button" @click="i={{ $idx }}" class="h-2.5 w-2.5 rounded-full transition-all duration-300" :class="i==={{ $idx }} ? 'bg-white shadow-[0_0_0_3px_rgba(255,255,255,0.35)] scale-110' : 'bg-white/40 hover:bg-white/60'" aria-label="Go to slide {{ $idx+1 }}"></button>
                            @endforeach
                        </div>
                        <button type="button" @click="next()" class="h-9 w-9 inline-flex items-center justify-center rounded-full text-white hover:bg-white/15 transition-all duration-300 hover:scale-105">
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
