<?php

namespace App\Filament\Resources\SeatReservationResource\Pages;

use App\Filament\Resources\SeatReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class SendEmails extends ListRecords
{
    protected static string $resource = SeatReservationResource::class;
}
