<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Box;
use App\Enums\BoxType;

class DynamicPricing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dynamic-pricing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Price of items changes every couple of minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dynamicBox = Box::where('type',BoxType::D->value)-> get();

        foreach($dynamicBox as $box){
            # creates a random 2 dp float between £14 - £25
            $newPrice = mt_rand(1400,2500)/100;

            $box->update(['price' => round($newPrice, 2)]);
        }

    }
}
