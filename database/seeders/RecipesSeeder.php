<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::truncate();

        // open the CSV file
        $recipesCSV = fopen(base_path("database/data/Recipe-data.csv"), "r");

        // disregard the first line - headings
        $firstline = true;

        //reads the data
        while (($data = fgetcsv($recipesCSV, 5000, ",")) !== false) {
            if (!$firstline) {
                Recipe::create([
                    'title' => $data[0],
                    'description' => $data[1],
                    'image_path' => $data[2],
                ]);
            }
            $firstline = false;
        }

        fclose($recipesCSV);
    }
}
