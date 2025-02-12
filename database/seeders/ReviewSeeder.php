<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Box;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::truncate();

        //open review CSV
        $reviewCSV = fopen(base_path("database/data/Review-data.csv"), "r");

        //remove headings from data being processed
        $firstline = true;

        //read data
        while(($data = fgetcsv($reviewCSV, 5000, ",")) !== false){
            if(!$firstline){
               
                $review = Review::create([
                    'star_rating' => $data[0],
                    'title' => $data[1],
                    'description' => $data[2],
                    'review_date' => $data[3],
                    'upvotes' => $data[4],

                    //seeding foreign keys
                    'user_id' => User::factory()->create()->id,
                    'box_id' => Box::factory()->create()->id,
                ]);

            }
            $firstline = false;
        }
        fclose($reviewCSV);
    }
}
