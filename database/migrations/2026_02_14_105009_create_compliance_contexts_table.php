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
        Schema::create('compliance_contexts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('framework_id')->constrained('compliance_frameworks')->cascadeOnDelete()->comment('Collegamento al framework normativo (es. Security Annex)');
            $table->string('title')->default('Contesto')->comment('Titolo della sezione descrittiva');
            $table->longText('description')->nullable()->comment('Testo esteso che descrive il perimetro normativo e obiettivi');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `compliance_contexts` COMMENT = 'Contiene le informazioni di contesto, introduzioni normative e stakeholder.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_contexts');
    }
};
