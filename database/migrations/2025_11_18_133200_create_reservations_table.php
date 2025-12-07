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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date_reservation');
            $table->string('status')->default('En attente');
            $table->timestamps();
            $table->foreignId('livre_id')
                ->constrained('livres')
                ->onDelete('cascade');
            $table->foreignId('eleve_id')
                ->constrained('eleves')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
