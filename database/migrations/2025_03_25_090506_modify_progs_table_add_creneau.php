<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('progs', function (Blueprint $table) {
            // Supprimer les colonnes heure_debut et heure_fin
            $table->dropColumn(['heure_debut', 'heure_fin']);
            // Ajouter la colonne creneau
            $table->enum('creneau', ['Matin', 'Après-midi'])->after('jour');
        });
    }

    public function down(): void
    {
        Schema::table('progs', function (Blueprint $table) {
            // Annuler les modifications : supprimer creneau et recréer heure_debut et heure_fin
            $table->dropColumn('creneau');
            $table->time('heure_debut')->after('jour');
            $table->time('heure_fin')->after('heure_debut');
        });
    }
};
