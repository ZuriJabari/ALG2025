<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>African Champions Breakfast – ALG</title>
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

  <section class="relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image:url('{{ asset('assets/1x/artwork.png') }}');background-repeat:no-repeat;background-position:right -60px top -40px;background-size:640px auto"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800">
          <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
          <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-wider">ALG Program</span>
        </div>
        <h1 class="mt-5 text-4xl sm:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">African Champions Breakfast</h1>
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">An intimate, high-level breakfast convening for Africa Champions and partners, curated as part of the Annual Leaders Gathering experience.</p>
      </div>
    </div>
  </section>

  <section id="programme" class="relative py-10 sm:py-14 bg-gray-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Programme</h2>
        <p class="mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">Browse the curated programme for the Africa Champions Breakfast, including timings, speakers, and flow of the morning.</p>
      </div>
      <div class="mt-6 sm:mt-8 grid grid-cols-1">
        <div class="group relative rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-5 sm:p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5 overflow-hidden">
          <div class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-br from-amber-400/20 via-rose-400/10 to-transparent"></div>
          <div class="relative flex flex-col gap-4 sm:gap-5">
            <div class="flex items-start gap-3 sm:gap-4">
              <span class="inline-flex w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-amber-400/15 text-amber-600 dark:text-amber-300 items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 12h10M4 16h6"/></svg>
              </span>
              <div>
                <p class="text-xs font-semibold tracking-[0.18em] uppercase text-amber-600 dark:text-amber-300">ALG Programme</p>
                <h3 class="mt-1 text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Africa Champions Breakfast 2025</h3>
                <p class="mt-2 text-sm sm:text-base text-gray-700 dark:text-gray-300">Browse the programme below for session timings, hosts, and key discussion moments, or download the PDF for your reference.</p>
              </div>
            </div>

            <div class="mt-3 sm:mt-4 rounded-xl border border-gray-200 dark:border-slate-800 overflow-hidden bg-slate-900/95">
              <object data="{{ asset('assets/1x/Africa Champions Breakfast ALG 2025.pdf') }}" type="application/pdf" class="w-full h-[480px] sm:h-[600px]">
                <p class="p-4 text-sm text-gray-200">
                  Your browser is unable to display this programme. You can
                  <a href="{{ asset('assets/1x/Africa Champions Breakfast ALG 2025.pdf') }}" class="underline hover:text-amber-300" target="_blank" rel="noopener">download the Africa Champions Breakfast programme PDF here</a>.
                </p>
              </object>
            </div>

            <div class="mt-3 sm:mt-4 flex flex-wrap items-center justify-between gap-3">
              <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">PDF &bull; Programme overview</p>
              <a href="{{ asset('assets/1x/Africa Champions Breakfast ALG 2025.pdf') }}" download class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-slate-900 text-white text-xs sm:text-sm font-semibold hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-100 transition">
                <span>Download programme (PDF)</span>
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <x-footer />
</body>
</html>
