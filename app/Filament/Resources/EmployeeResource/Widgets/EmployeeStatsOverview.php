<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ina = Country::where('country_code', 'INA')->withCount('employees')->first();
        $uk = Country::where('country_code', 'UK')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('INA Employees', $ina ? $ina->employees_count : 0),
            Card::make('UK Employees', $uk ? $uk->employees_count : 0),
        ];
    }
}
