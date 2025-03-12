<x-layout>
    <section class="max-w-4xl h-[600px] mt-4 rounded-md mx-auto p-6 shadow-md">
    <x-account-nav-link href="{{ route('admin.customers') }}" :active="request()->routeIs('admin.customers')">Back</x-account-nav-link>
        <!-- User info -->
        <div class="flex items-center space-x-4 mt-4 bg-gray-50 p-4 rounded-lg">
            <!-- User image -->
            <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0">
                <img src="{{ $user->image ?? '/images/Account/default_chicken.png' }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            </div>

            <div>
                <div class="flex">
                    <h1 class="text-2xl font-semibold text-secondary">{{ $user->name }}</h1>
                    @if ($user->isAdmin)
                        <p class="text-red-500 mt-1 pl-4">[ADMIN]</p>
                    @endif
                </div>
                <p class="text-gray-500">{{ $user->email }}</p>
                <p class="text-primary text-md">Upvotes: 0</p>
            </div>
        </div>
        <!-- Only allow admins or customers to view their own page -->
        <div class="mt-4">
            <h2 class="text-xl font-medium">Orders</h2>
            <!-- If admin or if current user is the same as page -->
            @if (auth()->user()->isAdmin || auth()->id() === $user->id)
                <!-- If orders are empty -->
                @if ($user->orders->isEmpty())
                    <p class="text-gray-500">No orders found.</p>
                @else
                    <ul>
                        @foreach ($user->orders as $order)
                            <li>Order #{{ $order->id }} - £{{ number_format($order->total, 2) }}</li>
                        @endforeach
                    </ul>
                @endif
            @else
                <p class="text-red-500 mt-4">You do not have permission to view these orders.</p>
            @endif
        </div>

        <!-- Only allow admins or customers to view their own page -->
        <div class="mt-4">
            <h2 class="text-xl font-medium">Reviews</h2>

            @if (auth()->user()->isAdmin || auth()->id() === $user->id)
                @if ($user->reviews->isEmpty())
                    <p class="text-gray-500">No reviews found.</p>
                @else
                    <div class="mt-2 max-h-80 overflow-y-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($user->reviews as $review)
                                <div class="p-4 border rounded-lg bg-gray-100 shadow-md">
                                    <p class="font-medium">{{ $review->title }}</p>
                                    <p class="text-gray-600 truncate">{{ $review->description }}</p>
                                    <p class="text-sm text-gray-500">Rated: {{ $review->rating }}/5</p>
                                    <p class="text-xs text-gray-400">Reviewed on {{ $review->created_at->format('j F, Y') }}</p>
                                    <p class="text-sm font-semibold text-primary">Reviewed on {{ $review->box->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <p class="text-red-500 mt-4">You do not have permission to view these reviews.</p>
            @endif
        </div>
    </section>

</x-layout>
