<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AssessmentEffectiveness: string implements HasLabel, HasColor
{
    case Fully_Effective = 'Fully_Effective';
    case Partially_Effective = 'Partially_Effective';
    case Implementation_Phase = 'Implementation_Phase';
    case Ineffective = 'Ineffective';
    case Not_Applicable = 'Not_Applicable';

    public function getLabel(): ?string
    {
        return str_replace('_', ' ', $this->name);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Fully_Effective => 'success',
            self::Not_Applicable => 'gray',
            self::Partially_Effective => 'warning',
            self::Implementation_Phase => 'info',
            self::Ineffective => 'danger',
        };
    }
}
