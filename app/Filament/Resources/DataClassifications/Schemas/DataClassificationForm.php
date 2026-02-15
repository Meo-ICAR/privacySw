<?php

namespace App\Filament\Resources\DataClassifications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DataClassificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Tipologia Dato')
                    ->helperText('Nome leggibile della tipologia di dato (es. Dati Personali)')
                    ->required(),
                Textarea::make('examples')
                    ->label('Esempi')
                    ->helperText('Esempi pratici per aiutare l\'utente a identificare il dato')
                    ->columnSpanFull(),
                Textarea::make('regulations')
                    ->label('Riferimenti Normativi')
                    ->helperText('Riferimenti normativi citati (es. GDPR, Art. 16)')
                    ->columnSpanFull(),
                TextInput::make('classification')
                    ->label('Codice Classificazione')
                    ->helperText('Codice tecnico di classificazione (es. PDMS, TMVS, CAPS)'),
            ]);
    }
}
