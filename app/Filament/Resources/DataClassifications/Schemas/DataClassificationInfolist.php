<?php

namespace App\Filament\Resources\DataClassifications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DataClassificationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('examples')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('regulations')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('classification')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
