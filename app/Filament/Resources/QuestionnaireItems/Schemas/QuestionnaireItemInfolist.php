<?php

namespace App\Filament\Resources\QuestionnaireItems\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class QuestionnaireItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('section.title')
                    ->label('Section'),
                TextEntry::make('subsection_label')
                    ->placeholder('-'),
                TextEntry::make('question_text')
                    ->columnSpanFull(),
                TextEntry::make('help_text')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('input_type')
                    ->badge(),
                IconEntry::make('is_mandatory')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
