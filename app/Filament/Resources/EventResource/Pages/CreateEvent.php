<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use App\Models\Domain\Speaker;
use App\Models\Domain\EventDay;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected array $inlineSpeakers = [];
    protected array $inlineDays = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->inlineSpeakers = Arr::get($data, 'new_speakers', []);
        $this->inlineDays = Arr::get($data, 'new_days', []);
        unset($data['new_speakers']);
        unset($data['new_days']);
        return $data;
    }

    protected function afterCreate(): void
    {
        if (empty($this->inlineSpeakers)) {
            // no-op
        } else {
            $attach = [];
            foreach ($this->inlineSpeakers as $row) {
                $speaker = Speaker::create([
                    'name' => $row['name'] ?? 'Unnamed Speaker',
                    'title' => $row['title'] ?? null,
                    'company' => $row['company'] ?? null,
                    'category' => $row['category'] ?? null,
                    'twitter' => $row['twitter'] ?? null,
                    'linkedin' => $row['linkedin'] ?? null,
                    'website' => $row['website'] ?? null,
                    'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
                ]);

                // Attach headshot if uploaded in repeater
                if (!empty($row['headshot'])) {
                    try {
                        $speaker
                            ->addMediaFromDisk($row['headshot'], 'public')
                            ->toMediaCollection('headshot');
                    } catch (\Throwable $e) {
                        // Swallow to avoid breaking creation; image can be added later in Speaker resource
                    }
                }

                $attach[$speaker->id] = [
                    'role' => $row['event_role'] ?? null,
                    'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
                ];
            }

            if (! empty($attach)) {
                $this->record->speakers()->attach($attach);
            }
        }

        if (! empty($this->inlineDays)) {
            foreach ($this->inlineDays as $row) {
                $title = trim((string) ($row['title'] ?? ''));
                if ($title === '') {
                    continue;
                }
                EventDay::create([
                    'event_id' => $this->record->id,
                    'title' => $title,
                    'date_text' => $row['date_text'] ?? null,
                    'ordering' => isset($row['ordering']) ? (int) $row['ordering'] : 0,
                ]);
            }
        }
    }
}
