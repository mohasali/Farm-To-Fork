<x-account-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('account.orders') }}" class="text-gray-600 hover:text-primary mr-4">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
            <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
        </div>

        <div class="bg-white rounded-lg p-6">
            <!-- Order Status Timeline -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 ">Order Status</h2>
                <div class="relative">
                    <!-- Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-px bg-gray-200"></div>
                    @php
                        $statuses = ['Pending','Processing','Shipped','Out For Delivery','Delivered','Completed','Canceled'];
                        $currentStatus = array_search($order->status, $statuses);
                    @endphp
                    
                    @foreach($statuses as $index => $status)
                        <div class="relative mb-8">
                            <div class="flex items-center">
                                <div class="absolute left-1/2 transform -translate-x-1/2">
                                    <!-- Circle -->
                                    <div class="w-8 h-8 rounded-full {{ $index <= $currentStatus ? 'bg-primary' : 'bg-gray-200' }} flex items-center justify-center">
                                        <!-- Checkmark -->
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                </div>
                                <!-- Statuses , left , right -->
                                <div class="{{ $index % 2 == 0 ? 'pr-16 text-right w-1/2' : 'pl-16 w-1/2 ml-auto' }}">
                                    <h3 class="font-semibold">{{ $status }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Details -->
            <div class="bg-white border rounded-lg shadow-md p-4">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Order Details</h2>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Order Date:</span> {{ $order->updated_at->format('j F, Y H:i') }}</p>
                        <p><span class="font-semibold">Total:</span> £{{ number_format($order->total, 2) }}</p>
                        <p>
                            <span class="font-semibold">Payment Status:</span>
                            <span class="text-green-600">Paid</span>
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold mb-4">Shipping Details</h2>
                    <div class="space-y-2">
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->city }}, {{ $order->postcode }}</p>
                        <p>{{ $order->country }}</p>
                    </div>
                </div>
                <!-- Order Items -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Items Ordered</h2>
                    <div class="space-y-4">
                        @foreach($order->itemOrders as $item)
                            <!-- If item is the last item in array index, remove border-b -->
                            <div class="flex items-center justify-between border-b pb-4">
                                <div>
                                    <h3 class="font-semibold">{{ $item->box->title }}</h3>
                                    <!-- Grab all images -->
                                    @php
                                        $images = $item->box->getImages();
                                    @endphp
                                    <div class="flex flex-row">
                                    @if (!empty($images))
                                        @foreach ($images as $image)
                                            <img src="{{ asset($image) }}" alt="Box Image" class="mx-auto my-4 h-48 object-cover rounded-lg">
                                        @endforeach
                                    @else
                                        <p class="text-black">No images available.</p>
                                    @endif
                                    </div>
                                    <!-- Item quantity -->
                                    <p class="w-16 h-16 object-covsm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                    <p class="font-semibold">£{{ number_format($item->box->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-account-layout>
