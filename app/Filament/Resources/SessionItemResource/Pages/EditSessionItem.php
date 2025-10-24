<?php

namespace App\Filament\Resources\SessionItemResource\Pages;

use App\Filament\Resources\SessionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSessionItem extends EditRecord
{
    protected static string $resource = SessionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
