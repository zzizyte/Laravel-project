<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $images = [
            'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/1660030/pexels-photo-1660030.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/718742/pexels-photo-718742.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1',
            'https://images.pexels.com/photos/1775043/pexels-photo-1775043.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1'
        ];
        // Get all categories
        $categories = Category::all();

        // Create 10 recipes for each image
        foreach ($images as  $image){
                Recipe::create([
                    'name' => $faker->sentence(3),
                    'category_id' => $categories->random()->id,
                    'description' => $faker->paragraph(5),
                    'image' => $image,
                    'is_active' => true,
                ]);
            }
        }
    }

