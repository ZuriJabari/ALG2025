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
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 6s ease-in-out infinite 2s; }
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .speaker-card { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .speaker-card:hover { transform: translateY(-12px) scale(1.02); }
        .speaker-card:hover .speaker-image { transform: scale(1.08); }
        .speaker-card:hover .speaker-overlay { opacity: 0.4; }
        .speaker-card:hover .speaker-glow { opacity: 1; }
        .speaker-image { transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1); }
        .speaker-overlay { transition: opacity 0.5s ease; }
        .speaker-glow { transition: opacity 0.5s ease; opacity: 0; }
        .keynote-card { transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
        .keynote-card:hover { transform: translateY(-16px) scale(1.03); }
        .keynote-card:hover .keynote-image { transform: scale(1.1); }
        .keynote-card:hover .keynote-ring { opacity: 1; transform: scale(1.05); }
        .keynote-image { transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
        .keynote-ring { transition: all 0.6s ease; opacity: 0.5; }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.92);
        }
        .gold-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
        }
        .gold-text {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
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
    <section class="relative min-h-[70vh] flex items-center overflow-hidden bg-slate-950">
        <!-- Animated Background -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-amber-500/20 rounded-full blur-[120px] animate-float"></div>
            <div class="absolute top-20 right-0 w-[600px] h-[600px] bg-teal-500/15 rounded-full blur-[150px] animate-float-delayed"></div>
            <div class="absolute bottom-0 left-1/3 w-[400px] h-[400px] bg-purple-500/10 rounded-full blur-[100px] animate-float"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950"></div>
            <div class="absolute inset-0 opacity-20" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-position:right -100px top -20px; background-size:700px auto"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-4xl space-y-8 animate-fade-in-up">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-xl">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
                    <span class="text-sm font-semibold text-amber-200 tracking-[0.2em] uppercase">ALG 2025</span>
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold tracking-tight leading-[1.1]">
                    <span class="text-white">Distinguished</span><br>
                    <span class="gold-text">Speakers</span>
                </h1>
                <p class="text-xl sm:text-2xl leading-relaxed text-slate-300 max-w-2xl">
                    Meet the visionary leaders, innovators, and change-makers shaping the future at the Annual Leaders Gathering 2025.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('events.2025.programme') }}" class="group inline-flex items-center gap-3 px-7 py-4 rounded-full gold-gradient text-slate-900 font-bold text-lg shadow-2xl shadow-amber-500/25 hover:shadow-amber-500/40 transition-all duration-300 hover:scale-105">
                        Explore Programme
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="/alg-2024" class="inline-flex items-center gap-3 px-7 py-4 rounded-full border-2 border-white/20 text-white font-semibold text-lg hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                        View ALG 2024
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Keynote Speakers -->
    <section class="relative py-28 sm:py-36 bg-slate-950 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-20 top-40 w-[400px] h-[400px] bg-amber-500/15 rounded-full blur-[100px]"></div>
            <div class="absolute right-0 bottom-20 w-[500px] h-[500px] bg-amber-600/10 rounded-full blur-[120px]"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-amber-500/10 border border-amber-500/20 mb-6">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    <span class="text-sm font-semibold text-amber-300 tracking-[0.15em] uppercase">Keynote Speakers</span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Our Distinguished Keynotes</h2>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto">Visionary leaders delivering transformative insights</p>
            </div>

            <!-- Keynote Cards - Large -->
            <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                @foreach($keynotes as $index => $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="keynote-card group relative" style="animation-delay: {{ $index * 0.15 }}s">
                        <!-- Glow Effect -->
                        <div class="keynote-ring absolute -inset-1 bg-gradient-to-r from-amber-400 via-amber-500 to-orange-500 rounded-[2rem] blur-xl"></div>
                        
                        <div class="relative bg-slate-900 rounded-[1.75rem] overflow-hidden border border-amber-500/20">
                            <!-- Image Container -->
                            <div class="relative aspect-[3/4] overflow-hidden">
                                <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="keynote-image w-full h-full object-cover" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
                                
                                <!-- Badge -->
                                <div class="absolute top-5 left-5">
                                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full gold-gradient text-slate-900 text-sm font-bold shadow-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        Keynote
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-8 space-y-4">
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">{{ $person['name'] }}</h3>
                                    @if(!empty($person['title']))
                                        <p class="text-amber-300 font-semibold">{{ $person['title'] }}</p>
                                    @endif
                                </div>
                                @if(!empty($person['bio']))
                                    <p class="text-slate-400 leading-relaxed line-clamp-4">{{ $person['bio'] }}</p>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Moderators -->
    <section class="relative py-24 sm:py-32 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-1/4 top-0 w-[300px] h-[300px] bg-indigo-500/10 rounded-full blur-[80px]"></div>
            <div class="absolute right-0 bottom-1/4 w-[350px] h-[350px] bg-purple-500/10 rounded-full blur-[100px]"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 mb-6">
                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>
                    <span class="text-sm font-semibold text-indigo-300 tracking-[0.15em] uppercase">Moderators</span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Session Moderators</h2>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto">Expert facilitators guiding our conversations</p>
            </div>

            <!-- Moderator Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($moderators as $index => $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="speaker-card group relative bg-slate-800/50 rounded-2xl overflow-hidden border border-slate-700/50 hover:border-indigo-500/50" style="animation-delay: {{ $index * 0.1 }}s">
                        <!-- Glow -->
                        <div class="speaker-glow absolute -inset-px bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl blur-lg"></div>
                        
                        <div class="relative bg-slate-800/90 rounded-2xl overflow-hidden">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="speaker-image w-full h-full object-cover" loading="lazy">
                                <div class="speaker-overlay absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent opacity-60"></div>
                                
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-500/90 text-white text-sm font-semibold backdrop-blur-sm">
                                        Moderator
                                    </span>
                                </div>
                            </div>
                            
                            <div class="p-6 space-y-3">
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-1">{{ $person['name'] }}</h3>
                                    @if(!empty($person['title']))
                                        <p class="text-indigo-300 text-sm font-medium">{{ $person['title'] }}</p>
                                    @endif
                                </div>
                                @if(!empty($person['bio']))
                                    <p class="text-slate-400 text-sm leading-relaxed line-clamp-3">{{ $person['bio'] }}</p>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- All Speakers -->
    <section class="relative py-24 sm:py-32 bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-20 top-1/3 w-[400px] h-[400px] bg-teal-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute right-0 top-0 w-[300px] h-[300px] bg-cyan-500/10 rounded-full blur-[80px]"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-teal-500/10 border border-teal-500/20 mb-6">
                    <span class="w-2 h-2 rounded-full bg-teal-400"></span>
                    <span class="text-sm font-semibold text-teal-300 tracking-[0.15em] uppercase">Featured Speakers</span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Our Speakers</h2>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto">Industry leaders and experts sharing their knowledge</p>
            </div>

            <!-- Speaker Cards -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($others as $index => $person)
                    @php $avatar = $avatarPath($person['avatar'] ?? null); @endphp
                    <article class="speaker-card group relative bg-slate-900/50 rounded-xl overflow-hidden border border-slate-800 hover:border-teal-500/50" style="animation-delay: {{ $index * 0.05 }}s">
                        <div class="speaker-glow absolute -inset-px bg-gradient-to-r from-teal-500 to-cyan-500 rounded-xl blur-lg"></div>
                        
                        <div class="relative bg-slate-900 rounded-xl overflow-hidden">
                            <div class="relative aspect-square overflow-hidden">
                                <img src="{{ $avatar }}" alt="{{ $person['name'] }}" class="speaker-image w-full h-full object-cover" loading="lazy">
                                <div class="speaker-overlay absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-50"></div>
                                
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-teal-500/90 text-white text-xs font-semibold backdrop-blur-sm">
                                        Speaker
                                    </span>
                                </div>
                            </div>
                            
                            <div class="p-5 space-y-2">
                                <h3 class="text-lg font-bold text-white">{{ $person['name'] }}</h3>
                                @if(!empty($person['title']))
                                    <p class="text-teal-300 text-sm font-medium line-clamp-2">{{ $person['title'] }}</p>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>
