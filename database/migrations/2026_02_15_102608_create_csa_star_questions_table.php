<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('csa_star_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id')->constrained('csa_star_domains')->onDelete('cascade');
            $table->string('control_id', 50)->comment('ID Controllo (es. AIS-01)');
            $table->string('question_id', 50)->comment('ID Domanda (es. AIS-01.1)');
            $table->text('question_text')->comment('Testo della domanda');
            $table->text('guidance')->nullable()->comment('Guida alla compilazione');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csa_star_questions');
    }
};
