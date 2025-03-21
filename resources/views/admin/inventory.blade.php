<x-layout>
    <section>
        @php
            $lowStock = $boxes->where('stock', '<', 5)->count(); // Low stock
            $outOfStock = $boxes->where('stock', '==', 0)->count(); // Out of stock
    
            // Change background colour
            $bg = $outOfStock > 0 ? 'bg-red-500' : ($lowStock > 0 ? 'bg-amber-500' : 'bg-orange-400');
        @endphp
    
        <div class="{{ $bg }} p-4 w-full">
            @if ($lowStock > 0)
                @if ($outOfStock > 0)
                    <h1 class="font-bold text-3xl text-white text-center">Out of stock!</h1>
                @elseif ($lowStock > 0)
                    <h1 class="font-bold text-3xl text-white text-center">Low Stock</h1>
                @endif
            @endif
    
            @foreach ($boxes as $box)
                <div class="text-center">
                    @if ($box->stock < 5)
                        <div class="flex flex-row justify-center">
                            <h1 class="font-bold">{{ $box->title }}</h1>
                            <p class="ml-2">{{ $box->stock }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    
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
    <!-- If statement 

    -- If any item reaches under 5 = section will pop up
    -- Any 3 < item > 5 = bg-orange-500
    -- Any 0 <= item > 3 = bg-red-500

    -->


    <!-- Display Boxes -->
    <section class="gap-4 p-6 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            <!-- Box -->
            @foreach ($boxes as $box)
            <!-- Box Card -->
            <section class="gap-4 p-6 max-w-4xl mx-auto">
                <div class="max-h-[600px] space-y-4 p-2 bg-gray-50 rounded-lg">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-16 ">
                        <div class="w-full h-full rounded-md  sm:w-80 sm:h-30 md:w-50 md:h-50">
                            <!-- User image else default image -->
                            <img src="{{ $box->getImages()[0] }}" alt="{{ $box->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4 text-center md:text-left">
                            <h3 class="text-lg text-primary font-bold">{{ $box->title }}</h3>
                            <p class="text-gray-500" class="text-overflow">{{ $box->description }}</p>
                            <div class="flex items-center mt-2">
                                <div class="w-36 flex items-center"><p><strong>Tags</strong></p></div>
                                <?php
                                $tags ="";
                                foreach ($box->tags as $tag) {
                                    $tags .=$tag->name.", ";
                                }
                                $tags = rtrim($tags, ", ");
                                ?>
                                <input type="text" value="{{$tags}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- 
                        <div class="flex items-center space-x-2">

                            <div class="w-24 flex items-center"><p><strong>Name</strong></p></div>
                            <input class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" type="text" value="{{ $box->title }}" disabled></input>
                        </div>
                        <div class="flex items-center mt-2">
                            
                            <div class="w-36 flex items-center"><p><strong>Description</strong></p></div>
                            <input type="text" value="{{$box->description}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
                        </div>
                        <div class="flex items-center justify-center mt-2">
                            
                            <img src="{{ $box->getImages()[0] }}" alt="{{ $box->title }}" class="w-80 h-80 object-cover rounded-lg"/>
                        </div>
                        
                        <div class="flex items-center mt-2">
                            <div class="w-36 flex items-center"><p><strong>Type</strong></p></div>
                            <input type="text" value="{{$box->type}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
                        </div>

                        <div class="flex items-center mt-2">
                            <div class="w-36 flex items-center"><p><strong>Tags</strong></p></div>
                            <?php
                            $tags ="";
                            foreach ($box->tags as $tag) {
                                $tags .=$tag->name.", ";
                            }
                            $tags = rtrim($tags, ", ");
                            ?>
                            <input type="text" value="{{$tags}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
                        </div>

                        <div class="flex items-center mt-2">
                            <div class="w-36 flex items-center"><p><strong>Stock</strong></p></div>
                            <input type="text" value="{{$box->stock}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled>
                        </div>
                        <div class="flex justify-center w-full mt-5">
                            <a href="{{ route("inventory.edit",$box->id) }}" class="bg-green-600 p-2 text-white rounded hover:bg-green-500 text-lg">Edit</a>
                        </div>
                    -->
                </div>
            </div>            
            @endforeach
        </div>
    </section>
</x-layout>