<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // Stat::make('Number Of User', User::count()),
            // Stat::make('Number Of Clients', Client::count()),
            // Stat::make('Number Of Project', Project::count()),
            // Stat::make('Number Of Task', Task::count())
        ];
    }
}
