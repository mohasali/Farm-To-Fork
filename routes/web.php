<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
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

Route::middleware('auth')->controller(CartController::class)->group(function() {

    Route::get('/cart', 'show');
    Route::post('/cart/add', 'add');
    Route::patch('/cart/{cart}', 'update');
    Route::delete('/cart/{cart}', 'delete');

    Route::get('/checkout', 'checkout');

});

Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/register',[UserController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'show'])->name('login')->middleware('guest');;
Route::post('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('/account', function () {
    return view('/account/user');
})->middleware('auth');

Route::get('/account/user', [AccountController::class, 'user'])->name('account.user');
Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
Route::get('/account/address', [AccountController::class, 'address'])->name('account.address');
Route::get('/account/subscription', [AccountController::class, 'subscription'])->name('account.subscription');
Route::get('/account/payments', [AccountController::class, 'payments'])->name('account.payments');
Route::get('/account/contactpref', [AccountController::class, 'contactpref'])->name('account.contactpref');