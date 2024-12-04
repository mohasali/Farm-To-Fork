<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Box;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Box::truncate();

        // open csv file
        $boxCSV = fopen(base_path("database/data/Box-data.csv"),"r");
        // disregards the firstline - headings
        $firstline = true;
        //reads the data
        while(($data=fgetcsv($boxCSV,5000,",")) !==False){
            if(!$firstline){
                Box::create([
                    'title' => $data[0],
                    'type' => $data[1],
                    'price'=> number_format($data[2],2,'.',','),
                    'description'=> $data[3],

                    'imagePath' => '/images/crate.jpg'
                ]);
            }
            $firstline = false;
        }

    fclose($boxCSV);
    }

}
