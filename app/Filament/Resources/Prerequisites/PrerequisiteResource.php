<?php

namespace App\Filament\Resources\Prerequisites;

use App\Filament\Resources\Prerequisites\Pages\CreatePrerequisite;
use App\Filament\Resources\Prerequisites\Pages\EditPrerequisite;
use App\Filament\Resources\Prerequisites\Pages\ListPrerequisites;
use App\Filament\Resources\Prerequisites\Pages\ViewPrerequisite;
use App\Filament\Resources\Prerequisites\Schemas\PrerequisiteForm;
use App\Filament\Resources\Prerequisites\Schemas\PrerequisiteInfolist;
use App\Filament\Resources\Prerequisites\Tables\PrerequisitesTable;
use App\Models\Prerequisite;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrerequisiteResource extends Resource
{
    protected static ?string $model = Prerequisite::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PrerequisiteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PrerequisiteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrerequisitesTable::configure($table);
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
            'index' => ListPrerequisites::route('/'),
            'create' => CreatePrerequisite::route('/create'),
            'view' => ViewPrerequisite::route('/{record}'),
            'edit' => EditPrerequisite::route('/{record}/edit'),
        ];
    }
}
