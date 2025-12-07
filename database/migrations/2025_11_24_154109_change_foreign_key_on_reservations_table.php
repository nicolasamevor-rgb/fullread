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
        Schema::table('reservations', function (Blueprint $table) {
            // Suppression de l'ancienne clé étrangère
            // Note: La colonne eleve_id était un foreignId créé initialement
            if (Schema::hasColumn('reservations', 'eleve_id')) {
                try {
                    $table->dropForeign(['eleve_id']);
                } catch (\Exception $e) {
                    // Clé étrangère n'existe pas, on continue
                }
                $table->dropColumn('eleve_id');
            }

            // Ajout de la nouvelle clé étrangère
            if (!Schema::hasColumn('reservations', 'user_id')) {
                $table->foreignID('user_id')
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
