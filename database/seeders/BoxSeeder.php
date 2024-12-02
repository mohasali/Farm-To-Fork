<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Box

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    Box::create({
        'title' => ,
            'type' => ,
            'description' => ,
            'price' => ,
            'imagePath' => '/images/crate.jpg'
    })
    }
}
