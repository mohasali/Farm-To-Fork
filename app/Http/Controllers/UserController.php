<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPassword;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $attributes['upvotes'] = 0;

        $images = [];
        $files = File::files('images/Account');
        foreach ($files as $file) {
            // Check if its an image file
            $extension = strtolower($file->getExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png','webp'])) {
                // Convert path to web URL
                $relativePath = 'images/Account/'. $file->getFilename();
                $images[] = '/' . $relativePath;
            }
        }

        $attributes['pfp'] = $images[array_rand($images)];
        $user = User::create($attributes);
        Reward::create(['user_id'=>$user->id]);
        Auth::login($user);

        //send out welcome email
        Mail::to(request('email'))->send(new Welcome());

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

            // Password
            if ($field === 'password') {
                $validatedData = $request->validate([
                    'password_current' => ['required'],
                    'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
                ]);

                // Check if current = current
                if (!Hash::check($validatedData['password_current'], $user->password)){
                    return back()->withErrors(['password_current' => 'The current password is incorrect']);
                }
                // Update password
                $user->password = bcrypt($validatedData['password']);
                $user->save();
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

    public function updateContactPreferences(Request $request){
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

    // Show customer
    public function show($id){
        $user = User::with('orders.itemOrders.box')->findOrFail($id);
        return view('customer.show', compact('user'));
    }

    // Delete customer
    public function destroy($id){
        $user = User::findOrFail($id);
        
        // Check if admin
        if (!auth()->user()->isAdmin) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        
        $user->delete();
        
        return redirect('/admin/customers')->with('success', 'Customer deleted successfully');
    }

    // Admin edit customer -
    public function edit($id, $field){
        $user = User::findOrFail($id);
        
        // Check if admin
        if (!auth()->user()->isAdmin) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        
        return view('customer.edit', compact('user', 'field'));
    }

    public function updateAdmin(Request $request, $id){
        $user = User::findOrFail($id);
        
        // Check if admin
        if (!auth()->user()->isAdmin) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        
        $field = $request->field;
        
        // Validation
        if ($field == 'name') {
            // Name
            $request->validate(['name' => 'required|string|max:255']);
        } elseif ($field == 'email') {
            // Email
            $request->validate(['email' => 'required|email|unique:users,email,'.$user->id]);
        } elseif ($field == 'phone') {
            // Phone
            $request->validate(['phone' => 'nullable|string|max:20']);
        } elseif ($field == 'password') {
            // Password
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect('/customer/' . $user->id)->with('success', 'Password updated successfully');
        }
        
        $user->$field = $request->$field;
        $user->save();
        
        return redirect('/customer/' . $user->id)->with('success', ucfirst($field) . ' updated successfully');
    }

    /*Forgot Password
    *
       Checks if email is associated with account and sends out reset link if yes
       Uses token to only reset if an email has been sent out with the reset link
    */
    public function forgotPassword(){
       $email = request('email');

       if (User::where('email', '=', request('email'))->exists()){
            
            $token = Str::random(64);

            DB::table('password_reset')->insert([
                'email' => $email,
                'token' => $token,
            ]);


            Mail::to($email)->send(new ForgotPassword($token), ['token' => $token]);
            return redirect()->back()->with('success', 'Email sent!');
       }

       else{
            return view('auth.register');
       }
    }

    /*
      To change the password after password reset email has been sent to the user
    */
    public function resetPassword(){
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>['confirmed', 'required',Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $updatePassword = DB::table('password_reset')->where([
            'email' => request()->email,
            'token' => request()->token,
        ])->first();

        if(!$updatePassword){
            Log::error("error in update password");
            return redirect()->to(route('/forgot-password'))->with("error", "Invalid");
        }

        User::where("email", request()->email)->update(['password' => Hash::make(request()->password)]);

        DB::table('password_reset')->where(['email' =>request()->email])->delete();

        return redirect()->to(route('login'))->with("success", "Password successfully updated");
    }
}
