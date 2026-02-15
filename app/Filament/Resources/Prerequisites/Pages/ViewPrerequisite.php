<?php

namespace App\Filament\Resources\Prerequisites\Pages;

use App\Filament\Resources\Prerequisites\PrerequisiteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPrerequisite extends ViewRecord
{
    protected static string $resource = PrerequisiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
