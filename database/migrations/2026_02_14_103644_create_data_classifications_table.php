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
        Schema::create('data_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome leggibile della tipologia di dato (es. Dati Personali)');
            $table->text('examples')->nullable()->comment('Esempi pratici per aiutare l\'utente a identificare il dato');
            $table->text('regulations')->nullable()->comment('Riferimenti normativi citati (es. GDPR, Art. 16)');
            $table->string('classification')->nullable()->comment('Codice tecnico di classificazione (es. PDMS, TMVS, CAPS)');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `data_classifications` COMMENT = 'Classificazione delle tipologie di dati trattati e normative applicabili.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_classifications');
    }
};
