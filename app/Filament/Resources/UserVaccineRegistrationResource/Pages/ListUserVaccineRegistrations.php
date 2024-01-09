<?php

namespace App\Filament\Resources\UserVaccineRegistrationResource\Pages;

use App\Constants\VaccineStatus;
use App\Filament\Resources\UserVaccineRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUserVaccineRegistrations extends ListRecords
{
    protected static string $resource = UserVaccineRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->icon('heroicon-m-user-group'),
            'Scheduled' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', VaccineStatus::SCHEDULED)),
            'Not Vaccinated' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', VaccineStatus::NOT_VACCINATED)),
            'Vaccinated' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', VaccineStatus::VACCINATED)),
        ];
    }
}
