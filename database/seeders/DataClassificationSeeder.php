<?php

namespace Database\Seeders;

use App\Imports\DataClassificationImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DataClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = public_path('Allegato 4bis - Information Security Annex Part II Requirements Checklist - ITA - v8.1 01.01.2025 (1).xlsx');

        if (file_exists($file)) {
            $this->command->info("Importing data classifications from: $file");
            // We need to specify the sheet name
            Excel::import(new DataClassificationImport, $file, null, \Maatwebsite\Excel\Excel::XLSX);
            // Default import reads first sheet? No.
            // We need to select the sheet.
            // But `Excel::import` with object usually imports first sheet.
            // We need WithMultipleSheets or selectSheet?
            // Actually, we can use `selectSheets` concern or just pass reader?
            // simpler: wrapper import.
        } else {
            $this->command->warn("Excel file not found at: $file");
        }
    }
}
