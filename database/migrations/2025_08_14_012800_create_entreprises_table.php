<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('entreprises', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->text('adresse_physique');
        $table->string('adresse_email')->unique()->nullable();
        $table->string('telephone')->nullable();
        $table->string('ville')->nullable();
        $table->string('pays')->default('France');
        $table->string('code_postal', 10)->nullable();
        $table->string('siret', 14)->nullable();
        $table->text('description')->nullable();
        $table->string('logo')->nullable();
        $table->string('site_web')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
