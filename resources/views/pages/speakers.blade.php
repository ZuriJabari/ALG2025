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
        $accent = [
            'teal' => [
                'pill' => 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-200',
                'ring' => 'ring-1 ring-teal-100/80 dark:ring-teal-700/50',
                'gradient' => 'from-teal-50 via-white to-cyan-50 dark:from-slate-900 dark:via-slate-900 dark:to-slate-900',
                'dot' => 'bg-teal-500'
            ],
            'amber' => [
                'pill' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-100',
                'ring' => 'ring-1 ring-amber-100/80 dark:ring-amber-700/50',
                'gradient' => 'from-amber-50 via-white to-orange-50 dark:from-slate-900 dark:via-slate-900 dark:to-slate-900',
                'dot' => 'bg-amber-500'
            ],
            'indigo' => [
                'pill' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-100',
                'ring' => 'ring-1 ring-indigo-100/80 dark:ring-indigo-700/50',
                'gradient' => 'from-indigo-50 via-white to-slate-50 dark:from-slate-900 dark:via-slate-900 dark:to-slate-900',
                'dot' => 'bg-indigo-500'
            ],
            'emerald' => [
                'pill' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-100',
                'ring' => 'ring-1 ring-emerald-100/80 dark:ring-emerald-700/50',
                'gradient' => 'from-emerald-50 via-white to-teal-50 dark:from-slate-900 dark:via-slate-900 dark:to-slate-900',
                'dot' => 'bg-emerald-500'
            ],
            'rose' => [
                'pill' => 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-100',
                'ring' => 'ring-1 ring-rose-100/80 dark:ring-rose-700/50',
                'gradient' => 'from-rose-50 via-white to-amber-50 dark:from-slate-900 dark:via-slate-900 dark:to-slate-900',
                'dot' => 'bg-rose-500'
            ],
        ];

        $groups = [
            [
                'title' => 'Leadership & Board',
                'accent' => 'teal',
                'people' => [
                    ['name' => 'Magnus Mchunguzi', 'title' => 'Chairperson of the Board, LéO Africa Institute', 'bio' => 'Co-founder and Chairman of the LéO Africa Institute; telecom and technology entrepreneur with 23+ years across Eastern, Western, and Southern Africa. Former senior roles at Ericsson and MTN; CEO of Yellow Dot Africa; YPO member.', 'avatar' => 'assets/speakers-25/Magnus-Mchunguzi.png'],
                    ['name' => 'Awel Uwihanganye', 'title' => 'Co-Founder & Programme Lead, LéO Africa Institute', 'bio' => 'Co-Founder & Programme Lead at LéO Africa Institute and Chief Advancement Officer at Makerere University. Former CEO of Uganda National Chamber of Commerce and Industry; Aspen Fellow; Board Member of the African Leadership Initiative.', 'avatar' => 'assets/speakers-25/Awel.png'],
                    ['name' => 'Catherinerose Baretto', 'title' => 'Founder, Binary (Labs)', 'bio' => 'Founder of Binary (Labs); Board Member at LéO Africa Institute and multiple global boards. Human capital, innovation, entrepreneurship, and gender advisor for organisations including CARE, UNICEF, and the World Bank.', 'avatar' => 'assets/speakers-25/Catherinerose-Baretto.png'],
                    ['name' => 'Lucy Mbabazi', 'title' => 'Managing Director, Better Than Cash Alliance', 'bio' => 'Board Chair Emeritus at LéO Africa Institute; Managing Director of Better Than Cash Alliance. Formerly with Ecobank and VISA; expert in digital payments, financial inclusion, and policy across Africa.', 'avatar' => 'assets/speakers-25/Lucy-Mbabazi.png'],
                    ['name' => 'Emmanuel Siryoyi Awori', 'title' => 'Partnerships & Development Lead, LéO Africa Institute', 'bio' => 'Leads strategic partnerships across financial services, manufacturing, and agribusiness. Longtime advocate for leadership development and emerging leaders across Africa.', 'avatar' => 'assets/speakers-25/Awori-Emmanuel.png'],
                ],
            ],
            [
                'title' => 'Institute & Faculty',
                'accent' => 'indigo',
                'people' => [
                    ['name' => 'Kwezi Tabaro', 'title' => 'Faculty Member, LéO Africa Institute', 'bio' => 'Deputy Director of LéO Africa Institute in Uganda; a decade developing young leaders in public service. Renowned radio host on foreign affairs and politics; Humphrey Fellow focused on public administration and open government.', 'avatar' => 'assets/speakers-25/Kwezi-Tabaro.png'],
                    ['name' => 'Angelo Izama', 'title' => 'Team Lead, VRS/Kwa Wote; Faculty Member, LéO Africa Institute', 'bio' => 'Lawyer, journalist, and Faculty Head Emeritus at LéO Africa Institute. Founder of Fanaka Kwa Wote and Verification & Registration Services; Knight Fellow and Stanford Visiting Scholar.', 'avatar' => 'assets/speakers-25/ANgelo-Izama.png'],
                    ['name' => 'Anna Reismann', 'title' => 'Country Director, Uganda & South Sudan, KAS', 'bio' => 'Country Director for Konrad Adenauer Stiftung in Uganda & South Sudan. Former Policy Advisor and Project Manager with extensive work across Central America, Andean region, Mexico, Cuba, and Ukraine.', 'avatar' => 'assets/speakers-25/Anna.png'],
                    ['name' => 'Linda Mutesi', 'title' => 'Lawyer & Art Curator', 'bio' => 'Feminist lawyer and advocate; member of Uganda Law Society and East African Law Society. Art curator and social entrepreneur committed to community investment and generational impact.', 'avatar' => 'assets/speakers-25/Linda-Mutesi.png'],
                ],
            ],
            [
                'title' => 'Finance, Enterprise & Media',
                'accent' => 'amber',
                'people' => [
                    ['name' => 'Charles Mudiwa', 'title' => 'CEO & MD, DFCU Bank Uganda', 'bio' => 'Seasoned banker across Eastern and Southern Africa with Standard Bank Group and DFCU. Transformational leader and executive coach known for turnarounds and executive presence.', 'avatar' => 'assets/speakers-25/image (1).png'],
                    ['name' => 'Susan Nsibirwa', 'title' => 'Managing Director, Nation Media Group Uganda', 'bio' => 'Media and communications leader; MD of Nation Media Group Uganda. Former marketing leader at MTN Uganda, DFCU, Vision Group; entrepreneur behind Urge Uganda and Ayiva Consulting.', 'avatar' => 'assets/speakers-25/Susan_Nsibirwa.png'],
                    ['name' => 'Michael Kayemba', 'title' => 'Associate Partner, AXUM Uganda', 'bio' => 'Strategic partnerships leader with 20+ years in health and consulting across MEA. Former Country Director and Global Director of Innovation at GiveDirectly; drives youth skilling and impact ventures.', 'avatar' => 'assets/speakers-25/Michael-Kayemba.png'],
                    ['name' => 'Reginald Tumusiime', 'title' => 'CEO & Founder, Capital Savvy', 'bio' => 'Investment and advisory leader focused on Uganda’s investment facilitation. President of the Blockchain Association of Uganda; former banker at Standard Chartered and Stanbic.', 'avatar' => 'assets/speakers-25/Reginald-Tumusiime.png'],
                    ['name' => 'Silajji Kanyesigye', 'title' => 'Managing Partner, RKA & Company', 'bio' => 'FCCA, CPA, seasoned tax advisor with two decades of audit and tax expertise. Former Uganda Revenue Authority officer addressing complex SME revenue administration.', 'avatar' => 'assets/speakers-25/Silajji-Kanyesigye.png'],
                    ['name' => 'Lydia Paula Nakigudde', 'title' => 'Manager ESG, MTN Uganda', 'bio' => 'Environmental specialist and project manager ensuring MTN’s ESG impact. Former environmental consultant at Atacama Consulting, advancing sustainability and governance.', 'avatar' => 'assets/speakers-25/Lydia-Paula .png'],
                    ['name' => 'Conrad Mugisha', 'title' => 'Entrepreneur; YELP Fellow', 'bio' => 'Businessman and YELP Fellow with background in banking and audit, bringing operational rigor to private ventures.', 'avatar' => 'assets/speakers-25/Conrad-Mugisha.png'],
                ],
            ],
            [
                'title' => 'Policy, Media & Climate',
                'accent' => 'indigo',
                'people' => [
                    ['name' => 'Raymond Mujuni (Moderator)', 'title' => 'Deputy Director, African Institute for Investigative Journalism', 'bio' => 'International relations and media specialist; Fellow of LéO Africa Institute. Former Head of Current Affairs at Nation Media Group Uganda; Oxford graduate in Diplomatic Studies.', 'avatar' => 'assets/speakers-25/Raymond-Mujuni.png'],
                    ['name' => 'Diana Ondoga (Moderator)', 'title' => 'Manager, Corporate Social Investment, Stanbic Bank Uganda', 'bio' => 'Leads Stanbic Bank Uganda’s socially beneficial investments; 20+ years in banking and customer care across Stanbic and DFCU.', 'avatar' => 'assets/speakers-25/Diana-Odonga.png'],
                    ['name' => 'Okash Mohammed', 'title' => 'Founding Director, Institute of Climate and Environment (ICE), Somalia', 'bio' => 'Founder of ICE Institute; Senior Lecturer at SIMAD University; member of the Global Future Council on Climate and Nature Governance; YELP Fellow and LéO Africa Institute Faculty Member.', 'avatar' => 'assets/speakers-25/Mohamed-Okash.png'],
                ],
            ],
            [
                'title' => 'Hosts & Programme Leads',
                'accent' => 'rose',
                'people' => [
                    ['name' => 'Edgar Mwine', 'title' => 'Director of Programme & Event Host', 'bio' => 'Project Manager at Konrad Adenauer Stiftung Uganda, overseeing development and execution of KAS activities. YELP Fellow and experienced programme coordinator.', 'avatar' => 'assets/speakers-25/image (1).png'],
                    ['name' => 'Kanyomozi Rabwoni', 'title' => 'Co-Host & Co-Director of Program', 'bio' => 'Executive Director of Yambi Community Outreach; media personality and Huduma Fellow of LéO Africa Institute, leading initiatives on period poverty and community impact.', 'avatar' => 'assets/speakers-25/image (1).png'],
                ],
            ],
        ];
    @endphp

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-white via-white to-gray-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-position:right -120px top -40px; background-size:820px auto"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-[0.18em] uppercase">ALG 2025</span>
                </div>
                <h1 class="mt-5 text-4xl sm:text-5xl md:text-6xl font-semibold tracking-tight text-gray-900 dark:text-white leading-tight">World-class speakers & hosts</h1>
                <p class="mt-6 text-lg sm:text-xl leading-relaxed text-gray-700 dark:text-gray-300 max-w-3xl">
                    Meet the leaders, innovators, and changemakers shaping the Annual Leaders Gathering 2025—from board chairs and CEOs to moderators, faculty, and hosts.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
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

    <!-- Speaker Groups -->
    <section class="py-14 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14 sm:space-y-16">
            @foreach($groups as $group)
                @php $c = $accent[$group['accent']] ?? $accent['teal']; @endphp
                <div class="space-y-8">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <p class="text-xs font-semibold tracking-[0.18em] uppercase text-gray-500 dark:text-gray-400">ALG 2025 Speakers</p>
                            <h2 class="mt-1 text-3xl sm:text-4xl font-semibold text-gray-900 dark:text-white">{{ $group['title'] }}</h2>
                        </div>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $c['pill'] }} border border-transparent">
                            <span class="w-2 h-2 rounded-full {{ $c['dot'] }}"></span>
                            <span class="text-xs font-semibold uppercase tracking-wide">Featured lineup</span>
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($group['people'] as $person)
                            <article class="group relative overflow-hidden rounded-2xl bg-white dark:bg-slate-900 shadow-xl hover:shadow-2xl transition duration-300 {{ $c['ring'] }}">
                                <div class="absolute inset-0 bg-gradient-to-br {{ $c['gradient'] }} opacity-70 pointer-events-none"></div>
                                <div class="relative">
                                    <div class="aspect-[4/3] overflow-hidden rounded-t-2xl">
                                        <img src="{{ asset($person['avatar']) }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition duration-500" loading="lazy">
                                    </div>
                                    <div class="p-5 sm:p-6 space-y-3">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $c['pill'] }} bg-opacity-80">
                                            {{ $group['title'] }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white leading-tight">{{ $person['name'] }}</h3>
                                            @if(!empty($person['title']))
                                                <p class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $person['title'] }}</p>
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
            @endforeach
        </div>
    </section>

    <x-footer />
</body>
</html>
