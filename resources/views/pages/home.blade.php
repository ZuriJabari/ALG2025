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

  <x-hero-slider :event="$event"
                 :title="$heroTitle"
                 :description="$heroDesc"
                 :exclude="[2]"
                 :show-partners="true"
                 :full="true"
                 primary-cta-label="Learn more"
                 primary-cta-url="{{ url('/alg-2025') }}" />

</body>
</html>
