<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compliance_domains', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome del dominio (es. Sicurezza Reti)');
            $table->foreignId('framework_id')->constrained('compliance_frameworks')->cascadeOnDelete()->comment('Framework di appartenenza');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `compliance_domains` COMMENT = 'Macro-aree o Domini di compliance (es. Sviluppo Sicuro, Privacy, Cloud).'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_domains');
    }
};
