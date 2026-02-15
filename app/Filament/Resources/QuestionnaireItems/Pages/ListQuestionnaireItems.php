<?php

namespace App\Filament\Resources\QuestionnaireItems\Pages;

use App\Filament\Resources\QuestionnaireItems\QuestionnaireItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuestionnaireItems extends ListRecords
{
    protected static string $resource = QuestionnaireItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
