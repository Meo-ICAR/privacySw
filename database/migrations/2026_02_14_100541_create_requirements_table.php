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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('Codice identificativo del requisito (es. OWASP-A01)')->index();
            $table->string('title')->comment('Titolo breve del requisito');
            $table->text('description')->nullable()->comment('Descrizione dettagliata del controllo richiesto');
            $table->enum('severity', ['Critical', 'High', 'Medium', 'Low'])->comment('Livello di criticità del requisito');
            $table->boolean('mandatory')->default(true)->comment('Indica se il requisito è obbligatorio');
            $table->decimal('penalty_daily_rate', 10, 2)->default(1000.00)->comment('Penale giornaliera in caso di non conformità');
            $table->foreignId('domain_id')->constrained('compliance_domains')->cascadeOnDelete()->comment('Dominio di appartenenza');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `requirements` COMMENT = 'Requisiti e controlli specifici da verificare per ogni dominio normativo.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
