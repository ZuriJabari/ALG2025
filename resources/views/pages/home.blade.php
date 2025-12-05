<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Annual Leaders Gathering – Home</title>
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

  @php
    $event = \App\Models\Domain\Event::where('year', 2025)->first();
    $heroTitle = 'Introducing the 2025 Annual Leaders Gathering';
    $heroDesc = 'The Annual Leaders Gathering is the LéO Africa Institute’s signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day\'s challenges.';
  @endphp

  <div x-data="{ algClosedOpen:false }" x-on:alg-closed-modal-open.window="algClosedOpen = true" @keydown.escape.window="algClosedOpen = false">
    <x-hero-slider :event="$event"
                   :title="$heroTitle"
                   :description="$heroDesc"
                   :exclude="[2]"
                   :show-partners="true"
                   :full="true"
                   primary-cta-label="Reserve your seat"
                   primary-cta-url="#alg2025-registration-closed-modal" />

    <!-- ALG 2025 Registration Closed Modal -->
    <div x-show="algClosedOpen"
         x-transition.opacity.duration.250ms
         class="fixed inset-0 z-50 flex items-center justify-center px-4 sm:px-6 lg:px-8">
      <div class="absolute inset-0 bg-black/60 backdrop-blur-md" @click="algClosedOpen = false"></div>

      <div x-show="algClosedOpen"
           x-transition.scale.duration.300ms
           class="relative w-full max-w-2xl sm:max-w-3xl">
        <div class="absolute -inset-0.5 rounded-3xl bg-gradient-to-r from-teal-400/60 via-cyan-400/40 to-amber-400/60 opacity-80 blur-xl pointer-events-none"></div>
        <div class="relative rounded-3xl bg-slate-950/95 text-white shadow-2xl border border-white/10 overflow-hidden">
          <div class="flex items-start justify-between gap-4 px-5 sm:px-7 pt-5 sm:pt-6 pb-3">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10">
              <span class="w-2 h-2 rounded-full bg-teal-400"></span>
              <span class="text-[11px] sm:text-xs font-semibold tracking-[0.16em] uppercase text-white/80">ALG 2025 Update</span>
            </div>
            <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/5 hover:bg-white/10 text-white/80 hover:text-white transition"
                    @click="algClosedOpen = false"
                    aria-label="Close">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
          </div>

          <div class="px-5 sm:px-7 pb-6 sm:pb-7 max-h-[80vh] overflow-y-auto custom-scroll">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-normal tracking-tight">#ALG2025 Registration is Closed!</h2>
            <div class="mt-4 sm:mt-5 space-y-3.5 sm:space-y-4 text-sm sm:text-base text-slate-100/90">
              <p>Thank you to the 200+ guests who have registered for the 2025 Annual Leaders Gathering!</p>
              <p>We can't wait to see you as we dive into deep insights on building together for impact—at the personal level, institutional level, and in partnership with key stakeholders.</p>
              <p>Couldn't register? No problem! #ALG2025 will be streamed live on our key platforms—join the conversation virtually!</p>
              <p><strong>Coming Monday:</strong> Keynote speaker announcement and full program lineup!</p>
              <div class="mt-3.5 sm:mt-4 rounded-2xl border border-white/12 bg-white/5 px-4 sm:px-5 py-4 sm:py-5 shadow-[0_18px_60px_rgba(15,23,42,0.7)]">
                <p class="text-sm sm:text-base font-semibold mb-2 text-white">Event Details:</p>
                <ul class="space-y-1.5 text-sm sm:text-base text-slate-100/90">
                  <li class="flex items-start gap-2.5"><span class="mt-0.5">📅</span><span>Saturday, 13th December 2025</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-0.5">📍</span><span>Four Points by Sheraton, Kampala</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-0.5">📺</span><span>Live streaming available</span></li>
                </ul>
              </div>
              <p class="pt-1.5 text-sm sm:text-base text-slate-100/90">Registered participants, watch your inbox for details. See you there—in person or online</p>
            </div>

            <div class="mt-5 sm:mt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="text-xs sm:text-sm text-slate-300/80 flex items-center gap-2">
                <span class="inline-flex w-6 h-6 items-center justify-center rounded-full bg-white/5 border border-white/10">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </span>
                <span>ALG 2025 will be streamed live on our key platforms.</span>
              </div>
              <div class="flex flex-wrap gap-2 sm:gap-3 justify-end">
                <a href="{{ url('/alg-2025') }}" class="inline-flex items-center justify-center px-4 sm:px-5 py-2 rounded-full border border-white/20 bg-white/5 text-xs sm:text-sm font-semibold text-white hover:bg-white/10 transition">
                  <span>View ALG 2025 details</span>
                  <svg class="w-3.5 h-3.5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
                <button type="button" @click="algClosedOpen = false" class="inline-flex items-center justify-center px-4 sm:px-5 py-2 rounded-full bg-white text-xs sm:text-sm font-semibold text-slate-900 hover:bg-slate-100 transition">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
