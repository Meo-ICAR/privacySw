<?php

namespace App\Filament\Resources\ComplianceFrameworks\Pages;

use App\Filament\Resources\ComplianceFrameworks\ComplianceFrameworkResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComplianceFramework extends ViewRecord
{
    protected static string $resource = ComplianceFrameworkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
