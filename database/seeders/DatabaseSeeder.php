<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Box;
use App\Models\Tag;
use App\Models\User;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '07398332754',
            'isAdmin' => true,
        ]);

        Address::create([
            'user_id' => User::where('email', 'test@example.com')->first()->id,
            'name' => "Test",
            'address' => "64 Zoo Lane",
            'city' => "Birmingham",
            'postcode' => "B1 234",
            'country' => "England",
        ]);

        // Create order
        $order = Order::create([
            'user_id' => User::where('email', 'test@example.com')->first()->id,
            'total' => 100,
            'name' => "Test",
            'address' => "64 Zoo Lane",
            'city' => "Birmingham",
            'postcode' => "B1 234",
            'country' => "England",
        ]);


        // Box::factory(50)->create();

        $this->call([
            BoxSeeder::class,  
        ]);

        $tagNames = ['Summer','Green','Low Fat','High Fat','Fiber Rich','Fruit','Veggies','British'];
        foreach($tagNames as $name){
            Tag::create(['name' => $name]);
        }
        
        $boxes = Box::all();
        $tags = Tag::all();

        foreach($boxes as $box){
            $randomTags = $tags->random(rand(1, 4));
            $box->tags()->attach($randomTags);
        }

        // Recipe Seeder
        $this->call(RecipesSeeder::class);

        
    }
}
