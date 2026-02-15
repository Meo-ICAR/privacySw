<?php

namespace App\Imports\Sheets;

use App\Enums\RequirementSeverity;
use App\Models\ComplianceDomain;
use App\Models\ComplianceFramework;
use App\Models\Requirement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SecurityRequirementsImport implements ToCollection, WithCalculatedFormulas
{
    protected string $domainName;
    protected int $frameworkId;

    public function __construct(string $domainName, int $frameworkId)
    {
        $this->domainName = $domainName;
        $this->frameworkId = $frameworkId;
    }

    public function collection(Collection $rows)
    {
        $domain = ComplianceDomain::firstOrCreate([
            'name' => $this->domainName,
            'framework_id' => $this->frameworkId,
        ]);

        $headerRowIndex = null;
        $columnMap = [];

        foreach ($rows as $index => $row) {
            // detect header
            if ($headerRowIndex === null) {
                // Look for common headers
                $rowString = implode(' ', $row->filter()->toArray());
                if (stripos($rowString, 'REQUISITO') !== false || stripos($rowString, 'CONTROLLO') !== false || stripos($rowString, 'STANDARD') !== false) {
                    $headerRowIndex = $index;
                    $columnMap = $this->mapColumns($row);
                    continue;
                }
            } else {
                // Process data
                if (empty($columnMap)) continue;

                $code = $this->getValue($row, $columnMap['code'] ?? null);
                $title = $this->getValue($row, $columnMap['title'] ?? null);
                $description = $this->getValue($row, $columnMap['description'] ?? null);

                // If code is empty, maybe title is the code (some sheets have merged columns or different structure)
                // Let's rely on Title being present.
                if (!$title && !$description) continue;

                // If code is missing but title exists, maybe code is in title or generate one?
                // The provided excel dump showed code in "RIFERIMENTO NORMATIVO" or "Standard" or "Art." ??
                // Let's try to be smart.

                if (!$code) {
                   // Sometimes code is not explicit. Use a slug of title or skip?
                   // Actually, looking at "3.16": "Art. 5" is in col 0 (referenced as 'Art.' in header?)
                   // Wait, header for 3.16: Col 0: "RIFERIMENTO NORMATIVO", Col 2: "NOTE"? No.
                   // 3.16 Header:
                   // [0]=>RIFERIMENTO NORMATIVO [1]=>Art. [2]=>REQUISITO NORMATIVO [3]=>DOMINIO ... [8]=>REQUISITO SPECIFICO RICHIESTO
                   // Data row: [0]=>"In base a quanto..." (Title/Desc)
                   // It seems "Art. 5" was "3.16" ? No.
                   // Let's assume Code is the first non-empty column usually, or specifically mapped.
                   $code = substr($title, 0, 20) . '...';
                }

                Requirement::updateOrCreate([
                    'domain_id' => $domain->id,
                    'title' => substr($title, 0, 255) ?? 'Untitled Requirement', // Ensure length
                ], [
                    'code' => substr($code, 0, 50) ?? 'N/A',
                    'description' => $description,
                    'severity' => RequirementSeverity::Medium, // Default
                    'mandatory' => true,
                    'penalty_daily_rate' => 100.0,
                ]);
            }
        }
    }

    protected function mapColumns($row)
    {
        $map = [];
        foreach ($row as $index => $cell) {
            $cell = strtoupper((string) $cell);
            if (in_array($cell, ['RIFERIMENTO NORMATIVO', 'STANDARD', 'ART.', 'RIFERIMENTO'])) {
                $map['code'] = $index;
            }
            if (in_array($cell, ['REQUISITO NORMATIVO', 'CONTROLLI/CONTROMISURE', 'DESCRIZIONE', 'REQUISITO'])) {
                $map['title'] = $index;
            }
            if (in_array($cell, ['REQUISITO SPECIFICO RICHIESTO', 'NOTE', 'OBIETTIVO DI SICUREZZA'])) {
                 // Prioritize specific requirement as description if available
                 if (!isset($map['description']) || $cell === 'REQUISITO SPECIFICO RICHIESTO') {
                     $map['description'] = $index;
                 }
            }
        }

        // Fallbacks if mapping failed but we found a header row
        if (!isset($map['title']) && isset($map['code'])) {
             // Maybe the code column is the title?
             // Or adjacent?
        }

        return $map;
    }

    protected function getValue($row, $index)
    {
        if ($index === null) return null;
        return $row[$index] ?? null;
    }
}
