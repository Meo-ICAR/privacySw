<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: string implements HasLabel, HasColor
{
    case Draft = 'Draft';
    case In_Review = 'In_Review';
    case Certified = 'Certified';
    case Expired = 'Expired';

    public function getLabel(): ?string
    {
        return str_replace('_', ' ', $this->name);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::In_Review => 'info',
            self::Certified => 'success',
            self::Expired => 'danger',
        };
    }
}
