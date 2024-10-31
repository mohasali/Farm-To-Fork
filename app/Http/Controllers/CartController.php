<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show() {
        $cartItems = Cart::where('user_id', Auth::id())->with('box')->get();
        return view('cart.show',['cartItems'=>$cartItems]);
        
    }
}
