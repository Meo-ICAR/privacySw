<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\ProjectStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome Progetto')
                    ->helperText('Nome del progetto di valutazione')
                    ->required(),
                Select::make('team_id')
                    ->label('Tenant')
                    ->helperText('Tenant proprietario del progetto')
                    ->relationship('team', 'name')
                    ->required(),
                Select::make('framework_id')
                    ->label('Framework')
                    ->helperText('Framework normativo di riferimento')
                    ->relationship('framework', 'name')
                    ->required(),
                Select::make('status')
                    ->label('Stato')
                    ->helperText('Stato del progetto di compliance')
                    ->options(ProjectStatus::class)
                    ->default('Draft')
                    ->required(),
            ]);
    }
}
