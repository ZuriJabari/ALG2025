<footer class="relative bg-gray-900 dark:bg-slate-950 text-white" style="background-image: url('{{ asset('assets/1x/artwork.png') }}'), url('{{ asset('assets/1x/hero-bg1.png') }}'); background-position: right -80px bottom -40px, left -80px bottom -40px; background-repeat: no-repeat, no-repeat; background-size: 780px auto, 780px auto;">
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4">
                <a href="https://leoafricainstitute.org/" target="_blank" rel="noopener" aria-label="LéO Africa Institute" class="inline-flex items-center p-2 rounded-lg transition-transform hover:-translate-y-0.5">
                    <img src="/assets/logos/Leo-Africa-institute.png" alt="LéO Africa Institute" class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:hidden" loading="lazy">
                    <img src="/assets/logos/leo-africa-institute.png" alt="LéO Africa Institute" class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105 hidden dark:block" loading="lazy">
                </a>
                <p class="text-gray-300 text-sm leading-relaxed">The Annual Leaders Gathering is the LéO Africa Institute's signature convening platform. It brings together its growing networks of leaders for significant conversations, networking, and deliberation on actions necessary to address the day's challenges.</p>
            </div>

            <div x-data="{
                    email: '', submitted: false, error: null, loading: false,
                    async submit() {
                        this.loading = true; this.error = null;
                        try {
                            const res = await fetch('{{ route('newsletter.subscribe') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ email: this.email })
                            });
                            if (!res.ok) {
                                const data = await res.json();
                                throw new Error((data.errors && (data.errors.email?.[0] || 'Invalid email')) || 'Subscription failed');
                            }
                            this.submitted = true; this.email = '';
                        } catch (e) {
                            this.error = e.message || 'Something went wrong';
                        } finally {
                            this.loading = false;
                        }
                    }
                }" class="md:col-span-2">
                <h4 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Newsletter</h4>
                <p class="mt-3 text-gray-300 text-sm">Get ALG updates, highlights, and announcements.</p>
                <form class="mt-5 max-w-2xl" @submit.prevent="submit">
                    <div class="flex items-center gap-3">
                        <label for="footer-email" class="sr-only">Email</label>
                        <input id="footer-email" x-model="email" type="email" required placeholder="you@example.com" class="w-full h-12 rounded-full bg-white text-gray-900 placeholder-gray-500 px-5 outline-none transition text-base" />
                        <button type="submit" :disabled="loading" class="shrink-0 inline-flex items-center justify-center h-12 px-7 rounded-full bg-teal-600 text-white font-semibold transition transform hover:-translate-y-0.5 hover:bg-teal-500 disabled:opacity-60 disabled:cursor-not-allowed">
                            <span x-show="!loading">Subscribe</span>
                            <span x-show="loading">Subscribing…</span>
                        </button>
                    </div>
                    <p x-show="submitted" x-transition.opacity.duration.300ms class="mt-3 text-sm text-teal-300">Thanks! You’re on the list.</p>
                    <p x-show="error" x-transition.opacity.duration.300ms class="mt-2 text-sm text-orange-300" x-text="error"></p>
                    <p class="mt-2 text-xs text-gray-400">We respect your privacy.</p>
                </form>

                <div class="mt-8">
                    <h5 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Connect</h5>
                    <div class="mt-3 flex items-center gap-3">
                        <a href="https://x.com/LeoAfricaInst" target="_blank" rel="noopener" aria-label="X (Twitter)" class="group inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2H21l-6.53 7.46L22.5 22h-6.69l-5.24-6.74L4.5 22H2l7.1-8.1L1.5 2h6.86l4.73 6.2L18.244 2Zm-1.17 18h1.86L7.01 4H5.06l12.014 16Z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/LeOAfricaInstitute/" target="_blank" rel="noopener" aria-label="Facebook" class="group inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7H7v-3h3.5V9.5A4.5 4.5 0 0 1 15 5h2.5v3H15a1 1 0 0 0-1 1V12h3.5l-.5 3H14v7A10 10 0 0 0 22 12Z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/leoafricainst/" target="_blank" rel="noopener" aria-label="Instagram" class="group inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.2A2.8 2.8 0 1 0 12 17.8 2.8 2.8 0 0 0 12 9.2Zm5.5-.95a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/company/18203194/admin/page-posts/published/" target="_blank" rel="noopener" aria-label="LinkedIn" class="group inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5ZM.5 8h4V24h-4V8ZM8.5 8h3.8v2.2h.05c.53-1 1.83-2.2 3.77-2.2 4.03 0 4.78 2.65 4.78 6.1V24h-4v-7.1c0-1.7-.03-3.9-2.4-3.9-2.4 0-2.77 1.86-2.77 3.8V24h-4V8Z"/></svg>
                        </a>
                        <a href="https://www.flickr.com/photos/africaforum/" target="_blank" rel="noopener" aria-label="Flickr" class="group inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/5 hover:bg-white/10 text-gray-200 hover:text-white transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><circle cx="7.5" cy="12" r="3.5"/><circle cx="16.5" cy="12" r="3.5"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-semibold tracking-[0.18em] text-teal-400 uppercase">Programs</h4>
                <div class="mt-5 grid grid-cols-1 gap-4">
                    <a href="https://leoafricainstitute.org/huduma/" target="_blank" rel="noopener" class="group flex items-center justify-start gap-4 p-3 h-16 rounded-xl transition transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-start">
                            <img src="/assets/logos/Huduma.png" alt="Huduma Fellowship" class="max-h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105" loading="lazy">
                        </span>
                        <svg class="w-4 h-4 text-white/60 group-hover:text-teal-400 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://leoafricainstitute.org/yelp/" target="_blank" rel="noopener" class="group flex items-center justify-start gap-4 p-3 h-16 rounded-xl transition transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-start">
                            <img src="/assets/logos/Yelp.png" alt="Young & Emerging Leaders Project (YELP)" class="max-h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105" loading="lazy">
                        </span>
                        <svg class="w-4 h-4 text-white/60 group-hover:text-teal-400 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://leoafricareview.com" target="_blank" rel="noopener" class="group flex items-center justify-start gap-4 p-3 h-16 rounded-xl transition transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-start">
                            <img src="{{ asset('assets/logos/Leo-africa-review.svg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/logos/Leo-africa-review.png') }}'" alt="LéO Africa Review" class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105" loading="lazy">
                        </span>
                        <svg class="w-4 h-4 text-white/60 group-hover:text-teal-400 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-gray-400">© 2025 All rights reserved.</p>
            <p class="text-gray-200 text-sm">Crafted with passion by <a href="https://www.index.ug" target="_blank" rel="noopener" class="text-teal-300 hover:text-teal-200 underline-offset-4 hover:underline transition">Index Digital</a></p>
        </div>
    </div>
</footer>
