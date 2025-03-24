<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        Enquiry::truncate();

        // Open the CSV file
        $csvFile = fopen(database_path('data/Enquiry-data.csv'), 'r');

        // Skip the first line (headers)
        $firstline = true;

        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                Enquiry::create([
                    'forename' => $data[0],
                    'surname' => $data[1],
                    'email' => $data[2],
                    'phone' => $data[3],
                    'message' => $data[4],
                    'seen' => (bool) $data[5],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
