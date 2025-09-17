<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Tasks\TaskResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TastsRelationManager extends RelationManager
{
    protected static string $relationship = 'tasts';

    protected static ?string $relatedResource = TaskResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
