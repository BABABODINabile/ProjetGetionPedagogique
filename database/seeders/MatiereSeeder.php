<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    public function run(): void
    {
        $matieres = [
            ['libelle' => 'Algorithmique et Programmation'],
            ['libelle' => 'Bases de Données (SQL)'],
            ['libelle' => 'Développement Web Laravel'],
            ['libelle' => 'Réseaux et Sécurité'],
            ['libelle' => 'Gestion de Projet Agile'],
            ['libelle' => 'Architecture des Ordinateurs'],
            ['libelle' => 'Mathématiques Discrètes'],
            ['libelle' => 'Anglais Technique'],
            ['libelle' => 'Communication Professionnelle'],
            ['libelle' => 'Systèmes d’Exploitation (Linux)'],
        ];

        foreach ($matieres as $matiere) {
            Matiere::create($matiere);
        }
    }
}