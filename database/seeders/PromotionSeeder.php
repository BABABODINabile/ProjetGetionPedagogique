<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $promotions = [
            ['libelle' => 'Promotion 2023-2024'],
            ['libelle' => 'Promotion 2024-2025'],
            ['libelle' => 'Licence 1 (L1)'],
            ['libelle' => 'Licence 2 (L2)'],
            ['libelle' => 'Master Spécialisé'],
        ];

        foreach ($promotions as $promotion) {
            Promotion::create($promotion);
        }
    }
}