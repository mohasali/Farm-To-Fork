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
        $user = Auth::user();
        $field = $request->query('field');

        try {
            $validatedData = [];

            // If statements to only update the chosen field

            // Name
            if ($field === 'name') {
                $validatedData = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                ]);
                $user->name = $validatedData['name'];
            }
            
            // Email
            if ($field === 'email') {
                $validatedData = $request->validate([
                    'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                ]);
                $user->email = $validatedData['email'];
            }

            // Phone
            if ($field === 'phone') {
                $validatedData = $request->validate([
                    'phone' => ['required', 'string', 'min:10', 'max:15'],
                ]);
                $user->phone = $validatedData['phone'];
            }

            // Phone
            if ($field === 'password') {
                $validatedData = $request->validate([
                    'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
                ]);
                $user->password = bcrypt($validatedData['password']);
            }

            // Save if a field has been updated
            if (!empty($validatedData)) {
                $user->save();
                return redirect(route('account.user'))->with('success', ucfirst($field) . ' updated successfully.'); // ucfirst = first character to uppercase
            }

            return redirect(route('account.user'))->with('error', 'Invalid request.');
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        }
    }

    public function updateContactPreferences(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'contact_preferences' => 'nullable|array', // nullable = optional
            'contact_preferences.*' => 'in:email,phone', // Get email/phone
        ]);

        $user->update([
            'contact_preferences' => json_encode($validatedData['contact_preferences'] ?? []), // if no preferences, save an empty array
        ]);

        return redirect(route('account.contactpref'))->with('success', 'Contact preferences updated successfully.');
    }



}
