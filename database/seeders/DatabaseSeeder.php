<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\Tag;
use App\Models\User;
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
        ]);

        Box::factory(50)->create();

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

        
    }
}
