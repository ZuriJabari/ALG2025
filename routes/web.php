<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Models\Domain\Speaker;
use App\Models\Domain\Event;
use App\Http\Controllers\NewsletterSubscriptionController;

Route::get('/', [EventController::class, 'redirect'])->name('home');
Route::get('/events/{year}', [EventController::class, 'show'])->name('events.show');
Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'store'])->name('newsletter.subscribe');

// Public: Speakers index
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
