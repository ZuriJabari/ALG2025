<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Annual Leaders Gathering – Home</title>
  @include('partials.analytics')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-slate-950">
  <x-header />

  @php
    $event = \App\Models\Domain\Event::where('year', 2025)->first();
    $heroTitle = 'Introducing the 2025 Annual Leaders Gathering';
    $heroDesc = 'The Annual Leaders Gathering is the LéO Africa Institute’s signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day\'s challenges.';
    $singleSlide = [
      ['src' => asset('assets/hero/hero01.jpg'), 'alt' => 'ALG 2025 hero']
    ];
  @endphp

  <x-hero-slider :event="$event"
                 :slides="$singleSlide"
                 :title="$heroTitle"
                 :description="$heroDesc"
                 :show-partners="true"
                 :full="true"
                 primary-cta-label="Learn more"
                 primary-cta-url="{{ url('/alg-2025') }}" />

</body>
</html>
