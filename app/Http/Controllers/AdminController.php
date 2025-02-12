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

    public function userdetailmanagement(){
        $users = User::all(); // Get all users
        return view('admin.userdetailmanagement', compact('users'));
    }

    public function orderprocessinglist(){
        $orders = Order::all(); // Get all orders
        return view('admin.orderprocessinglist', compact('orders'));
    }

    public function addproduct(){
        return view('admin.addproduct');
    }
}
