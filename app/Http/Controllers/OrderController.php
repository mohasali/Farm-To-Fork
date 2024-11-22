<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ItemOrder;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function confirmation(Request $request)
    {
        $attributes = $request->validate(['paymentIntentId' => 'required|string']);
        logger($attributes);
        Stripe::setApiKey(config('cashier.secret'));
        try {
            $paymentIntent = PaymentIntent::retrieve($attributes['paymentIntentId']);
            if ($paymentIntent->status === 'succeeded') {

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total' => $paymentIntent->amount_received / 100,
                    'payment_intent' => $paymentIntent->id,
                    'name' => $paymentIntent->shipping->name,
                    'address' => $paymentIntent->shipping->address->line1,
                    'city' => $paymentIntent->shipping->address->city,
                    'postcode' => $paymentIntent->shipping->address->postal_code,
                    'country' => $paymentIntent->shipping->address->country,

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
                session(['order_confirmed'=>$order->id]);
                return response()->json(['redirectUrl' => route('orders.confirmed')]);

            } else {
                return response()->json(['message' => 'Payment not completed.'], 400);
            }
        } catch (ApiErrorException $e) {
            return response()->json(['message' => 'Error processing payment.'], 500);
        }
    }

    public function confirmed()
    {

       $orderId = session('order_confirmed');
        if (!$orderId) {
            return redirect('/');
        }
        session()->forget('order_confirmed');
        $order = Order::findOrFail($orderId);

        return view('order.confirmed',['order'=>$order]);
    }
}
