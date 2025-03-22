@props(['user'])

<!-- User Card -->
<div class="bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
    <!-- Customer Image -->
    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
        <div class="w-16 h-16 rounded-full overflow-hidden">
            <!-- User image else default image -->
            <img src="{{ $user->pfp ?? '/images/Account/default_chicken.png' }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
        </div>
        <div class="text-center md:text-left">
            <h3 class="font-medium text-lg">{{ $user->name }}</h3>
            <p class="text-gray-500">{{ $user->email }}</p>
        </div>
    </div>

    <!-- Customer Info -->
    <div class="w-full mt-4 flex flex-col md:flex-row md:justify-end">
        <!-- Buttons -->
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
            <button class="bg-gray-100 rounded-lg py-2 px-4 w-full md:w-auto" onclick="viewOrders({{ $user->id }})">Personal Order History</button>
            <button class="bg-gray-100 rounded-lg py-2 px-4 w-full md:w-auto" onclick="viewUserInfo({{ $user->id }})">Expand Info</button>
        </div>
    </div>

    <!-- Expand Info | User Information -->
    <div id="info_{{ $user->id }}" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-[90%] md:max-w-[900px] h-auto max-h-[80vh] overflow-y-auto rounded-xl shadow-lg p-6 relative">
            <!-- Close Button -->
            <button class="absolute top-4 right-4 text-secondary hover:text-primary text-3xl font-bold focus:outline-none" onclick="closeInfo({{ $user->id }})">✕</button>

            <!-- Title -->
            <h2 class="text-2xl md:text-3xl font-extrabold mb-4 text-primary border-b border-gray-300 pb-2">
                User Information
            </h2>

            <!-- User Details -->
            <div class="space-y-4 text-lg text-text">
                <h3 class="text-xl font-bold mb-2 text-secondary">Details</h3>
                
                <div class="flex justify-between border-b border-gray-200 pb-2">
                    <span class="font-semibold">Name:</span>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="flex justify-between border-b border-gray-200 pb-2">
                    <span class="font-semibold">Email:</span>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="flex justify-between border-b border-gray-200 pb-2">
                    <span class="font-semibold">Phone:</span>
                    <span>{{ $user->phone }}</span>
                </div>
                <div class="flex justify-between border-b border-gray-200 pb-2">
                    <span class="font-semibold">Joined:</span>
                    <span>{{ $user->created_at->format('j F, Y') }}</span>
                </div>

                <!-- Addresses Section -->
                <div class="mt-6">
                    <h3 class="text-xl font-bold mb-2 text-secondary">Addresses</h3>
                    <div class="space-y-4">
                        @foreach($user->addresses as $address)
                            <div class="bg-accent2/10 p-4 rounded-lg shadow-sm border-l-4 border-accent2">
                                <p><span class="font-semibold text-secondary">Address Line 1:</span> {{ $address->address }}</p>
                                <p><span class="font-semibold text-secondary">City:</span> {{ $address->city }}</p>
                                <p><span class="font-semibold text-secondary">Country:</span> {{ $address->country }}</p>
                                <p><span class="font-semibold text-secondary">Postal Code:</span> {{ $address->postcode }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Personal Order History -->
    <div id="orders_{{ $user->id }}" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-[90%] md:max-w-[900px] h-auto max-h-[80vh] overflow-hidden rounded-xl shadow-lg p-6 relative">
            <!-- Close Button -->
            <button class="absolute top-4 right-4 text-secondary hover:text-primary text-3xl font-bold focus:outline-none" onclick="closeOrders({{ $user->id }})">
                ✕
            </button>

            <!-- Title -->
            <h2 class="text-2xl md:text-3xl font-extrabold mb-4 text-primary border-b border-gray-300 pb-2">
                Personal Order History
            </h2>

            <!-- Scrollable Order Details -->
            <div class="space-y-4 max-h-[50vh] overflow-y-auto pr-2">
                @foreach ($user->orders as $order)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm border-l-4 border-accent2">
                        <div class="mb-2">
                            <span class="text-lg font-bold text-primary">Order Number: {{ $order->id }}</span>
                            <span class="text-sm text-gray-500">({{ $order->created_at->format('j F, Y') }})</span>
                        </div>
                        <div>
                            <h3 class="font-medium text-secondary text-lg">Items Ordered:</h3>
                            <ul class="list-disc list-inside ml-4">
                                @foreach ($order->itemOrders as $item)
                                    <li class="text-gray-600">
                                        <span class="font-semibold">{{ $item->box->title }}</span>
                                        <span class="text-sm text-gray-500"> - Quantity: {{ $item->quantity }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-4 text-sm text-gray-700">
                            <p><span class="font-semibold">Status:</span> {{ $order->status }}</p>
                            <p><span class="font-semibold">Shipping Address:</span> {{ $order->address }}, {{ $order->city }}, {{ $order->postcode }}, {{ $order->country }}</p>
                            <p><span class="font-semibold">Total:</span> £{{ number_format($order->total, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</div>