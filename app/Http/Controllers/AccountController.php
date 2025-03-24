<?php

namespace App\Http\Controllers;

use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Refund;
class AccountController extends Controller
{
    public function user(){
        return view('account.user');
    }
    
    public function edit(){
        return view('account.edit');
    }

    public function orders(){
        $orders = Auth::user()->orders()->with('itemOrders.box')->get();

        return view('account.orders',['orders'=>$orders]);
    }

    public function paymentedit(){
        return view('account.paymentedit');
    }

    public function address(){
        $addresses = Auth::user()->addresses()->get();

        return view('account.address',['addresses'=>$addresses]);
    }

    public function subscription(){
        return view('account.subscription');
    }

    public function rewards(){        
        $reward = Auth::user()->reward;
        $promoCodes = Auth::user()->promoCodes;
        return view('account.rewards',['reward'=>$reward,'promoCodes'=>$promoCodes]);
    }

    public function payments(){
        $payments = Auth::user()->payments()->get();
        return view('account.payments',['payments'=>$payments]);
    }

    public function contactpref(){
        return view('account.contactpref');
    }

    public function track(Order $order){
        // Allow users to view their own orders
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('account.order-track', [
            'order' => $order,
        ]);
    }

    public function return(Request $request, Order $order)
    {
        if ($request->isMethod('post')) {
            // Validate request
            $validated = $request->validate([
                'items' => 'required|array',
                'reason' => 'required|string',
                'return' => 'required|in:payment,replacement'
            ]);

                
            foreach($validated['items'] as $id){
                $itemOrder = ItemOrder::find($id); 
                $itemOrder->returned = true;  
                $itemOrder->save();     
            }

            Refund::create([
                'order_id'=>$order->id,
                'reason'=> $validated['reason'],
                'return'=>$validated['return']
            ]);

            // Update order status to Canceled
            $order->update(['status' => 'Returned']);

            return redirect()->route('account.orders')->with('success', 'Order has been succesfully returned');
        }

        // Display return form
        return view('account.order-return', [
            'order' => $order,
        ]);
    }

    public function cancel(Order $order)
    {
        $order->status = 'Canceled';
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');

    }

    
}
