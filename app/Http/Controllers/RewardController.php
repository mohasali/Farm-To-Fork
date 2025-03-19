<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class RewardController extends Controller
{

    public function stamp()
    {
        $reward = Auth::user()->reward;

        // Check if the user has already stamped in the last 24 hours
        if ($reward->last_stamp && strtotime($reward->last_stamp) > strtotime('-24 hours')) {
            return redirect()->route('account.rewards');
        }
        if($reward->stamp > 6){
            return redirect()->route('account.rewards');

        }
        $reward->stamps += 1;
        $reward->last_stamp = now(); // Use current timestamp
        $reward->save();
    
        return redirect()->route('account.rewards');
    }
    
    public function claimStamps(){
        $reward = Auth::user()->reward;
        if($reward->stamps < 6){
            dd('tot');
            return redirect()->route('account.rewards');
        }
        $code = strtoupper(Str::random(8));
        PromoCode::create([
            'code'=>$code,
            'value'=>0.05,
            'user_id'=>Auth::user()->id,
            'title'=>'5% Off',
            'description'=>"Daily Stamps Promotional Code"]);
        
        $reward->stamps = 0;
        $reward->save();
        return redirect()->route('account.rewards');

    }
}
