<?php

namespace App\Imports;

use App\Imports\Sheets\InitiativeSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataClassificationImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            "Descrizione dell'Iniziativa" => new InitiativeSheetImport(),
        ];
    }
}
