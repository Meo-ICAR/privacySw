<?php

namespace App\Imports;

use App\Imports\Sheets\ContextSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ContextImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Contesto' => new ContextSheetImport(),
        ];
    }
}
