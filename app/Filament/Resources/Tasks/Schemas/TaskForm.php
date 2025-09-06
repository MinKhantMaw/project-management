<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description'),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->directory('tasks')
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
                        'pending' => Heroicon::OutlinedClock,
                        'on_hold' => Heroicon::OutlinedPause,
                        'in_progress' => Heroicon::OutlinedPencil,
                        'completed' => Heroicon::OutlinedCheckCircle,
                        'cancelled' => Heroicon::OutlinedXCircle,
                    ])
                    ->grouped()
                    ->default('pending')
                    ->required(),
                ToggleButtons::make('priority')
                    ->options(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'])
                    ->colors([
                        'low' => 'success',
                        'medium' => 'warning',
                        'high' => 'danger',
                    ])
                    ->icons([
                        'low' => Heroicon::OutlinedPencil,
                        'medium' => Heroicon::OutlinedClock,
                        'high' => Heroicon::OutlinedCheckCircle,
                    ])
                    ->default('medium')
                    ->grouped()
                    ->required(),
                DatePicker::make('due_date'),
                Select::make('assigned_user_id')
                    ->searchable()
                    ->preload()
                    ->relationship('assigneeUser', 'name')
                    ->required(),
                Select::make('project_id')
                    ->searchable()
                    ->preload()
                    ->relationship('project', 'name')
                    ->required(),
                Select::make('category_id')
                    ->searchable()
                    ->preload()
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('created_by')
                    ->searchable()
                    ->preload()
                    ->relationship('creator', 'name')
                    ->default(Auth::user()->id)
                    ->required(),
                Select::make('updated_by')
                    ->searchable()
                    ->preload()
                    ->relationship('updater', 'name')
                    ->default(Auth::user()->id)
                    ->required(),
            ]);
    }
}
