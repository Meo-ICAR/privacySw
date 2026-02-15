<?php

namespace Database\Seeders;

use App\Models\ComplianceFramework;
use Illuminate\Database\Seeder;

class WindTreSecurityAnnexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Framework
        $framework = ComplianceFramework::firstOrCreate([
            'name' => 'Security Annex Part II v8.1',
        ], [
            'version' => '8.1',
            'is_active' => true,
        ]);

        // 2. Import from Excel
        $file = public_path('Allegato 4bis - Information Security Annex Part II Requirements Checklist - ITA - v8.1 01.01.2025 (1).xlsx');

        if (file_exists($file)) {
            $this->command->info("Importing requirements from: $file");
            \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\WindTreSecurityAnnexImport($framework->id), $file);
        } else {
            $this->command->warn("Excel file not found at: $file. Skipping import.");
        }
    }
}
