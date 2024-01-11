<?php

namespace App\Filament\Widgets;

use App\Constants\VaccineStatus;
use App\Models\UserVaccineRegistration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserVaccineStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Registered User', UserVaccineRegistration::query()->count())
                ->icon('heroicon-m-user-group'),
            Stat::make('Vaccinated User', UserVaccineRegistration::query()->where('status', VaccineStatus::VACCINATED)->count())
                ->icon('heroicon-m-user-group'),
            Stat::make('Not Vaccinated User', UserVaccineRegistration::query()->where('status', VaccineStatus::NOT_VACCINATED)->count())
                ->icon('heroicon-m-user-group'),
            Stat::make('Scheduled User', UserVaccineRegistration::query()->where('status', VaccineStatus::SCHEDULED)->count())
                ->icon('heroicon-m-user-group'),
        ];
    }
}
