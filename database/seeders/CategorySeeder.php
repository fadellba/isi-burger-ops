<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nom' => 'Classiques', 'description' => 'La simplicité'],
            ['nom' => 'Double', 'description' => 'Pour les modérées.'],
            ['nom' => 'Triple', 'description' => 'Pour les gourmands.'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['nom' => $cat['nom']], $cat);
        }
    }
}
