<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Confirm Your Attendance – ALG 2025</title>
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

  <main class="py-12 sm:py-16 md:py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <section class="relative mt-6 sm:mt-10 rounded-3xl border border-gray-200/80 dark:border-slate-700 bg-white dark:bg-slate-950 shadow-2xl overflow-hidden">
        <div class="absolute -inset-1 bg-gradient-to-br from-teal-500/10 via-cyan-500/5 to-amber-400/5 opacity-40 pointer-events-none"></div>
        <div class="relative p-6 sm:p-8">
          <div class="flex items-center justify-between gap-3">
            <div>
              <p class="text-xs font-semibold tracking-[0.18em] uppercase text-teal-600 dark:text-teal-300">ALG 2025 Attendance</p>
              <h1 class="mt-1 text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Confirm how you will attend</h1>
            </div>
            <div class="hidden sm:flex items-center justify-center w-12 h-12 rounded-2xl bg-teal-500/10 text-teal-600 dark:text-teal-300">
              <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m-4-4h8"/></svg>
            </div>
          </div>

          @if (session('status'))
            <div class="mt-4 rounded-2xl border border-emerald-500/30 bg-emerald-500/5 px-4 py-3 text-sm text-emerald-900 dark:text-emerald-200 flex items-start gap-2">
              <span class="mt-0.5 inline-flex w-4 h-4 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-700 dark:text-emerald-200">
                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              </span>
              <span>{{ session('status') }}</span>
            </div>
          @endif

          @if (session('error'))
            <div class="mt-4 rounded-2xl border border-red-500/30 bg-red-500/5 px-4 py-3 text-sm text-red-900 dark:text-red-200">
              {{ session('error') }}
            </div>
          @endif

          @if (! $reservation)
            <p class="mt-6 text-sm sm:text-base text-gray-800 dark:text-gray-100">
              This attendance confirmation link is invalid or has expired. Please contact the LéO Africa Institute team if you need assistance confirming your participation.
            </p>
          @else
            <div class="mt-6 space-y-4 text-sm sm:text-base text-gray-800 dark:text-gray-100">
              <p>Hi <span class="font-semibold text-gray-900 dark:text-white">{{ $reservation->full_name }}</span>,</p>
              <p>
                Thank you for reserving your seat for <span class="font-semibold text-gray-900 dark:text-white">ALG 2025 – Building Together for Impact</span>.
                To help us finalise logistics and design the best possible experience, please confirm how you will be joining us.
              </p>

              @if ($reservation->attendance_mode)
                <div class="mt-2 inline-flex items-center gap-2 rounded-full border border-teal-500/40 bg-teal-500/10 px-3 py-1 text-xs sm:text-sm text-teal-900 dark:text-teal-100">
                  <span class="inline-flex w-2 h-2 rounded-full bg-teal-400"></span>
                  <span>Current selection: <strong class="font-semibold">
                    {{ $reservation->attendance_mode === 'physical' ? 'In person (Kampala)' : 'Virtual (online)' }}
                  </strong></span>
                </div>
              @endif

              <form method="POST" action="{{ route('attendance.store') }}" class="mt-5 space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $reservation->attendance_token }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                  <button type="submit" name="attendance_mode" value="physical" class="group relative flex flex-col items-start rounded-2xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-950 px-4 py-4 sm:px-5 sm:py-5 text-left shadow-sm hover:shadow-md transition">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-teal-500/10 via-cyan-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="relative flex items-center gap-3">
                      <span class="inline-flex w-9 h-9 items-center justify-center rounded-xl bg-teal-500/10 text-teal-600 dark:text-teal-300">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16v10H4zM9 17V7"/></svg>
                      </span>
                      <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">I will attend in person</p>
                        <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-gray-400">Join us at Four Points by Sheraton, Kampala.</p>
                      </div>
                    </div>
                  </button>

                  <button type="submit" name="attendance_mode" value="virtual" class="group relative flex flex-col items-start rounded-2xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-950 px-4 py-4 sm:px-5 sm:py-5 text-left shadow-sm hover:shadow-md transition">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-indigo-500/10 via-sky-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="relative flex items-center gap-3">
                      <span class="inline-flex w-9 h-9 items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-300">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18v12H3zM10 19h4"/></svg>
                      </span>
                      <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">I will join virtually</p>
                        <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-gray-400">Follow the livestream on YouTube and our key platforms.</p>
                      </div>
                    </div>
                  </button>
                </div>
              </form>

              <div class="pt-4 border-t border-gray-200/70 dark:border-slate-800/70 mt-4 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                <p class="font-semibold text-gray-800 dark:text-gray-200 mb-1">Event Details</p>
                <ul class="space-y-1.5">
                  <li>📅 Saturday, 13th December 2025</li>
                  <li>📍 Four Points by Sheraton, Kampala</li>
                  <li>📺 Live streaming available on YouTube: <a href="https://www.youtube.com/@leoafricainstitute" class="underline hover:text-teal-600 dark:hover:text-teal-400" target="_blank" rel="noopener">@leoafricainstitute</a></li>
                </ul>
              </div>
            </div>
          @endif
        </div>
      </section>
    </div>
  </main>

  <x-footer />
</body>
</html>
