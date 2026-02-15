<?php

namespace App\Filament\Resources\QuestionnaireSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuestionnaireSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Codice')
                    ->helperText('Es. A, B, C, D')
                    ->required(),
                TextInput::make('title')
                    ->label('Titolo')
                    ->required(),
                Textarea::make('description')
                    ->label('Descrizione')
                    ->helperText('Testi introduttivi o definizioni (es. definizione Mute Calls)')
                    ->columnSpanFull(),
                Toggle::make('is_repeatable')
                    ->label('Ripetibile')
                    ->helperText('Se TRUE, abilita l\'inserimento multiplo (es. più Subappaltatori)')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Ordine')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
