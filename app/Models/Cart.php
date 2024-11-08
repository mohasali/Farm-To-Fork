<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $guarded = [];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function box()
        {
            return $this->belongsTo(Box::class);
        }

        public static function getTotal(User $user){
            $cartItems = Cart::getItems($user);
            $total = 0;
            foreach($cartItems as $item){
            $total += $item->box->price * $item->quantity;
            }
            return $total;
        }

        public static function getItems(User $user){
            return Cart::where('user_id', $user->id)->with('box')->get();
        }
}
