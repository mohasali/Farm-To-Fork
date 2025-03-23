<x-layout>
    @if (session('message'))
        <div class="max-w-4xl mx-auto my-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 shadow-md rounded-lg flex items-center">
            <!-- Success -->
            <div class="text-sm font-medium">
                {{ session('message') }}
            </div>
        </div>
    @endif
    
    <div class="min-h-[calc(100vh-200px)] bg-gray-50">
        <!-- Image background -->
        <div class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden">
            <div class="absolute inset-0 bg-black/50 z-10"></div>
            <img src="{{ isset($images[1]) ? $images[1] : $images[0] }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $box->title }}">
            <div class="absolute inset-0 z-20 flex items-center justify-center p-6">
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-2">{{ $box->title }}</h1>
                    <div class="flex flex-wrap items-center justify-center gap-3 text-white">
                        <a href="/boxes?type={{ urlencode($box->type) }}" class="text-white/90 hover:text-white transition italic font-light hover:underline">{{ $box->type }}</a>
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <span class="ml-1 font-medium">{{ round($reviews->avg('rating'), 1) }}</span>
                        </div>
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <span class="ml-1 font-medium">{{ $box->stock }} in stock</span>
                        </div>
                        @if($box->type == 'Dynamic Pricing')
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                            </svg>

                            <span class="ml-1 font-medium">Dynamic Pricing</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Main -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Images -->
                <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-1">
                    <!-- Slideshow -->
                    <div class="slideshow-container w-full h-[350px] overflow-hidden mb-4">
                        @foreach($images as $index => $image)
                        <div class="slides fade">
                            <!-- Current -->
                            <div class="numbertext">{{ $index + 1 }} / {{ count($images) }}</div>
                            <img class="w-full h-full object-contain rounded-lg img-magnifier-image-{{ $index+1 }}" src="{{ $image }}" alt="Box Image {{ $index + 1 }}">
                        </div>
                        @endforeach
                        
                        <!-- Low stock indicator -->
                        @if ($box->stock < 5)
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-sm py-1 px-2 rounded-full z-10">
                            Only {{ $box->stock }} left
                        </div>
                        @endif
                    </div>

                    <!-- Dots below image -->
                    <div class="dots-container text-center mt-4">
                        @if (count($images) > 1)
                            @foreach($images as $index => $image)
                            <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
                            @endforeach
                        @endif
                    </div>
                    
                    <!-- Tags -->
                    <div class="mt-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-2 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                            Tags
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                            <a href="/boxes?tags%5B%5D={{$tag->id}}" class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-full px-3 py-1 text-sm transition">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Box -->
                <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-2 flex flex-col h-full">
                    <div class="flex-grow">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-2 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            About This Box
                        </h2>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $box->description }}</p>
                    </div>
                    
                    <!-- Order Form -->
                    <div class="mt-auto">
                        <x-add-cart-form value="{{ $box->id }}">
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <!-- Quantity -->
                                <div class="w-full sm:w-auto">
                                    <label for="increment" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                    <select class="rounded-md border-2 border-primary px-4 py-2 w-full" name="increment" id="increment" onchange="updatePrice({{ $box->price }})">
                                        <!-- Amount dropdown -->
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                
                                <!-- Add to cart button -->
                                <button class="w-full sm:w-auto bg-primary hover:bg-primary/90 text-white font-bold mt-6 py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add to cart £<span id="totalPrice">{{ $box->price }}</span>
                                </button>
                            </div>
                        </x-add-cart-form>
                        <x-success-alert :boxId="$box->id" />
                    </div>
                </div>
            </div>
            <div class="mt-8 mb-8">     
                <!-- Nutritional Information if available -->
                @if (!empty($box->nutrInfo))
                <div class="mb-6 max-w-2xl mx-auto">
                    <button id="collapsible" class="w-full bg-primary text-white py-2 px-4 rounded-lg text-lg hover:bg-accent1 transition duration-300 flex items-center justify-between">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            Nutritional Information
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div id="content" class="hidden overflow-hidden transition-all duration-300 ease-out opacity-0 max-h-0">
                        <div class="bg-gray-50 p-4 rounded-lg mt-4">
                            <div class="flex justify-center">
                                <div class="w-full sm:w-4/5 md:w-3/5 lg:w-3/5">
                                    <img src="{{ asset('images/nutritionalInfo/' . basename($box->nutrInfo)) }}" alt="Nutritional Information Image" class="rounded-lg w-full h-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- Customer Reviews -->
            <div class="mt-12 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    Customer Reviews
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Review -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <!-- Average rating -->
                            <div class="text-3xl font-bold mr-2">{{ round($reviews->avg('rating'), 1) }}</div>
                            <div>
                                <div class="flex">
                                    @for ($i = round($reviews->avg('rating')); $i>0; $i--)
                                    🥕
                                    @endfor
                                    @for ($i = round($reviews->avg('rating')); $i<5; $i++)
                                    <span style="color: transparent; text-shadow: 0 0 darkgray">🥕</span>
                                    @endfor
                                </div>
                                <p class="text-sm text-gray-500">{{ $reviews->count() }} global ratings</p>
                            </div>
                        </div>
                        
                        <!-- Rating -->
                        <div class="space-y-2 mb-6">
                            @for ($i=5; $i>0; $i--)
                            <div class="flex items-center space-x-2">
                                <p class="w-12 text-sm">{{ $i }} star</p>
                                <!-- Rating -->
                                <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary" style="width: {{ $reviews->count() > 0 ? round(($reviews->groupBy('rating')->map->count()->get($i, 0) / $reviews->count()) * 100, 2) : 0 }}%;"></div>
                                </div>
                                <!-- Percent -->
                                <p class="w-16 text-right text-sm">{{ $reviews->count() > 0 ? round(($reviews->groupBy('rating')->map->count()->get($i, 0) / $reviews->count()) * 100, 2) : 0 }}%</p>
                            </div>
                            @endfor
                        </div>
                        
                        <!-- Write a review -->
                        <div class="mt-6">
                            <h3 class="font-semibold text-lg mb-2">Review {{ $box->title }}</h3>
                            <p class="text-sm text-gray-600 mb-4">Share your thoughts with other customers</p>
                            <a href="{{ url('/boxes/' . $box->id . '/review') }}" class="block text-center bg-white border border-primary text-primary hover:bg-orange-50 rounded-lg py-2 px-4 transition duration-300">
                                Write a review
                            </a>
                        </div>
                    </div>
                    
                    <!-- Reviews -->
                    <div class="bg-white rounded-xl shadow-md p-6 md:col-span-2">
                        <!-- Filter -->
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-semibold">Customer Feedback</h3>
                            <select name="review" id="review" class="rounded-md bg-gray-100 text-sm px-4 py-2 border-0">
                                <option value="top">Top reviews</option>
                                <option value="recent">Most recent</option>
                            </select>
                        </div>
                        
                        <!-- Reviews -->
                        <div class="space-y-6 max-h-[500px] overflow-y-auto pr-2">
                            @if(!$reviews->isEmpty())
                                @foreach($reviews as $review)
                                <!-- Review -->
                                <div class="border-b border-gray-100 pb-6 last:border-0">
                                    <div class="flex items-center mb-2">
                                        <!-- User pfp -->
                                        <img src="{{ $review->user->pfp }}" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-700 font-semibold mr-3" />
                                        <div>
                                            <!-- User -->
                                            <h4 class="font-semibold">{{ $review->user->name ?? 'Deleted User'}}</h4>
                                            <!-- Date -->
                                            <p class="text-xs text-gray-500">Reviewed on {{ $review->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="ml-13 pl-13">
                                        <div class="flex items-center mb-1">
                                            <div class="flex mr-2">
                                                <!-- Rating -->
                                                @for ($i = $review->rating; $i>0; $i--)
                                                🥕
                                                @endfor
                                                @for ($i = $review->rating; $i<5; $i++)
                                                <span style="color: transparent; text-shadow: 0 0 darkgray">🥕</span>
                                                @endfor
                                            </div>
                                            <!-- Title -->
                                            <h5 class="font-semibold">{{ $review->title }}</h5>
                                        </div>
                                        
                                        <!-- Verified purchase -->
                                        <div class="flex items-center mb-3">
                                            <span class="text-xs font-semibold text-primary py-1 px-2 rounded-full">Verified Purchase</span>
                                        </div>
                                        
                                        <!-- Comment -->
                                        <p class="text-gray-700 mb-4">{{ $review->description }}</p>
                                        
                                        <div class="flex items-center mt-2 text-xs text-gray-600">
                                            <button class="border border-primary hover:border-primary text-primary hover:bg-primary hover:text-white rounded-full px-3 py-1 transition duration-200 mr-3">
                                                Helpful
                                            </button>
                                            <button class="hover:text-primary transition duration-200">
                                                Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <!-- No reviews -->
                                <div class="py-6 text-center text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <p>No reviews yet! Be the first to share your thoughts.</p>
                                    <a href="{{ url('/boxes/' . $box->id . '/review') }}" class="inline-block mt-4 text-primary hover:underline">Write a review</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Back -->
            <div class="flex justify-center mt-8">
                <a href="{{ url('/boxes') }}" class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </div>
    
    <!-- import the javascript -->
    @vite(['resources/js/glass.js'])
    
    <style>
        /*  Doesn't work with external css for some very odd reason
            Magnifying glass CSS */
        .img-magnifier-container {
            position: relative;
        }
        .img-magnifier-glass {
            position: absolute;
            border: 3px solid #ff8a4c;
            border-radius: 50%;
            cursor: none;
            width: 250px;
            height: 250px;
            display: none; /* Is initially hidden */
            pointer-events: none; /* Stop interference with cursor */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Slideshow for image array */
        .slideshow-container {
            position: relative;
            margin: auto;
        }
        
        .slides {
            display: none;
            position: relative;
            height: 100%;
        }
        
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            background-color: rgba(0,0,0,0.3);
            z-index: 5;
        }
        
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
        
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            background-color: rgba(0,0,0,0.5);
            border-radius: 0 0 5px 0;
            z-index: 2;
        }
        
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
            background-color: #717171;
        }
        
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }
        
        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>
    
    <script>
        // Display slides when page loads
        document.addEventListener("DOMContentLoaded", function() {
            showSlides(1);
        });

        function updatePrice(basePrice) {
            let quantity = document.getElementById("increment").value; // select value
            let totalPrice = basePrice * quantity; // box * select value
            document.getElementById("totalPrice").textContent = totalPrice.toFixed(2); // 2 dp
        }

        // Get collapsible
        document.getElementById('collapsible')?.addEventListener('click', function() {
            // content container
            var content = document.getElementById('content');

            // Check if content is hidden
            if (content.classList.contains('hidden')) {
                // Opening
                content.classList.remove('hidden');
                
                // Force a browser reflow
                void content.offsetHeight;
                
                // remove classes 
                content.classList.remove('opacity-0', 'max-h-0');
                
                // Add expanded and make it visible
                content.classList.add('opacity-100', 'max-h-screen');
            } else {
                // Closing
                
                // Remove visibility
                content.classList.remove('opacity-100', 'max-h-screen');
                
                // Add invisible and closed classes
                content.classList.add('opacity-0', 'max-h-0');
                
                // timeout duration - hidden
                setTimeout(() => {
                    content.classList.add('hidden');
                }, 300);
            }
        });
    </script>
    
    @vite(['resources/js/boxesShow.js'])
</x-layout>