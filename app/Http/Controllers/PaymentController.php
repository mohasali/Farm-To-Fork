<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request){
        $request->merge([
            'card' => str_replace(' ', '', $request->input('card'))
        ]);   
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'card' => 'required|digits:16',
            'cvv' => 'required|digits_between:3,4',
            'expiry' => ['required', 'date_format:m/y', 'after:today']
        ]);
        $attributes['user_id'] = Auth::id();
        Payment::create($attributes);

        return redirect()->back();
    }

    public function update(Request $request, Payment $payment){
        $request->merge([
            'card' => str_replace(' ', '', $request->input('card'))
        ]);   
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'card' => 'required|digits:16',
            'cvv' => 'required|digits_between:3,4',
            'expiry' => ['required', 'date_format:m/y', 'after:today']
        ]);
        $attributes['user_id'] = Auth::id();

        $payment->update($attributes);
        return redirect()->back();
    }

    public function delete(Payment $payment){
        $payment->delete();
        return redirect()->back();

    }
}
