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
        Schema::dropIfExists('questionnaire_items');
        Schema::dropIfExists('questionnaire_sections');

        Schema::create('questionnaire_sections', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->comment('Es. A, B, C, D');
            $table->string('title');
            $table->text('description')->nullable()->comment('Testi introduttivi o definizioni (es. definizione Mute Calls)');
            $table->boolean('is_repeatable')->default(false)->comment('Se TRUE, abilita l\'inserimento multiplo (es. più Subappaltatori)');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `questionnaire_sections` COMMENT = 'Macro-sezioni del questionario informativo.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_items');
        Schema::dropIfExists('questionnaire_sections');
    }
};
