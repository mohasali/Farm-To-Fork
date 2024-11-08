<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function user(){
        return view('account.user');
    }
    
    public function edit(){
        return view('account.edit');
    }

    public function orders(){
        return view('account.orders');
    }

    public function address(){
        return view('account.address');
    }

    public function subscription(){
        return view('account.subscription');
    }

    public function payments(){
        return view('account.payments');
    }

    public function contactpref(){
        return view('account.contactpref');
    }
}
