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

    public function orders(Request $request){
        $request->validate([
            'status' => 'string',
            'q' => 'integer'
        ]);
        
        $id = $request->input('q');
        $status = $request->input('status');
        
        $query = Order::with(['user', 'itemOrders.box']);
        if ($id) {
            $query->where('id', $id);
        }
        if ($status) {
            $query->where('status', $status);
        }
        $orders = $query->get();
        $statusOptions = ['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled'];
        return view('admin.orders', [
            'orders' => $orders,
            'statusOptions' => $statusOptions
        ]);
        
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
