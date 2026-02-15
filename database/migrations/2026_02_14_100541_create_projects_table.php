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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome del progetto di valutazione');
            $table->foreignId('team_id')->constrained()->cascadeOnDelete()->comment('Tenant proprietario del progetto');
            $table->foreignId('framework_id')->constrained('compliance_frameworks')->comment('Framework normativo di riferimento');
            $table->enum('status', ['Draft', 'In_Review', 'Certified', 'Expired'])->default('Draft')->comment('Stato del progetto di compliance');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `projects` COMMENT = 'Progetti di valutazione compliance - ogni progetto valuta un servizio/sistema rispetto a un framework.'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
