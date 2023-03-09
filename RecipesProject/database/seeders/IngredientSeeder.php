<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;


class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ingredients = [
            'Almond',
            'Basil',
            'Beef',
            'Carrot',
            'Chicken',
            'Chili',
            'Cinnamon',
            'Coconut',
            'Garlic',
            'Ginger',
            'Lemon',
            'Olive',
            'Onion',
            'Pepper',
            'Potato',
            'Rice',
            'Salmon',
            'Tomato',
            'Vanilla',
        ];

        foreach ($ingredients as $ingredientName) {

            Ingredient::create([
                'name' => $ingredientName,
                'is_active' => true,

            ]);
        }
    }
}
