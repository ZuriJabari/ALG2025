<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers - ALG 2025 | LéO Africa Institute</title>
    <meta name="description" content="Meet the distinguished leaders, innovators, and changemakers who will share their insights at #ALG2025">
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
    <!-- Hero Section -->
    <section class="relative min-h-[460px] sm:min-h-[520px] flex items-center overflow-hidden">
        <!-- Background Image with strong dark overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('assets/hero/hero04.jpg') }}" alt="ALG 2025" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/75"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span>
                <span class="text-xs font-semibold text-white tracking-[0.2em] uppercase">ALG 2025 Speakers</span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white tracking-tight">
                Curated voices for
                <span class="block mt-2 text-teal-300">Africa's next decade</span>
            </h1>

            <p class="mt-5 max-w-2xl text-base sm:text-lg text-slate-100/90 leading-relaxed">
                A carefully selected group of leaders, builders, and thinkers shaping the continent's institutions,
                economies, and culture.
            </p>
        </div>
    </section>

    <!-- Speakers Content -->
    <section class="py-20 sm:py-28 bg-gradient-to-br from-slate-50 via-white to-slate-50 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
          <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-gradient-to-r from-teal-50 to-amber-50 dark:from-teal-950/50 dark:to-amber-950/50 border border-teal-200/50 dark:border-teal-800/50 mb-6">
            <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
            </svg>
            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 tracking-wider">FEATURED</span>
          </div>
          <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">
            Keynote Speakers
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Transformational leaders setting the agenda for Africa's future
          </p>
        </div>

        <!-- Keynote Speakers -->
        <div class="mb-24">
          <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <!-- Dr. Korir Sing'oei -->
            <article class="group bg-white dark:bg-slate-900/70 border border-slate-200/70 dark:border-slate-700/70 rounded-2xl px-8 py-8 flex flex-col sm:flex-row gap-6 items-start">
              <div class="shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-teal-600/10 dark:bg-teal-500/10 border border-teal-500/40 flex items-center justify-center">
                  <span class="text-2xl sm:text-3xl font-semibold text-teal-700 dark:text-teal-300">KS</span>
                </div>
              </div>
              <div>
                <p class="text-[11px] font-semibold tracking-[0.18em] uppercase text-teal-600 dark:text-teal-300 mb-2">
                  Keynote Speaker
                </p>
                <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 dark:text-white mb-2">
                  Dr. Korir Sing'oei
                </h3>
                <p class="text-sm font-medium text-teal-700 dark:text-teal-200 mb-3">
                  Principal Secretary, Ministry of Foreign Affairs, Kenya
                </p>
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                  Legal and policy expert with a focus on human rights law, minority and indigenous rights, decentralization,
                  land and resource governance. PhD in Energy, Environment and Resources Law from the University of Cape Town.
                </p>
              </div>
            </article>

            <!-- Charles Mudiwa -->
            <article class="group bg-white dark:bg-slate-900/70 border border-slate-200/70 dark:border-slate-700/70 rounded-2xl px-8 py-8 flex flex-col sm:flex-row gap-6 items-start">
              <div class="shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-amber-500/10 dark:bg-amber-400/10 border border-amber-500/40 flex items-center justify-center">
                  <span class="text-2xl sm:text-3xl font-semibold text-amber-700 dark:text-amber-300">CM</span>
                </div>
              </div>
              <div>
                <p class="text-[11px] font-semibold tracking-[0.18em] uppercase text-amber-600 dark:text-amber-300 mb-2">
                  Keynote Speaker
                </p>
                <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 dark:text-white mb-2">
                  Charles Mudiwa
                </h3>
                <p class="text-sm font-medium text-amber-700 dark:text-amber-200 mb-3">
                  CEO &amp; MD, DFCU Bank, Uganda
                </p>
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                  Experienced banker with a career spanning over three decades across Eastern and Southern Africa. Credited as
                  a transformational leader and turn-around expert. Top Executive Coach working with professionals to enhance
                  their executive presence.
                </p>
              </div>
            </article>
          </div>
        </div>

        <!-- Panel Speakers & Moderators -->
        <div class="mb-20">
          <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-gradient-to-r from-teal-50 to-cyan-50 dark:from-teal-950/50 dark:to-cyan-950/50 border border-teal-200/50 dark:border-teal-800/50 mb-6">
              <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
              <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 tracking-wider">EXPERT PANEL</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">
              Panel Speakers & Moderators
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
              Thought leaders driving critical conversations on Africa's development
            </p>
          </div>
          
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
          <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-950/50 dark:to-pink-950/50 border border-purple-200/50 dark:border-purple-800/50 mb-6">
              <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
              </svg>
              <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 tracking-wider">PROGRAM DIRECTORS</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">
              Event Hosts
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
              Guiding the conversation and ensuring a memorable experience
            </p>
          </div>
          
          <div class="grid sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
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
