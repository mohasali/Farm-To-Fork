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
        $orders = Order::with(['user', 'itemOrders.box'])->get(); // Get all orders
        $statusOptions = ['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled'];
        return view('admin.orders', ['orders'=>$orders,'statusOptions'=>$statusOptions]);
    }

    public function updateOrderStatus(Request $request)
    {
        $attributes = $request->validate([
            'status' => 'required|string|in:Pending,Processing,Shipped,Out For Delivery,Delivered,Completed,Canceled',
            'orderId' => 'required'
        ]);
    
        $order = Order::findOrFail($attributes['orderId']);
        $order->status = $attributes['status'];
        $order->save();
    
        return redirect()->back();
    }
    

    public function products(){
        return view('admin.products');
    }
}
