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

  @php
    $speakerAvatars = [
      'Edgar Mwine' => 'assets/speakers-25/Edgar-Mwine.png',
      'Kanyomozi Rabwoni' => 'assets/speakers-25/Kanyomozi-Rabwoni.png',
      'Lisa Kanyomozi Rabwoni' => 'assets/speakers-25/Kanyomozi-Rabwoni.png',
      'Awel Uwihanganye' => 'assets/speakers-25/Awel.png',
      'Charles Mudiwa' => 'assets/speakers-25/Charles-Mudiwa.png',
      'Anna Reismann' => 'assets/speakers-25/Anna.png',
      'Raymond Mujuni' => 'assets/speakers-25/Raymond-Mujuni.png',
      'Michael Kayemba' => 'assets/speakers-25/Michael-Kayemba.png',
      'Emmanuel Awori' => 'assets/speakers-25/Awori-Emmanuel.png',
      'Okash Mohammed' => 'assets/speakers-25/Mohamed-Okash.png',
      'Lucy Mbabazi' => 'assets/speakers-25/Lucy-Mbabazi.png',
      'Linda Mutesi' => 'assets/speakers-25/Linda-Mutesi.png',
      'Susan Nsibirwa' => 'assets/speakers-25/Susan_Nsibirwa.png',
      'Angelo Izama' => 'assets/speakers-25/ANgelo-Izama.png',
      'Diana Ondoga' => 'assets/speakers-25/Diana-Odonga.png',
      'Silajji Kanyesigye' => 'assets/speakers-25/Silajji-Kanyesigye.png',
      'Lydia Paula Nakiggude' => 'assets/speakers-25/Lydia-Paula.png',
      'Reginald Tumusime' => 'assets/speakers-25/Reginald-Tumusiime.png',
      'Catherinerose Barreto' => 'assets/speakers-25/Catherinerose-Baretto.png',
      'Conrad Mugisha' => 'assets/speakers-25/Conrad-Mugisha.png',
      'Kwezi Tabaro' => 'assets/speakers-25/Kwezi-Tabaro.png',
    ];
    
    $getAvatar = function($name) use ($speakerAvatars) {
      return isset($speakerAvatars[$name]) && file_exists(public_path($speakerAvatars[$name])) 
        ? asset($speakerAvatars[$name]) 
        : null;
    };
  @endphp

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
        <div class="grid grid-cols-1 gap-8 sm:gap-10 items-start">
          <div class="max-w-2xl">
            <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6 sm:p-8 shadow-sm">
              <h2 class="text-xl sm:text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mb-6">At a glance</h2>
              <div class="space-y-5 text-sm sm:text-base">
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-4">
                  <span class="font-semibold text-teal-700 dark:text-teal-300 min-w-[90px]">Date:</span>
                  <span class="text-gray-700 dark:text-gray-300">Saturday, 13th December 2025</span>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-4">
                  <span class="font-semibold text-teal-700 dark:text-teal-300 min-w-[90px]">Venue:</span>
                  <span class="text-gray-700 dark:text-gray-300">Four Points by Sheraton, Kampala</span>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-4">
                  <span class="font-semibold text-teal-700 dark:text-teal-300 min-w-[90px]">Theme:</span>
                  <span class="text-gray-700 dark:text-gray-300">Building Together For Impact &mdash; Inspiring Excellence Through Transformative Leadership</span>
                </div>
                <div class="pt-4 mt-1 border-t border-gray-200/40 dark:border-slate-700/40">
                  <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    The programme weaves together keynotes, panel conversations, and reflective sessions that bring Africa's emerging and established leaders into dialogue around excellence, partnership, and lasting impact.
                  </p>
                </div>
                <div class="pt-4">
                  <a href="{{ route('download.programme') }}" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full bg-teal-600 text-white text-sm sm:text-base font-semibold hover:bg-teal-500 transition">
                    <span>Download full programme (PDF)</span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="group relative rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-lg sm:shadow-xl overflow-hidden">
              <div class="absolute -inset-6 -z-10 rounded-[28px] bg-gradient-to-r from-teal-500/15 via-cyan-500/10 to-transparent blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
              <div class="relative px-4 sm:px-5 py-3 sm:py-4 flex items-center justify-between gap-3 border-b border-gray-200/80 dark:border-slate-800 bg-slate-900 text-white dark:bg-slate-950/95 backdrop-blur">
                <div class="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm text-white/90">
                  <span class="inline-flex w-6 h-6 rounded-full bg-teal-500/15 text-teal-600 dark:text-teal-400 items-center justify-center"><svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14v16H5z"/></svg></span>
                  <span>Main Programme &mdash; Full schedule</span>
                </div>
                <a href="{{ route('download.programme') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-teal-700 dark:text-teal-300 hover:underline">
                  <span>Download PDF</span>
                  <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/></svg>
                </a>
              </div>
              <div class="relative bg-white dark:bg-slate-950">
                <div class="px-4 sm:px-6 py-5 sm:py-6">
                  <ol class="programme-list space-y-0 text-sm sm:text-[15px] text-gray-800 dark:text-gray-100">
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">10:00 &ndash; 10:20 AM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Arrival &amp; Hosting</p>
                        <p class="mt-1 font-semibold">Guest arrival and settling in</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Programme Director &amp; Event Host: <span class="font-medium">Edgar Mwine</span>, Huduma Fellow &amp; Programme Officer, KAS for Security in Africa, with co-host <span class="font-medium">Lisa Kanyomozi Rabwoni</span>, Huduma Fellow (Class of 2024).</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Edgar Mwine'))<img src="{{ $getAvatar('Edgar Mwine') }}" alt="Edgar Mwine" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Lisa Kanyomozi Rabwoni'))<img src="{{ $getAvatar('Lisa Kanyomozi Rabwoni') }}" alt="Lisa Kanyomozi Rabwoni" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">10:20 &ndash; 10:25 AM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Welcome</p>
                        <p class="mt-1 font-semibold">Welcome remarks</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">By <span class="font-medium">Awel Uwihanganye</span>, Co-founder &amp; Team Lead, LéO Africa Institute.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Awel Uwihanganye'))<img src="{{ $getAvatar('Awel Uwihanganye') }}" alt="Awel Uwihanganye" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">10:25 &ndash; 10:40 AM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Opening keynote</p>
                        <p class="mt-1 font-semibold">Keynote address</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Speaker: <span class="font-medium">Charles Mudiwa</span>, Managing Director, Dfcu Bank.</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Topic: <span class="italic">&ldquo;Excellence as a Standard: Sustaining High-Performance Leadership in Challenging Contexts.&rdquo;</span></p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Charles Mudiwa'))<img src="{{ $getAvatar('Charles Mudiwa') }}" alt="Charles Mudiwa" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">10:40 &ndash; 11:30 AM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Fireside conversation</p>
                        <p class="mt-1 font-semibold">Moderated conversation with keynote speaker</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Joined by <span class="font-medium">Anna Reismann</span>, Country Representative, Konrad Adenauer Stiftung Uganda &amp; South Sudan.</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Moderated by <span class="font-medium">Awel Uwihanganye</span>.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Charles Mudiwa'))<img src="{{ $getAvatar('Charles Mudiwa') }}" alt="Charles Mudiwa" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Anna Reismann'))<img src="{{ $getAvatar('Anna Reismann') }}" alt="Anna Reismann" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Awel Uwihanganye'))<img src="{{ $getAvatar('Awel Uwihanganye') }}" alt="Awel Uwihanganye" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">11:30 &ndash; 11:50 AM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Cultural interlude</p>
                        <p class="mt-1 font-semibold">&ldquo;We Are All Africa!&rdquo; &mdash; Cultural presentation</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">By <span class="font-medium">Joseph Irankunda &amp; Co.</span></p>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">11:50 AM &ndash; 1:10 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Panel I</p>
                        <p class="mt-1 font-semibold">Panel discussion: &ldquo;From Individual Excellence to Collective Impact: Building Strategic Partnerships Across Sectors&rdquo;</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Moderator: <span class="font-medium">Raymond Mujuni</span>, Deputy Director, African Institute for Investigative Journalism; YELP Fellow (Class of 2017).</p>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 font-medium">Panelists:</p>
                        <ul class="mt-1 space-y-1.5 text-gray-700 dark:text-gray-300">
                          <li>&bull; <span class="font-medium">Michael Kayemba</span>, Associate Partner, AXUM.</li>
                          <li>&bull; <span class="font-medium">Emmanuel Awori</span>, Partnerships Lead, LéO Africa Institute.</li>
                          <li>&bull; <span class="font-medium">Okash Mohammed</span>, Director, ICE Institute &mdash; Research, Strategy, Foresight &amp; Policy; YELP Fellow (Class of 2018).</li>
                          <li>&bull; <span class="font-medium">Lucy Mbabazi</span>, Managing Director, Better Than Cash Alliance; Emeritus Board Chair, LéO Africa Institute.</li>
                          <li>&bull; <span class="font-medium">Linda Mutesi</span>, Co-founder, Future Generations Foundation.</li>
                        </ul>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">Includes Q&amp;A and audience engagement.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Raymond Mujuni'))<img src="{{ $getAvatar('Raymond Mujuni') }}" alt="Raymond Mujuni" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Michael Kayemba'))<img src="{{ $getAvatar('Michael Kayemba') }}" alt="Michael Kayemba" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Emmanuel Awori'))<img src="{{ $getAvatar('Emmanuel Awori') }}" alt="Emmanuel Awori" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Okash Mohammed'))<img src="{{ $getAvatar('Okash Mohammed') }}" alt="Okash Mohammed" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Lucy Mbabazi'))<img src="{{ $getAvatar('Lucy Mbabazi') }}" alt="Lucy Mbabazi" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Linda Mutesi'))<img src="{{ $getAvatar('Linda Mutesi') }}" alt="Linda Mutesi" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">1:30 &ndash; 2:30 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Lunch</p>
                        <p class="mt-1 font-semibold">Lunch break &amp; networking</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Open networking opportunity over lunch.</p>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">2:30 &ndash; 2:50 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Artistic reflection</p>
                        <p class="mt-1 font-semibold">&ldquo;The Psalm of Life!&rdquo; &mdash; Musical poetry presentation</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">By <span class="font-medium">Matovu Matia</span> (Poet) and <span class="font-medium">Frank Baguma</span> (Violinist).</p>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">2:50 &ndash; 3:30 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Afternoon keynote</p>
                        <p class="mt-1 font-semibold">Afternoon keynote address</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Speaker: <span class="font-medium">Susan Nsibirwa</span>, Managing Director, Nation Media Group.</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Topic: <span class="italic">&ldquo;Leading with Purpose: The Imperative of Collaborative Leadership in Africa's Next Decade.&rdquo;</span></p>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">Followed by a fireside conversation moderated by <span class="font-medium">Angelo Izama</span>, Team Lead, Verification Registration Services; Faculty Head Emeritus, LéO Africa Institute.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Susan Nsibirwa'))<img src="{{ $getAvatar('Susan Nsibirwa') }}" alt="Susan Nsibirwa" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Angelo Izama'))<img src="{{ $getAvatar('Angelo Izama') }}" alt="Angelo Izama" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">3:30 &ndash; 4:30 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Panel II</p>
                        <p class="mt-1 font-semibold">Panel discussion II: &ldquo;Frontiers of Opportunity: Innovation and Enterprise Growth Where Excellence is the Standard for Success&rdquo;</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Moderator: <span class="font-medium">Diana Ondoga</span>, Manager Corporate Social Investment, Stanbic Bank Uganda.</p>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 font-medium">Panelists:</p>
                        <ul class="mt-1 space-y-1.5 text-gray-700 dark:text-gray-300">
                          <li>&bull; <span class="font-medium">Silajji Kanyesigye</span>, Managing Partner, RKA &amp; Co; tax advisor and certified chartered public accountant.</li>
                          <li>&bull; <span class="font-medium">Lydia Paula Nakiggude</span>, ESG / Sustainability Manager, MTN Uganda.</li>
                          <li>&bull; <span class="font-medium">Reginald Tumusime</span>, Chief Executive Officer, Capital Savvy.</li>
                          <li>&bull; <span class="font-medium">Catherinerose Barreto</span>, Co-founder, Binary Labs.</li>
                          <li>&bull; <span class="font-medium">Conrad Mugisha</span>, Businessman; YELP Fellow (Class of 2017).</li>
                        </ul>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">Includes Q&amp;A and audience engagement.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Diana Ondoga'))<img src="{{ $getAvatar('Diana Ondoga') }}" alt="Diana Ondoga" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Silajji Kanyesigye'))<img src="{{ $getAvatar('Silajji Kanyesigye') }}" alt="Silajji Kanyesigye" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Lydia Paula Nakiggude'))<img src="{{ $getAvatar('Lydia Paula Nakiggude') }}" alt="Lydia Paula Nakiggude" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Reginald Tumusime'))<img src="{{ $getAvatar('Reginald Tumusime') }}" alt="Reginald Tumusime" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Catherinerose Barreto'))<img src="{{ $getAvatar('Catherinerose Barreto') }}" alt="Catherinerose Barreto" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                          @if($getAvatar('Conrad Mugisha'))<img src="{{ $getAvatar('Conrad Mugisha') }}" alt="Conrad Mugisha" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">4:30 &ndash; 4:45 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Entertainment</p>
                        <p class="mt-1 font-semibold">Entertainment break</p>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">4:45 &ndash; 5:00 PM</p>
                      </div>
                      <div class="flex-1 border-l border-teal-100 dark:border-teal-900/50 pl-4 transition-colors duration-300 group-hover:border-teal-400/80">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Closing</p>
                        <p class="mt-1 font-semibold">Closing session</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">With <span class="font-medium">Kwezi Tabaro</span>, Faculty Member, LéO Africa Institute.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                          @if($getAvatar('Kwezi Tabaro'))<img src="{{ $getAvatar('Kwezi Tabaro') }}" alt="Kwezi Tabaro" class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-800 shadow-sm">@endif
                        </div>
                      </div>
                    </li>
                    <li class="group flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4 px-3 sm:px-4 py-4 sm:py-5 border-t border-gray-200/20 dark:border-slate-700/20 first:border-t-0 transition-all duration-200 hover:bg-teal-100/70 dark:hover:bg-slate-700/90">
                      <div class="sm:w-32 md:w-36 lg:w-40 flex-shrink-0">
                        <p class="font-semibold text-teal-700 dark:text-teal-300">5:30 &ndash; 7:00 PM</p>
                      </div>
                      <div class="flex-1 border-l border-gray-200 dark:border-slate-800 pl-4">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">Reception</p>
                        <p class="mt-1 font-semibold">After Gathering reception</p>
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Over teas, coffee, and bites.</p>
                      </div>
                    </li>
                  </ol>
                  <p class="mt-6 text-xs sm:text-sm text-gray-500 dark:text-gray-400">*** Inspiring Excellence Through Transformative Leadership ***</p>
                </div>
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
