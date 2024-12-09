<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    
    public function store(){
        $attributes = request()->validate(['name'=>['required'],
                             'email'=>['required','email','unique:users,email','confirmed'],
                             'phone' => ['required', 'string', 'min:10', 'max:15'],
                             'password'=>['confirmed','required',Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        $user = User::create($attributes);
        Auth::login($user);

        return redirect('/');
    }

    public function update(Request $request){
    $attributes = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
        'phone' => ['required', 'string', 'min:10', 'max:15'],
        'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
    ]);

    $user = Auth::user();

    $user->name = $attributes['name'];
    $user->email = $attributes['email'];
    $user->phone = $attributes['phone']; 
    
    if (!empty($attributes['password'])) {
        $user->password = bcrypt($attributes['password']);
    }

    $user->save();

    return redirect(route('account.user'))->with('success', 'Your profile has been updated.');
}

}
