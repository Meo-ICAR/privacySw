<?php

namespace App\Filament\Resources\ComplianceContexts;

use App\Filament\Resources\ComplianceContexts\Pages\CreateComplianceContext;
use App\Filament\Resources\ComplianceContexts\Pages\EditComplianceContext;
use App\Filament\Resources\ComplianceContexts\Pages\ListComplianceContexts;
use App\Filament\Resources\ComplianceContexts\Pages\ViewComplianceContext;
use App\Filament\Resources\ComplianceContexts\Schemas\ComplianceContextForm;
use App\Filament\Resources\ComplianceContexts\Schemas\ComplianceContextInfolist;
use App\Filament\Resources\ComplianceContexts\Tables\ComplianceContextsTable;
use App\Models\ComplianceContext;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ComplianceContextResource extends Resource
{
    protected static ?string $model = ComplianceContext::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ComplianceContextForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ComplianceContextInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComplianceContextsTable::configure($table);
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
            'index' => ListComplianceContexts::route('/'),
            'create' => CreateComplianceContext::route('/create'),
            'view' => ViewComplianceContext::route('/{record}'),
            'edit' => EditComplianceContext::route('/{record}/edit'),
        ];
    }
}
