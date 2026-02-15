<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use App\Enums\AssessmentEffectiveness;
use App\Models\Requirement;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AssessmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'assessments';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('requirement_id')
                    ->relationship('requirement', 'code')
                    ->getOptionLabelFromRecordUsing(fn (Requirement $record) => "{$record->code} - {$record->title}")
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('effectiveness')
                    ->options(AssessmentEffectiveness::class)
                    ->required()
                    ->default(AssessmentEffectiveness::Ineffective),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Textarea::make('remediation_plan')
                    ->columnSpanFull(),
                DatePicker::make('deadline_date'),
                DateTimePicker::make('verified_at'),
                SpatieMediaLibraryFileUpload::make('evidence_files')
                    ->collection('evidence_files')
                    ->multiple()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('requirement.code')
                    ->description(fn ($record) => $record->requirement->title)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('effectiveness')
                    ->badge()
                    ->sortable(),
                TextColumn::make('deadline_date')
                    ->date(),
            ])
            ->filters([
                SelectFilter::make('effectiveness')
                    ->options(AssessmentEffectiveness::class),
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
