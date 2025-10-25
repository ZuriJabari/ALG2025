<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Models\Domain\Speaker;
use App\Models\Domain\Event;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\SeatReservationController;

Route::get('/', [EventController::class, 'redirect'])->name('home');
Route::get('/events/{year}', [EventController::class, 'show'])->name('events.show');
Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'store'])->name('newsletter.subscribe');

// Reserve Seat flow
Route::get('/reserve-seat', [SeatReservationController::class, 'create'])->name('seat-reservations.create');
Route::post('/reserve-seat', [SeatReservationController::class, 'store'])->name('seat-reservations.store');
// Simple CSV export for admin use
Route::get('/admin/export/seat-reservations.csv', [SeatReservationController::class, 'exportCsv'])
    ->middleware(['auth'])
    ->name('admin.export.seat-reservations');

// Public: Speakers index (2025)
Route::get('/speakers', function () {
    $speakers = Speaker::query()
        ->with(['media'])
        ->whereHas('events', function ($q) {
            $q->where('year', 2025);
        })
        ->orderBy('name')
        ->get();
    return view('pages.speakers', compact('speakers'));
})->name('speakers.index');

// Public: ALG 2024 Speakers
Route::get('/alg-2024/speakers', function () {
    $event = Event::where('year', 2024)->first();
    if (!$event) abort(404);
    
    $speakers = $event->days()
        ->with(['speakers' => function($q) {
            $q->with('media');
        }])
        ->get()
        ->flatMap(fn($day) => $day->speakers ?? collect())
        ->unique('id')
        ->sortBy('name')
        ->values();
    
    return view('pages.alg-2024-speakers', compact('event', 'speakers'));
})->name('speakers.alg-2024');

// Friendly shortcut to the 2024 event page if it exists
Route::get('/alg-2024', function () {
    $event = Event::where('year', 2024)->first();
    if ($event) {
        return redirect()->route('events.show', ['year' => 2024]);
    }
    abort(404);
})->name('events.2024');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
