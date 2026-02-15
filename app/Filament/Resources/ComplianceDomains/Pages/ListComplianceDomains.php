<?php

namespace App\Filament\Resources\ComplianceDomains\Pages;

use App\Filament\Resources\ComplianceDomains\ComplianceDomainResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComplianceDomains extends ListRecords
{
    protected static string $resource = ComplianceDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
