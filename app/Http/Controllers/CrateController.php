<?php

namespace App\Http\Controllers;

use App\Models\Crate;
use Illuminate\Http\Request;

class CrateController extends Controller
{
    public function index(){

        $crates =  Crate::paginate(12);
        return view('crates.index',['crates' =>$crates]);
    }

    public function show(Crate $crate) {
        
        return view('crates.show',['crate'=>$crate]);
    }
}
