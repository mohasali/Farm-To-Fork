<?php

use App\Http\Controllers\BoxController;
use App\Models\Box;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('boxes',BoxController::class);

Route::controller(BoxController::class)->group(function() {
    Route::get('/boxes','index');
    Route::get('/boxes/{box}','show');

    //Route::get('/boxes/create','create')->middleware('auth');
    //Route::get('/boxes/{box}/edit','edit')->middleware('auth')->can('edit','box');
    //Route::patch('/boxes/{box}','update')->middleware('auth')->can('edit','box');;
    //Route::delete('/boxes.{box}','destroy')->middleware('auth')->can('edit','box');;

});
