<?php

namespace App\Filament\Resources\QuestionnaireItems\Pages;

use App\Filament\Resources\QuestionnaireItems\QuestionnaireItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditQuestionnaireItem extends EditRecord
{
    protected static string $resource = QuestionnaireItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
