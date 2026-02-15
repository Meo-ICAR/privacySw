<?php

namespace App\Filament\Resources\ComplianceDomains\Pages;

use App\Filament\Resources\ComplianceDomains\ComplianceDomainResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditComplianceDomain extends EditRecord
{
    protected static string $resource = ComplianceDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
