<?php

namespace App\Filament\Resources\Assessments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name')
                    ->label('Progetto')
                    ->description('Progetto di valutazione')
                    ->searchable(),
                TextColumn::make('requirement.title')
                    ->label('Requisito')
                    ->description('Controllo verificato')
                    ->searchable(),
                TextColumn::make('effectiveness')
                    ->label('Efficacia')
                    ->description('Livello di attuazione')
                    ->badge(),
                TextColumn::make('deadline_date')
                    ->label('Scadenza')
                    ->description('Scadenza remediation')
                    ->date()
                    ->sortable(),
                TextColumn::make('verified_at')
                    ->label('Verificato')
                    ->description('Data verifica interna')
                    ->dateTime()
                    ->sortable(),
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
