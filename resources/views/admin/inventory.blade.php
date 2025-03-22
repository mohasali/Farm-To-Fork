<x-layout>    
    <!-- Order Processing List -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Inventory </h1>
        </div>
    </section>
    <!-- Filter Orders -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-lg rounded-lg">
            <!-- Search Bar -->
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-2">
                <form class="relative w-full md:w-80 flex" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for a product..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
            </div>
            <!-- Product Filter and Sort By -->
            <div class="flex flex-col md:flex-row justify-between p-4 text-secondary space-y-2 md:space-y-0">
                <form action="" method="GET">
                    <select class="w-full md:w-auto bg-gray-100 rounded-lg py-2 px-4" name="type" onchange="this.form.submit()">
                        <option value="" hidden>Type Filter</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                                {{ $type }}
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
    <!-- Inventory alert -->
    <section class="space-y-4 px-4 md:px-8 lg:px-16">
        @php
            $lowStock = $boxes->where('stock', '>', 0)->where('stock', '<', 5)->count();
            $outOfStock = $boxes->where('stock', '==', 0)->count();
        @endphp

        <!-- Out of stock  -->
        @if ($outOfStock > 0)
            <div class="bg-red-500 p-4 w-full max-w-md md:max-w-lg lg:max-w-xl mx-auto rounded-lg shadow-md">
                <h1 class="font-bold text-xl md:text-2xl lg:text-3xl text-white mb-2 text-center">Out of Stock!</h1>
                <div class="">
                    @foreach ($boxes as $box)
                        @if ($box->stock == 0)
                            <div class="flex justify-between p-1 rounded-md">
                                <h1 class="font-bold text-white">{{ $box->title }}</h1>
                                <p class="text-white">{{ $box->stock }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Low stock -->
        @if ($lowStock > 0)
            <div class="bg-amber-500 p-4 w-full max-w-md md:max-w-lg lg:max-w-xl mx-auto rounded-lg shadow-md">
                <h1 class="font-bold text-xl md:text-2xl lg:text-3xl text-white mb-2 text-center">Low Stock</h1>
                <div class="">
                    @foreach ($boxes as $box)
                        @if ($box->stock > 0 && $box->stock < 5)
                            <div class="flex justify-between p-1 rounded-md">
                                <h1 class="font-bold text-white">{{ $box->title }}</h1>
                                <p class="text-white">{{ $box->stock }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    
    <!-- Display Boxes -->
    <section class="gap-4 p-6 pb-8 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            @foreach ($boxes as $box)
            <!-- Box Card -->
            <section class="gap-4 p-6 max-w-4xl mx-auto">
                <div class="max-h-[600px] space-y-4 p-4 bg-gray-50 rounded-lg shadow-md">
                    <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-8">
                        <!-- Image Section -->
                        <div class="w-full sm:w-80 md:w-60 lg:w-80 h-40 md:h-40 lg:h-60 rounded-md overflow-hidden flex-shrink-0">
                            <img src="{{ $box->getImages()[0] }}" alt="{{ $box->title }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        <!-- Content Section -->
                        <div class="w-full text-center md:text-left">
                            <div class="flex flex-row justify-between items-center">
                                <h3 class="text-lg text-primary font-bold">{{ $box->title }}</h3>
                                <a href="{{ route('inventory.edit', $box->id) }}" class="p-2">
                                    <img src="/images/Edit.png" alt="Edit icon" class="h-5 sm:h-6 hover:opacity-75 w-5 sm:w-6">
                                </a>
                            </div>
                            <p class="text-gray-500 text-sm line-clamp-2 break-words w-full">{{ $box->description }}</p>
                            <!-- Price -->
                            <div class="flex items-center mt-2 w-full gap-2">
                                <div class="w-16 font-semibold flex-shrink-0">Price</div>
                                <input type="text" value="£{{ $box->price }}" 
                                    class="w-full px-3 py-2 bg-gray-100 rounded-md" disabled>
                            </div>
                            <!-- Tags Section -->
                            <div class="flex items-center mt-2 w-full gap-2">
                                <div class="w-16 font-semibold flex-shrink-0">Tags</div>
                                <div class="flex overflow-x-auto gap-2 w-full" style="scrollbar-width: thin;">
                                    <?php foreach ($box->tags as $tag): ?>
                                        <input type="text" value="<?php echo htmlspecialchars($tag->name); ?>" class="flex-shrink-0 px-2 py-1 text-xs bg-gray-200 text-black rounded-md w-16" disabled>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Type -->
                            <div class="flex items-center mt-2 w-full gap-2">
                                <div class="w-16 font-semibold flex-shrink-0">Type</div>
                                <input type="text" value="{{ $box->type }}" class="w-full px-3 py-2 bg-gray-100 rounded-md" disabled>
                            </div>
                            <!-- Stock -->
                            <div class="flex items-center mt-2 w-full gap-2">
                                <div class="w-16 font-semibold flex-shrink-0">Stock</div>
                                <div class="relative w-full">
                                    <input type="text" value="{{ $box->stock }}" class="w-full px-3 py-2 bg-gray-100 rounded-md pr-12" disabled>
                                    <a href="{{ route('inventory.add', $box->id) }}" class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-primary hover:bg-accent1 transition-colors text-white px-3 py-1 rounded-md text-sm">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
    </section>
</x-layout>