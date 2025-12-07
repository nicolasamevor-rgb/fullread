<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cette migration supprimait eleve_id et ajoutait user_id
        // Mais puisque nous utilisons une base vierge, eleve_id n'existe pas
        // On vérifie simplement que user_id existe, sinon on l'ajoute
        Schema::table('reservations', function (Blueprint $table) {
            if (!Schema::hasColumn('reservations', 'user_id')) {
                $table->foreignID('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
        });
    }
};
