<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    public function store(){
         //Validate Address Inputs
        $validate = $request->validate([
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'nullable|max:255',
            'postcode' => 'required|max:8',
            'town/city' => 'required|max:100',
            'country' => 'required|max:100',
        ]);
        
        //add user id + 
        // $validate['user_id']

        //add into database
        // Address::create($validated);
    }
}
