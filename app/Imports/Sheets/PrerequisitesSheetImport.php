<?php

namespace App\Imports\Sheets;

use App\Models\ComplianceFramework;
use App\Models\Prerequisite;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class PrerequisitesSheetImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $framework = ComplianceFramework::where('name', 'Security Annex Part II v8.1')->first();

        if (!$framework) {
            Log::info('Framework not found');
            return;
        }

        Log::info('Processing ' . count($rows) . ' rows');

        $currentSection = null;
        $currentTitle = null;
        $currentDescription = [];
        $count = 0;

        foreach ($rows as $index => $row) {
            // Skip empty rows
            if (empty($row[0]) && empty($row[1])) {
                continue;
            }

            // Check if this is a section header (column 0 contains section number like "3.1")
            if (!empty($row[0]) && preg_match('/^\d+\.\d+/', $row[0])) {
                // Save previous section if exists
                if ($currentSection && $currentTitle) {
                    Prerequisite::create([
                        'framework_id' => $framework->id,
                        'section_number' => $currentSection,
                        'title' => $currentTitle,
                        'description' => implode("\n\n", $currentDescription),
                    ]);
                    $count++;
                    Log::info("Created prerequisite $count: $currentSection");
                }

                // Start new section
                $currentSection = $row[0];
                $currentTitle = $row[1] ?? '';
                $currentDescription = [];
            } elseif (!empty($row[1]) && $currentSection) {
                // This is a description paragraph for the current section
                $currentDescription[] = trim($row[1]);
            }
        }

        // Save the last section
        if ($currentSection && $currentTitle) {
            Prerequisite::create([
                'framework_id' => $framework->id,
                'section_number' => $currentSection,
                'title' => $currentTitle,
                'description' => implode("\n\n", $currentDescription),
            ]);
            $count++;
            Log::info("Created prerequisite $count: $currentSection");
        }

        Log::info("Total prerequisites created: $count");
    }
}
