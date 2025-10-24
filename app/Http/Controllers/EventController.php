<?php

namespace App\Http\Controllers;

use App\Models\Domain\Event;
use App\Models\Domain\Hero;
use App\Settings\HomeSettings;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function redirect()
    {
        $homeSettings = app(HomeSettings::class);
        $year = $homeSettings->current_event_year;
        
        return redirect()->route('events.show', ['year' => $year]);
    }

    public function show($year)
    {
        $query = Event::query()
            ->where('year', $year)
            ->with([
                'media',
                'speakers.media',
                'features',
                'days.sessions.items.speakers',
                'days.sessions.speakers.media',
                'sessions.speakers.media',
            ]);

        // Prefer featured if present, fall back to first event for the year.
        $event = (clone $query)->where('is_featured', true)->first()
            ?? $query->firstOrFail();

        // Resolve hero content: prefer event-specific, else first active global
        $hero = Hero::query()
            ->where(function ($q) use ($event) {
                $q->where('event_id', $event->id)->orWhereNull('event_id');
            })
            ->where('active', true)
            ->orderByRaw('CASE WHEN event_id IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('ordering')
            ->first();

        return view('events.show', [
            'event' => $event,
            'hero' => $hero,
        ]);
    }
}
