<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan ::command('app:dynamic-pricing',function(){
    $this-> call(\App\Console\Commands\DynamicPricing::class);
})->describe('Start dynamic Pricing update');
