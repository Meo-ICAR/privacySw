<?php

namespace App\Imports;

use App\Imports\Sheets\SecurityRequirementsImport;
use App\Models\ComplianceFramework;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class WindTreSecurityAnnexImport implements WithMultipleSheets
{
    protected int $frameworkId;

    public function __construct(int $frameworkId)
    {
        $this->frameworkId = $frameworkId;
    }

    public function sheets(): array
    {
        return [
            '3.16 Requisiti Base Privacy' => new SecurityRequirementsImport('Privacy', $this->frameworkId),
            '4.2 Sviluppo Sicuro' => new SecurityRequirementsImport('Sviluppo Sicuro', $this->frameworkId),
            '4.1.2.9 Cloud Computing' => new SecurityRequirementsImport('Cloud Computing', $this->frameworkId),
            '4.1.2.6 Sicurezza reti' => new SecurityRequirementsImport('Sicurezza Reti', $this->frameworkId),
            // Add more mappings as needed
        ];
    }
}
