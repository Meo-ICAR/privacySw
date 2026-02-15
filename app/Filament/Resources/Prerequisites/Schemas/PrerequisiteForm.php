<?php

namespace App\Filament\Resources\Prerequisites\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PrerequisiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('framework_id')
                    ->label('Framework')
                    ->helperText('Framework di riferimento')
                    ->relationship('framework', 'name')
                    ->required(),
                TextInput::make('section_number')
                    ->label('Capitolo/Sezione')
                    ->helperText('Riferimento numerico nel documento originale (es. 3.1)')
                    ->required(),
                Textarea::make('title')
                    ->label('Titolo')
                    ->helperText('Titolo del prerequisito')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Descrizione')
                    ->helperText('Descrizione dettagliata dell\'obbligo o della procedura richiesta')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
