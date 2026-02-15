<?php

namespace App\Imports\Sheets;

use App\Models\ComplianceContext;
use App\Models\ComplianceFramework;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ContextSheetImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Row 2 (index 1) Col B (index 1) = Title "CONTESTO"
        // Row 4 (index 3) Col B (index 1) = Content "Questo Allegato..."
        // Row 23+ (index 22+) = Interested Parties table

        $title = $rows[1][1] ?? 'Contesto';
        $content = $rows[3][1] ?? null;

        // Parse interested parties starting from row 23 (index 22)
        $interestedParties = [];

        // Find header row - typically around row 22-23
        $headerRowIndex = null;
        for ($i = 20; $i < 30; $i++) {
            if (isset($rows[$i][1]) && stripos($rows[$i][1], 'PARTI') !== false) {
                $headerRowIndex = $i;
                break;
            }
        }

        if ($headerRowIndex !== null) {
            // Start reading data from the row after header
            for ($i = $headerRowIndex + 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                // Stop if we hit empty rows or another section
                if (empty($row[1]) || (isset($row[0]) && !empty($row[0]))) {
                    break;
                }

                $interestedParties[] = [
                    'party' => $row[1] ?? '',
                    'requirements' => $row[2] ?? '',
                ];
            }
        }

        if ($content) {
            $framework = ComplianceFramework::where('name', 'Security Annex Part II v8.1')->first();

            if ($framework) {
                ComplianceContext::updateOrCreate(
                    ['framework_id' => $framework->id],
                    [
                        'title' => $title,
                        'description' => $content,
                        'interested_parties' => $interestedParties,
                    ]
                );
            }
        }
    }
}
