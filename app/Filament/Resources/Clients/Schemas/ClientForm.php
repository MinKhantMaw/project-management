<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                Textarea::make('address')
                    ->columnSpanFull(),
                ToggleButtons::make('status')
                    ->options(['active' => 'Active', 'in_active' => 'In active'])
                    ->colors(['active' => 'success', 'in_active' => 'danger'])
                    ->default('active')
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
            ]);
    }
}
