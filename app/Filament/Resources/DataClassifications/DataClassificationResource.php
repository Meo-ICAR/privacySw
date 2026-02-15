<?php

namespace App\Filament\Resources\DataClassifications;

use App\Filament\Resources\DataClassifications\Pages\CreateDataClassification;
use App\Filament\Resources\DataClassifications\Pages\EditDataClassification;
use App\Filament\Resources\DataClassifications\Pages\ListDataClassifications;
use App\Filament\Resources\DataClassifications\Pages\ViewDataClassification;
use App\Filament\Resources\DataClassifications\Schemas\DataClassificationForm;
use App\Filament\Resources\DataClassifications\Schemas\DataClassificationInfolist;
use App\Filament\Resources\DataClassifications\Tables\DataClassificationsTable;
use App\Models\DataClassification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataClassificationResource extends Resource
{
    protected static ?string $model = DataClassification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DataClassificationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DataClassificationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataClassificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataClassifications::route('/'),
            'create' => CreateDataClassification::route('/create'),
            'view' => ViewDataClassification::route('/{record}'),
            'edit' => EditDataClassification::route('/{record}/edit'),
        ];
    }
}
