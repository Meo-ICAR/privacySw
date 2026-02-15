<?php

namespace App\Filament\Resources\Assessments\Schemas;

use App\Enums\AssessmentEffectiveness;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->label('Progetto')
                    ->helperText('Riferimento al progetto oggetto di valutazione')
                    ->relationship('project', 'name')
                    ->required(),
                Select::make('requirement_id')
                    ->label('Requisito')
                    ->helperText('Riferimento al requisito (controllo) da verificare')
                    ->relationship('requirement', 'title')
                    ->required(),
                Select::make('effectiveness')
                    ->label('Efficacia')
                    ->helperText('Livello di efficacia della misura (es. Pienamente Efficace, In fase di attuazione)')
                    ->options(AssessmentEffectiveness::class)
                    ->default('Ineffective')
                    ->required(),
                Textarea::make('notes')
                    ->label('Note Tecniche')
                    ->helperText('Giustificazioni obbligatorie per stati diversi da Pienamente Efficace')
                    ->columnSpanFull(),
                Textarea::make('remediation_plan')
                    ->label('Piano di Rientro')
                    ->helperText('Piano di rientro descrittivo per colmare il gap')
                    ->columnSpanFull(),
                DatePicker::make('deadline_date')
                    ->label('Scadenza')
                    ->helperText('Data scadenza per l\'implementazione del piano di rimedio'),
                DateTimePicker::make('verified_at')
                    ->label('Verificato il')
                    ->helperText('Data in cui la conformità è stata verificata internamente'),
            ]);
    }
}
