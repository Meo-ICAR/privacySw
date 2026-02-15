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
        Schema::table('compliance_contexts', function (Blueprint $table) {
            $table->json('interested_parties')->nullable()->comment('Elenco JSON degli stakeholder o parti interessate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compliance_contexts', function (Blueprint $table) {
            $table->dropColumn('interested_parties');
        });
    }
};
