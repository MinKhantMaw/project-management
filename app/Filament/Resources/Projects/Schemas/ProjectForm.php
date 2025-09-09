<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                DateTimePicker::make('start_date'),
                DateTimePicker::make('end_date'),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->image(),
                ToggleButtons::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'on_hold' => 'On hold',
                        'in_progress' => 'In progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->colors([
                        'pending' => 'info',
                        'on_hold' => 'warning',
                        'in_progress' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    ])
                    ->icons([
                        'pending' => 'heroicon-o-clock',
                        'on_hold' => 'heroicon-o-pause',
                        'in_progress' => 'heroicon-o-pencil',
                        'completed' => 'heroicon-o-check-circle',
                        'cancelled' => 'heroicon-o-x-circle',
                    ])
                    ->grouped()
                    ->default('pending')
                    ->required(),
                Select::make('created_by')
                    ->searchable()
                    ->default(Auth::user()->id)
                    ->preload()
                    ->relationship('creator', 'name')
                    // ->disabled()
                    ->required(),
                Select::make('updated_by')
                    ->searchable()
                    ->default(Auth::user()->id)
                    ->preload()
                    ->relationship('updater', 'name')
                    // ->disabled()
                    ->required(),
                Select::make('client_id')
                    ->searchable()
                    ->preload()
                    ->relationship('client', 'name')
                    ->required(),
                Select::make('category_id')
                    ->searchable()
                    ->preload()
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }
}
