<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- N'oubliez pas d'importer la façade DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assignations', function (Blueprint $table) {
            $table->id();
            // Assurez-vous que les tables 'travails', 'etudiants', et 'groupes' existent déjà!
            $table->foreignId('travail_id')->constrained()->onDelete('cascade');
            // Nous n'utilisons pas la méthode ->nullable() ici, car la logique nullable sera gérée par la contrainte CHECK/XOR
            $table->foreignId('etudiant_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('groupe_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps(); // Il est conseillé d'inclure les timestamps
        });

        // ----------------------------------------------------
        // Ajout de la Contrainte CHECK via SQL brut (XOR Logic)
        // ----------------------------------------------------
        // L'exécution de cette instruction nécessite que le moteur soit InnoDB et que le SGBD supporte CHECK (MySQL >= 8.0.16)
        $sql = "
            ALTER TABLE assignations
            ADD CONSTRAINT chk_assignation_target
            CHECK (
                (etudiant_id IS NOT NULL AND groupe_id IS NULL) 
                OR (etudiant_id IS NULL AND groupe_id IS NOT NULL)
            )
        ";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignations', function (Blueprint $table) {
            // Drop la contrainte si elle existe, pour MySQL ou PostgreSQL
            $table->dropForeign(['travail_id']); 
            $table->dropForeign(['etudiant_id']); 
            $table->dropForeign(['groupe_id']);
        });

        Schema::dropIfExists('assignations');
        
        // Note: La contrainte CHECK est automatiquement supprimée avec la table.
    }
};