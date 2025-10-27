<div x-data="{ email:'', loading:false, submitted:false, error:null, async submit(){ if(!this.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)){ this.error='Please enter a valid email.'; return; } this.loading=true; this.error=null; try{ const res = await fetch('{{ route('newsletter.subscribe') }}', { method:'POST', headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' }, body: JSON.stringify({ email:this.email }) }); if(!res.ok){ const d = await res.json(); throw new Error((d.errors && (d.errors.email?.[0]||'Invalid email'))||'Subscription failed'); } this.submitted=true; this.email=''; setTimeout(()=>{ this.submitted=false; }, 2200); }catch(e){ this.error = e.message || 'Something went wrong'; } finally{ this.loading=false; } } }">
    <div class="rounded-2xl bg-white/80 dark:bg-slate-900/80 backdrop-blur px-4 py-3">
        <form @submit.prevent="submit" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2" @keydown.enter.prevent="submit">
            <label for="subscription-email" class="sr-only">Email</label>
            <input id="subscription-email" x-model="email" type="email" required placeholder="you@example.com" class="flex-1 h-11 rounded-full bg-white dark:bg-slate-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 px-4 outline-none text-sm sm:text-base border border-gray-200 dark:border-slate-700" />
            <button type="submit" :disabled="loading" class="inline-flex items-center justify-center h-11 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold transition disabled:opacity-60 whitespace-nowrap hover:shadow-lg">
                <span x-show="!loading">Subscribe</span>
                <span x-show="loading">Subscribing…</span>
            </button>
        </form>
    </div>
    <p x-show="submitted" x-transition.opacity.duration.200ms class="mt-2 text-sm text-teal-600 dark:text-teal-400 text-center" aria-live="polite">✓ Thanks! You're on the list.</p>
    <p x-show="error" x-transition.opacity.duration.200ms x-text="error" class="mt-2 text-sm text-orange-500 dark:text-orange-400 text-center" aria-live="assertive"></p>
</div>
