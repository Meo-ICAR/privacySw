<?php

namespace App\Filament\Resources\Projects\ProjectResource\Widgets;

use App\Enums\AssessmentEffectiveness;
use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Model;

class ComplianceScoreChart extends ChartWidget
{
    protected ?string $heading = 'Compliance Score';

    public ?Model $record = null;

    protected function getData(): array
    {
        // If record is not injected (e.g. initial load without context), return empty
        if (! $this->record) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $assessments = $this->record->assessments()
            ->selectRaw('effectiveness, count(*) as count')
            ->groupBy('effectiveness')
            ->get();

        $data = $assessments->pluck('count');
        $labels = $assessments->map(fn ($a) => $a->effectiveness->getLabel());
        $colors = $assessments->map(fn ($a) => $a->effectiveness->getColor());

        return [
            'datasets' => [
                [
                    'label' => 'Assessments',
                    'data' => $data->toArray(),
                    'backgroundColor' => $colors->map(fn ($c) => match($c) {
                        'success' => '#22c55e',
                        'danger' => '#ef4444',
                        'warning' => '#eab308',
                        'info' => '#3b82f6',
                        'gray' => '#6b7280',
                        default => '#6b7280',
                    })->toArray(),
                    // Note: Filament Chart.js colors are CSS variables usually, but array of hex works reliably.
                    // For simplicity I maintain mapping, or just let Chart.js auto color if tricky.
                    // Converting Filament colors (strings like 'success') to Hex is needed for Chart.js usually.
                ],
            ],
            'labels' => $labels->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
