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
        Schema::create('compliance_frameworks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome del framework o normativa');
            $table->string('version')->nullable()->comment('Versione specifica (es. 8.1)');
            $table->boolean('is_active')->default(true)->comment('Flag per indicare se il framework è attualmente in uso');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `compliance_frameworks` COMMENT = 'Registro dei framework normativi e standard (es. ISO 27001, Security Annex).'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_frameworks');
    }
};
