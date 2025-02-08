<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function userdetailmanagement(){
        $users = User::all(); // Get all users
        return view('admin.userdetailmanagement', compact('users'));
    }
}
