<?php

namespace Database\Seeders;

use App\Models\Espace;
use App\Models\Matiere;
use App\Models\Formateur;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class EspaceSeeder extends Seeder
{
    public function run(): void
    {
        $matieres = Matiere::all();
        $formateurs = Formateur::all();
        $promotions = Promotion::all();

        // On crée 5 espaces uniques
        for ($i = 0; $i < 5; $i++) {
            Espace::create([
                'matiere_id'   => $matieres->random()->id,
                'formateur_id' => $formateurs->random()->id,
                'promotion_id' => $promotions->random()->id,
            ]);
        }
    }
}