<?php

namespace App\Filament\Resources\SpeakerResource\Pages;

use App\Filament\Resources\SpeakerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;
use App\Models\Domain\EventDay;
use App\Models\Domain\Session;

class EditSpeaker extends EditRecord
{
    protected static string $resource = SpeakerResource::class;

    protected array $appearances = [];
    protected array $eventIds = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load selected events for Quick Event Assignment
        $data['event_ids'] = $this->record->events->pluck('id')->toArray();

        // Build from day pivots first
        $sessionsByDay = $this->record->sessions->groupBy('day_id');
        $fromDays = $this->record->eventDays->map(function ($day) use ($sessionsByDay) {
            $prefill = [
                'event_id' => $day->event_id,
                'day_id' => $day->id,
                'role' => $day->pivot?->role,
                'ordering' => $day->pivot?->ordering ?? 0,
            ];
            $sess = optional($sessionsByDay->get($day->id))[0] ?? null;
            if ($sess) {
                $prefill['session_id'] = $sess->id;
                $prefill['session_role'] = $sess->pivot?->role;
            }
            return $prefill;
        })->values();

        // Also build from session pivots (covers legacy data missing day pivot)
        $fromSessions = $this->record->sessions->map(function ($session) {
            return [
                'event_id' => $session->event_id,
                'day_id' => $session->day_id,
                'session_id' => $session->id,
                'session_role' => $session->pivot?->role,
                'role' => null,
                'ordering' => $session->pivot?->ordering ?? 0,
            ];
        });

        // Merge and unique by day_id + session_id to avoid duplicates
        $merged = collect($fromDays)->merge($fromSessions)
            ->unique(function ($row) {
                return ($row['day_id'] ?? 'x') . '-' . ($row['session_id'] ?? 'y');
            })
            ->values()
            ->all();

        $data['appearances'] = $merged;
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->appearances = Arr::get($data, 'appearances', []);
        $this->eventIds = Arr::get($data, 'event_ids', []);
        unset($data['appearances']);
        unset($data['event_ids']);
        return $data;
    }

    protected function afterSave(): void
    {
        // Sync selected events from Quick Event Assignment
        if (!empty($this->eventIds)) {
            $eventPivot = [];
            foreach ($this->eventIds as $eventId) {
                $eventPivot[(int)$eventId] = ['role' => null, 'ordering' => 0];
            }
            $this->record->events()->sync($eventPivot);
        } else {
            // If no events selected, detach all
            $this->record->events()->detach();
        }

        $dayPivot = [];
        foreach ($this->appearances as $row) {
            $eventId = isset($row['event_id']) ? (int) $row['event_id'] : null;
            $dayId = isset($row['day_id']) ? (int) $row['day_id'] : null;
            if (! $eventId || ! $dayId) {
                continue;
            }

            $dayPivot[$dayId] = [
                'role' => $row['role'] ?? null,
                'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
            ];

            if (! empty($row['session_id'])) {
                $sessionId = (int) $row['session_id'];
                $this->record->sessions()->syncWithoutDetaching([
                    $sessionId => [
                        'role' => $row['session_role'] ?? null,
                        'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
                    ],
                ]);
            }
        }
        $this->record->eventDays()->sync($dayPivot);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
