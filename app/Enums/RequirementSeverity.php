<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum RequirementSeverity: string implements HasLabel, HasColor
{
    case Critical = 'Critical';
    case High = 'High';
    case Medium = 'Medium';
    case Low = 'Low';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Critical => 'danger',
            self::High => 'warning',
            self::Medium => 'info',
            self::Low => 'success',
        };
    }
}
