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
        Schema::table('voitures', function (Blueprint $table) {
            $table->boolean('en_promotion')->default(false)->after('prix');
            $table->decimal('prix_promotion', 10, 2)->nullable()->after('en_promotion');
            $table->date('date_fin_promotion')->nullable()->after('prix_promotion');
            $table->string('statut', 20)->default('disponible')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voitures', function (Blueprint $table) {
            $table->dropColumn(['en_promotion', 'prix_promotion', 'date_fin_promotion']);
            $table->string('statut', 20)->default('disponible')->change();
        });
    }
};
