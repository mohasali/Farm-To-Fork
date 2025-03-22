<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EggHuntController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserAddressesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SiteReviewController;
use App\Models\SiteReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Home / Index
Route::get('/', function () {
    $siteReviews = SiteReview::orderByDesc('site_rating')->take(3)->with('user')->get(); // Display reviews w/ highest rating
    return view('home',['siteReviews'=>$siteReviews]);
})->name('home');

Route::get('/about', function () {
    return view('about');
});


//Site Review Page

Route::get('/review', function(){
    return view('review');
})->middleware('auth');


// Contact Page
Route::get('/contact', function () {
    return view('contact');
});
// Terms and Conditions
Route::get('/tmc', function () {
    return view('tmc');
});
// Cookies
Route::get('/pnc', function () {
    return view('pnc');
});

// Boxes
Route::resource('boxes',BoxController::class);
Route::controller(BoxController::class)->group(function() {
    Route::get('/boxes','index');
    Route::get('/boxes/{box}','show');
    Route::get('/boxes/{box}/review','review')->middleware('auth');
    Route::post('/boxes/{box}/review','addReview')->middleware('auth');

    //Route::get('/boxes/create','create')->middleware('auth');
    //Route::get('/boxes/{box}/edit','edit')->middleware('auth')->can('edit','box');
    //Route::patch('/boxes/{box}','update')->middleware('auth')->can('edit','box');;
    //Route::delete('/boxes.{box}','destroy')->middleware('auth')->can('edit','box');;

});

// Cart
Route::middleware('auth')->controller(CartController::class)->group(function() {

    Route::get('/cart', 'show')->name('cart.show');
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
    Route::get('/account/user','user')->name('account.user');
    Route::get('/account/edit','edit')->name('account.edit');
    Route::get('/account/orders','orders')->name('account.orders');
    Route::get('/account/address','address')->name('account.address');
    Route::get('/account/subscription','subscription')->name('account.subscription');
    Route::get('/account/rewards','rewards')->name('account.rewards');
    Route::get('/account/payments', 'payments')->name('account.payments');
    Route::get('/account/contactpref', 'contactpref')->name('account.contactpref');


    Route::post('/account/payments', 'storePayment');
});

Route::get('/customer/{id}/edit/{field}', [UserController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}/update', [UserController::class, 'updateAdmin'])->name('customer.update');

// Edit account personal information
Route::patch('/user', [UserController::class, 'update'])->name('user.update');

// Edit contact preferences
Route::middleware(['auth'])->group(function () {
    Route::put('/account/update-contact-preferences', [UserController::class, 'updateContactPreferences'])->name('account.update.contact.preferences');
    Route::match(['get', 'post'], '/account/orders/{order}/track', [AccountController::class, 'track'])->name('order.track');
    Route::match(['get', 'post'], '/account/orders/{order}/return', [AccountController::class, 'return'])->name('order.return');
});

// Checkout
Route::get('/checkout', [CheckoutController::class,'index'])->middleware('auth')->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->middleware('auth')->name('checkout.process');
Route::get('/checkout/confirmed',[CheckoutController::class,'confirmed'])->middleware('auth')->name('checkout.confirmed');

//User Addresses
Route::post('/address', [UserAddressesController::class, 'store'])->name('address.save');
Route::patch('/address/{address}', [UserAddressesController::class, 'update'])->name('address.update');
Route::delete('/address/{address}', [UserAddressesController::class, 'delete'])->name('address.delete');

//User Addresses
Route::post('/account/payments', [PaymentController::class, 'store']);
Route::patch('/account/payments/{payment}', [PaymentController::class, 'update'])->name('payment.edit');
Route::delete('/account/payments/{payment}', [PaymentController::class, 'delete'])->name('payment.delete');

// Recipes
Route::get('/recipes', [RecipeController::class, 'recipes']);
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// Admin
Route::middleware(IsAdmin::class)->controller(AdminController::class)->group(function(){
    Route::get('/admin','index')->name('admin.index');
    Route::get('/admin/customers','customers')->name('admin.customers');
    Route::get('/admin/users', 'users')->name('admin.users');
    Route::get('/admin/orders', 'orders')->name('admin.orders');
    Route::get('/admin/inventory', 'inventory')->name('admin.inventory');
    Route::get('/admin/inventory/{box}', 'editInventory')->name('inventory.edit');
    Route::get('/admin/inventory/{box}/add', 'addInventory')->name('inventory.add');
    Route::patch('/admin/orders','updateOrderStatus');
    Route::get('/admin/products', 'products')->name('admin.products');
    Route::post('/admin/products','addProduct');
    Route::post('/admin/inventory/{box}', 'editBox')->name('admin.inventory.edit');
    Route::delete('/admin/inventory/{box}', 'deleteBox')->name('admin.inventory.delete');
    Route::get('/admin/reports','reports')->name('admin.reports');
});

Route::post('/admin/inventory/{box}', [AdminController::class, 'editBox'])->name('admin.inventory.edit');
Route::delete('/admin/inventory/{box}', [AdminController::class, 'deleteBox'])->name('admin.inventory.delete');

// Update customer roles
Route::put('/update-user-role/{id}', function(Request $request, $id) {
    $user = User::findOrFail($id);
    $user->isAdmin = $request->isAdmin;
    $user->save();

    return back()->with('success', 'User role updated successfully.');
})->name('update-user-role');

// Orders
Route::patch('admin/orders/{order}', [CheckoutController::class, 'update'])->name('admin.orders.update')->middleware(IsAdmin::class);

// Customer pages
Route::get('/customer/{id}', [UserController::class, 'show'])->name('user.show');
Route::delete('/customer/{user}', [UserController::class, 'destroy'])->name('customer.remove')->middleware(IsAdmin::class);


//Rewards
Route::post('/account/rewards/stamp',[RewardController::class,'stamp'])->name('reward.stamp');
Route::post('/account/rewards/claim',[RewardController::class,'claimStamps'])->name('reward.claim');

Route::post('/egghunt/claim',[EggHuntController::class,'claim'])->name('eggHunt.claim');
Route::post('/egghunt/add',[EggHuntController::class,'add'])->name('eggHunt.add');


//Reviews - KEEP AT THE BOTTOM 
Route::get('/reviews/{$reviews}', [ReviewController::class, 'show']);
Route::get('/{id}', [SiteReviewController::class, 'show']);
//Route::get('/', [SiteReviewController::class, 'siteReviews']);
Route::post('/review', [SiteReviewController::class, 'store']);