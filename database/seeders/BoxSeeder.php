<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Box;
Use App\Enums\BoxType;


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

                $type = $this->mapType($data[1]);

                # To-Do: create an exception if type is invalid
                
                Box::create([
                    'title' => $data[0],
                    'type' => $type ,
                    'price'=> number_format($data[2],2,'.',','),
                    'description'=> $data[3],

                    'imagePath' => '/images/Farm-to-ForkBox1.png'
                ]);
            }
            $firstline = false;
        }

    fclose($boxCSV);
    }

    private function mapType(string $types): ?BoxType
    {
        return match ($types){
            'Cultural Boxes'=> BoxType::C,
            'Seasonal Boxes'=>BoxType::S,
            'Meat/Dairy Boxes'=>BoxType::M,
            'Dynamic Pricing'=>BoxType::D,
            'Locally Sourced Boxes'=>BoxType::L,
            default => null
        };
    }
    
}
