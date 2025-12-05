<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>#ALG2025 Registration is Closed – ALG</title>
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
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image:url('{{ asset('assets/1x/artwork.png') }}');background-repeat:no-repeat;background-position:right -80px top -40px;background-size:720px auto"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800">
          <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
          <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-wider">ALG 2025 Update</span>
        </div>
        <h1 class="mt-5 text-4xl sm:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">#ALG2025 Registration is Closed!</h1>
        <div class="mt-6 text-base sm:text-lg text-gray-700 dark:text-gray-300 space-y-4 max-w-3xl">
          <p>Thank you to the 200+ guests who have registered for the 2025 Annual Leaders Gathering!</p>
          <p>We can't wait to see you as we dive into deep insights on building together for impact—at the personal level, institutional level, and in partnership with key stakeholders.</p>
          <p>Couldn't register? No problem! #ALG2025 will be streamed live on our key platforms—join the conversation virtually!</p>
          <p><strong>Coming Monday:</strong> Keynote speaker announcement and full program lineup!</p>
          <div class="mt-4 p-4 sm:p-5 rounded-2xl bg-white/80 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 shadow-sm">
            <p class="font-semibold text-gray-900 dark:text-white mb-2">Event Details:</p>
            <ul class="space-y-1.5 text-gray-700 dark:text-gray-300">
              <li>📅 Saturday, 13th December 2025</li>
              <li>📍 Four Points by Sheraton, Kampala</li>
              <li>📺 Live streaming available</li>
            </ul>
          </div>
          <p class="pt-2 text-gray-700 dark:text-gray-300">Registered participants, watch your inbox for details. See you there—in person or online.</p>
        </div>
      </div>
    </div>
  </section>

  <x-footer />
</body>
</html>
