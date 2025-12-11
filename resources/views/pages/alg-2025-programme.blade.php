<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ALG 2025 Main Programme – Annual Leaders Gathering</title>
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

  <main>
    <section class="relative overflow-hidden">
      <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image:url('{{ asset('assets/1x/artwork.png') }}');background-repeat:no-repeat;background-position:right -60px top -40px;background-size:720px auto"></div>
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
        <div class="flex items-center justify-between gap-3 mb-6">
          <a href="{{ route('events.2025') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white hover:underline decoration-teal-500/60 decoration-2 underline-offset-4">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            <span>Back to ALG 2025 overview</span>
          </a>
        </div>
        <div class="max-w-3xl">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/80 dark:bg-slate-900/70 border border-gray-200 dark:border-slate-800">
            <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
            <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-[0.16em] uppercase">ALG 2025 Programme</span>
          </div>
          <h1 class="mt-5 text-3xl sm:text-4xl md:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">Main Programme</h1>
          <p class="mt-4 text-base sm:text-lg text-gray-700 dark:text-gray-300 max-w-2xl">
            Explore the full-day programme for the 2025 Annual Leaders Gathering &mdash; from keynote addresses and plenary discussions to breakout conversations and networking moments.
          </p>
        </div>
      </div>
    </section>

    <section class="relative py-10 sm:py-14 md:py-18 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-start">
          <div class="lg:col-span-4 max-w-xl">
            <h2 class="text-xl sm:text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">At a glance</h2>
            <div class="mt-3 space-y-3 text-sm sm:text-base text-gray-700 dark:text-gray-300">
              <p><span class="font-semibold text-gray-900 dark:text-white">Date:</span> Saturday, 13th December 2025</p>
              <p><span class="font-semibold text-gray-900 dark:text-white">Venue:</span> Four Points by Sheraton, Kampala</p>
              <p><span class="font-semibold text-gray-900 dark:text-white">Theme:</span> Building Together For Impact &mdash; Inspiring Excellence Through Transformative Leadership</p>
              <p>
                The programme weaves together keynotes, panel conversations, and reflective sessions that bring Africa's emerging and established leaders into dialogue around excellence, partnership, and lasting impact.
              </p>
              <div class="mt-4">
                <a href="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" download class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full bg-teal-600 text-white text-sm sm:text-base font-semibold hover:bg-teal-500 transition">
                  <span>Download full programme (PDF)</span>
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/></svg>
                </a>
              </div>
            </div>
          </div>

          <div class="lg:col-span-8">
            <div class="group relative rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-lg sm:shadow-xl overflow-hidden">
              <div class="absolute -inset-6 -z-10 rounded-[28px] bg-gradient-to-r from-teal-500/15 via-cyan-500/10 to-transparent blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
              <div class="relative px-4 sm:px-5 py-3 sm:py-4 flex items-center justify-between gap-3 border-b border-gray-200 dark:border-slate-800 bg-white/90 dark:bg-slate-950/90 backdrop-blur">
                <div class="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm text-gray-700 dark:text-gray-300">
                  <span class="inline-flex w-6 h-6 rounded-full bg-teal-500/15 text-teal-600 dark:text-teal-400 items-center justify-center"><svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14v16H5z"/></svg></span>
                  <span>Main Programme &mdash; PDF viewer</span>
                </div>
                <a href="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-teal-700 dark:text-teal-300 hover:underline">
                  <span>Open in new tab</span>
                  <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5h10v10M9 15l10-10"/></svg>
                </a>
              </div>
              <div class="relative bg-slate-900/95 dark:bg-slate-950">
                <object data="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" type="application/pdf" class="w-full h-[520px] sm:h-[640px]">
                  <p class="p-4 text-sm text-gray-200">
                    Your browser is unable to display this programme. You can
                    <a href="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" class="underline hover:text-teal-300" target="_blank" rel="noopener">download the ALG 2025 Main Programme PDF here</a>.
                  </p>
                </object>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <x-footer />
</body>
</html>
