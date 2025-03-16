<x-layout>
    <section class="max-w-4xl mx-auto p-3 sm:p-4 md:p-6 mt-2 sm:mt-4 shadow-md min-h-[600px] mb-4 rounded-lg">
        <x-account-nav-link href="{{ route('admin.customers') }}" :active="request()->routeIs('admin.customers')" class="text-sm sm:text-base">Back</x-account-nav-link>
        
        <!-- User info -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-4 bg-gray-50 p-3 sm:p-4 rounded-lg">
            <!-- User image -->
            <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full overflow-hidden flex-shrink-0">
                <img src="{{ $user->image ?? '/images/Account/default_chicken.png' }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            </div>

            <div class="flex-1">
                <div class="flex flex-wrap items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-semibold text-secondary">{{ $user->name }}</h1>
                    @if ($user->isAdmin)
                        <p class="text-red-500 text-sm sm:text-base">[ADMIN]</p>
                    @endif
                </div>
                <p class="text-gray-500 text-sm sm:text-base">{{ $user->email }}</p>
                <p class="text-primary text-sm sm:text-md pb-4">Upvotes: 0</p>
                @if (auth()->user()->isAdmin)
                    <form action="{{ route('customer.remove', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 p-2 rounded-lg hover:bg-red-600">Delete user</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="mt-4 space-y-6">
            <div>
                <h2 class="text-lg sm:text-xl font-medium">Personal Information</h2>
                @if (auth()->user()->isAdmin)
                    <!-- Personal Information Form -->
                    <div class="grid grid-cols-1 gap-4 mt-3">
                        <!-- Username -->
                        <div class="col-span-1">
                            <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Name</label>
                            <div class="relative w-full">
                                <input type="text" class="w-full p-2 text-sm sm:text-base pr-10 border border-gray-300 rounded" value="{{ $user->name }}" disabled>
                                <a href="{{ route('customer.edit', ['id' => $user->id, 'field' => 'name']) }}" class="absolute inset-y-0 right-0 flex items-center px-2">
                                    <img src="/images/Edit.png" alt="Edit icon" class="h-5 sm:h-6 hover:opacity-75">
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Email -->
                            <div class="col-span-1">
                                @php
                                $email = $user->email ?? ''; // Ensure email is not null
                                $parts = explode('@', $email);

                                $var = (count($parts) > 1) ? '@' . strtolower($parts[1]) : '@';
                                @endphp
                                <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Email</label>
                                <div class="relative w-full">
                                    <input type="email" class="w-full p-2 text-sm sm:text-base border border-gray-300 rounded" value="{{ substr($user->email, 0, 1) }}********{{ substr(explode('@', $user->email)[0], -1) }}{{ $var }}" disabled>
                                    <a href="{{ route('customer.edit', ['id' => $user->id, 'field' => 'email']) }}" class="absolute inset-y-0 right-0 flex items-center px-2">
                                        <img src="/images/Edit.png" alt="Edit icon" class="h-5 sm:h-6 hover:opacity-75">
                                    </a>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-span-1">
                                @php
                                $phone = $user->phone;
                                if($phone!=''){ $phone = "********".substr($user->phone, -3);};
                                @endphp
                                <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Phone</label>
                                <div class="relative w-full">
                                    <input type="text" class="w-full p-2 text-sm sm:text-base border border-gray-300 rounded" name="phone" value="{{ $phone }}" disabled>
                                    <a href="{{ route('customer.edit', ['id' => $user->id, 'field' => 'phone']) }}" class="absolute inset-y-0 right-0 flex items-center px-2">
                                        <img src="/images/Edit.png" alt="Edit icon" class="h-5 sm:h-6 hover:opacity-75">
                                    </a>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-span-1">
                                <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1">Password</label>
                                <div class="relative w-full">
                                    <input type="password" class="w-full p-2 text-sm sm:text-base pr-10 border border-gray-300 rounded" value="********" disabled>
                                    <a href="{{ route('customer.edit', ['id' => $user->id, 'field' => 'password']) }}" class="absolute inset-y-0 right-0 flex items-center px-2">
                                        <img src="/images/Edit.png" alt="Edit icon" class="h-5 sm:h-6 hover:opacity-75">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="text-green-600 font-bold text-sm mt-1">
                            {{ session('success') }}
                        </div>
                    @endif
                @else
                    <p class="text-red-500 mt-4 text-sm sm:text-base">You do not have permission to view these details.</p>
                @endif
            </div>

            <!-- Orders Section -->
            <div class="mt-6">
                <h2 class="text-lg sm:text-xl font-medium">Orders</h2>
                @if (auth()->user()->isAdmin || auth()->id() === $user->id)
                    @if ($user->orders->isEmpty())
                        <p class="text-gray-500 text-sm sm:text-base">No orders found.</p>
                    @else
                        <ul class="mt-2 space-y-2">
                            @foreach ($user->orders as $order)
                                <li class=" bg-gray-50 rounded-lg p-4 text-sm sm:text-base">Order #{{ $order->id }} - £{{ number_format($order->total, 2) }}</li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <p class="text-red-500 mt-4 text-sm sm:text-base">You do not have permission to view these orders.</p>
                @endif
            </div>

            <!-- Reviews Section -->
            <div class="mt-6">
                <h2 class="text-lg sm:text-xl font-medium">Reviews</h2>
                @if (auth()->user()->isAdmin || auth()->id() === $user->id)
                    @if ($user->reviews->isEmpty())
                        <p class="text-gray-500 text-sm sm:text-base">No reviews found.</p>
                    @else
                        <div class="mt-2 max-h-80 overflow-y-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                @foreach ($user->reviews as $review)
                                    <div class="p-3 sm:p-4 border rounded-lg bg-gray-100 shadow-md">
                                        <p class="font-medium text-sm sm:text-base">{{ $review->title }}</p>
                                        <p class="text-gray-600 text-xs sm:text-sm truncate">{{ $review->description }}</p>
                                        <p class="text-xs sm:text-sm text-gray-500">Rated: {{ $review->rating }}/5</p>
                                        <p class="text-xs text-gray-400">{{ $review->created_at->format('j F, Y') }}</p>
                                        <p class="text-xs sm:text-sm font-semibold text-primary">{{ $review->box->title }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @else
                    <p class="text-red-500 mt-4 text-sm sm:text-base">You do not have permission to view these reviews.</p>
                @endif
            </div>
        </div>
    </section>
</x-layout>