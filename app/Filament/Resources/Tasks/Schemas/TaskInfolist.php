<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

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
                TextEntry::make('assigneeUser.name')
                    ->label('Assingee User'),
                TextEntry::make('project.name')
                    ->label('Project Name'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('creator.name')
                    ->label('Created By Name')
                    ->default(Auth::user()->name),
                TextEntry::make('updater.name')
                    ->label('Updated By Name')
                    ->default(Auth::user()->name),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
