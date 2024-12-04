<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// Home / Index
Route::get('/', function () {
    return view('home');
});

// Boxes
Route::resource('boxes',BoxController::class);
Route::controller(BoxController::class)->group(function() {
    Route::get('/boxes','index');
    Route::get('/boxes/{box}','show');

    //Route::get('/boxes/create','create')->middleware('auth');
    //Route::get('/boxes/{box}/edit','edit')->middleware('auth')->can('edit','box');
    //Route::patch('/boxes/{box}','update')->middleware('auth')->can('edit','box');;
    //Route::delete('/boxes.{box}','destroy')->middleware('auth')->can('edit','box');;

});

// Cart
Route::middleware('auth')->controller(CartController::class)->group(function() {

    Route::get('/cart', 'show');
    Route::post('/cart/add', 'add');
    Route::patch('/cart/{cart}', 'update');
    Route::delete('/cart/{cart}', 'delete');
});

// Register
Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/register',[UserController::class,'store'])->middleware('guest');
Route::patch('/user',[UserController::class,'update'])->middleware('auth');

// Login
Route::get('/login',[SessionController::class,'show'])->name('login')->middleware('guest');
Route::post('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

// Account management
Route::middleware('auth')->controller(AccountController::class)->group(function() {
    Route::get('/account','user')->name('account.user');
    Route::get('/account/edit','edit')->name('account.edit');
    Route::get('/account/orders','orders')->name('account.orders');
    Route::get('/account/address','address')->name('account.address');
    Route::get('/account/subscription','subscription')->name('account.subscription');
    Route::get('/account/rewards','rewards')->name('account.rewards');
    Route::get('/account/payments', 'payments')->name('account.payments');
    Route::get('/account/contactpref', 'contactpref')->name('account.contactpref');
});

// Checkout
Route::get('/checkout', [CheckoutController::class,'index'])->middleware('auth')->name('checkout');;
Route::post('/checkout/process', [CheckoutController::class, 'process'])->middleware('auth')->name('checkout.process');

// Order
Route::post('/order/confirmation',[OrderController::class,'confirmation'])->middleware('auth')->name('order.confirmation');;
Route::get('/order/confirmed',[OrderController::class,'confirmed'])->middleware('auth')->name('orders.confirmed');

//User Addresses
Route::post('/user_addresses', [UserAddressesController::class, 'store'])->name('user.addresses');
//Route::get('/user_addresses', [UserAddressesController::class, 'store'])->name('user.')

// Recipes
Route::controller(RecipeController::class)->group(function(){
    Route::get('/recipes', 'recipes');
});
