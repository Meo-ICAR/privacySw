<?php

namespace App\Filament\Resources\Requirements\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RequirementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('code'),
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('severity')
                    ->badge(),
                IconEntry::make('mandatory')
                    ->boolean(),
                TextEntry::make('penalty_daily_rate')
                    ->numeric(),
                TextEntry::make('domain.name')
                    ->label('Domain'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
