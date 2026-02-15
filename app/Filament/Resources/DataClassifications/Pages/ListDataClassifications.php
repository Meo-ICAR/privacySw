<?php

namespace App\Filament\Resources\DataClassifications\Pages;

use App\Filament\Resources\DataClassifications\DataClassificationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataClassifications extends ListRecords
{
    protected static string $resource = DataClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
