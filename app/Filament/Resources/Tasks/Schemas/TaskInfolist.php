<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('description'),
                ImageEntry::make('image_path')
                    ->disk('public'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('priority')
                    ->badge(),
                TextEntry::make('due_date')
                    ->date(),
                TextEntry::make('assigned_user_id')
                    ->numeric(),
                TextEntry::make('project_id')
                    ->numeric(),
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('created_by')
                    ->numeric(),
                TextEntry::make('updated_by')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
