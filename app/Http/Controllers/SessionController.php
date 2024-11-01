<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    
    public function show(){
        return view('auth.login');
    }

    public function create(){
        $credentials = request()->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        if(!Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email'=>'Sorry, the credentials do not match',
            ]);
        }
        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
