<?php

namespace App\Filament\Resources\ComplianceFrameworks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ComplianceFrameworkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome Framework')
                    ->helperText('Nome del framework o normativa')
                    ->required(),
                TextInput::make('version')
                    ->label('Versione')
                    ->helperText('Versione specifica (es. 8.1)'),
                Toggle::make('is_active')
                    ->label('Attivo')
                    ->helperText('Flag per indicare se il framework è attualmente in uso')
                    ->required(),
            ]);
    }
}
