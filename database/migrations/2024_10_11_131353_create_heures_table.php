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
        Schema::create('heures', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->enum('jour', ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'])->nullable(); // Jour de la semaine
            $table->time('heure_debut'); // Heure de début
            $table->time('heure_fin'); // Heure de fin
            $table->timestamps(); // Champs created_at et updated_at
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heures');
    }
};
