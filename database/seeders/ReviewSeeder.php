<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Box;
use App\Models\Order;
use App\Models\Review;
use App\Models\SiteReview;

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
               
                //box reviews
                $review = Review::create([
                    'rating' => $data[0],
                    'title' => $data[1],
                    'description' => $data[2],
                    'upvotes' => $data[4],

                    //seeding foreign keys
                    'user_id' => User::factory()
                    ->has(
                        Order::factory()
                            ->count(fake()->numberBetween(1, 5))
                    )
                    ->create()->id,
                    'box_id' => $data[5],
                ]);

                //site review
                $site_review = SiteReview::create([
                    'site_rating' => $data[6],
                    'site_title' => $data[7],
                    'site_description' => $data[8],

                    //FK
                    'user_id' => User::factory()->create()->id,
                ]);

            }
            $firstline = false;
        }
        fclose($reviewCSV);
    }
}
