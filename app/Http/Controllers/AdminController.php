<?php

namespace App\Http\Controllers;

use App\Enums\BoxType;
use App\Models\Box;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Tag;
use App\Models\Review;
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
        $statusOptions = ['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled','Returned'];
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
            'status' => 'required|string|in:Pending,Processing,Shipped,Out For Delivery,Delivered,Completed,Canceled,Returned',
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
        // Create the product
        $box = Box::create([
            'title' => $attributes['title'],
            'stock' => $attributes['stock'],
            'price' => $attributes['price'],
            'type' => $attributes['type'],
            'description' => $attributes['description'],
        ]);
        $folderName = str_replace(' ', '_', $box->title);
        $dirPath = public_path('images/Boxes/' . $folderName);
        mkdir($dirPath, 0777, true);

        if($request->hasFile('cover')){
            $request->file('cover')->move( $dirPath, time() . '.' . $request->cover->extension());
        }

        $box->tags()->attach($attributes['tags']);

        return redirect()->back()->with('success', 'Product added successfully!');
    }


    public function editInventory(Request $request, Box $box){
        $tags = Tag::all();
        $types = Box::getEnumTypes();
        return view("admin.inventory-edit",['box'=>$box,'tags'=>$tags,'types'=>$types]);
    }

    public function editBox(Request $request, Box $box){
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

        $box->update([
            'title' => $attributes['title'],
            'stock' => $attributes['stock'],
            'price' => $attributes['price'],
            'type' => $attributes['type'],
            'description' => $attributes['description'],
        ]);
        $box->save();

        $folderName = str_replace(' ', '_', $box->title);
        $dirPath = public_path('images/Boxes/' . $folderName);

        // Check if directory already exists
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0777, true);
        }

        // Check if cover image is uploaded
        if($request->hasFile('cover')){
            $request->file('cover')->move( $dirPath, time() . '.' . $request->cover->extension());
        }

        // Update tags
        $box->tags()->sync($attributes['tags']);

        return redirect()->route('admin.inventory.edit', $box)->with('success', 'Product edited successfully!');;
    }

    public function deleteBox(Box $box){
        $box->delete();
        return redirect()->route('admin.inventory');
    }

    // Increase box stock function
    public function addInventory(Box $box){
        $box->increment('stock');
        return back()->with('success', 'Stock increased successfully');
    }

    // Reports
    public function reports(){
        // Three r's x3 
        $returnedOrders = Order::where('status', 'Returned')->count(); // Returned
        $revenue = Order::where('status', 'Completed')->sum('total'); // Revenue
        $returnRate = Order::count() > 0 ? round((Order::where('status', 'Returned')->count() / Order::count()) * 100, 2) : 0; // Returnrate

        // Pie chart category sales
        $categorySales = Box::selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();

        // Box reviews
        $boxReviews = DB::table('reviews')->count();

        // Site reviews
        $siteReviews = DB::table('site_reviews')->count();

        $data = [
            // Users
            'users' => User::count(),
            'admins' => User::where('isAdmin', true)->count(),

            // Orders
            'numberOfOrders' => Order::count(),
            'avgOrderValue' => Order::whereNotNull('total')->avg('total') ?? 0,
            'noReturnedOrders' => $returnedOrders,
            'returnRate' => $returnRate,
            'revenue' => $revenue,

            // Enquiries
             'enquiries' => Enquiry::count(),

            // Inventory
            'inventoryValue' => Box::sum('price') ?? 0,
            'inventoryItems' => Box::count(),

            // Reviews
            'boxReviews' => $boxReviews,
            'avgBoxRating' => DB::table('reviews')->avg('rating') ?? 0,
            'siteReviews' => $siteReviews,
            'avgSiteRating' => DB::table('site_reviews')->avg('site_rating') ?? 0,
            'categorySales' => $categorySales,
        ];

        return view('admin.reports', compact('data'));
    }
}
