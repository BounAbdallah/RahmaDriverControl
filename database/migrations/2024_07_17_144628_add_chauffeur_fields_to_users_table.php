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
        Schema::table('users', function (Blueprint $table) {
            $table->string('numero_permis')->nullable()->unique()->after('statut');
            $table->date('date_naissance')->nullable()->after('numero_permis');
            // Ajoutez d'autres champs spécifiques aux chauffeurs si nécessaire
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['numero_permis', 'date_naissance']);
            // N'oubliez pas de supprimer les autres champs que vous avez ajoutés
        });
    }
};