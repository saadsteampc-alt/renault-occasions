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
        Schema::table('entreprises', function (Blueprint $table) {
            if (!Schema::hasColumn('entreprises', 'siret')) {
                $table->string('siret', 14)->nullable()->after('code_postal');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            if (Schema::hasColumn('entreprises', 'siret')) {
                $table->dropColumn('siret');
            }
        });
    }
};
