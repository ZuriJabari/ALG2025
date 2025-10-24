@props(['event', 'hero' => null])

<style>
 .hero .plyr { margin: 0 !important; height: 100% !important; }
 .hero [data-plyr-provider] { display: block; width: 100%; height: 100%; }
 .hero video { display: block; width: 100%; height: 100%; }
 /* Critical: make embed wrappers fill parent so no white gap remains */
 .hero .plyr__video-embed { height: 100% !important; padding-bottom: 0 !important; }
 .hero .plyr__video-embed > iframe { position: relative !important; height: 100% !important; top: 0 !important; }
 .hero .plyr__video-wrapper { height: 100% !important; }
</style>

<section class="hero relative min-h-[72vh] md:min-h-[68vh] flex items-start overflow-hidden bg-white dark:bg-slate-950 -mb-4 lg:-mb-8">
    <!-- Pattern Background -->
    @php
        $patternUrl = $hero?->getFirstMediaUrl('pattern') ?: $event->getFirstMediaUrl('pattern');
    @endphp
    @if($patternUrl)
        <div class="absolute inset-0 opacity-20 dark:opacity-25">
            <img src="{{ $patternUrl }}" alt="" class="w-full h-full object-cover">
        </div>
    @endif

    

    <!-- Content -->
    <div class="relative w-full px-8 sm:px-12 lg:px-24 xl:px-32 2xl:px-48 pt-[274px] pb-6 lg:pt-[290px] lg:pb-8 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start overflow-hidden"
         style="background-image: url('/assets/hero-bg1.png'), url('/assets/artwork.png'); background-repeat: no-repeat, no-repeat; background-position: left bottom, right bottom; background-size: clamp(312px, 52%, 1040px) auto, clamp(416px, 60%, 1560px) auto; background-origin: border-box, border-box; background-clip: border-box, border-box;">
        <!-- Left: Text Content -->
        <div class="space-y-8 lg:col-span-7 lg:transform lg:-translate-y-[30%]">
            <!-- Eyebrow -->
            <div class="inline-flex items-center gap-2 px-5 py-2 bg-white dark:bg-slate-900/60 rounded-full border border-gray-200 dark:border-slate-700 shadow-sm">
                <span class="w-2 h-2 bg-teal-500 rounded-full"></span>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">6th Annual Leaders Gathering</span>
            </div>

            <!-- Main Heading -->
            <div class="space-y-4">
                @php
                    $heading = $event->subtitle ?: $event->title;
                    $desc = $hero?->description ?: $event->description;
                    $heroDesc = $event->hero_description;
                @endphp
                @if($heading)
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-semibold tracking-tight text-gray-900 dark:text-white leading-[1.05]">
                        {{ $heading }}
                    </h1>
                @endif
                @if($desc)
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 font-medium">
                        {{ $desc }}
                    </p>
                @endif
                @if($heroDesc)
                    <p class="text-base md:text-lg text-gray-600 dark:text-gray-300">
                        {{ $heroDesc }}
                    </p>
                @endif
            </div>

            <!-- Event Details -->
            <div class="flex flex-col sm:flex-row gap-6 text-gray-700 dark:text-gray-300">
                @if($event->start_at)
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-orange-50 dark:bg-orange-950/30 rounded-lg">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Date & Time</p>
                            <p class="text-sm font-semibold">{{ $event->start_at->format('M d, Y') }} • {{ $event->start_at->format('g:i A') }}</p>
                        </div>
                    </div>
                @endif

                @if($event->location)
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-orange-50 dark:bg-orange-950/30 rounded-lg">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Location</p>
                            <p class="text-sm font-semibold">{{ $event->location }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                @php
                    $reserveUrl = $event->primary_cta_url ?? $hero?->cta_url ?? '#register';
                    $learnUrl = $event->secondary_cta_url ?? '#learn-more';
                @endphp
                <a href="{{ $reserveUrl }}" class="h-11 px-6 inline-flex items-center justify-center bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-semibold rounded-full transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 text-center gap-2">
                    <span>Reserve your seat</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ $learnUrl }}" class="h-11 px-6 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-teal-600 dark:text-teal-400 hover:bg-gray-50 dark:hover:bg-slate-800 font-semibold rounded-full border-2 border-teal-600 dark:border-teal-400 transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500/40 text-center">
                    Learn more
                </a>
            </div>
        </div>

        <!-- Right: Hero Media (Image or Video) -->
        @php 
            $heroImg = $hero?->getFirstMediaUrl('hero') ?: $event->getFirstMediaUrl('hero');
            $contentType = $hero?->content_type ?? 'image';
            $videoUrl = $hero?->video_url;
            $videoType = $hero?->video_type ?? 'youtube';
        @endphp
        <!-- Absolutely positioned media at lg+ per spec -->
        <div class="hidden lg:block absolute right-8 sm:right-12 lg:right-24 xl:right-32 2xl:right-48 bottom-0 w-[420px] z-10 transform translate-x-[-20%] translate-y-[-40%] group">
            <!-- Patterned vertical band remains behind, tied to section background -->
            <div class="relative rounded-t-3xl overflow-hidden shadow-2xl w-full aspect-[4/3] transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-0.5">
                @if($contentType === 'video' && $videoUrl)
                    @if($videoType === 'youtube')
                        <div data-plyr-provider="youtube" data-plyr-embed-id="{{ basename(parse_url($videoUrl, PHP_URL_PATH), '.php') }}" class="w-full h-full block"></div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const youtubeUrl = '{{ $videoUrl }}';
                                let videoId = null;
                                if (youtubeUrl.includes('youtube.com/watch')) {
                                    const url = new URL(youtubeUrl);
                                    videoId = url.searchParams.get('v');
                                } else if (youtubeUrl.includes('youtu.be/')) {
                                    videoId = youtubeUrl.split('youtu.be/')[1].split('?')[0];
                                }
                                if (videoId) {
                                    const el = document.querySelector('[data-plyr-provider="youtube"]');
                                    el.setAttribute('data-plyr-embed-id', videoId);
                                    new Plyr(el, {
                                        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'pip', 'fullscreen'],
                                        settings: ['quality', 'speed'],
                                        quality: { default: 720, options: [360, 720, 1080] },
                                        speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] },
                                        tooltips: { controls: true, seek: true },
                                        keyboard: { focused: true, global: false },
                                        fullscreen: { enabled: true, fallback: true },
                                        clickToPlay: true,
                                        hideControls: true,
                                        resetOnEnd: false,
                                        displayDuration: true,
                                        loadSprite: true,
                                        iconUrl: 'https://cdn.plyr.io/3.7.8/plyr.svg',
                                        blankVideo: 'https://cdn.plyr.io/3.7.8/blank.mp4',
                                    });
                                }
                            });
                        </script>
                    @elseif($videoType === 'vimeo')
                        <div data-plyr-provider="vimeo" data-plyr-embed-id="{{ basename(parse_url($videoUrl, PHP_URL_PATH)) }}" class="w-full h-full block"></div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const vimeoUrl = '{{ $videoUrl }}';
                                const videoId = vimeoUrl.split('vimeo.com/')[1]?.split('?')[0];
                                if (videoId) {
                                    const el = document.querySelector('[data-plyr-provider="vimeo"]');
                                    el.setAttribute('data-plyr-embed-id', videoId);
                                    new Plyr(el, {
                                        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'pip', 'fullscreen'],
                                        settings: ['quality', 'speed'],
                                        quality: { default: 720, options: [360, 720, 1080] },
                                        speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] },
                                        tooltips: { controls: true, seek: true },
                                        keyboard: { focused: true, global: false },
                                        fullscreen: { enabled: true, fallback: true },
                                        clickToPlay: true,
                                        hideControls: true,
                                        resetOnEnd: false,
                                        displayDuration: true,
                                        loadSprite: true,
                                        iconUrl: 'https://cdn.plyr.io/3.7.8/plyr.svg',
                                        blankVideo: 'https://cdn.plyr.io/3.7.8/blank.mp4',
                                    });
                                }
                            });
                        </script>
                    @elseif($videoType === 'local')
                        <video data-plyr-provider="html5" controls playsinline class="w-full h-full block">
                            <source src="{{ $videoUrl }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                @else
                    <img 
                        src="{{ $heroImg ?: '/assets/hero1.jpg' }}" 
                        alt="{{ $event->title }}"
                        class="w-full h-full object-cover"
                    >
                    @if($contentType === 'image')
                        <!-- Bottom gradient overlay with time label -->
                        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute left-3 bottom-3 text-white text-sm inline-flex items-center gap-2">
                            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="opacity-95">2:34 ALG24 highlight reel</span>
                        </div>
                    @endif
                @endif
            </div>
            <div class="bg-slate-900 text-white rounded-b-3xl shadow-2xl overflow-hidden w-full ml-auto -mt-[6px] transition-all duration-300 group-hover:-translate-y-0.5">
                <div class="px-6 pt-4 pb-6">
                    <h5 class="text-2xl font-bold">A Look Back at ALG 2024</h5>
                    <p class="text-white/75 text-base mt-2 leading-relaxed">Moments of insight, connection, and action that set the stage for an even bigger 2025.</p>
                </div>
            </div>
        </div>
    </div>

    
</section>
