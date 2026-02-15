<?php

namespace App\Filament\Resources\ComplianceDomains\Pages;

use App\Filament\Resources\ComplianceDomains\ComplianceDomainResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComplianceDomain extends ViewRecord
{
    protected static string $resource = ComplianceDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
