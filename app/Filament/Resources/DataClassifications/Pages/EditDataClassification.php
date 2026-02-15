<?php

namespace App\Filament\Resources\DataClassifications\Pages;

use App\Filament\Resources\DataClassifications\DataClassificationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDataClassification extends EditRecord
{
    protected static string $resource = DataClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
