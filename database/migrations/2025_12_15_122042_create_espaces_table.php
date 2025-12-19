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
        Schema::create('espaces', function (Blueprint $table) {
        $table->id();
        $table->foreignId('matiere_id')->constrained();
        $table->foreignId('formateur_id')->constrained();
        $table->foreignId('promotion_id')->constrained();

        $table->unique(['matiere_id', 'formateur_id', 'promotion_id']);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espaces');
    }
};
