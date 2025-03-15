@props(['order', 'statusOptions'])

@php
    // Order statuses in order 
    $orderedStatuses = ['Pending','Processing','Shipped','Out For Delivery','Delivered','Completed','Canceled'];

    // Current status index
    $currentIndex = array_search($order->status, $orderedStatuses);

    // Get next status in order
    $nextStatus = ($currentIndex !== false && $currentIndex < count($orderedStatuses) - 1) 

        // If current status isn't last, get next status
        ? $orderedStatuses[$currentIndex + 1] 

        // If last status, return null
        : null;
@endphp

<!-- Order Card -->
<div class="bg-gray-50 shadow-md rounded-lg p-6 w-full max-w-3xl mx-auto">
    <!-- Order Header -->
    <div class="flex flex-col md:flex-row justify-between items-center border-b pb-4">
        <h3 class="text-xl text-primary font-semibold">Order ID #{{ $order->id }}</h3>
        <span class="text-sm px-3 py-1 rounded-lg text-white
            @if($order->status == 'Pending') bg-yellow-500 
            @elseif($order->status == 'Processing') bg-blue-500 
            @elseif($order->status == 'Shipped') bg-indigo-500 
            @elseif($order->status == 'Out For Delivery') bg-orange-500 
            @elseif($order->status == 'Delivered') bg-green-500 
            @elseif($order->status == 'Completed') bg-emerald-500 
            @else bg-red-500 @endif">
            {{ $order->status }}
        </span>
    </div>

    <!-- Order Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- User -->
        <div>
            <p class="text-secondary font-medium">User</p>
            <a href="/customer/{{ $order->user->id }}" class="block mt-1 px-3 py-2 bg-gray-200 rounded-md text-sm">
                {{ $order->user->email }}
            </a>
        </div>
        
        <!-- Date -->
        <div>
            <p class="text-secondary font-medium">Date</p>
            <input type="text" value="{{ $order->created_at->format('d-m-Y') }}" 
                   class="w-full mt-1 px-3 py-2 bg-gray-200 rounded-md text-sm" disabled>
        </div>

        <!-- Total -->
        <div>
            <p class="text-secondary font-medium">Total</p>
            <input type="text" value="£{{ $order->total }}" 
                   class="w-full mt-1 px-3 py-2 bg-gray-200 rounded-md text-sm" disabled>
        </div>

        <!-- Address -->
        <div>
            <p class="text-secondary font-medium">Address</p>
            <input type="text" value="{{ $order->address }}, {{ $order->city }}, {{ $order->country }}, {{ $order->postcode }}" 
                   class="w-full mt-1 px-3 py-2 bg-gray-200 rounded-md text-sm" disabled>
        </div>
    </div>

    <!-- Ordered Items -->
    <div class="mt-4">
        <h4 class="text-lg font-bold">Ordered Items</h4>
        <div class="space-y-2">
            @foreach($order->itemOrders as $item)
                <!-- If only text areas weren't so stupid and didn't have to have stupid formatting on the page making it look all stupid -->
                <textarea class="w-full px-3 py-2 bg-gray-200 rounded-md resize-none text-sm" rows="2" disabled>
{{ $item->box->title }} × {{ $item->quantity }}
Price: £{{ $item->box->price }}
                </textarea>
            @endforeach
        </div>
    </div>

    <!-- Status Button -->
    <!-- If the order is not canceled or completed, show the status button -->
    @if($nextStatus && $order->status !== 'Canceled' && $order->status !== 'Completed')
        <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="mt-4">
            @method('PATCH')
            @csrf
            <input type="hidden" name="status" value="{{ $nextStatus }}">
            <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Mark as {{ $nextStatus }}
            </button>
        </form>
    @endif
</div>
