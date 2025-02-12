<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function users(){
        $users = User::all(); // Get all users
        return view('admin.users', compact('users'));
    }

    public function orders(){
        $orders = Order::all(); // Get all orders
        return view('admin.orders', compact('orders'));
    }

    public function products(){
        return view('admin.products');
    }
}
