<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index(){
        $total =Cart::getTotal(Auth::user());
        $cartItems = Cart::getItems(Auth::user());
        $addresses = Auth::user()->addresses()->get();
        return view('cart.checkout',['total'=>$total,'cartItems'=>$cartItems,'addresses'=>$addresses]);
    }

    public function process(){
        $total = Cart::getTotal(Auth::user());
        Stripe::setApiKey(config('cashier.secret'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $total*100,
            'currency' => 'gbp',
            'metadata' => [
                'user_id' => Auth::id(),
            ],
        ]);

    return response()->json(['clientSecret' => $paymentIntent->client_secret]);
}

}
