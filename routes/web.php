<?php

use App\Http\Controllers\CrateController;
use App\Models\Crate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('crates',CrateController::class);

Route::controller(CrateController::class)->group(function() {
    Route::get('/crates','index');
    Route::get('/crates/{crate}','show');

    //Route::get('/crates/create','create')->middleware('auth');
    //Route::get('/crates/{crate}/edit','edit')->middleware('auth')->can('edit','crate');
    //Route::patch('/crates/{crate}','update')->middleware('auth')->can('edit','crate');;
    //Route::delete('/crates.{crate}','destroy')->middleware('auth')->can('edit','crate');;

});
