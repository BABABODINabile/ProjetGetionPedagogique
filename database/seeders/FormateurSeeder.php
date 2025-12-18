<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Formateur;
use App\Models\Matiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        $matieres = Matiere::all();

        for ($i = 1; $i <= 5; $i++) {
            // 1. Créer le compte User
            $user = User::create([
                'email' => "formateur{$i}@ecole.com",
                'password' => Hash::make('password'),
                'role' => 'formateur',
                'is_active' => true,
            ]);

            // 2. Créer le profil Formateur lié
            $formateur = $user->formateur()->create([
                'nom' => "NOM{$i}",
                'prenom' => "Prenom{$i}",
                'specialite'=>"Spe{$i}"
                // Ajoutez ici d'autres champs si votre table formateurs en possède
            ]);

            // 3. Lui assigner 2 matières aléatoires (Table Pivot)
            // On utilise attach() pour remplir formateur_matiere
            $randomMatieres = $matieres->random(2);
            $formateur->matieres()->attach($randomMatieres);
        }
    }
}