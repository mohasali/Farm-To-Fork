@props(['user'])

<!-- User Card -->
<div class="bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
    <!-- Customer Image -->
    <div class="w-20 h-20 rounded-lg flex-shrink-0">
        <!-- User Image / Default pfp atm -->
        <img src="{{ $user->image ?? '/images/Placeholder.jpeg' }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-lg"/> 
    </div>
    <!-- Customer Info -->
    <div class="flex-1 w-full">
        <!-- Email -->
        <input type="text" value="{{ $user->email }}" class="w-full px-3 py-2 bg-gray-100 rounded-md" disabled>
        <!-- Name -->
        <input type="text" value="{{ $user->name }}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
        <!-- Buttons -->
        <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0">
            <button class="w-full md:w-1/2 bg-gray-100 rounded-lg py-2 text-center" onclick="viewOrders({{ $user->id }})">Personal Order History</button>
            <button class="w-full md:w-1/4 bg-gray-100 rounded-lg py-2 text-center" onclick="viewUserInfo({{ $user->id }})">Expand Info</button>
        </div>
    </div>
    
    <div id="info_{{ $user->id }}" class="hidden bg-[#000000e0] fixed top-[12%] w-[80%] h-[80%] max-w-[900px] max-h-[600px] left-1/2 transform -translate-x-1/2 rounded-lg shadow-2xl text-white overflow-y-auto p-8 animate-fade-in">
        <!-- Close Button -->
        <button class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-3xl font-bold focus:outline-none" onclick="closeInfo({{ $user->id }})">✕</button>
    
        <!-- Title -->
        <h2 class="text-3xl font-extrabold mb-6 text-primary border-b border-gray-700 pb-2">User Information</h2>
    
        <!-- User Details -->
        <div class="space-y-4 text-lg">
            <h3 class="text-2xl font-bold mb-2">Details</h3>
            <div class="flex justify-between">
                <span class="font-semibold">Name:</span>
                <span>{{ $user->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Email:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Phone:</span>
                <span>{{ $user->phone }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Joined:</span>
                <span>{{ $user->created_at->format('j F, Y') }}</span>
            </div>

            <div class="mt-6">
                <h3 class="text-2xl font-bold mb-2">Addresses</h3>
                <div class="space-y-2">
                    @foreach($user->addresses as $address)
                        <div class="p-4">
                            <p><span class="font-semibold text-primary">Address Line 1:</span> {{ $address->address }}</p>
                            <p><span class="font-semibold  text-primary">City:</span> {{ $address->city }}</p>
                            <p><span class="font-semibold  text-primary">Country:</span> {{ $address->country }}</p>
                            <p><span class="font-semibold  text-primary">Postal Code:</span> {{ $address->postcode }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="orders_{{ $user->id }}" class="hidden bg-[#000000e0] fixed top-[12%] w-[80%] h-[80%] max-w-[900px] max-h-[600px] left-1/2 transform -translate-x-1/2 rounded-lg shadow-2xl text-white overflow-y-auto p-8 animate-fade-in">
        <!-- Close Button -->
        <button class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-3xl font-bold focus:outline-none" onclick="closeOrders({{ $user->id }})">✕</button>

        <!-- Title -->
        <h2 class="text-3xl font-extrabold mb-6 text-primary border-b border-gray-700 pb-2">User Information</h2>

        <!-- Order Details -->
        <div class="overflow-y-auto h-[428px] space-y-4">
            @foreach ($user->orders as $order)
            <div class="bg-white border rounded-lg shadow-md p-4">
                <div class="mb-2">
                    <span class="text-lg font-bold text-primary">Order Number: {{ $order->id }}</span>
                    <span class="text-sm text-gray-500">({{ $order->created_at->format('j F, Y') }})</span>
                </div>
                <div>
                    <h3 class=" font-[550] text-secondary text-lg">Items Ordered:</h3>
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
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>