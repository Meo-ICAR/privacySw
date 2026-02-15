<?php

namespace App\Filament\Resources\ComplianceContexts\Pages;

use App\Filament\Resources\ComplianceContexts\ComplianceContextResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditComplianceContext extends EditRecord
{
    protected static string $resource = ComplianceContextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
