<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création du compte utilisateur
        $admin = User::create([
            'email' => 'admin@ecole.com',
            'password' => Hash::make('password'), // Change le mot de passe ici
            'role' => 'admin',
            'is_active' => true,
            'isblocked' => false,
        ]);

        // 2. Création du profil lié dans la table administrations
        // Assure-toi que les champs correspondent à ta migration administrations
        $admin->administration()->create([
            'nom' => 'ADMIN',
            'prenom' => 'Admin',
            'fonction' => 'Directeur',
            // Ajoute ici d'autres champs si nécessaire (ex: telephone, etc.)
        ]);
    }
}