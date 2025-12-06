<?php

namespace Database\Seeders;

use App\Models\categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categorie::factory()->count(5)->create();
    }
}
