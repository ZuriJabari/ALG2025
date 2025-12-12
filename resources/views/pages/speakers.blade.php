<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Speakers – ALG 2025</title>
    @include('partials.analytics')
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('assets/app-production.css') }}?v={{ @file_exists(public_path('assets/app-production.css')) ? @filemtime(public_path('assets/app-production.css')) : time() }}">
        <script type="module" src="{{ asset('assets/app-production.js') }}?v={{ @file_exists(public_path('assets/app-production.js')) ? @filemtime(public_path('assets/app-production.js')) : time() }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .speaker-card { transition: all 0.3s ease; }
        .speaker-card:hover { transform: translateY(-4px); }
        .speaker-card:hover .speaker-image { transform: scale(1.05); }
        .speaker-image { transition: transform 0.5s ease; }
    </style>
</head>
<body class="antialiased bg-slate-950 text-white">
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


        $keynotes = [
            ['name' => 'Magnus Mchunguzi', 'title' => 'Chairperson of the Board, LéO Africa Institute', 'bio' => 'Co-founder and Chairman of the LéO Africa Institute; telecom and technology entrepreneur with 23+ years across Eastern, Western, and Southern Africa. Former senior roles at Ericsson and MTN; CEO of Yellow Dot Africa; YPO member.', 'avatar' => 'assets/speakers-25/Magnus-Mchunguzi.png'],
            ['name' => 'Charles Mudiwa', 'title' => 'CEO & MD, DFCU Bank Uganda', 'bio' => 'Seasoned banker across Eastern and Southern Africa with Standard Bank Group and DFCU. Transformational leader and executive coach known for turnarounds and executive presence.', 'avatar' => 'assets/speakers-25/Charles-Mudiwa.png'],
            ['name' => 'Susan Nsibirwa', 'title' => 'Managing Director, Nation Media Group Uganda', 'bio' => 'Media and communications leader; MD of Nation Media Group Uganda. Former marketing leader at MTN Uganda, DFCU, Vision Group; entrepreneur behind Urge Uganda and Ayiva Consulting.', 'avatar' => 'assets/speakers-25/Susan_Nsibirwa.png'],
        ];

        $moderators = [
            ['name' => 'Raymond Mujuni', 'title' => 'Deputy Director, African Institute for Investigative Journalism', 'bio' => 'International relations and media specialist; Fellow of LéO Africa Institute. Former Head of Current Affairs at Nation Media Group Uganda; Oxford graduate in Diplomatic Studies.', 'avatar' => 'assets/speakers-25/Raymond-Mujuni.png'],
            ['name' => 'Diana Ondoga', 'title' => 'Manager, Corporate Social Investment, Stanbic Bank Uganda', 'bio' => 'Leads Stanbic Bank Ugandas socially beneficial investments; 20+ years in banking and customer care across Stanbic and DFCU.', 'avatar' => 'assets/speakers-25/Diana-Odonga.png'],
            ['name' => 'Edgar Mwine', 'title' => 'Director of Programme & Event Host', 'bio' => 'Project Manager at Konrad Adenauer Stiftung Uganda, overseeing development and execution of KAS activities. YELP Fellow and experienced programme coordinator.', 'avatar' => 'assets/speakers-25/Edgar-Mwine.png'],
            ['name' => 'Kanyomozi Rabwoni', 'title' => 'Co-Host & Co-Director of Program', 'bio' => 'Executive Director of Yambi Community Outreach; media personality and Huduma Fellow of LéO Africa Institute, leading initiatives on period poverty and community impact.', 'avatar' => 'assets/speakers-25/Kanyomozi-Rabwoni.png'],
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
            ['name' => 'Reginald Tumusiime', 'title' => 'CEO & Founder, Capital Savvy', 'bio' => 'Investment and advisory leader focused on Uganda\'s investment facilitation. President of the Blockchain Association of Uganda; former banker at Standard Chartered and Stanbic.', 'avatar' => 'assets/speakers-25/Reginald-Tumusiime.png'],
            ['name' => 'Silajji Kanyesigye', 'title' => 'Managing Partner, RKA & Company', 'bio' => 'FCCA, CPA, seasoned tax advisor with two decades of audit and tax expertise. Former Uganda Revenue Authority officer addressing complex SME revenue administration.', 'avatar' => 'assets/speakers-25/Silajji-Kanyesigye.png'],
            ['name' => 'Lydia Paula Nakigudde', 'title' => 'Manager ESG, MTN Uganda', 'bio' => 'Environmental specialist and project manager ensuring MTN\'s ESG impact. Former environmental consultant at Atacama Consulting, advancing sustainability and governance.', 'avatar' => 'assets/speakers-25/Lydia-Paula.png'],
            ['name' => 'Conrad Mugisha', 'title' => 'Entrepreneur; YELP Fellow', 'bio' => 'Businessman and YELP Fellow with background in banking and audit, bringing operational rigor to private ventures.', 'avatar' => 'assets/speakers-25/Conrad-Mugisha.png'],
            ['name' => 'Okash Mohammed', 'title' => 'Founding Director, Institute of Climate and Environment (ICE), Somalia', 'bio' => 'Founder of ICE Institute; Senior Lecturer at SIMAD University; member of the Global Future Council on Climate and Nature Governance; YELP Fellow and LéO Africa Institute Faculty Member.', 'avatar' => 'assets/speakers-25/Mohamed-Okash.png'],
        ];
    @endphp

    <!-- Hero Section -->
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
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-[0.16em] uppercase">ALG 2025 Speakers</span>
                </div>
                <h1 class="mt-5 text-3xl sm:text-4xl md:text-5xl font-normal tracking-tight text-gray-900 dark:text-white">Speakers</h1>
                <p class="mt-4 text-base sm:text-lg text-gray-700 dark:text-gray-300 max-w-2xl">
                    Meet the distinguished leaders, innovators, and change-makers shaping conversations at ALG 2025.
                </p>
            </div>
        </div>
    </section>

    <!-- Keynote Speakers -->
    <section class="bg-slate-950 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-slate-700 pb-4 mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-white">Keynote Speakers</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach($keynotes as $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="speaker-card group flex flex-col">
                        <div class="aspect-square overflow-hidden bg-slate-800 mb-5">
                            <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="speaker-image w-full h-full object-cover object-top" loading="lazy">
                        </div>
                        <div class="space-y-2 flex-1 flex flex-col">
                            <span class="inline-block px-3 py-1 bg-amber-500 text-slate-900 text-xs font-semibold uppercase tracking-wider w-fit">Keynote</span>
                            <h3 class="text-xl font-bold text-white">{{ $person['name'] }}</h3>
                            @if(!empty($person['title']))
                                <p class="text-amber-400 text-sm font-medium">{{ $person['title'] }}</p>
                            @endif
                            @if(!empty($person['bio']))
                                <p class="text-slate-400 text-sm leading-relaxed line-clamp-4">{{ $person['bio'] }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Moderators -->
    <section class="bg-slate-900 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-slate-700 pb-4 mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-white">Session Moderators</h2>
            </div>

            <div class="grid sm:grid-cols-2 gap-8">
                @foreach($moderators as $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="speaker-card group flex gap-5">
                        <div class="w-28 h-28 flex-shrink-0 overflow-hidden bg-slate-800">
                            <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="speaker-image w-full h-full object-cover" loading="lazy">
                        </div>
                        <div class="space-y-1">
                            <span class="inline-block px-2 py-0.5 bg-slate-700 text-slate-300 text-xs font-semibold uppercase tracking-wider">Moderator</span>
                            <h3 class="text-lg font-bold text-white">{{ $person['name'] }}</h3>
                            @if(!empty($person['title']))
                                <p class="text-slate-400 text-sm">{{ $person['title'] }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- All Speakers -->
    <section class="bg-slate-950 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-slate-700 pb-4 mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-white">Speakers</h2>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($others as $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="speaker-card group">
                        <div class="aspect-square overflow-hidden bg-slate-800 mb-4">
                            <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="speaker-image w-full h-full object-cover" loading="lazy">
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-base font-bold text-white">{{ $person['name'] }}</h3>
                            @if(!empty($person['title']))
                                <p class="text-slate-400 text-sm">{{ $person['title'] }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>
