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

            <div class="mt-3 sm:mt-4 rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 px-4 sm:px-5 py-4 sm:py-5">
              <ol class="space-y-0 text-sm sm:text-[15px] text-gray-800 dark:text-gray-100">
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">7:30 &ndash; 8:00 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Guest arrival</p>
                    <p class="mt-1 font-semibold">Guest arrival &amp; welcome reception</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Hosted by the Master of Ceremonies.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">8:00 &ndash; 8:30 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Networking breakfast</p>
                    <p class="mt-1 font-semibold">Networking breakfast</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">An informal opportunity for Africa Champions and partners to connect.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">8:30 &ndash; 8:40 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Welcome</p>
                    <p class="mt-1 font-semibold">Welcome &amp; opening remarks</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Framing the morning by the Master of Ceremonies.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">8:40 &ndash; 8:50 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Board welcome</p>
                    <p class="mt-1 font-semibold">Welcome from the Board Chair</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Remarks by <span class="font-medium">Magnus Mchunguzi</span>, Board Chairman.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">8:50 &ndash; 9:10 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Co-founder reflections</p>
                    <p class="mt-1 font-semibold">Reflections from the Co-founder</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Sharing the vision and journey by <span class="font-medium">Awel Uwihanganye</span>, Co-founder, LéO Africa Institute.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">9:10 &ndash; 9:25 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Partnerships</p>
                    <p class="mt-1 font-semibold">Partnerships &amp; networks</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Remarks by <span class="font-medium">Emmanuel Awori</span>, Partnerships Lead, on building together with African Champions.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">9:25 &ndash; 9:40 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Institute story &amp; keynote</p>
                    <p class="mt-1 font-semibold">The LéO Africa Institute story &amp; African Champions Network</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">13 years of building together, and a presentation on the African Champions Network.</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Keynote address by <span class="font-medium">David F. Mpanga</span>, Managing Partner, AF Mpanga.</p>
                  </div>
                </li>
                <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 odd:bg-white odd:dark:bg-slate-950 even:bg-amber-50 even:dark:bg-slate-800/80 border-t border-gray-200/60 dark:border-slate-700/60 first:border-t-0 transition-all duration-200 hover:bg-amber-100/70 dark:hover:bg-slate-700/90">
                  <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                    <p class="font-semibold text-amber-700 dark:text-amber-300">9:40 &ndash; 10:00 AM</p>
                  </div>
                  <div class="flex-1 border-l border-amber-100 dark:border-amber-900/50 pl-4 transition-colors duration-300 group-hover:border-amber-400/80">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Recognition &amp; closing</p>
                    <p class="mt-1 font-semibold">Recognition &amp; closing reflections</p>
                    <p class="mt-1 text-gray-700 dark:text-gray-300">Celebrating Africa Champions and drawing together key insights from the morning. Led by the Master of Ceremonies.</p>
                  </div>
                </li>
              </ol>
            </div>

            <div class="mt-3 sm:mt-4 flex flex-wrap items-center justify-between gap-3">
              <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">PDF &bull; Programme overview</p>
              <a href="{{ asset('assets/1x/Africa Champions Breakfast ALG 2025.pdf') }}" download class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-amber-500 text-slate-900 text-xs sm:text-sm font-semibold hover:bg-amber-400 dark:bg-amber-400 dark:hover:bg-amber-300 transition">
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
