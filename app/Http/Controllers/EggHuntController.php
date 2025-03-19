<?php

namespace App\Http\Controllers;

use App\Models\EggHunt;
use App\Models\PromoCode;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class EggHuntController extends Controller
{
    public function claim(){
        if(Auth::user()->eggHunt()->count()<5){
            return redirect()->route('home');
        }

        if (DB::table('egg_claims')->where('user_id', Auth::id())->exists()) {
            return redirect()->route('home');
        }


        $code = strtoupper(Str::random(8));
        PromoCode::create([
            'code'=>$code,
            'value'=>0.10,
            'user_id'=>Auth::user()->id,
            'title'=>'10% Off',
            'description'=>"Congrats on finding all the eggs!"]);


        DB::table('egg_claims')->insert([
            'user_id' => Auth::id(),
            'claimed' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('home');

    }

    public function add(Request $request){

        if (Auth::user()->eggHunt()->where('egg_id', $request['id'])->exists()) {
            return redirect()->route('home');
        }
        EggHunt::create([
            'user_id' =>Auth::id(),
            'egg_id'=>$request['id']
        ]);

        return redirect()->back();
    }


    // Basically need to be able to add to the count. Need to check ammount of eggs. Need to set a new promo code with a 10% discount. Also we have 6 eggs How do we know when a user has that egg
}
