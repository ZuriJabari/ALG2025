<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ALG 2025 – Annual Leaders Gathering</title>
  @include('partials.analytics')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-slate-950">
  <x-header />

  <main>
    @php
      $event = \App\Models\Domain\Event::where('year', 2025)->first();
      $singleSlide = [ ['src' => asset('assets/hero/hero01.jpg'), 'alt' => 'ALG 2025 hero'] ];
      $heroTitle = 'Building Together For Impact';
      $heroSub = 'Inspiring Excellence Through Transformative Leadership';
    @endphp
    <x-hero-slider :event="$event"
                   :slides="$singleSlide"
                   :title="$heroTitle"
                   :description="$heroSub"
                   :show-partners="true"
                   :full="true"
                   primary-cta-label="Reserve your seat"
                   primary-cta-url="{{ url('/reserve-seat') }}" />


    <section class="relative py-12 sm:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
          <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">About the 2025 ALG</h2>
          <div class="mt-4 space-y-4 text-gray-700 dark:text-gray-300 text-[15px] sm:text-base leading-relaxed">
            <p>The Annual Leaders Gathering is LéO Africa Institute/s premier platform for catalyzing conversations on transformative leadership in Africa & the world.</p>
            <p>As we convene the 65th edition, we build on five years of impactful dialogue, collaboration, and leadership development that have brought together changemakers, innovators, and visionaries committed to Africa's progress.</p>
            <p>In an era marked by rapid change, complex challenges, and unprecedented opportunities, the imperative for collaborative and transformative leadership has never been greater. The 2025 gathering recognizes that sustainable impact is not achieved in isolation but through collective effort, shared vision, and a commitment to excellence that transcends individual achievements.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="relative py-12 sm:py-20 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
          <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Contextualising the Theme</h2>
          <p class="mt-2 text-gray-700 dark:text-gray-300">"Building Together for Impact: Inspiring Excellence Through Transformative Leadership" speaks to three critical dimensions of contemporary leadership:</p>
        </div>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Collaboration as Foundation</h3>
            <p class="mt-2 text-gray-700 dark:text-gray-300">Recognizing that the most pressing challenges facing our continent require multi-sectoral partnerships, cross-generational dialogue, and inclusive approaches that harness diverse perspectives and expertise.</p>
          </div>
          <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Impact as Measure</h3>
            <p class="mt-2 text-gray-700 dark:text-gray-300">Moving beyond rhetoric to measurable outcomes, this gathering emphasizes results-oriented leadership that creates tangible change in communities, organizations, and nations.</p>
          </div>
          <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Excellence as Standard</h3>
            <p class="mt-2 text-gray-700 dark:text-gray-300">Inspiring a culture of excellence where transformative leaders set high standards, innovate continuously, and model integrity in all their endeavors.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="relative py-12 sm:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <div class="lg:col-span-1">
            <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Topics & Sessions</h2>
            <p class="mt-2 text-gray-700 dark:text-gray-300">The topics to unpack the main theme through blended panel and keynote discussions</p>
          </div>
          <div class="lg:col-span-2 grid gap-3">
            <div class="rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4">
              <p class="font-medium text-gray-900 dark:text-white">Leading with Purpose: The Imperative of Collaborative Leadership in Africa's Next Decade</p>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4">
              <p class="font-medium text-gray-900 dark:text-white">Excellence as Standard: Sustaining High-Performance Leadership in Challenging Contexts</p>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4">
              <p class="font-medium text-gray-900 dark:text-white">From Individual Excellence to Collective Impact: Building Strategic Partnerships Across Sectors</p>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4">
              <p class="font-medium text-gray-900 dark:text-white">The Next Decade: Youth Leadership, Innovation, and Africa's Transformation Agenda</p>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-4">
              <p class="font-medium text-gray-900 dark:text-white">Networking opportunities and collaborative sessions</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative py-12 sm:py-20 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-baseline justify-between">
          <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Multimedia</h2>
          <a href="https://www.flickr.com/photos/africaforum/" target="_blank" class="inline-flex items-center gap-2 text-teal-700 dark:text-teal-400 hover:underline">
            <span>View more on Flickr</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
          <!-- Highlight Video -->
          <div class="lg:col-span-7">
            <div class="group relative rounded-2xl overflow-hidden border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-lg lg:shadow-2xl">
              <div class="relative aspect-video">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/9OaNTDzFtAE" title="ALG Highlight Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="pointer-events-none absolute inset-0 ring-1 ring-black/5 dark:ring-white/10"></div>
              </div>
              <div class="px-4 sm:px-5 py-3 border-t border-gray-200 dark:border-slate-800">
                <div class="flex items-center gap-2 text-gray-700 dark:text-gray-300 text-sm">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  <span>Highlight Video</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Photo Gallery -->
          <div class="lg:col-span-5">
            @php
              $gallery = [];
              foreach (range(1, 9) as $n) {
                foreach (['avif','webp','jpg','jpeg','png'] as $ext) {
                  $path = public_path(sprintf('assets/hero/hero%02d.%s', $n, $ext));
                  if (file_exists($path)) {
                    $gallery[] = [
                      'src' => asset(sprintf('assets/hero/hero%02d.%s', $n, $ext)),
                      'alt' => 'ALG gallery image '.$n,
                    ];
                    break;
                  }
                }
              }
            @endphp
            <div class="grid grid-cols-3 gap-2 sm:gap-3">
              @foreach(array_slice($gallery, 0, 9) as $g)
                <a href="{{ $g['src'] }}" target="_blank" class="group relative block overflow-hidden rounded-xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950">
                  <img src="{{ $g['src'] }}" alt="{{ $g['alt'] }}" class="w-full h-24 sm:h-28 object-cover transition duration-300 group-hover:scale-[1.03]" loading="lazy">
                  <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                </a>
              @endforeach
              @if(empty($gallery))
                <div class="col-span-3 text-gray-600 dark:text-gray-400 text-sm">Gallery coming soon.</div>
              @endif
            </div>
            <a href="https://www.flickr.com/photos/africaforum/" target="_blank" class="mt-3 inline-flex items-center gap-2 text-teal-700 dark:text-teal-400 hover:underline">
              <span>More photos on Flickr</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>

        <!-- Resources / Contact -->
        <div class="mt-10 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
          <div class="lg:col-span-7"></div>
          <div class="lg:col-span-5 grid gap-4">
            <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reports & other Resources</h3>
              <p class="mt-2 text-gray-700 dark:text-gray-300">Coming soon.</p>
            </div>
            <div class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-950 p-6">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">For more information</h3>
              <div class="mt-2 text-gray-700 dark:text-gray-300">
                <p>LéO Africa Institute</p>
                <p><a href="mailto:al@laoafricainstiute.org" class="text-teal-600 dark:text-teal-400 hover:underline">al@laoafricainstiute.org</a> | <a href="https://www.alg.leoafricainstitute.org" class="text-teal-600 dark:text-teal-400 hover:underline">www.alg.leoafricainstitute.org</a></p>
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
