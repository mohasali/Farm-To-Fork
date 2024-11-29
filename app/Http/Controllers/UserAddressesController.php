<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    //Validate Address Inputs
    $validate = $request->validate([
        'address_line_1' => 'required|max:255'
        'address_line_2' => 'nullable|max:255'
        'postcode' => 'required|max:8'
        'town/city' => 'required|max:100'
        'country' => 'required|max:100'
    ])
}
