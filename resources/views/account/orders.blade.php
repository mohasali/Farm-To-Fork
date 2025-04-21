<x-account-layout>
    <h1 class="text-2xl font-semibold mb-4">Your Orders</h1>
    <p class="text-sm text-gray-500 mb-6">Review past orders with their details below.</p>
    <div class="overflow-y-auto h-[428px] space-y-4">
    <section class="gap-4 max-w-4xl mx-auto text-center">

    </section>
        @foreach ($orders as $order)
            <div class="bg-white border rounded-lg shadow-md p-4">
                <div class="mb-2">
                    <span class="text-lg font-bold text-primary">Order Number: {{ $order->id }}</span>
                    <span class="text-sm text-gray-500">({{ $order->created_at->format('j F, Y') }})</span>
                </div>
                <div>
                    <h3 class=" font-[550] text-lg">Items Ordered:</h3>
                    <ul class="list-disc list-inside ml-4">
                        @foreach ($order->itemOrders as $item)
                            <li class="text-gray-600">
                                <span class="font-semibold">{{ $item->box->title }}</span>
                                <span class="text-sm text-gray-500"> - Quantity: {{ $item->quantity }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-4">
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold">Status:</span> 
                        <span class="text-sm px-3 py-1 rounded-lg text-white
                            @if($order->status == 'Pending') bg-yellow-500 
                            @elseif($order->status == 'Processing') bg-blue-500 
                            @elseif($order->status == 'Shipped') bg-indigo-500 
                            @elseif($order->status == 'Out For Delivery') bg-orange-500 
                            @elseif($order->status == 'Delivered') bg-green-500 
                            @elseif($order->status == 'Completed') bg-emerald-500 
                            @elseif($order->status == 'Returned') bg-pink-500 
                            @else bg-red-500 @endif">
                            {{ $order->status }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold">Shipping Address:</span> 
                        {{ $order->address }}, {{ $order->city }}, {{ $order->postcode }}, {{ $order->country }}
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold">Total:</span> £{{ number_format($order->total, 2) }}
                    </p>
                    <div class="flex flex-row">
                        <!-- Track order -->
                        <a href="{{ route('order.track', $order->id) }}" class="bg-primary text-white p-2 m-2 font-medium rounded-lg hover:bg-accent1 transition">Track Order</a>
                        <!-- Show return button only for Pending, Processing and Shipped orders -->
                        @if ($order->status == 'Delivered' || $order->status == 'Completed')
                            <!-- Return -->
                            <a href="{{ route('order.return', $order->id) }}" class="bg-gray-200 p-2 m-2 font-medium rounded-lg hover:bg-gray-300 transition">Return</a>
                        @elseif ($order->status == 'Pending' || $order->status == 'Processing' || $order->status == 'Shipped')
                            <!-- Cancel -->
                            <a href="{{ route('order.cancel', $order->id) }}" class="bg-red-500 text-white p-2 m-2 font-medium rounded-lg hover:bg-red-600 transition">Cancel</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-account-layout>
