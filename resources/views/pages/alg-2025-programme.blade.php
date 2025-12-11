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
                  <a href="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" download="FINAL Main Program ALG 2025.pdf" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full bg-teal-600 text-white text-sm sm:text-base font-semibold hover:bg-teal-500 transition">
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
                <a href="{{ asset('assets/1x/FINAL Main Program ALG 2025.pdf') }}" download="FINAL Main Program ALG 2025.pdf" class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-teal-700 dark:text-teal-300 hover:underline">
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
                        <p class="mt-1 text-gray-700 dark:text-gray-300">Programme Director &amp; Event Host: <span class="font-medium">Edgar Mwine</span>, YELP Fellow &amp; Programme Officer, KAS for Security in Africa, with co-host <span class="font-medium">Lisa Kanyomozi Rabwoni</span>, Huduma Fellow (Class of 2024).</p>
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
                        <p class="mt-1 text-gray-700 dark:text-gray-300">With <span class="font-medium">Dr. Abraham Korir Sing’ Oei</span>, Principal Secretary, Ministry of Foreign and Diaspora Affairs (State Department for Foreign Affairs).</p>
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

    <!-- Speakers Section -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 via-white to-teal-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
            Our Speakers
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
            Meet the distinguished leaders, innovators, and changemakers who will share their insights at #ALG2025
          </p>
        </div>

        <!-- Keynote Speakers -->
        <div class="mb-16">
          <div class="flex items-center justify-center gap-3 mb-8">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
            <h3 class="text-2xl font-bold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Keynote Speakers</h3>
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Dr. Korir Sing'oei -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-amber-200 dark:border-amber-900">
              <div class="aspect-[4/3] bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/30 dark:to-amber-800/30 flex items-center justify-center">
                <div class="w-32 h-32 rounded-full bg-amber-300 dark:bg-amber-700 flex items-center justify-center">
                  <span class="text-4xl font-bold text-amber-800 dark:text-amber-200">KS</span>
                </div>
              </div>
              <div class="p-6">
                <div class="inline-block px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-xs font-bold mb-3">
                  KEYNOTE SPEAKER
                </div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Dr. Korir Sing'oei</h4>
                <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 mb-3">Principal Secretary, Ministry of Foreign Affairs, Kenya</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">
                  Legal and policy expert with a focus on human rights law, minority and indigenous rights, decentralization, land and resource governance. PhD in Energy, Environment and Resources Law from the University of Cape Town.
                </p>
              </div>
            </div>

            <!-- Charles Mudiwa -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-amber-200 dark:border-amber-900">
              <div class="aspect-[4/3] bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/30 dark:to-amber-800/30 flex items-center justify-center">
                <div class="w-32 h-32 rounded-full bg-amber-300 dark:bg-amber-700 flex items-center justify-center">
                  <span class="text-4xl font-bold text-amber-800 dark:text-amber-200">CM</span>
                </div>
              </div>
              <div class="p-6">
                <div class="inline-block px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-xs font-bold mb-3">
                  KEYNOTE SPEAKER
                </div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Charles Mudiwa</h4>
                <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 mb-3">CEO & MD, DFCU Bank, Uganda</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">
                  Experienced banker with a career spanning over three decades across Eastern and Southern Africa. Credited as a transformational leader and turn-around expert. Top Executive Coach working with professionals to enhance their Executive presence.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Panel Speakers & Moderators -->
        <div class="mb-12">
          <h3 class="text-2xl font-bold text-teal-600 dark:text-teal-400 text-center mb-8 uppercase tracking-wider">Panel Speakers & Moderators</h3>
          
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Magnus Mchunguzi -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">MM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Magnus Mchunguzi</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Chairperson of the Board, LéO Africa Institute</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Co-founder of LéO Africa Institute. Telecom professional and technology entrepreneur with 23+ years across Eastern, Western and Southern Africa markets.
                </p>
              </div>
            </div>

            <!-- Anna Reismann -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">AR</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Anna Reismann</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Country Director, Uganda & South Sudan, KAS</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Country Director for Uganda & South Sudan with Konrad Adenauer Stiftung. Former Policy Advisor for Central America, Andean countries, Mexico & Cuba.
                </p>
              </div>
            </div>

            <!-- Awel Uwihanganye -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">AU</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Awel Uwihanganye</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Co-Founder, LéO Africa Institute</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Co-Founder and Programme Lead at LéO Africa Institute. Chief Advancement Officer of Makerere University. Aspen Fellow and Board Member of African Leadership Initiative.
                </p>
              </div>
            </div>

            <!-- Catherinerose Baretto -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">CB</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Catherinerose Baretto</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Founder, Binary (Labs)</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Founder of Binary (Labs) focused on upskilling technical talent. Board Member of LéO Africa Institute and several other organizations across Africa.
                </p>
              </div>
            </div>

            <!-- Raymond Mujuni -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-gray-200 dark:border-slate-600">
              <div class="aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800/30 dark:to-gray-700/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-gray-800 dark:text-gray-200">RM</span>
                </div>
              </div>
              <div class="p-5">
                <div class="inline-block px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded text-xs font-bold mb-2">
                  MODERATOR
                </div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Raymond Mujuni</h4>
                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Deputy Director, African Institute for Investigative Journalism</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  International Relations and Media specialist. Former Head of Current Affairs at Nation Media Group Uganda. Masters in Diplomatic Studies from Oxford University.
                </p>
              </div>
            </div>

            <!-- Michael Kayemba -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">MK</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Michael Kayemba</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Associate Partner, AXUM Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Strategic Partnerships professional with 20+ years in health sector. Former Country Director for Uganda and Global Director of Innovation at GiveDirectly.
                </p>
              </div>
            </div>

            <!-- Berna Mugema -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">BM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Berna Mugema</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Team Leader, Inclusive Growth & Innovation, UNDP Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Experienced telecom professional. Coordinated core National ICT initiatives with Ministry of ICT. Engineer with Nokia and Zain Uganda.
                </p>
              </div>
            </div>

            <!-- Alex Naijuka -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">AN</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Alex Naijuka</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Manager, Legal Services & Board Affairs, URA</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Huduma Fellow of LéO Africa Institute. Chartered Governance Professional. 10+ years experience in Uganda and Kenya's legal profession.
                </p>
              </div>
            </div>

            <!-- Lucy Mbabazi -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">LM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Lucy Mbabazi</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Managing Director, Better Than Cash Alliance</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Board Chair Emeritus at LéO Africa Institute. Leading partnership of governments and companies to scale financial inclusion through digital payments.
                </p>
              </div>
            </div>

            <!-- Linda Mutesi -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">LM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Linda Mutesi</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Head of Tourism Marketing, Rwanda Development Board</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Strategic Marketing and Communications Leader with 15+ years in story-telling, brand growth and stakeholder engagement.
                </p>
              </div>
            </div>

            <!-- Susan Nsibirwa -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">SN</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Susan Nsibirwa</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Managing Director, Nation Media Group Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Media and communications leader. Led marketing operations for MTN Uganda, DFCU Uganda, Vision Group. Chair of Uganda Media Owners Association.
                </p>
              </div>
            </div>

            <!-- Angelo Izama -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">AI</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Angelo Izama</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Team Lead, VRS/Kwa Wote</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Lawyer and Journalist. Knight Fellow at Stanford University. Founder of Fanaka Kwa Wote Think Tank. Faculty Head Emeritus of LéO Africa Institute.
                </p>
              </div>
            </div>

            <!-- Diana Ondoga -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-gray-200 dark:border-slate-600">
              <div class="aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800/30 dark:to-gray-700/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-gray-800 dark:text-gray-200">DO</span>
                </div>
              </div>
              <div class="p-5">
                <div class="inline-block px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded text-xs font-bold mb-2">
                  MODERATOR
                </div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Diana Ondoga</h4>
                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Manager, Corporate Social Investment, Stanbic Bank Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Handles Stanbic's investments in socially beneficial and sustainability focused projects. 20+ years in banking industry.
                </p>
              </div>
            </div>

            <!-- Silajji Kanyesigye -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">SK</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Silajji Kanyesigye</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Managing Partner, RKA & Company</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Fellow of ACCA. Certified Public Accountant. Two decades of experience in accounting, audit and tax. Former URA Medium Tax Payers' Officer.
                </p>
              </div>
            </div>

            <!-- Lydia Paula Nakigudde -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">LN</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Lydia Paula Nakigudde</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Manager ESG, MTN Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Environmental specialist and project manager. Ensures MTN's impact covers environment, people and management quality for long-term value.
                </p>
              </div>
            </div>

            <!-- Reginald Tumusiime -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">RT</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Reginald Tumusiime</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">CEO & Founder, Capital Savvy</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Investment and advisory firm CEO. President of Blockchain Association of Uganda. Former banker with Standard Chartered and Stanbic Bank.
                </p>
              </div>
            </div>

            <!-- Conrad Mugisha -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">CM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Conrad Mugisha</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">YELP Fellow, LéO Africa Institute</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Businessman with experience in banking and audit industries. Master's Degree from Strathclyde Business School.
                </p>
              </div>
            </div>

            <!-- Okash Mohammed -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
              <div class="aspect-[4/3] bg-gradient-to-br from-teal-100 to-teal-200 dark:from-teal-900/30 dark:to-teal-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-teal-300 dark:bg-teal-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-teal-800 dark:text-teal-200">OM</span>
                </div>
              </div>
              <div class="p-5">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Okash Mohammed</h4>
                <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 mb-2">Founding Director, ICE Institute, Somalia</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3">
                  Leading policy and action research organization tackling climate and development challenges. YELP Fellow and Faculty Member of LéO Africa Institute.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Event Hosts -->
        <div>
          <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-8 uppercase tracking-wider">Event Hosts</h3>
          
          <div class="grid sm:grid-cols-2 gap-6 max-w-3xl mx-auto">
            <!-- Edgar Mwine -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-purple-200 dark:border-purple-800">
              <div class="aspect-[4/3] bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-purple-300 dark:bg-purple-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-purple-800 dark:text-purple-200">EM</span>
                </div>
              </div>
              <div class="p-5">
                <div class="inline-block px-2 py-0.5 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded text-xs font-bold mb-2">
                  DIRECTOR OF PROGRAM & HOST
                </div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Edgar Mwine</h4>
                <p class="text-xs font-semibold text-purple-600 dark:text-purple-400 mb-2">Project Manager, KAS Uganda</p>
                <p class="text-xs text-gray-600 dark:text-gray-300">
                  YELP Fellow and former Programmes Coordinator of LéO Africa Institute. Oversees development and execution of KAS activities.
                </p>
              </div>
            </div>

            <!-- Lisa Kanyomozi Rabwoni -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-purple-200 dark:border-purple-800">
              <div class="aspect-[4/3] bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 flex items-center justify-center">
                <div class="w-24 h-24 rounded-full bg-purple-300 dark:bg-purple-700 flex items-center justify-center">
                  <span class="text-3xl font-bold text-purple-800 dark:text-purple-200">LR</span>
                </div>
              </div>
              <div class="p-5">
                <div class="inline-block px-2 py-0.5 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded text-xs font-bold mb-2">
                  CO-HOST & CO-DIRECTOR
                </div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Lisa Kanyomozi Rabwoni</h4>
                <p class="text-xs font-semibold text-purple-600 dark:text-purple-400 mb-2">Executive Director, Yambi Community Outreach</p>
                <p class="text-xs text-gray-600 dark:text-gray-300">
                  Huduma Fellow of LéO Africa Institute. Media personality and former Radio/TV Host at Next Media Services.
                </p>
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
