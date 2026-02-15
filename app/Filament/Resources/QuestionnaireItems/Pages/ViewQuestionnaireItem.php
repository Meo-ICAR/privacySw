<?php

namespace App\Filament\Resources\QuestionnaireItems\Pages;

use App\Filament\Resources\QuestionnaireItems\QuestionnaireItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewQuestionnaireItem extends ViewRecord
{
    protected static string $resource = QuestionnaireItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
