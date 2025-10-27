<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About ALG</title>
    @include('partials.analytics')
    <script>
        (function(){
            try { var persisted = localStorage.getItem('darkMode');
                var isDark = persisted === 'true';
                document.documentElement.classList.toggle('dark', !!isDark);
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-slate-950" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="document.documentElement.classList.toggle('dark', darkMode); $watch('darkMode', v => { document.documentElement.classList.toggle('dark', v); try{ localStorage.setItem('darkMode', v ? 'true':'false') }catch(e){} })">
    <x-header />

    <section class="relative overflow-hidden bg-gradient-to-b from-white via-white to-gray-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'); background-repeat:no-repeat; background-position:right -120px top -40px; background-size:820px auto"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-slate-900/60 border border-gray-200 dark:border-slate-800">
                    <span class="w-2 h-2 rounded-full" style="background:#00C2B3"></span>
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200 tracking-wider">About ALG</span>
                </div>
                <h1 class="mt-5 text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white">What is the Annual Leaders Gathering?</h1>
                <p class="mt-6 text-lg sm:text-xl leading-relaxed text-gray-700 dark:text-gray-300">The Annual Leaders Gathering is the LéO Africa Institute’s signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day's challenges.</p>
                <p class="mt-4 text-lg sm:text-xl leading-relaxed text-gray-700 dark:text-gray-300">Fellows of the Institute, emerging leaders in the public and private sector, as well as the Institute’s extended network across Africa, convene to reflect on the challenges facing society today and explore how different networks of innovators, entrepreneurs, and decision-makers can come together to address them.</p>

                <div class="mt-8 flex flex-wrap items-center gap-3"
                     x-data="{ open:false, email:'', loading:false, submitted:false, error:null, openToggle(){ this.open=!this.open; if(this.open){ this.$nextTick(()=> this.$refs.aboutEmail?.focus()); } }, async submit(){ if(!this.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)){ this.error='Please enter a valid email.'; return; } this.loading=true; this.error=null; try{ const res = await fetch('{{ route('newsletter.subscribe') }}', { method:'POST', headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' }, body: JSON.stringify({ email:this.email }) }); if(!res.ok){ const d = await res.json(); throw new Error((d.errors && (d.errors.email?.[0]||'Invalid email'))||'Subscription failed'); } this.submitted=true; this.email=''; setTimeout(()=>{ this.submitted=false; this.open=false; }, 2200); }catch(e){ this.error = e.message || 'Something went wrong'; } finally{ this.loading=false; } } }">
                    <a href="{{ route('speakers.index') }}" class="shrink-0 whitespace-nowrap inline-flex items-center gap-2 h-12 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold transition hover:-translate-y-0.5">Explore Speakers</a>
                    <button type="button" @click="openToggle()" :aria-expanded="open.toString()" class="shrink-0 whitespace-nowrap inline-flex items-center gap-2 h-12 px-6 rounded-full border border-teal-600/40 dark:border-teal-400/40 text-teal-700 dark:text-teal-300 hover:bg-teal-50/50 dark:hover:bg-slate-900/50 transition">Get updates</button>
                    <div class="basis-full w-full" x-show="open"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-1 scale-95">
                        <div class="mt-2 rounded-2xl bg-white/80 backdrop-blur px-3 py-2">
                            <form @submit.prevent="submit" class="flex items-center gap-2" @keydown.enter.prevent="submit">
                                <label for="about-email" class="sr-only">Email</label>
                                <input id="about-email" x-ref="aboutEmail" x-model="email" type="email" required placeholder="you@example.com" class="w-full sm:w-96 h-12 rounded-full bg-white text-gray-900 placeholder-gray-500 px-4 outline-none text-base" />
                                <button type="submit" :disabled="loading" class="inline-flex items-center justify-center h-12 px-6 rounded-full bg-teal-600 text-white font-semibold transition disabled:opacity-60">
                                    <span x-show="!loading">Subscribe</span>
                                    <span x-show="loading">Subscribing…</span>
                                </button>
                            </form>
                            <p x-show="submitted" x-transition.opacity.duration.200ms class="mt-2 text-sm text-teal-700" aria-live="polite">Thanks! You’re on the list.</p>
                            <p x-show="error" x-transition.opacity.duration.200ms x-text="error" class="mt-1 text-sm text-orange-700" aria-live="assertive"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-12">
                <div class="md:col-span-2">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">A Pan‑African Convening of Leaders</h2>
                    <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">ALG convenes a diverse community—fellows of the Institute, emerging leaders in public and private sectors, and an extended network across Africa. Together, they reflect on society’s most pressing challenges and explore how innovators, entrepreneurs, and decision‑makers can collaborate to address them.</p>
                </div>
                <div>
                    <div class="rounded-2xl bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 p-6">
                        <h3 class="text-sm font-semibold tracking-[0.18em] text-teal-600 dark:text-teal-300 uppercase">Essence</h3>
                        <ul class="mt-3 space-y-2 text-gray-700 dark:text-gray-300">
                            <li>Significant conversations</li>
                            <li>Meaningful networks</li>
                            <li>Actionable deliberations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>
