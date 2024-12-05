<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class UserAddressesController extends Controller
{
    public function store(Request $request){
         //Validate Address Inputs
        $validate = $request->validate([
            'address' => 'required|max:255',
            'name' => 'required|max:255',
            'postcode' => 'required|max:8',
            'city' => 'required|max:100',
            'country' => 'required|max:100',
        ]);
        $validate['user_id'] = Auth::user()->id;
        
        //add into database
        Address::create($validate);
        return redirect()->back();
    }

    public function update(Address $address){
        $request = request()->validate([
            'address' => 'required|max:255',
            'name' => 'required|max:255',
            'postcode' => 'required|max:8',
            'city' => 'required|max:100',
            'country' => 'required|max:100',
        ]);
       $address->update($request);
       return redirect()->back();

   }
   public function delete(Address $address){
        $address->delete();
        return redirect()->back();

    }
}
