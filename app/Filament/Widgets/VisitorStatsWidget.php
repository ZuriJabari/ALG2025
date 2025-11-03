<?php

namespace App\Filament\Widgets;

use App\Models\PageView;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VisitorStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        if (!Schema::hasTable('page_views')) {
            return [
                Stat::make("Today's Page Views", '0')->description('+0% from yesterday')->color('gray'),
                Stat::make('This Week', '0')->description('+0% from last week')->color('gray'),
                Stat::make('This Month', '0')->description('+0% from last month')->color('gray'),
                Stat::make('Unique Visitors Today', '0')->description('0% mobile traffic')->color('gray'),
            ];
        }

        // Today's views
        $todayViews = PageView::whereDate('viewed_at', today())->count();
        $yesterdayViews = PageView::whereDate('viewed_at', today()->subDay())->count();
        $todayChange = $yesterdayViews > 0 
            ? round((($todayViews - $yesterdayViews) / $yesterdayViews) * 100, 1)
            : 0;

        // This week's views
        $weekViews = PageView::where('viewed_at', '>=', now()->startOfWeek())->count();
        $lastWeekViews = PageView::whereBetween('viewed_at', [
            now()->subWeek()->startOfWeek(),
            now()->subWeek()->endOfWeek()
        ])->count();
        $weekChange = $lastWeekViews > 0 
            ? round((($weekViews - $lastWeekViews) / $lastWeekViews) * 100, 1)
            : 0;

        // This month's views
        $monthViews = PageView::whereMonth('viewed_at', now()->month)
            ->whereYear('viewed_at', now()->year)
            ->count();
        $lastMonthViews = PageView::whereMonth('viewed_at', now()->subMonth()->month)
            ->whereYear('viewed_at', now()->subMonth()->year)
            ->count();
        $monthChange = $lastMonthViews > 0 
            ? round((($monthViews - $lastMonthViews) / $lastMonthViews) * 100, 1)
            : 0;

        // Unique visitors today (by IP)
        $uniqueToday = PageView::whereDate('viewed_at', today())
            ->distinct('ip_address')
            ->count('ip_address');

        // Device breakdown
        $deviceStats = PageView::where('viewed_at', '>=', now()->subDays(30))
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->pluck('count', 'device_type')
            ->toArray();

        $mobilePercent = isset($deviceStats['mobile']) 
            ? round(($deviceStats['mobile'] / array_sum($deviceStats)) * 100, 1)
            : 0;

        return [
            Stat::make('Today\'s Page Views', number_format($todayViews))
                ->description($todayChange >= 0 ? "+{$todayChange}% from yesterday" : "{$todayChange}% from yesterday")
                ->descriptionIcon($todayChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($todayChange >= 0 ? 'success' : 'danger')
                ->chart($this->getLastSevenDaysChart()),

            Stat::make('This Week', number_format($weekViews))
                ->description($weekChange >= 0 ? "+{$weekChange}% from last week" : "{$weekChange}% from last week")
                ->descriptionIcon($weekChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($weekChange >= 0 ? 'success' : 'danger'),

            Stat::make('This Month', number_format($monthViews))
                ->description($monthChange >= 0 ? "+{$monthChange}% from last month" : "{$monthChange}% from last month")
                ->descriptionIcon($monthChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($monthChange >= 0 ? 'success' : 'danger'),

            Stat::make('Unique Visitors Today', number_format($uniqueToday))
                ->description("{$mobilePercent}% mobile traffic")
                ->descriptionIcon('heroicon-m-device-phone-mobile')
                ->color('info'),
        ];
    }

    private function getLastSevenDaysChart(): array
    {
        if (!Schema::hasTable('page_views')) {
            return [0,0,0,0,0,0,0];
        }
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $count = PageView::whereDate('viewed_at', $date)->count();
            $data[] = $count;
        }
        return $data;
    }
}
