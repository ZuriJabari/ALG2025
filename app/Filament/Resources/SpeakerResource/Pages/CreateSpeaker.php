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
    protected ?int $primaryEventId = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->appearances = Arr::get($data, 'appearances', []);
        $this->primaryEventId = isset($data['primary_event_id']) ? (int) $data['primary_event_id'] : null;
        unset($data['appearances']);
        unset($data['primary_event_id']);
        return $data;
    }

    protected function afterCreate(): void
    {
        // Attach to required primary event
        if ($this->primaryEventId) {
            $this->record->events()->syncWithoutDetaching([
                $this->primaryEventId => ['role' => null, 'ordering' => 0],
            ]);
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
