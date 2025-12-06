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
        Schema::create('exemplaire_livres', function (Blueprint $table) {
            $table->id();
            $table->boolean('disponibilite')->default(true);
            $table->foreignId('livre_id')
                ->constrained('livres')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exemplaire_livre');
    }
};
