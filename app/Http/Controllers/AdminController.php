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

    public function users(Request $request){
        $request->validate([
            'q' => 'string'
        ]);
        $q = $request->input('q');
        $users = User::with('orders.itemOrders.box'); // Get all users

        if ($q) {
            $users->where('email', 'like', "%$q%");
        }
        $users = $users->get();
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
