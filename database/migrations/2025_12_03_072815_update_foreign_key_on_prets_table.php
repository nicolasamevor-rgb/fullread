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

        Schema::table('prets', function (Blueprint $table) {
            // Supprimer l'ancienne contrainte
            $table->dropForeign(['exemplaire_id']);

            // Recréer la contrainte correctement
            $table->foreign('exemplaire_id')
                ->references('id')
                ->on('exemplaire_livres')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
