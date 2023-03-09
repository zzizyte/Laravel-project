<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Desserts',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'MainDishes',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Soups',
            'is_active' => true,
        ]);
        Category::create([
            'name' => 'Salads',
            'is_active' => true,
        ]);
    }
}
