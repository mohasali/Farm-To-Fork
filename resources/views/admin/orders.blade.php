<x-layout>
    <!-- Order Processing List -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Order Processing</h1>
        </div>
    </section>
    <!-- Filter Orders -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-lg rounded-lg">
            <!-- Search Bar -->
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-2">
                <form class="relative w-full md:w-80 flex" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for an order id..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
            </div>
            <!-- Product Filter and Sort By -->
            <div class="flex flex-col md:flex-row justify-between p-4 text-secondary space-y-2 md:space-y-0">
                <form action="" method="GET">
                    <select class="w-full md:w-auto rounded-lg py-2 px-4" name="status" onchange="this.form.submit()">
                        <option value="" hidden>Status Filter</option>
                        @foreach($statusOptions as $option)
                            <option value="{{ $option }}" 
                                {{ request('status') === $option ? 'selected' : '' }}
                                class="
                                    @if($option == 'Pending') bg-yellow-500 text-white
                                    @elseif($option == 'Processing') bg-blue-500 text-white
                                    @elseif($option == 'Shipped') bg-indigo-500 text-white
                                    @elseif($option == 'Out For Delivery') bg-orange-500 text-white
                                    @elseif($option == 'Delivered') bg-green-500 text-white
                                    @elseif($option == 'Completed') bg-emerald-500 text-white
                                    @elseif ($option == 'Returned') bg-pink-500 text-white
                                    @else bg-red-500 text-white
                                    @endif"
                            >
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <form action="" method="GET">
                    <button type="submit" value="" class="text-red-600 ml-4">Reset</button>
                </form>                
            </div>
        </div>
    </section>
    <!-- Orders Grid -->
    <section class="gap-4 p-6 max-w-6xl mx-auto overflow-y-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-h-[600px] overflow-y-auto p-2">
            @foreach ($orders as $order)
                <x-admin-orders-item :order="$order" :statusOptions="$statusOptions" />
            @endforeach
        </div>
    </section>
</x-layout>