<?php

namespace App\Filament\Resources\ComplianceContexts\Pages;

use App\Filament\Resources\ComplianceContexts\ComplianceContextResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComplianceContexts extends ListRecords
{
    protected static string $resource = ComplianceContextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
