<?php

namespace App\Filament\Resources\QuestionnaireSections\Pages;

use App\Filament\Resources\QuestionnaireSections\QuestionnaireSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuestionnaireSections extends ListRecords
{
    protected static string $resource = QuestionnaireSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
