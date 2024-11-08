<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ItemOrder;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function complete(Request $request)
    {
        try {
            $paymentIntentId = $request->get('payment_intent');
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            
            if ($paymentIntent->status === 'succeeded') {

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total' => $paymentIntent->amount_received / 100,
                    'payment_intent' => $paymentIntent->id,
                ]);

                $items = Cart::getItems(Auth::user());

                foreach ($items as $item) {
                    ItemOrder::create([
                        'order_id' => $order->id,
                        'box_id' => $item->box_id,
                        'quantity' => $item->quantity,
                    ]);
            
                    $item->delete();
                }
            
                return view('order.confirmation', ['order' => $order,'paymentIntent' => $paymentIntent]);

            } else {
                return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
            }
        } catch (ApiErrorException $e) {
            return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
        }
    }
}
