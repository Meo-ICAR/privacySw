<?php

namespace App\Imports;

use App\Imports\Sheets\PrerequisitesSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PrerequisitesImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            '3 PREREQUISITI' => new PrerequisitesSheetImport(),
        ];
    }
}
