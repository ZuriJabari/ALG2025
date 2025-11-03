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
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">Details coming soon...</p>
      </div>
    </div>
  </section>

  <x-footer />
</body>
</html>
