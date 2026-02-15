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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete()->comment('Riferimento al progetto oggetto di valutazione');
            $table->foreignId('requirement_id')->constrained()->cascadeOnDelete()->comment('Riferimento al requisito (controllo) da verificare');
            $table->enum('effectiveness', ['Fully_Effective', 'Partially_Effective', 'Implementation_Phase', 'Ineffective', 'Not_Applicable'])
                ->default('Ineffective')
                ->comment('Livello di efficacia della misura (es. Pienamente Efficace, In fase di attuazione)');
            $table->text('notes')->nullable()->comment('Giustificazioni obbligatorie per stati diversi da Pienamente Efficace');
            $table->text('remediation_plan')->nullable()->comment('Piano di rientro descrittivo per colmare il gap');
            $table->date('deadline_date')->nullable()->comment('Data scadenza per l\'implementazione del piano di rimedio');
            $table->timestamp('verified_at')->nullable()->comment('Data in cui la conformità è stata verificata internamente');
            $table->timestamps();

            $table->unique(['project_id', 'requirement_id']);
        });

        DB::statement("ALTER TABLE `assessments` COMMENT = 'Memorizza le valutazioni di compliance incrociando Progetti e Requisiti specifici.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
