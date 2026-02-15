<?php

namespace Database\Seeders;

use App\Imports\ContextImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ComplianceContextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = public_path('Allegato 4bis - Information Security Annex Part II Requirements Checklist - ITA - v8.1 01.01.2025 (1).xlsx');

        if (file_exists($file)) {
            $this->command->info("Importing context from: $file");
            Excel::import(new ContextImport, $file);
        } else {
            $this->command->warn("Excel file not found at: $file");
        }
    }
}
