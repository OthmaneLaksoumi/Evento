<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'Professional Pursuits',
            'Creative Chronicles',
            'Athletic Assemblies',
            'Entertain Express',
            'Enlighten Endeavors',
            'Social Soirees',
            'Wellness Wonders',
            'Flavor Festivities',
            'Tech Triumphs',
            'Green Gatherings'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
