<?php

namespace App\Filament\Resources\ComplianceDomains;

use App\Filament\Resources\ComplianceDomains\Pages\CreateComplianceDomain;
use App\Filament\Resources\ComplianceDomains\Pages\EditComplianceDomain;
use App\Filament\Resources\ComplianceDomains\Pages\ListComplianceDomains;
use App\Filament\Resources\ComplianceDomains\Pages\ViewComplianceDomain;
use App\Filament\Resources\ComplianceDomains\Schemas\ComplianceDomainForm;
use App\Filament\Resources\ComplianceDomains\Schemas\ComplianceDomainInfolist;
use App\Filament\Resources\ComplianceDomains\Tables\ComplianceDomainsTable;
use App\Models\ComplianceDomain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ComplianceDomainResource extends Resource
{
    protected static ?string $model = ComplianceDomain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ComplianceDomainForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ComplianceDomainInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComplianceDomainsTable::configure($table);
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
            'index' => ListComplianceDomains::route('/'),
            'create' => CreateComplianceDomain::route('/create'),
            'view' => ViewComplianceDomain::route('/{record}'),
            'edit' => EditComplianceDomain::route('/{record}/edit'),
        ];
    }
}
