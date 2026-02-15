<?php

namespace App\Filament\Resources\Requirements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RequirementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Codice')
                    ->description('Codice identificativo del requisito')
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Titolo')
                    ->description('Titolo breve del requisito')
                    ->searchable(),
                TextColumn::make('severity')
                    ->label('Criticità')
                    ->badge(),
                IconColumn::make('mandatory')
                    ->label('Obbligatorio')
                    ->tooltip('Indica se il requisito è obbligatorio')
                    ->boolean(),
                TextColumn::make('penalty_daily_rate')
                    ->label('Penale')
                    ->description('Penale giornaliera')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('domain.name')
                    ->label('Dominio')
                    ->description('Dominio di appartenenza')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
