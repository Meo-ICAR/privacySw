<?php

namespace App\Filament\Resources\QuestionnaireItems;

use App\Filament\Resources\QuestionnaireItems\Pages\CreateQuestionnaireItem;
use App\Filament\Resources\QuestionnaireItems\Pages\EditQuestionnaireItem;
use App\Filament\Resources\QuestionnaireItems\Pages\ListQuestionnaireItems;
use App\Filament\Resources\QuestionnaireItems\Pages\ViewQuestionnaireItem;
use App\Filament\Resources\QuestionnaireItems\Schemas\QuestionnaireItemForm;
use App\Filament\Resources\QuestionnaireItems\Schemas\QuestionnaireItemInfolist;
use App\Filament\Resources\QuestionnaireItems\Tables\QuestionnaireItemsTable;
use App\Models\QuestionnaireItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuestionnaireItemResource extends Resource
{
    protected static ?string $model = QuestionnaireItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return QuestionnaireItemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return QuestionnaireItemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuestionnaireItemsTable::configure($table);
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
            'index' => ListQuestionnaireItems::route('/'),
            'create' => CreateQuestionnaireItem::route('/create'),
            'view' => ViewQuestionnaireItem::route('/{record}'),
            'edit' => EditQuestionnaireItem::route('/{record}/edit'),
        ];
    }
}
