<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = Ingredient::all();
        $recipes = Recipe::all();

        for ($i = 1; $i <= 50; $i++) {
            RecipeIngredient::create(['ingredient_id' => $ingredients->random()->id,
                'recipe_id' => $recipes->random()->id]);
        }
    }
}
