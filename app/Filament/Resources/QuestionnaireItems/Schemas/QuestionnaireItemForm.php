<?php

namespace App\Filament\Resources\QuestionnaireItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuestionnaireItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label('Sezione')
                    ->relationship('section', 'title')
                    ->required(),
                TextInput::make('subsection_label')
                    ->label('Etichetta Sottosezione')
                    ->helperText('Per raggruppare visivamente (es. "1 - FONTE E TIPOLOGIA")'),
                Textarea::make('question_text')
                    ->label('Testo Domanda')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('help_text')
                    ->label('Testo di Aiuto')
                    ->columnSpanFull(),
                Select::make('input_type')
                    ->label('Tipo Input')
                    ->options([
                        'text' => 'Testo (Riga singola)',
                        'textarea' => 'Testo (Multi-riga)',
                        'date' => 'Data',
                        'boolean' => 'Vero/Falso',
                        'select' => 'Selezione',
                        'header' => 'Intestazione',
                    ])
                    ->default('text')
                    ->required(),
                Toggle::make('is_mandatory')
                    ->label('Obbligatorio')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Ordine')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
