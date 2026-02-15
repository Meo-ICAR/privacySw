<?php

namespace App\Filament\Resources\QuestionnaireSections\Pages;

use App\Filament\Resources\QuestionnaireSections\QuestionnaireSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditQuestionnaireSection extends EditRecord
{
    protected static string $resource = QuestionnaireSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
