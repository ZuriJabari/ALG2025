<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ALG 2025 – Annual Leaders Gathering</title>
  @include('partials.analytics')
  @if(app()->environment('production'))
    <link rel="stylesheet" href="{{ asset('assets/app-production.css') }}">
    <script type="module" src="{{ asset('assets/app-production.js') }}"></script>
  @else
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>
<body class="antialiased bg-white dark:bg-slate-950">
  <x-header />

  <main>
    @php
      $event = \App\Models\Domain\Event::where('year', 2025)->first();
      $singleSlide = [ ['src' => asset('assets/hero/hero01.jpg'), 'alt' => 'ALG 2025 hero'] ];
      $heroTitle = 'Building Together For Impact';
      $heroSub = 'Inspiring Excellence Through Transformative Leadership';
    @endphp
    <x-hero-slider :event="$event"
                   :slides="$singleSlide"
                   :title="$heroTitle"
                   :description="$heroSub"
                   :show-partners="true"
                   :full="true"
                   primary-cta-label="Reserve your seat"
                   primary-cta-url="{{ url('/reserve-seat') }}" />


    <section class="relative py-8 sm:py-12 md:py-20">
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 sm:gap-8 items-stretch">
          <div class="relative z-10 md:col-span-7 max-w-3xl">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">About the 2025 ALG</h2>
            <div class="mt-3 sm:mt-4 space-y-3 sm:space-y-4 text-gray-700 dark:text-gray-300 text-sm sm:text-[15px] md:text-base leading-relaxed">
              <p>The Annual Leaders Gathering is LéO Africa Institute/s premier platform for catalyzing conversations on transformative leadership in Africa & the world.</p>
              <p>As we convene the 65th edition, we build on five years of impactful dialogue, collaboration, and leadership development that have brought together changemakers, innovators, and visionaries committed to Africa's progress.</p>
              <p>In an era marked by rapid change, complex challenges, and unprecedented opportunities, the imperative for collaborative and transformative leadership has never been greater. The 2025 gathering recognizes that sustainable impact is not achieved in isolation but through collective effort, shared vision, and a commitment to excellence that transcends individual achievements.</p>
            </div>
          </div>
          <div class="hidden md:block md:col-span-5 relative md:min-h-[380px] lg:min-h-[460px]">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0">
              <img
                src="{{ asset('assets/logos/alg-bg.png') }}?v={{ file_exists(public_path('assets/logos/alg-bg.png')) ? filemtime(public_path('assets/logos/alg-bg.png')) : 0 }}"
                onerror="this.onerror=null;this.src='https://live.staticflickr.com/65535/54163592488_ea309df851.jpg'"
                alt="ALG background artwork"
                class="absolute right-0 bottom-0 max-w-[85%] h-auto opacity-[0.45] select-none"
                style="filter: drop-shadow(0 24px 48px rgba(0,0,0,0.18));"
                loading="lazy"
                />
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="relative py-8 sm:py-12 md:py-20 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
          <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Contextualising the Theme</h2>
          <p class="mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">"Building Together for Impact: Inspiring Excellence Through Transformative Leadership" speaks to three critical dimensions of contemporary leadership:</p>
        </div>
        <div class="mt-6 sm:mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
          <div class="group relative rounded-xl sm:rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4 sm:p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
            <div class="absolute -inset-px rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-br from-teal-500/15 via-cyan-500/10 to-transparent"></div>
            <div class="relative flex items-start gap-2 sm:gap-3">
              <span class="inline-flex w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-teal-500/15 text-teal-600 dark:text-teal-400 items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l2 2 6-6"/></svg>
              </span>
              <div>
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Collaboration as Foundation</h3>
                <p class="mt-1.5 sm:mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">Recognizing that the most pressing challenges facing our continent require multi-sectoral partnerships, cross-generational dialogue, and inclusive approaches that harness diverse perspectives and expertise.</p>
              </div>
            </div>
          </div>
          <div class="group relative rounded-xl sm:rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4 sm:p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
            <div class="absolute -inset-px rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-br from-emerald-500/15 via-teal-500/10 to-transparent"></div>
            <div class="relative flex items-start gap-2 sm:gap-3">
              <span class="inline-flex w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 12a9 9 0 0018 0"/></svg>
              </span>
              <div>
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Impact as Measure</h3>
                <p class="mt-1.5 sm:mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">Moving beyond rhetoric to measurable outcomes, this gathering emphasizes results-oriented leadership that creates tangible change in communities, organizations, and nations.</p>
              </div>
            </div>
          </div>
          <div class="group relative rounded-xl sm:rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4 sm:p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
            <div class="absolute -inset-px rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-br from-cyan-500/15 via-teal-500/10 to-transparent"></div>
            <div class="relative flex items-start gap-2 sm:gap-3">
              <span class="inline-flex w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-cyan-500/15 text-cyan-600 dark:text-cyan-400 items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8"/></svg>
              </span>
              <div>
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Excellence as Standard</h3>
                <p class="mt-1.5 sm:mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">Inspiring a culture of excellence where transformative leaders set high standards, innovate continuously, and model integrity in all their endeavors.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative py-8 sm:py-12 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
          <div class="lg:col-span-1">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Topics & Sessions</h2>
            <p class="mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">The topics to unpack the main theme through blended panel and keynote discussions</p>
          </div>
          <div class="lg:col-span-2 grid gap-2.5 sm:gap-3">
            <div class="group relative rounded-lg sm:rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-3 sm:p-4 overflow-hidden transition-all duration-300 hover:shadow-lg">
              <div class="absolute -inset-px rounded-lg sm:rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-teal-500/15 via-cyan-500/10 to-transparent pointer-events-none"></div>
              <div class="relative flex items-start gap-2 sm:gap-3">
                <span class="inline-flex w-7 h-7 sm:w-8 sm:h-8 rounded-md sm:rounded-lg bg-teal-500/15 text-teal-600 dark:text-teal-400 items-center justify-center flex-shrink-0">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5-5 5M6 7h7"/></svg>
                </span>
                <p class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">Leading with Purpose: The Imperative of Collaborative Leadership in Africa's Next Decade</p>
              </div>
            </div>
            <div class="group relative rounded-lg sm:rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-3 sm:p-4 overflow-hidden transition-all duration-300 hover:shadow-lg">
              <div class="absolute -inset-px rounded-lg sm:rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-emerald-500/15 via-teal-500/10 to-transparent pointer-events-none"></div>
              <div class="relative flex items-start gap-2 sm:gap-3">
                <span class="inline-flex w-7 h-7 sm:w-8 sm:h-8 rounded-md sm:rounded-lg bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 items-center justify-center flex-shrink-0">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-6-6h12"/></svg>
                </span>
                <p class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">Excellence as Standard: Sustaining High-Performance Leadership in Challenging Contexts</p>
              </div>
            </div>
            <div class="group relative rounded-lg sm:rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-3 sm:p-4 overflow-hidden transition-all duration-300 hover:shadow-lg">
              <div class="absolute -inset-px rounded-lg sm:rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-cyan-500/15 via-teal-500/10 to-transparent pointer-events-none"></div>
              <div class="relative flex items-start gap-2 sm:gap-3">
                <span class="inline-flex w-7 h-7 sm:w-8 sm:h-8 rounded-md sm:rounded-lg bg-cyan-500/15 text-cyan-600 dark:text-cyan-400 items-center justify-center flex-shrink-0">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">From Individual Excellence to Collective Impact: Building Strategic Partnerships Across Sectors</p>
              </div>
            </div>
            <div class="group relative rounded-lg sm:rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-3 sm:p-4 overflow-hidden transition-all duration-300 hover:shadow-lg">
              <div class="absolute -inset-px rounded-lg sm:rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-sky-500/15 via-cyan-500/10 to-transparent pointer-events-none"></div>
              <div class="relative flex items-start gap-2 sm:gap-3">
                <span class="inline-flex w-7 h-7 sm:w-8 sm:h-8 rounded-md sm:rounded-lg bg-sky-500/15 text-sky-600 dark:text-sky-400 items-center justify-center flex-shrink-0">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/></svg>
                </span>
                <p class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">The Next Decade: Youth Leadership, Innovation, and Africa's Transformation Agenda</p>
              </div>
            </div>
            <div class="group relative rounded-lg sm:rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-3 sm:p-4 overflow-hidden transition-all duration-300 hover:shadow-lg">
              <div class="absolute -inset-px rounded-lg sm:rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-teal-500/15 via-emerald-500/10 to-transparent pointer-events-none"></div>
              <div class="relative flex items-start gap-2 sm:gap-3">
                <span class="inline-flex w-7 h-7 sm:w-8 sm:h-8 rounded-md sm:rounded-lg bg-teal-500/15 text-teal-600 dark:text-teal-400 items-center justify-center flex-shrink-0">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
                </span>
                <p class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">Networking opportunities and collaborative sessions</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Highlight Video -->
    <section class="relative py-8 sm:py-12 md:py-20 bg-[#FDFDFC] dark:bg-slate-950">
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-b from-teal-50/60 via-transparent to-transparent dark:from-teal-900/10"></div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 sm:gap-8 items-start">
          <!-- Left: Description -->
          <div class="md:col-span-5">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">2021 ALG Highlight</h2>
            <div class="mt-3 sm:mt-4 space-y-3 sm:space-y-4 text-gray-700 dark:text-gray-300 text-sm sm:text-[15px] md:text-base leading-relaxed">
              <p>The theme for the 2021 Annual Leaders Gathering, <span class="font-semibold text-gray-900 dark:text-white">Building Resilient Lives and ‘Imagined Communities’</span>, is inspired by the need to re-imagine our sense of community in the wake of the coronavirus pandemic.</p>
              <p>Starting in 2020, the Annual Leaders Gathering takes place every November and has gained reputation as an essential platform for significant conversations on ideas and issues impacting society – making it the signature public convening for the LéO Africa Institute’s growing network.</p>
              <div class="pt-2 sm:pt-3">
                <a href="https://www.youtube.com/watch?v=9OaNTDzFtAE" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 text-sm sm:text-base rounded-full bg-teal-600 text-white font-semibold hover:bg-teal-500 transition">
                  <span>Watch on YouTube</span>
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
              </div>
            </div>
          </div>
          <!-- Right: Video Card -->
          <div class="md:col-span-7">
            <div class="group relative rounded-2xl sm:rounded-3xl overflow-hidden border border-teal-200/40 dark:border-teal-800/40 shadow-lg sm:shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-0.5">
              <!-- Ambient glow behind card -->
              <div class="absolute -inset-6 -z-10 rounded-[28px] bg-gradient-to-r from-teal-500/12 via-cyan-500/10 to-transparent blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
              <div class="absolute -inset-0.5 rounded-2xl sm:rounded-3xl bg-gradient-to-r from-teal-500/15 via-cyan-500/10 to-transparent blur-lg opacity-80 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
              <div class="relative aspect-video rounded-2xl sm:rounded-3xl overflow-hidden">
                <iframe class="w-full h-full transition-transform duration-500 group-hover:scale-[1.01]" src="https://www.youtube.com/embed/9OaNTDzFtAE?modestbranding=1&rel=0&playsinline=1" title="ALG Highlight Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <!-- Play overlay (visual, non-blocking) -->
                <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                  <div class="inline-flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 md:w-18 md:h-18 rounded-full bg-white/90 text-teal-600 shadow-lg shadow-black/10 ring-1 ring-black/5 transition-all duration-500 opacity-95 group-hover:opacity-0 scale-100 group-hover:scale-95">
                    <svg class="w-6 h-6 ml-0.5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                  </div>
                </div>
                <div class="pointer-events-none absolute inset-0 ring-1 ring-black/5 dark:ring-white/10"></div>
                <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/40 to-transparent"></div>
              </div>
              <div class="relative z-10 px-3 py-2.5 sm:px-5 sm:py-4 flex items-center justify-between bg-white/80 dark:bg-slate-900/70 backdrop-blur border-t border-teal-200/40 dark:border-teal-800/40">
                <div class="inline-flex items-center gap-1.5 sm:gap-2 text-gray-800 dark:text-gray-200 text-xs sm:text-sm">
                  <span class="inline-flex w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full bg-teal-500"></span>
                  <span>2021 Highlights</span>
                </div>
                <a href="https://www.youtube.com/watch?v=9OaNTDzFtAE" target="_blank" class="inline-flex items-center gap-1.5 sm:gap-2 text-teal-700 dark:text-teal-400 hover:underline text-xs sm:text-sm">
                  <span class="hidden sm:inline">Watch on YouTube</span>
                  <span class="sm:hidden">YouTube</span>
                  <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Photo Gallery (Embedded from Flickr Album) -->
    <section class="relative py-8 sm:py-12 md:py-20 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-baseline justify-between gap-3">
          <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Photo Gallery</h2>
          <a href="https://www.flickr.com/photos/africaforum/albums/72177720322157081/" target="_blank" class="inline-flex items-center gap-1.5 sm:gap-2 text-teal-700 dark:text-teal-400 hover:underline text-sm sm:text-base flex-shrink-0">
            <span>View more on Flickr</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>
        <div class="mt-6">
          <style>
            .gallery-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.75rem}
            @media (min-width:640px){.gallery-grid{gap:.75rem}}
          </style>
          <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            <!-- Left: Embedded Flickr album image/card -->
            <div class="md:col-span-7">
              <div class="relative rounded-2xl overflow-hidden border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-2 sm:p-3">
                <div class="relative w-full">
                  <a data-flickr-embed="true" data-header="true" data-footer="true" href="https://www.flickr.com/photos/africaforum/albums/72177720322157081" title="Annual Leaders Gathering 2024" class="block">
                    <img src="https://live.staticflickr.com/65535/54163592488_ea309df851.jpg" width="500" height="375" alt="Annual Leaders Gathering 2024" class="w-full h-auto object-cover"/>
                  </a>
                  <script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
                </div>
              </div>
            </div>
            <!-- Right: Description -->
            <div class="md:col-span-5">
              <div class="rounded-xl sm:rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4 sm:p-6 h-full flex flex-col justify-between">
                <div>
                  <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Annual Leaders Gathering 2024</h3>
                  <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-700 dark:text-gray-300">A visual story from our 2024 gathering. Explore moments of insight, connection, and action that set the stage for an even bigger 2025.</p>
                </div>
                <div class="mt-3 sm:mt-4 pt-2">
                  <a href="https://www.flickr.com/photos/africaforum/albums/72177720322157081" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 text-sm sm:text-base rounded-full bg-teal-600 text-white font-semibold hover:bg-teal-500 transition">
                    <span>View full album on Flickr</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <!-- Subscribe Block -->
  <section class="relative py-8 sm:py-10 md:py-14 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div x-data="{ open:false }" class="relative overflow-hidden rounded-2xl sm:rounded-3xl border border-gray-200/60 dark:border-slate-800/60 bg-slate-900 text-white">
        <div class="absolute -inset-1 bg-gradient-to-r from-white/5 via-white/0 to-white/0 rounded-2xl sm:rounded-3xl pointer-events-none"></div>
        <div class="relative grid grid-cols-1 md:grid-cols-12 gap-4 sm:gap-6 md:gap-8 p-4 sm:p-6 md:p-8">
          <div class="md:col-span-2 flex items-center justify-center md:border-r border-white/10">
            <div class="h-24 w-24 sm:h-32 sm:w-32 md:h-36 md:w-36 rounded-lg sm:rounded-xl flex items-center justify-center p-3 sm:p-4">
              <img src="{{ asset('assets/logos/ALG.png') }}" alt="ALG logo" class="w-full h-full object-contain" loading="lazy"/>
            </div>
          </div>
          <div class="md:col-span-7">
            <h3 class="text-xl sm:text-2xl md:text-3xl font-semibold leading-tight">ALG newsletter</h3>
            <p class="mt-1.5 sm:mt-2 text-sm sm:text-base text-slate-300">Bringing you curated insights and updates on the Annual Leaders Gathering and LéO Africa Institute community.</p>
          </div>
          <div class="md:col-span-3 flex items-center justify-start md:justify-end">
            <button @click="open = !open" class="inline-flex items-center gap-1.5 sm:gap-2 px-4 sm:px-5 py-2 sm:py-2.5 text-sm sm:text-base rounded-full ring-1 ring-white/20 hover:ring-white/40 bg-white/5 hover:bg-white/10 transition">
              <span>Subscribe today</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>
        <div x-show="open" x-transition.origin.top.duration.300 class="relative px-4 sm:px-6 md:px-8 pb-6 sm:pb-8 -mt-2 sm:-mt-4">
          <form class="mt-2 grid grid-cols-1 sm:grid-cols-3 gap-2.5 sm:gap-3">
            <input type="text" name="name" placeholder="Your name" class="col-span-1 sm:col-span-1 rounded-lg sm:rounded-xl bg-white/10 border border-white/10 px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-teal-400/40"/>
            <input type="email" name="email" placeholder="Email address" class="col-span-1 sm:col-span-1 rounded-lg sm:rounded-xl bg-white/10 border border-white/10 px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-teal-400/40"/>
            <button type="submit" class="col-span-1 inline-flex items-center justify-center gap-2 rounded-lg sm:rounded-xl bg-teal-600 hover:bg-teal-500 text-white px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base font-semibold transition">
              <span>Subscribe</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <x-footer />
</body>
</html>
