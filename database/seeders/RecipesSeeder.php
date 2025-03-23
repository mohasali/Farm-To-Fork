<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::truncate();
        Ingredient::truncate();
        Step::truncate();

        // open the CSV file
        $recipesCSV = fopen(base_path("database/data/Recipe-data.csv"), "r");

        // disregard the first line - headings
        $firstline = true;

        // reads the data
        while (($data = fgetcsv($recipesCSV, 5000, ",")) !== false) {
            if (!$firstline) {
                // Recipe
                $recipe = Recipe::create([
                    'title' => $data[0],
                    'tag' => trim($data[1], "[]' "),
                    'cooking_time' => (int)$data[2],
                    'rating' => (float)$data[3],
                    'serving' => (int)$data[4],
                    'description' => $data[5],
                    'imagePath' => $data[8],
                ]);

                // Ingredients
                $ingredients = explode(',', $data[6]);
                foreach ($ingredients as $ingredientName) {
                    Ingredient::create([
                        'name' => trim($ingredientName),
                        'recipe_id' => $recipe->id,
                    ]);
                }

                // Steps
                $steps = explode(';', $data[7]);
                foreach ($steps as $stepDescription) {
                    Step::create([
                        'description' => trim($stepDescription),
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }
            $firstline = false;
        }

        fclose($recipesCSV);
    }
}