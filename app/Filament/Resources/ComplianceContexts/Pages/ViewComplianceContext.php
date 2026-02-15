<?php

namespace App\Filament\Resources\ComplianceContexts\Pages;

use App\Filament\Resources\ComplianceContexts\ComplianceContextResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComplianceContext extends ViewRecord
{
    protected static string $resource = ComplianceContextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
