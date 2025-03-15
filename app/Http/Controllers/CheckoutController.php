<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\ItemOrder;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    public function index(){
        $total =Cart::getTotal(Auth::user());
        $cartItems = Cart::getItems(Auth::user());
        $addresses = Auth::user()->addresses()->get();
        return view('cart.checkout',['total'=>$total,'cartItems'=>$cartItems,'addresses'=>$addresses]);
    }

    public function process(Request $request)
    { 
        // Remove spaces from the card number before validation
        $request->merge([
            'card' => str_replace(' ', '', $request->input('card'))
        ]);     

        // Validate the request data
        $attributes = $request->validate([
            'address' => 'required|max:255',
            'name' => 'required|max:255',
            'postcode' => 'required|max:8',
            'city' => 'required|max:100',
            'country' => 'required|max:100',
            'phone' => 'required|numeric|digits_between:10,15',
            'card' => 'required|digits:16',
            'cvv' => 'required|digits_between:3,4',
            'exp' => ['required', 'date_format:m/y', 'after:today'],
        ], [
            'exp.after' => 'The expiration date must be after the end of the current month.',
            'exp.date_format' => 'The expiration date must be in the format MM/YY.',
            'exp.required' => 'The expiration date is required.',
        ]);
        

        // Get the total from the cart
        $total = Cart::getTotal(Auth::user());

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'name' => $attributes['name'],
            'address' => $attributes['address'],
            'city' => $attributes['city'],
            'postcode' => $attributes['postcode'],
            'country' => $attributes['country'],
        ]);

        // Get the items from the cart
        $items = Cart::getItems(Auth::user());

        // Loop through the items and create an ItemOrder record for each
        foreach ($items as $item) {
            ItemOrder::create([
                'order_id' => $order->id,
                'box_id' => $item->box_id,
                'quantity' => $item->quantity,
            ]);

            // Delete the item from the cart after processing it
            $item->delete();
        }

        // Store the order ID in the session for confirmation view
        session(['order_confirmed' => $order->id]);

        // Return the confirmation view
        return redirect('checkout/confirmed');
    }


    public function confirmed()
    {

       $orderId = session('order_confirmed');
        if (!$orderId) {
            return redirect('/');
        }
        session()->forget('order_confirmed');
        $order = Order::findOrFail($orderId);

        return view('cart.confirmed',['order'=>$order]);
    }

    // Update order status
    public function update(Request $request, Order $order)
    {
        // Validate the request data
        $request->validate([
            'status' => ['required', Rule::in(['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled'])]
        ]);
        
        // Update the order status
        $order->update([
            'status' => $request->status
        ]);

        // Return with success message
        return back()->with('success', 'Order status updated successfully');
    }

}
