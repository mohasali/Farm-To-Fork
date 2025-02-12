<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function user(){
        return view('account.user');
    }
    
    public function edit(){
        return view('account.edit');
    }

    public function orders(){
        $orders = Auth::user()->orders()->with('itemOrders.box')->get();

        return view('account.orders',['orders'=>$orders]);
    }

    public function paymentedit(){
        return view('account.paymentedit');
    }

    public function address(){
        $addresses = Auth::user()->addresses()->get();

        return view('account.address',['addresses'=>$addresses]);
    }

    public function subscription(){
        return view('account.subscription');
    }

    public function rewards(){
        return view('account.rewards');
    }

    public function payments(){
        return view('account.payments');
    }

    public function contactpref(){
        return view('account.contactpref');
    }
}
