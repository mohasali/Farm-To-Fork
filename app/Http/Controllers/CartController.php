<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function show() {
        $cartItems = Cart::getItems(Auth::user());
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
        
        if($cartItem->box->stock >= $cartItem->quantity + (int)$increment){         
            $cartItem->increment('quantity',$increment);

            return redirect()->back()->with(['success'=> 'Item added to cart successfully!']);
        }

        if($cartItem->quantity == 0){
            $cartItem->delete();
        }
        return redirect()->back()->with(['message'=> 'Not enough items in stock.']); 
    }

    public function update(Cart $cart){
        request()->validate([
            'quantity' => 'required|numeric|gt:0'
        ]);
        if($cart->box->stock >= request('quantity')){ 
            $cart->update(['quantity'=>request('quantity')]);        
            return redirect()->back();
        }
        return redirect()->back()->with(['message'=> 'Not enough items in stock.']); 

    }

    public function delete(Cart $cart){

        $cart->delete();
        return redirect()->back();
    }
}
