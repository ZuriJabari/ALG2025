<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers – ALG</title>
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
        // Fallback to avoid undefined variable in older compiled views
        $groups = [];

        $placeholder = 'assets/speakers-25/placeholder.png';

        $avatarPath = function ($path) use ($placeholder) {
            $candidate = trim($path ?: $placeholder);
            $candidates = [$candidate];
            // Also try removing stray spaces before the extension (e.g., "name .png")
            $candidates[] = str_replace(' .png', '.png', $candidate);

            foreach ($candidates as $option) {
                if (file_exists(public_path($option))) {
                    return asset($option);
                }
            }

            return asset($placeholder);
        };

        $accentKeynote = [
            'pill' => 'bg-amber-100 text-amber-900 dark:bg-amber-800/85 dark:text-amber-50',
            'ring' => 'ring-2 ring-amber-200/90 dark:ring-amber-700/70',
            'gradient' => 'from-amber-50 via-white to-orange-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-950',
            'dot' => 'bg-amber-500',
        ];
        $accentModerators = [
            'pill' => 'bg-indigo-100 text-indigo-900 dark:bg-indigo-800/85 dark:text-indigo-50',
            'ring' => 'ring-1 ring-indigo-200/90 dark:ring-indigo-700/70',
            'gradient' => 'from-indigo-50 via-white to-slate-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-950',
            'dot' => 'bg-indigo-500',
        ];
        $accentDefault = [
            'pill' => 'bg-teal-100 text-teal-900 dark:bg-teal-800/85 dark:text-teal-50',
            'ring' => 'ring-1 ring-teal-200/90 dark:ring-teal-700/70',
            'gradient' => 'from-teal-50 via-white to-cyan-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-950',
            'dot' => 'bg-teal-500',
        ];

        $keynotes = [
            ['name' => 'Magnus Mchunguzi', 'title' => 'Chairperson of the Board, LéO Africa Institute', 'bio' => 'Co-founder and Chairman of the LéO Africa Institute; telecom and technology entrepreneur with 23+ years across Eastern, Western, and Southern Africa. Former senior roles at Ericsson and MTN; CEO of Yellow Dot Africa; YPO member.', 'avatar' => 'assets/speakers-25/Magnus-Mchunguzi.png'],
            ['name' => 'Charles Mudiwa', 'title' => 'CEO & MD, DFCU Bank Uganda', 'bio' => 'Seasoned banker across Eastern and Southern Africa with Standard Bank Group and DFCU. Transformational leader and executive coach known for turnarounds and executive presence.', 'avatar' => 'assets/speakers-25/Charles-Mudiwa.png'],
            ['name' => 'Susan Nsibirwa', 'title' => 'Managing Director, Nation Media Group Uganda', 'bio' => 'Media and communications leader; MD of Nation Media Group Uganda. Former marketing leader at MTN Uganda, DFCU, Vision Group; entrepreneur behind Urge Uganda and Ayiva Consulting.', 'avatar' => 'assets/speakers-25/Susan_Nsibirwa.png'],
        ];

        $moderators = [
            ['name' => 'Raymond Mujuni', 'title' => 'Deputy Director, African Institute for Investigative Journalism', 'bio' => 'International relations and media specialist; Fellow of LéO Africa Institute. Former Head of Current Affairs at Nation Media Group Uganda; Oxford graduate in Diplomatic Studies.', 'avatar' => 'assets/speakers-25/Raymond-Mujuni.png'],
            ['name' => 'Diana Ondoga', 'title' => 'Manager, Corporate Social Investment, Stanbic Bank Uganda', 'bio' => 'Leads Stanbic Bank Uganda’s socially beneficial investments; 20+ years in banking and customer care across Stanbic and DFCU.', 'avatar' => 'assets/speakers-25/Diana-Odonga.png'],
        ];

        $others = [
            ['name' => 'Awel Uwihanganye', 'title' => 'Co-Founder & Programme Lead, LéO Africa Institute', 'bio' => 'Co-Founder & Programme Lead at LéO Africa Institute and Chief Advancement Officer at Makerere University. Former CEO of Uganda National Chamber of Commerce and Industry; Aspen Fellow; Board Member of the African Leadership Initiative.', 'avatar' => 'assets/speakers-25/Awel.png'],
            ['name' => 'Catherinerose Baretto', 'title' => 'Founder, Binary (Labs)', 'bio' => 'Founder of Binary (Labs); Board Member at LéO Africa Institute and multiple global boards. Human capital, innovation, entrepreneurship, and gender advisor for organisations including CARE, UNICEF, and the World Bank.', 'avatar' => 'assets/speakers-25/Catherinerose-Baretto.png'],
            ['name' => 'Lucy Mbabazi', 'title' => 'Managing Director, Better Than Cash Alliance', 'bio' => 'Board Chair Emeritus at LéO Africa Institute; Managing Director of Better Than Cash Alliance. Formerly with Ecobank and VISA; expert in digital payments, financial inclusion, and policy across Africa.', 'avatar' => 'assets/speakers-25/Lucy-Mbabazi.png'],
            ['name' => 'Emmanuel Siryoyi Awori', 'title' => 'Partnerships & Development Lead, LéO Africa Institute', 'bio' => 'Leads strategic partnerships across financial services, manufacturing, and agribusiness. Longtime advocate for leadership development and emerging leaders across Africa.', 'avatar' => 'assets/speakers-25/Awori-Emmanuel.png'],
            ['name' => 'Kwezi Tabaro', 'title' => 'Faculty Member, LéO Africa Institute', 'bio' => 'Deputy Director of LéO Africa Institute in Uganda; a decade developing young leaders in public service. Renowned radio host on foreign affairs and politics; Humphrey Fellow focused on public administration and open government.', 'avatar' => 'assets/speakers-25/Kwezi-Tabaro.png'],
            ['name' => 'Angelo Izama', 'title' => 'Team Lead, VRS/Kwa Wote; Faculty Member, LéO Africa Institute', 'bio' => 'Lawyer, journalist, and Faculty Head Emeritus at LéO Africa Institute. Founder of Fanaka Kwa Wote and Verification & Registration Services; Knight Fellow and Stanford Visiting Scholar.', 'avatar' => 'assets/speakers-25/ANgelo-Izama.png'],
            ['name' => 'Anna Reismann', 'title' => 'Country Director, Uganda & South Sudan, KAS', 'bio' => 'Country Director for Konrad Adenauer Stiftung in Uganda & South Sudan. Former Policy Advisor and Project Manager with extensive work across Central America, Andean region, Mexico, Cuba, and Ukraine.', 'avatar' => 'assets/speakers-25/Anna.png'],
            ['name' => 'Linda Mutesi', 'title' => 'Lawyer & Art Curator', 'bio' => 'Feminist lawyer and advocate; member of Uganda Law Society and East African Law Society. Art curator and social entrepreneur committed to community investment and generational impact.', 'avatar' => 'assets/speakers-25/Linda-Mutesi.png'],
            ['name' => 'Michael Kayemba', 'title' => 'Associate Partner, AXUM Uganda', 'bio' => 'Strategic partnerships leader with 20+ years in health and consulting across MEA. Former Country Director and Global Director of Innovation at GiveDirectly; drives youth skilling and impact ventures.', 'avatar' => 'assets/speakers-25/Michael-Kayemba.png'],
            ['name' => 'Reginald Tumusiime', 'title' => 'CEO & Founder, Capital Savvy', 'bio' => 'Investment and advisory leader focused on Uganda’s investment facilitation. President of the Blockchain Association of Uganda; former banker at Standard Chartered and Stanbic.', 'avatar' => 'assets/speakers-25/Reginald-Tumusiime.png'],
            ['name' => 'Silajji Kanyesigye', 'title' => 'Managing Partner, RKA & Company', 'bio' => 'FCCA, CPA, seasoned tax advisor with two decades of audit and tax expertise. Former Uganda Revenue Authority officer addressing complex SME revenue administration.', 'avatar' => 'assets/speakers-25/Silajji-Kanyesigye.png'],
            ['name' => 'Lydia Paula Nakigudde', 'title' => 'Manager ESG, MTN Uganda', 'bio' => 'Environmental specialist and project manager ensuring MTN’s ESG impact. Former environmental consultant at Atacama Consulting, advancing sustainability and governance.', 'avatar' => 'assets/speakers-25/Lydia-Paula.png'],
            ['name' => 'Conrad Mugisha', 'title' => 'Entrepreneur; YELP Fellow', 'bio' => 'Businessman and YELP Fellow with background in banking and audit, bringing operational rigor to private ventures.', 'avatar' => 'assets/speakers-25/Conrad-Mugisha.png'],
            ['name' => 'Okash Mohammed', 'title' => 'Founding Director, Institute of Climate and Environment (ICE), Somalia', 'bio' => 'Founder of ICE Institute; Senior Lecturer at SIMAD University; member of the Global Future Council on Climate and Nature Governance; YELP Fellow and LéO Africa Institute Faculty Member.', 'avatar' => 'assets/speakers-25/Mohamed-Okash.png'],
            ['name' => 'Edgar Mwine', 'title' => 'Director of Programme & Event Host', 'bio' => 'Project Manager at Konrad Adenauer Stiftung Uganda, overseeing development and execution of KAS activities. YELP Fellow and experienced programme coordinator.', 'avatar' => 'assets/speakers-25/Edgar-Mwine.png'],
            ['name' => 'Kanyomozi Rabwoni', 'title' => 'Co-Host & Co-Director of Program', 'bio' => 'Executive Director of Yambi Community Outreach; media personality and Huduma Fellow of LéO Africa Institute, leading initiatives on period poverty and community impact.', 'avatar' => 'assets/speakers-25/Kanyomozi-Rabwoni.png'],
        ];
    @endphp

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-white via-white to-gray-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-24 -left-32 w-80 h-80 bg-amber-300/20 rounded-full blur-3xl"></div>
            <div class="absolute top-10 right-0 w-96 h-96 bg-teal-300/20 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-position:right -120px top -40px; background-size:820px auto"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="max-w-4xl space-y-6">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/80 dark:bg-slate-900/70 border border-gray-200 dark:border-slate-800 shadow-sm backdrop-blur">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-[0.18em] uppercase">ALG 2025</span>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold tracking-tight text-gray-900 dark:text-white leading-tight">ALG 2025 Distinguished Speakers</h1>
                <p class="text-lg sm:text-xl leading-relaxed text-gray-700 dark:text-gray-300 max-w-3xl">
                    Meet the distinguished leaders, innovators, moderators, and faculty guiding the Annual Leaders Gathering 2025.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('events.2025.programme') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-teal-600 text-white font-semibold shadow-lg shadow-teal-500/20 hover:bg-teal-500 transition">
                        Explore programme
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="/alg-2024" class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-gray-200 dark:border-slate-700 text-gray-800 dark:text-gray-100 font-semibold hover:bg-gray-50 dark:hover:bg-slate-900 transition">
                        View ALG 2024
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Keynote Speakers -->
    <section class="relative overflow-hidden py-24 sm:py-28 bg-gradient-to-b from-white via-gray-50 to-white dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-10 top-16 w-72 h-72 bg-amber-200/25 rounded-full blur-3xl"></div>
            <div class="absolute right-0 bottom-10 w-80 h-80 bg-amber-400/20 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="flex items-start justify-between flex-wrap gap-4">
                <div class="space-y-2">
                    <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">ALG 2025 Speakers</p>
                    <div class="flex items-center gap-3">
                        <h2 class="text-3xl sm:text-4xl font-semibold text-gray-900 dark:text-white">Keynote Speakers</h2>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $accentKeynote['pill'] }} border border-transparent text-sm font-semibold">
                            <span class="w-2 h-2 rounded-full {{ $accentKeynote['dot'] }}"></span>
                            <span class="uppercase tracking-wide">Keynotes</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach($keynotes as $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="group relative overflow-hidden rounded-3xl bg-white dark:bg-slate-900 shadow-[0_30px_80px_-40px_rgba(0,0,0,0.45)] hover:shadow-[0_35px_90px_-40px_rgba(0,0,0,0.55)] transition duration-400 {{ $accentKeynote['ring'] }}">
                        <div class="absolute inset-0 bg-gradient-to-br {{ $accentKeynote['gradient'] }} opacity-90 pointer-events-none transition-opacity duration-500 group-hover:opacity-100"></div>
                        <div class="relative">
                            <div class="aspect-square overflow-hidden rounded-3xl">
                                <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-[1.05]" loading="lazy">
                            </div>
                            <div class="p-7 space-y-3 bg-white/90 dark:bg-slate-950/85 backdrop-blur-xl rounded-3xl -mt-8 mx-4 shadow-xl">
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $accentKeynote['pill'] }} border border-white/40 dark:border-white/10 shadow-sm">
                                    Keynote Speaker
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white leading-tight">{{ $person['name'] }}</h3>
                                    @if(!empty($person['title']))
                                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $person['title'] }}</p>
                                    @endif
                                </div>
                                @if(!empty($person['bio']))
                                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $person['bio'] }}</p>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Moderators & Speakers -->
    <section class="relative overflow-hidden py-22 sm:py-26 bg-gradient-to-b from-white via-gray-50 to-white dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-20 -top-16 w-64 h-64 bg-indigo-200/25 rounded-full blur-3xl"></div>
            <div class="absolute right-10 bottom-0 w-72 h-72 bg-teal-200/25 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
            <!-- Moderators -->
            <div class="space-y-8">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">ALG 2025 Speakers</p>
                        <div class="flex items-center gap-3">
                            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-900 dark:text-white">Moderators</h2>
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $accentModerators['pill'] }} border border-transparent text-sm font-semibold">
                                <span class="w-2 h-2 rounded-full {{ $accentModerators['dot'] }}"></span>
                                <span class="uppercase tracking-wide">Moderators</span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($moderators as $person)
                        @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                        <article class="group relative overflow-hidden rounded-3xl bg-white dark:bg-slate-900 shadow-[0_25px_70px_-45px_rgba(0,0,0,0.55)] hover:shadow-[0_30px_80px_-45px_rgba(0,0,0,0.6)] transition duration-400 {{ $accentModerators['ring'] }}">
                            <div class="absolute inset-0 bg-gradient-to-br {{ $accentModerators['gradient'] }} opacity-75 pointer-events-none transition-opacity duration-500 group-hover:opacity-95"></div>
                            <div class="relative">
                                <div class="aspect-[4/3] overflow-hidden rounded-3xl">
                                    <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-[1.04]" loading="lazy">
                                </div>
                                <div class="p-5 sm:p-6 space-y-3 bg-white/92 dark:bg-slate-950/82 rounded-3xl -mt-6 mx-4 backdrop-blur shadow-lg">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $accentModerators['pill'] }} border border-white/40 dark:border-white/10">
                                        Moderator
                                    </div>
                                    <div class="space-y-1">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white leading-tight">{{ $person['name'] }}</h3>
                                        @if(!empty($person['title']))
                                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $person['title'] }}</p>
                                        @endif
                                    </div>
                                    @if(!empty($person['bio']))
                                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">{{ $person['bio'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <!-- Speakers -->
            <div class="space-y-8">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">ALG 2025 Speakers</p>
                        <div class="flex items-center gap-3">
                            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-900 dark:text-white">Speakers</h2>
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $accentDefault['pill'] }} border border-transparent text-sm font-semibold">
                                <span class="w-2 h-2 rounded-full {{ $accentDefault['dot'] }}"></span>
                                <span class="uppercase tracking-wide">Featured lineup</span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($others as $person)
                        @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                        <article class="group relative overflow-hidden rounded-3xl bg-white dark:bg-slate-900 shadow-[0_20px_60px_-45px_rgba(0,0,0,0.55)] hover:shadow-[0_24px_70px_-45px_rgba(0,0,0,0.6)] transition duration-400 {{ $accentDefault['ring'] }}">
                            <div class="absolute inset-0 bg-gradient-to-br {{ $accentDefault['gradient'] }} opacity-70 pointer-events-none transition-opacity duration-500 group-hover:opacity-90"></div>
                            <div class="relative">
                                <div class="aspect-[4/3] overflow-hidden rounded-3xl">
                                    <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-[1.03]" loading="lazy">
                                </div>
                                <div class="p-5 sm:p-6 space-y-3 bg-white/90 dark:bg-slate-950/82 rounded-3xl -mt-5 mx-4 backdrop-blur shadow-lg">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $accentDefault['pill'] }} border border-white/40 dark:border-white/10">
                                        Speaker
                                    </div>
                                    <div class="space-y-1">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white leading-tight">{{ $person['name'] }}</h3>
                                        @if(!empty($person['title']))
                                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $person['title'] }}</p>
                                        @endif
                                    </div>
                                    @if(!empty($person['bio']))
                                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">{{ $person['bio'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>
