<?php

namespace App\Filament\Resources\Prerequisites\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrerequisiteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('framework.name')
                    ->label('Framework'),
                TextEntry::make('section_number'),
                TextEntry::make('title')
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
