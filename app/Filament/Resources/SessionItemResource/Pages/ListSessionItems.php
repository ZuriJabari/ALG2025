<?php

namespace App\Filament\Resources\SessionItemResource\Pages;

use App\Filament\Resources\SessionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSessionItems extends ListRecords
{
    protected static string $resource = SessionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
