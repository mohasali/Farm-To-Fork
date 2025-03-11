<x-account-layout>
    <h1 class="text-2xl font-semibold mb-4">Your Orders</h1>
    <p class="text-sm text-gray-500 mb-6">Review past orders with their details below.</p>
    <div class="overflow-y-auto h-[428px] space-y-4">
    <section class="gap-4 max-w-4xl mx-auto text-center">
        <form class="relative w-full md:w-80 flex" method="GET">
            <input name="q" autocomplete="off" type="text" placeholder="Search for an order..." 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
            <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form> 
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
                        {{ $order->status }}
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
                        <!-- Return -->
                        <a href="{{ route('order.return', $order->id) }}" class="bg-gray-200 p-2 m-2 font-medium rounded-lg hover:bg-gray-300 transition">Return</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-account-layout>
