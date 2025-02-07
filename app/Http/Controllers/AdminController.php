<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function userdetailmanagement(){
        return view('admin.userdetailmanagement');
    }
}
