<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speakers - ALG 2025 | LéO Africa Institute</title>
    <meta name="description" content="Meet the distinguished leaders, innovators, and changemakers who will share their insights at #ALG2025">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white dark:bg-slate-900">
  <x-navigation />

  <main>
    <!-- Hero Section -->
    <section class="relative overflow-hidden -mb-6">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('/assets/artwork.png'); background-repeat:no-repeat; background-position:right center; background-size:contain"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="flex flex-col md:flex-row items-end justify-between gap-6">
                <div class="flex-1">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-700 shadow-sm">
                        <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">ALG 2025</span>
                    </div>
                    <h1 class="mt-4 text-4xl sm:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">Speakers</h1>
                    <p class="mt-3 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">Meet the distinguished leaders, innovators, and changemakers who will share their insights at #ALG2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Content -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 via-white to-teal-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Keynote Speakers -->
        <div class="mb-16">
          <div class="flex items-center justify-center gap-3 mb-8">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent"></div>
            <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Keynote Speakers</h2>
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
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Dr. Korir Sing'oei</h3>
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
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Charles Mudiwa</h3>
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
          <h2 class="text-2xl font-bold text-teal-600 dark:text-teal-400 text-center mb-8 uppercase tracking-wider">Panel Speakers & Moderators</h2>
          
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
          <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-8 uppercase tracking-wider">Event Hosts</h2>
          
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
