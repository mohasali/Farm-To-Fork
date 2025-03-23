<x-layout>
    <!-- image background -->
    <section class="relative w-full bg-cover bg-center py-16 md:py-24" style="background-image: url('images/bg1.jpg');">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center">Boxes</h1>
                <p class="mt-4 text-lg md:text-xl text-center max-w-2xl">Discover the ease and excellence of our curated selection of produce boxes, delivered straight to your doorstep every month!</p>
            </div>
        </div>
    </section>
    
    <div class="absolute left-9 top-48 md:left-12 md:top-52 lg:left-16 animate-bounce">
        <x-egg :value="2"/>
    </div>
    
    <!-- Search and Filter Bar -->
    <div class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex flex-wrap justify-center gap-2 w-full md:w-auto">
                    <!-- Box Type Filters -->
                    @foreach ($types as $t)
                        <a href="/boxes{{ $type == $t ? '' : '?type='.urlencode($t) }}" 
                           class="px-4 py-2 {{ $type == $t ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' }} rounded-full text-sm hover:bg-primary/90 hover:text-white transition">
                            {{ $t }}
                        </a>
                    @endforeach
                    <!-- If filters are applied, show clear filters button -->
                    @if($type || request()->tags || request()->min_price || request()->max_price)
                        <a href="/boxes" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-primary/90 hover:text-white transition">
                            Clear Filters
                        </a>
                    @endif
                </div>
                
                <!-- Search box -->
                <div class="relative w-full md:w-64">
                    <form method="GET">
                        @if($type)
                            <input hidden value="{{ $type }}" name="type">
                        @endif
                        <input type="text" name="q" placeholder="Search for boxes..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <button type="submit" class="absolute right-3 top-2.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="container mx-auto px-4 pt-6">
        <div class="relative group">
            <button class="flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out" id="filter-menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
                <span>Filters</span>
            </button>
            
            <div class="absolute mt-2 -translate-x-full opacity-0 bg-white border border-gray-200 shadow-md rounded-lg w-64 z-10 transition-all duration-300 ease-in-out" id="filter-menu">
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
        
        @if($type)
        <h2 class="text-3xl font-bold text-center my-6">{{ $type }} Boxes</h2>
        @endif
    </div>

    <!-- Boxes -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($boxes as $box)
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative overflow-hidden">
                        <a href="boxes/{{ $box->id }}" class="block relative h-48 sm:h-56 w-full">
                            @php
                                $boxImages = $box->getImages();
                            @endphp
                            <img class="w-full h-full object-cover transition duration-300 group-hover:scale-105" src="{{ $boxImages[0] }}" alt="{{ $box->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            
                            <!-- Dynamic Pricing Label -->
                            @if($box->type == 'Dynamic Pricing')
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-sm py-1 px-2 rounded-full z-10">
                                Dynamically Priced
                            </div>
                            @endif
                            <!-- Low stock indicator -->
                            @if ($box->stock < 5)
                            <div class="absolute top-2 right-2 bg-red-500 text-white text-sm py-1 px-2 rounded-full z-10">
                                Only {{ $box->stock }} left
                            </div>
                            @endif
                        </a>
                        <div class="absolute bottom-0 left-0 p-3 w-full">
                            <span class="inline-block px-3 py-1 bg-primary text-white text-xs rounded-full opacity-0 group-hover:opacity-100 transition duration-300">Click to view details</span>
                        </div>
                    </div>
                    
                    <!-- Box -->
                    <div class="p-4 flex flex-col flex-grow">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $box->title }}</h2>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-semibold text-primary">£{{ $box->price }}</span>
                            <!-- Tags -->
                            @if(isset($box->tags) && count($box->tags) > 0)
                            <div class="flex flex-wrap gap-1">
                                @foreach($box->tags as $tag)
                                <span class="px-2 py-1 bg-gray-100 text-xs text-gray-600 rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        <!-- Add to Cart Button -->
                        <div class="mt-auto">
                            <x-add-cart-form value="{{ $box->id }}" class="w-full">
                                <input class="hidden" id="increment" name="increment" value="1"> 
                                <button class="w-full px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Add to Cart
                                </button>
                            </x-add-cart-form>
                            <x-success-alert :boxId="$box->id"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="container mx-auto px-4 py-6">
        {{$boxes->links()}}
    </div>

    @vite(['resources/js/boxesIndex.js'])
    <script>
        // Price range slider
        const minPriceInput = document.getElementById("min-price");
        const maxPriceInput = document.getElementById("max-price");
        const minPriceDisplay = document.getElementById("min-price-display");
        const maxPriceDisplay = document.getElementById("max-price-display");
        
        // update price
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

        updatePriceDisplays();
        
        // Filter toggle with fade
        const filterMenuToggle = document.getElementById('filter-menu-toggle');
        const filterMenu = document.getElementById('filter-menu');
        
        if (filterMenuToggle && filterMenu) {
            filterMenuToggle.addEventListener('click', () => {
                // Toggle
                if (filterMenu.classList.contains('opacity-0')) {
                    filterMenu.classList.remove('opacity-0', '-translate-x-full');
                    filterMenu.classList.add('opacity-100', 'translate-x-0');
                } else {
                    filterMenu.classList.remove('opacity-100', 'translate-x-0');
                    filterMenu.classList.add('opacity-0', '-translate-x-full');
                }
            });
            
            // Close when clicking outside
            document.addEventListener('click', (event) => {
                if (!filterMenu.contains(event.target) && !filterMenuToggle.contains(event.target) && filterMenu.classList.contains('opacity-100')) {
                    filterMenu.classList.remove('opacity-100', 'translate-x-0');
                    filterMenu.classList.add('opacity-0', '-translate-x-full');
                }
            });
        }
    </script>
</x-layout>