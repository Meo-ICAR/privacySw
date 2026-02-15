<?php

namespace App\Imports\Sheets;

use App\Models\DataClassification;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class InitiativeSheetImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 6;
    }

    public function model(array $row)
    {
        // Headers are on row 5.
        // Col 1 (B / index 1): Name "Dati trattati"
        // Col 4 (E / index 4): Examples "ESEMPIO"
        // Col 5 (F / index 5): Regulations "Principali riferimenti normativi"
        // Col 6 (G / index 6): Classification "CLASSIFICAZIONE"

        if (!isset($row[1]) || empty($row[1])) {
            return null;
        }

        // Avoid reading section headers like "4.1.2.6 ..."
        // Section headers are usually in Col 0 (index 0), and Col 1 might be empty or valid.
        // If Col 1 is "Dati trattati" (header repeated?), skip.
        if ($row[1] === 'Dati trattati' || $row[1] === 'Dati Personali') {
             // "Dati Personali" is a valid row!
             // "Dati trattati" is header.
        }

        return new DataClassification([
            'name' => $row[1],
            'examples' => $row[4] ?? null,
            'regulations' => $row[5] ?? null,
            'classification' => $row[6] ?? null,
        ]);
    }
}
