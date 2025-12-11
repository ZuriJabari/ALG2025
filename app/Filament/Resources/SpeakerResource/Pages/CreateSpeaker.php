<?php

namespace App\Filament\Resources\SpeakerResource\Pages;

use App\Filament\Resources\SpeakerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use App\Models\Domain\EventDay;
use App\Models\Domain\Session;

class CreateSpeaker extends CreateRecord
{
    protected static string $resource = SpeakerResource::class;

    protected array $appearances = [];
    protected array $eventIds = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->appearances = Arr::get($data, 'appearances', []);
        $this->eventIds = Arr::get($data, 'event_ids', []);
        unset($data['appearances']);
        unset($data['event_ids']);
        return $data;
    }

    protected function afterCreate(): void
    {
        // Attach to selected events from Quick Event Assignment
        if (!empty($this->eventIds)) {
            $eventPivot = [];
            foreach ($this->eventIds as $eventId) {
                $eventPivot[(int)$eventId] = ['role' => null, 'ordering' => 0];
            }
            $this->record->events()->sync($eventPivot);
        }

        $dayPivot = [];
        foreach ($this->appearances as $row) {
            $eventId = isset($row['event_id']) ? (int) $row['event_id'] : null;
            $dayId = isset($row['day_id']) ? (int) $row['day_id'] : null;
            if (! $eventId || ! $dayId) {
                continue;
            }

            // Attach speaker to the selected day (per-day role/ordering)
            $dayPivot[$dayId] = [
                'role' => $row['role'] ?? null,
                'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
            ];

            // If a session was selected or quick-added, attach speaker to it
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
        if (! empty($dayPivot)) {
            $this->record->eventDays()->sync($dayPivot);
        }
    }
}
