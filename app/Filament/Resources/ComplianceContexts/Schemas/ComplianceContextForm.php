<?php

namespace App\Filament\Resources\ComplianceContexts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ComplianceContextForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('framework_id')
                    ->label('Framework')
                    ->helperText('Collegamento al framework normativo (es. Security Annex)')
                    ->relationship('framework', 'name')
                    ->required(),
                TextInput::make('title')
                    ->label('Titolo')
                    ->helperText('Titolo della sezione descrittiva')
                    ->required()
                    ->default('Contesto'),
                Textarea::make('description')
                    ->label('Descrizione')
                    ->helperText('Testo esteso che descrive il perimetro normativo e obiettivi')
                    ->columnSpanFull(),
                TextInput::make('interested_parties')
                    ->label('Parti Interessate')
                    ->helperText('Elenco JSON degli stakeholder o parti interessate'),
            ]);
    }
}
