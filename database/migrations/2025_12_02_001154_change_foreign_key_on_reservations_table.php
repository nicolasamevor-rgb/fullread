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
            // $table->dropForeign('livre_id');

            // // Ajout de la nouvelle clé étrangère
            // $table->foreignID('exemplaire_id')
            //     ->constrained('exemplaire_livre')
            //     ->onDelete('cascade');


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
