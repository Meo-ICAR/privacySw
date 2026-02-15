<?php

namespace App\Filament\Resources\QuestionnaireSections;

use App\Filament\Resources\QuestionnaireSections\Pages\CreateQuestionnaireSection;
use App\Filament\Resources\QuestionnaireSections\Pages\EditQuestionnaireSection;
use App\Filament\Resources\QuestionnaireSections\Pages\ListQuestionnaireSections;
use App\Filament\Resources\QuestionnaireSections\Pages\ViewQuestionnaireSection;
use App\Filament\Resources\QuestionnaireSections\Schemas\QuestionnaireSectionForm;
use App\Filament\Resources\QuestionnaireSections\Schemas\QuestionnaireSectionInfolist;
use App\Filament\Resources\QuestionnaireSections\Tables\QuestionnaireSectionsTable;
use App\Models\QuestionnaireSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuestionnaireSectionResource extends Resource
{
    protected static ?string $model = QuestionnaireSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return QuestionnaireSectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return QuestionnaireSectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuestionnaireSectionsTable::configure($table);
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
            'index' => ListQuestionnaireSections::route('/'),
            'create' => CreateQuestionnaireSection::route('/create'),
            'view' => ViewQuestionnaireSection::route('/{record}'),
            'edit' => EditQuestionnaireSection::route('/{record}/edit'),
        ];
    }
}
