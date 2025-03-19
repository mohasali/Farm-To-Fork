<x-layout>
    <section class="relative w-full bg-cover transform bg-center md:bg-top md:min-h-[280px]" style="background-image: url('images/bg1.jpg');">
    <div class="flex flex-col items-center">
        <h1 class= "m-auto text-5xl font-bold p-4 pt-8"> Boxes </h1>
        <p class=" w-[55%] md:w-[45%] text-center"> Discover the ease and excellence of our curated selection of produce boxes, delivered straight to your doorstep every month!
             Each package contains a blend of varied fruits and vegetables and our range of subscription choices allows you to tailor a plan that suits your preferences perfectly.
             Come along with us as we explore taste, health and sustainability. Experience the best of farm-to-table produce with every delivery.</p>
    </div>
    </section>
    
    <div class="flex flex-wrap justify-between items-center w-full mt-6 mb-12 px-5">
        <div class="relative group">
            <button class="flex items-center px-4 py-2 mb-4 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out" id="filter-menu-toggle">
                <span>Filters</span>
            </button>
            <!-- If filters are applied, show clear filters button -->
            @if($type || request()->tags || request()->min_price || request()->max_price)
            <a href="/boxes" class="w-full mt-8 px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition">
                Clear Filters
            </a>
            @endif
            
            <div class="absolute mt-2 -translate-x-full opacity-0 group-hover:translate-x-0 group-hover:opacity-100 bg-white border border-gray-200 shadow-md rounded-lg w-64 z-10 transition-all duration-300 ease-in-out" id="filter-menu">
                <div class="flex flex-col justify-center text-center p-4 space-y-3">

                    <h3 class="font-bold text-lg text-gray-800">Categories</h3>

                    @foreach ($types as $t)
                        <a href="/boxes{{ $type == $t ? '' : '?type='.urlencode($t) }}" 
                           class="{{ $type == $t ? 'bg-primary hover:bg-accent1' : 'bg-secondary hover:bg-accent2' }} text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                            {{ $t }}
                        </a>
                    @endforeach
                    
                </div>

                <form method="GET" action="{{ url()->current() }}" class="p-4 space-y-3">
                    @if($type)
                        <input hidden value="{{ $type }}" name="type">
                    @endif
                    @if(request()->q)
                        <input hidden value="{{ request()->q }}" name="q">
                    @endif
                    <h3 class="font-bold text-lg text-gray-800">Filter Options</h3>
                    @foreach ($tags as $tag)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox text-primary" name="tags[]" value="{{$tag->id}}" {{ is_array(request()->tags) && in_array($tag->id, request()->tags) ? 'checked' : '' }}>
                        <span>{{ $tag->name }}</span>
                    </label>
                    @endforeach
                    
                    <!-- Price filter with slider -->
                    <div class="space-y-4">
                        <h3 class="font-bold text-lg text-gray-800">Price Range</h3>
                        <div class="flex justify-between text-sm text-gray-700">
                            <span>£<span id="min-price-display">{{ request()->min_price ?? 0 }}</span></span>
                            <span>£<span id="max-price-display">{{ request()->max_price ?? 100 }}</span></span>
                        </div>
                        <div class="space-y-2">
                            <input type="range" id="min-price" name="min_price" min="0" max="100" value="{{ request()->min_price ?? 0 }}" class="w-full accent-primary">
                            <input type="range" id="max-price" name="max_price" min="0" max="100" value="{{ request()->max_price ?? 100 }}" class="w-full accent-primary">
                        </div>
                    </div>

                    <!-- Apply -->
                    <button class="w-full mt-3 px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition" type="submit">
                        Apply Filters
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <h3 class=" text-5xl font-bold m-4">{{ $type }}</h3>
        </div>
        
        <!-- Search bar -->
        <div class="w-full md:w-auto mt-3 md:mt-0">
            <form class="relative group" method="GET">
                @if($type)
                    <input hidden value="{{ $type }}" name="type">
                @endif
                <input name="q" autocomplete="off" type="text" placeholder="Search for an item..." 
                       class="absolute right-[55px] w-0 px-4 py-2 rounded-lg border border-gray-300 opacity-0 group-hover:w-80 group-hover:opacity-100 focus:w-80 focus:opacity-100 transition-all duration-300 ease-in-out ">
                <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach ($boxes as $box )
        <div class="flex flex-col items-center text-center pb-6 border rounded-lg shadow-sm p-4">
            <a href="boxes/{{ $box->id }}" class="group w-full">
                <div class="box-image-container w-full">
                    @php
                        $boxImages = $box->getImages();
                    @endphp
                    
                    @foreach($boxImages as $index => $image)
                    <div class="slides fade group rounded-lg">
                        <img 
                            class="h-48 object-cover rounded-lg" 
                            src="{{ $boxImages[0] }}" 
                            alt="{{ $box->title }} Image">
                    </div>
                    @endforeach
                    
                     <!-- Dynamic Pricing Label -->

                     @if($box->type == 'Dynamic Pricing')
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-sm py-1 px-2 rounded-full z-10">
                     Dynamically Priced
                    </div>
                    @endif
                </div>
                <div class="flex items-baseline p-2 w-full justify-evenly group-hover:text-accent2 transition duration-300 ease-in-out">
                    <div class="font-bold text-mg pr-4" >{{ $box->title }}</div>
                    <div>£{{ $box->price }}</div>
                </div>
            </a>

            <x-add-cart-form value="{{ $box->id }}" class="w-full mt-auto">
                <input class="hidden" id="increment" name="increment" value="1"> 
                <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out">Add to Cart</button>
            </x-add-cart-form>

            <x-success-alert :boxId="$box->id"/>
        </div>
        @endforeach
    </div>

    <div class="my-6 mx-8"> {{$boxes->links()}} </div>
    @vite(['resources/js/boxesIndex.js'])
    <script>
        const minPriceInput = document.getElementById("min-price");
        const maxPriceInput = document.getElementById("max-price");
        const minPriceDisplay = document.getElementById("min-price-display");
        const maxPriceDisplay = document.getElementById("max-price-display");
        
        function updatePriceDisplays() {
            minPriceDisplay.textContent = minPriceInput.value;
            maxPriceDisplay.textContent = maxPriceInput.value;
        }

        minPriceInput.addEventListener("input", () => {
            if (parseInt(minPriceInput.value) >= parseInt(maxPriceInput.value)) {
                minPriceInput.value = maxPriceInput.value - 1;
            }
            updatePriceDisplays();
        });
        
        maxPriceInput.addEventListener("input", () => {
            if (parseInt(maxPriceInput.value) <= parseInt(minPriceInput.value)) {
                maxPriceInput.value = parseInt(minPriceInput.value) + 1;
            }
            updatePriceDisplays();
        });

        // Initialize displays
        updatePriceDisplays();
    </script>
        <div class="absolute left-9">
            <x-egg :value="2"/>
        </div>
</x-layout>
