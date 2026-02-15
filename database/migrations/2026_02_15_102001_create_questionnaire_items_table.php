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
        Schema::create('questionnaire_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('questionnaire_sections')->cascadeOnDelete();
            $table->string('subsection_label')->nullable()->comment('Per raggruppare visivamente (es. "1 - FONTE E TIPOLOGIA")');
            $table->text('question_text');
            $table->text('help_text')->nullable();
            $table->enum('input_type', ['text', 'textarea', 'date', 'boolean', 'select', 'header'])->default('text');
            $table->boolean('is_mandatory')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `questionnaire_items` COMMENT = 'Singoli item e domande del questionario informativo.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_items');
    }
};
