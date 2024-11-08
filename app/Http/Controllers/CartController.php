<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function show() {
        $cartItems = Cart::where('user_id', Auth::id())->with('box')->get();
        $total = 0;
        foreach($cartItems as $item){
           $total += $item->box->price * $item->quantity;
        }
        return view('cart.show',['cartItems'=>$cartItems,'total'=>number_format($total, 2)]);
        
    }

    public function add(Request $request)
    {
        $request->validate([
            'boxId' => 'required|exists:boxes,id',
            'increment' => 'numeric|gt:0'
        ]);
        $cartItem = Cart::firstOrCreate(['box_id'=>$request->boxId,'user_id'=>Auth::user()->id]);

        $increment = $request->input('increment', 1);
        $cartItem->increment('quantity',$increment);

        return redirect()->back()->with(['success'=> 'Item added to cart successfully!','boxId'=>$request->boxId]);
    }

    public function update(Cart $cart){
        request()->validate([
            'quantity' => 'required|numeric|gt:0'
        ]);
        $cart->update(['quantity'=>request('quantity')]);
        return redirect()->back();
    }

    public function delete(Cart $cart){

        $cart->delete();
        return redirect()->back();
    }
}
