<x-account-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('account.orders') }}" class="text-gray-600 hover:text-primary mr-4">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
            <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
        </div>

        <div class="border rounded-lg p-4">
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 ">Select items to return</h2>

                @foreach($order->itemOrders as $item)
                    <!-- If item is the last item in array index, remove border-b -->
                    <div class="flex items-center justify-between border-b pb-4">
                        <div>
                            <div class="flex flex-row">
                                <!-- Item title -->
                                <h3 class="font-semibold">{{ $item->box->title }}</h3>
                                <!-- Check item -->
                                <input class="ml-4 mt-1" type="checkbox" id="{{ $item->box->title }}" name="{{ $item->box->title }}" value="{{ $item->box->title }}">
                            </div>
                            <!-- Grab all images -->
                            @php
                                $images = $item->box->getImages();
                            @endphp
                            <div class="flex flex-row">
                            @if (!empty($images))
                                @foreach ($images as $image)
                                    <img src="{{ asset($image) }}" alt="Box Image" class="mx-auto my-4 h-36 object-cover rounded-lg">
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
            <div class="mb-8">
                <div class="flex flex-row">
                    <div>
                        <!-- Reason for return -->
                        <h2 class="text-xl font-semibold mb-4 ">Why are you returning this?</h2>
                        <select class="bg-gray-50 p-4 rounded-lg font-semibold">
                            <option value="" disabled selected>Select your reason</option>
                            <option value="reason1">Damaged or expired products</option>
                            <option value="reason2">Incorrect Item received</option>
                            <option value="reason3">Not as Described</option>
                            <option value="reason4">Late Delivery</option>
                            <option value="reason5">Changed Mind</option>
                            <option value="reason6">Accidental Order</option>
                            <option value="reason7">No Reason</option>
                        </select>
                    </div>
                    <div class="mt-4 ml-32 p-28 rounded-lg text-center">
                        <h6 class="text-md font-semibold mb-4"></h6>
                        <!-- Return -->
                        <a href="{{ route('order.track', $order->id) }}" class="bg-primary text-white p-2 m-2 font-medium rounded-lg hover:bg-accent1 transition">Continue</a>
                        <p class="mt-4 text-sm font-semibold border-b pb-4">Return by {{ $order->updated_at->format('j F, Y') }}</p>
                        <h6>Items you're returning</h6>
                        <!-- Get all images and titles of the items checked -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-account-layout>