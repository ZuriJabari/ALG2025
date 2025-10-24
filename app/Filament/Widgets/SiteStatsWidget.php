<?php

namespace App\Filament\Widgets;

use App\Models\Domain\Event;
use App\Models\Domain\Session;
use App\Models\Domain\Speaker;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class SiteStatsWidget extends BaseWidget
{
    protected ?string $heading = 'Site Overview';

    protected function getCards(): array
    {
        return [
            Card::make('Events', (string) Event::count())
                ->description('Total events')
                ->color('success')
                ->icon('heroicon-o-calendar'),
            Card::make('Speakers', (string) Speaker::count())
                ->description('Total speakers')
                ->color('primary')
                ->icon('heroicon-o-user-group'),
            Card::make('Sessions', (string) Session::count())
                ->description('Program sessions')
                ->color('warning')
                ->icon('heroicon-o-presentation-chart-bar'),
            Card::make('Users', (string) User::count())
                ->description('Admin users')
                ->color('gray')
                ->icon('heroicon-o-users'),
        ];
    }
}
