<?php

namespace App\Http\Controllers;

use App\Enums\BoxType;
use App\Models\Box;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Tag;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function customers(Request $request){
        $request->validate([
            'q' => 'nullable|string',
            'customer' => 'nullable|in:user,admin', // Validation
        ]);

        // Search query and filter
        $q = $request->input('q');
        $customerType = $request->input('customer');

        // Get all users
        $usersQuery = User::query();

        if ($q) {
            $usersQuery->where('email', 'like', "%$q%");
        }

        // Check if customer is a user or admin
        if ($customerType) {
            if ($customerType === 'user') {
                // User filter
                $usersQuery->where('isAdmin', false);
            } elseif ($customerType === 'admin') {
                // Admin filter
                $usersQuery->where('isAdmin', true);
            }
        }

        // Get users based off the query
        $users = $usersQuery->get();

        return view('admin.customers', compact('users'));
    }


    public function users(Request $request){
        $request->validate([
            'q' => 'string'
        ]);
        $q = $request->input('q');
        $users = User::with('orders.itemOrders.box', 'addresses'); // Get all users

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
    public function inventory(Request $request){
        $request->validate([
            'q' => 'string',
            'type' => ['string', 'in:Seasonal,Meat & Dairy,Dynamic Pricing,Locally Sourced,Cultural Recipe'],
        ]);
        $q = $request->input('q');
        $type = $request->input('type');
        $boxes = Box::with('tags');

        if ($q) {
            $boxes->where('title', 'like', "%$q%");
        }
        if ($type) {
            $boxes->where('type', $type);
        }
        $boxes = $boxes->get();
        $types = Box::getEnumTypes();
        return view('admin.inventory',['boxes'=>$boxes,'types'=>$types]);

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
        $tags = Tag::all();
        $types = Box::getEnumTypes();
        return view('admin.products',['tags'=>$tags,'types'=>$types]);
    }
    public function addProduct(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:1', 'max:100'],
            'price' => ['required', 'numeric', 'min:1', 'max:100'],
            'type' => ['required', 'string', 'in:Seasonal,Meat & Dairy,Dynamic Pricing,Locally Sourced,Cultural Recipe'],
            'tags' => ['required', 'array'],
            'tags.*' => ['exists:tags,id'],
            'description' => ['required', 'string', 'max:1000'],
            'cover' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);
        $imagePath = $request->hasFile('cover') 
            ? $request->file('cover')->move('images\covers', time() . '.' . $request->cover->extension()) 
            : 'images/covers/default_cover.png';

        // Create the product
        $box = Box::create([
            'title' => $attributes['title'],
            'stock' => $attributes['stock'],
            'price' => $attributes['price'],
            'type' => $attributes['type'],
            'description' => $attributes['description'],
            'imagePath' => '/'.$imagePath,
        ]);

        $box->tags()->attach($attributes['tags']);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
