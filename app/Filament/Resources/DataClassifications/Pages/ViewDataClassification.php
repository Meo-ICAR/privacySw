<?php

namespace App\Filament\Resources\DataClassifications\Pages;

use App\Filament\Resources\DataClassifications\DataClassificationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDataClassification extends ViewRecord
{
    protected static string $resource = DataClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
