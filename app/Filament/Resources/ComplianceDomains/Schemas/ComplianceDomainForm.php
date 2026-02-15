<?php

namespace App\Filament\Resources\ComplianceDomains\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ComplianceDomainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome Dominio')
                    ->helperText('Nome del dominio (es. Sicurezza Reti)')
                    ->required(),
                Select::make('framework_id')
                    ->label('Framework')
                    ->helperText('Framework di appartenenza')
                    ->relationship('framework', 'name')
                    ->required(),
            ]);
    }
}
