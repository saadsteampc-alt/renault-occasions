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
    Schema::create('voitures', function (Blueprint $table) {
        $table->id();
        $table->string('marque');
        $table->string('modele');
        $table->integer('annee');
        $table->integer('kilometrage');
        $table->decimal('prix', 10, 2);
        $table->text('description')->nullable();
        $table->text('etat_diagnostic')->nullable();
        $table->string('statut')->default('disponible'); // disponible, reserve, vendu
        $table->foreignId('entreprise_id')->constrained('entreprises');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
