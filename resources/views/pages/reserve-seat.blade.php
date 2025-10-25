<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Reserve Your Seat – ALG</title>
  @include('partials.analytics')
  <script>(function(){try{var d=localStorage.getItem('darkMode')==='true';document.documentElement.classList.toggle('dark',d);}catch(e){}})();</script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-slate-950">
  <x-header />

  <section class="relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image:url('{{ asset('assets/1x/artwork.png') }}');background-repeat:no-repeat;background-position:right -80px top -40px;background-size:720px auto"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800">
          <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
          <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-wider">Reserve Your Seat</span>
        </div>
        <h1 class="mt-5 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">Join us at #ALG2025</h1>
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">Share your details below to request a seat at the Annual Leaders Gathering. We’ll confirm your reservation by email.</p>
      </div>

      <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Card -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-3xl p-6 sm:p-8">
          <div class="flex items-start justify-between">
            <div>
              <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Request a seat</h2>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Fields marked with * are required.</p>
            </div>
            <div class="hidden sm:inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300 text-xs font-semibold">ALG {{ now()->year }}</div>
          </div>
          <div class="mt-6 h-px bg-gradient-to-r from-transparent via-gray-200 dark:via-slate-800 to-transparent"></div>

          @if(session('status'))
            <div class="mt-6 mb-2 px-4 py-3 rounded-xl bg-teal-50 dark:bg-teal-900/20 text-teal-800 dark:text-teal-200">{{ session('status') }}</div>
          @endif

          <form method="POST" action="{{ route('seat-reservations.store') }}" class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
          @csrf
          <div class="sm:col-span-2">
            <label for="full_name" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Full names</label>
            <input id="full_name" name="full_name" type="text" required value="{{ old('full_name') }}" class="mt-2 w-full h-12 rounded-xl bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-800 px-4 text-gray-900 dark:text-gray-100 outline-none focus:ring-4 focus:ring-teal-500/15 focus:border-teal-500/60" />
            @error('full_name')<p class="mt-1 text-sm text-orange-600">{{ $message }}</p>@enderror
          </div>

          <div>
            <label for="sector" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Choose Sector Participation</label>
            <div class="mt-2 relative">
              <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              <select id="sector" name="sector" required class="appearance-none w-full h-12 rounded-xl bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-800 pl-10 pr-10 text-gray-900 dark:text-gray-100 outline-none transition-colors focus:ring-4 focus:ring-teal-500/15 focus:border-teal-500/60 hover:border-gray-300">
                <option value="" disabled {{ old('sector') ? '' : 'selected' }}>Select sector</option>
                @foreach(['Media','Public/Government','Corporate','Business','Civil Society'] as $opt)
                  <option value="{{ $opt }}" @selected(old('sector')===$opt)>{{ $opt }}</option>
                @endforeach
              </select>
              <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </div>
            @error('sector')<p class="mt-1 text-sm text-orange-600">{{ $message }}</p>@enderror
          </div>

          <div>
            <label for="email" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Email address</label>
            <input id="email" name="email" type="email" required value="{{ old('email') }}" class="mt-2 w-full h-12 rounded-xl bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-800 px-4 text-gray-900 dark:text-gray-100 outline-none focus:ring-4 focus:ring-teal-500/15 focus:border-teal-500/60" />
            @error('email')<p class="mt-1 text-sm text-orange-600">{{ $message }}</p>@enderror
          </div>

          <div>
            <label for="phone" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Phone Number</label>
            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="mt-2 w-full h-12 rounded-xl bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-800 px-4 text-gray-900 dark:text-gray-100 outline-none focus:ring-4 focus:ring-teal-500/15 focus:border-teal-500/60" />
            @error('phone')<p class="mt-1 text-sm text-orange-600">{{ $message }}</p>@enderror
          </div>

          <div class="sm:col-span-2 flex items-center justify-between gap-4 pt-3">
            <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center h-12 px-6 rounded-full border border-gray-200 dark:border-slate-800 text-gray-700 dark:text-gray-200 hover:bg-gray-50/60 dark:hover:bg-slate-800/60 transition-colors">Back</a>
            <button type="submit" class="inline-flex items-center justify-center h-12 px-7 rounded-full bg-teal-600 text-white font-semibold transition-all hover:bg-teal-500 hover:-translate-y-0.5 active:translate-y-0 disabled:opacity-60 disabled:cursor-not-allowed">
              Reserve your seat
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
          </div>

          <p class="sm:col-span-2 mt-3 text-sm text-gray-500 dark:text-gray-400">We respect your privacy. Your information will only be used for ALG reservation and updates.</p>

        </form>
        </div>

        <!-- Aside Card -->
        <aside class="bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 rounded-3xl p-6 sm:p-7">
          <h3 class="text-sm font-semibold tracking-[0.18em] text-teal-600 dark:text-teal-300 uppercase">Why attend</h3>
          <ul class="mt-4 space-y-3 text-gray-700 dark:text-gray-300">
            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span> Significant conversations with leaders shaping Africa’s future</li>
            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span> Curated, high‑value networks across sectors</li>
            <li class="flex items-start gap-3"><span class="mt-1 w-2 h-2 rounded-full bg-teal-500"></span> Actionable insights to drive impact</li>
          </ul>

          <div class="mt-6 h-px bg-gray-200 dark:bg-slate-800"></div>

          <div class="mt-6">
            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Need help?</h4>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Contact our team for assistance with your reservation.</p>
            <a href="mailto:alg@leoafricainstitute.org" class="mt-3 inline-flex items-center gap-2 text-teal-700 dark:text-teal-300 font-semibold hover:underline">alg@leoafricainstitute.org
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
          </div>
        </aside>
      </div>
      </div>
  </section>

  <x-footer />
</body>
</html>
