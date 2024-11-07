<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    
    public function store(){
        $attributes = request()->validate(['name'=>['required'],
                             'email'=>['required','email','unique:users,email','confirmed'],
                             'password'=>['confirmed','required',Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        $user = User::create($attributes);
        Auth::login($user);

        return redirect('/');
    }

    public function update(){
        $attributes = request()->validate(['name'=>['required'],
                             'email'=>['required','email','unique:users,email'],
                             'password'=>['confirmed','required',Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
    }
}
