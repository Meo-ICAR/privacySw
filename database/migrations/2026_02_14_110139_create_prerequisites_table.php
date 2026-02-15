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
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('framework_id')->constrained('compliance_frameworks')->cascadeOnDelete()->comment('Framework di riferimento');
            $table->string('section_number')->comment('Riferimento numerico nel documento originale (es. 3.1)');
            $table->text('title')->comment('Titolo del prerequisito');
            $table->longText('description')->comment('Descrizione dettagliata dell\'obbligo o della procedura richiesta');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `prerequisites` COMMENT = 'Elenco dei prerequisiti e vincoli contrattuali da accettare pre-valutazione.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prerequisites');
    }
};
