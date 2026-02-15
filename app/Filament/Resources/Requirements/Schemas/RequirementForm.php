<?php

namespace App\Filament\Resources\Requirements\Schemas;

use App\Enums\RequirementSeverity;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RequirementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Codice')
                    ->helperText('Codice identificativo del requisito (es. OWASP-A01)')
                    ->required(),
                TextInput::make('title')
                    ->label('Titolo')
                    ->helperText('Titolo breve del requisito')
                    ->required(),
                Textarea::make('description')
                    ->label('Descrizione')
                    ->helperText('Descrizione dettagliata del controllo richiesto')
                    ->columnSpanFull(),
                Select::make('severity')
                    ->label('Criticità')
                    ->helperText('Livello di criticità del requisito')
                    ->options(RequirementSeverity::class)
                    ->required(),
                Toggle::make('mandatory')
                    ->label('Obbligatorio')
                    ->helperText('Indica se il requisito è obbligatorio')
                    ->required(),
                TextInput::make('penalty_daily_rate')
                    ->label('Penale Giornaliera')
                    ->helperText('Penale giornaliera in caso di non conformità')
                    ->required()
                    ->numeric()
                    ->default(1000.0),
                Select::make('domain_id')
                    ->label('Dominio')
                    ->helperText('Dominio di appartenenza')
                    ->relationship('domain', 'name')
                    ->required(),
            ]);
    }
}
