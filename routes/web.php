<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
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

Route::controller(CartController::class)->group(function(){

    Route::get('/cart',[CartController::class,'show'])->middleware('auth');
    Route::get('/checkout',[CartController::class,'checkout'])->middleware('auth');

});

Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/register',[UserController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'show'])->name('login')->middleware('guest');;
Route::post('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');