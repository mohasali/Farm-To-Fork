<x-layout>
    <div class="flex flex-col justify-start mt-8 mb-6 ">
        <div class="flex flex-col md:flex-row mx-auto space-y-6 md:space-y-0 md:space-x-6 p-4 md:p-8">
            <a class="md:hidden text-3xl mb-2 font-light italic underline hover:text-accent2" href="/boxes?type={{ urlencode($box->type) }}">{{ $box->type }}</a> <!-- Type (mobile) -->
            <div class="md:hidden text-4xl mb-3 font-medium"> {{ $box->title }}</div> <!-- Title (mobile) -->

            <div class="relative">
            <!-- image container -->
            <div class="flex justify-center md:block pt-7 img-magnifier-container">
                <img 
                    class="w-full max-w-xs sm:max-w-md md:w-[450px] rounded-lg" 
                    id="myimage" 
                    src="{{ $box->imagePath }}" 
                    alt="Box Image">                

            </div>
            @if ($box->stock < 5)
            <div class="absolute top-2 right-2 bg-red-500 text-white text-sm py-1 px-2 rounded-full z-10">
                Only {{ $box->stock }} left
            </div>
            @endif
            </div>
            <div class="flex flex-col space-y-4">
                <a class="hidden md:inline-block text-xl font-light italic hover:underline hover:text-accent2" href="/boxes?type={{ urlencode($box->type) }}">{{ $box->type }}</a>
                <div class="hidden md:block text-3xl font-medium">{{ $box->title }}</div> <!-- Title -->
                <div class="text-xl md:text-lg mt-3 space-x-2 font-light underline md:no-underline italic">
                    @foreach ($tags as $tag)
                    <a class="hover:underline hover:text-accent2" href="/boxes?tags%5B%5D={{$tag->id}}">{{ $tag->name }}</a>
                    @endforeach
                </div>
                <!-- Description -->
                <div class="max-w-lg text-sm md:text-base">{{ $box->description }}</div>

                <x-add-cart-form value="{{ $box->id }}">
                    <div class="flex items-center space-x-4">
                        <select class="rounded-md border-2 border-primary px-4 py-2" name="increment" id="increment" onchange="updatePrice({{ $box->price }})">
                            <!-- Amount dropdown -->
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <!-- Add to cart button -->
                        <button 
                            class="bg-primary px-6 py-3 text-white rounded-xl text-sm md:text-lg font-bold hover:bg-accent1 transition duration-300">
                            Add to cart £<span id="totalPrice">{{ $box->price }}</span>
                        </button>
                    </div>
                </x-add-cart-form>
                <x-success-alert :boxId="$box->id" />
            </div>
        </div>

        <!-- Comment section -->
        <hr class="border-gray-300 my-6">
        <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6 px-4 md:px-8">
            <div class="flex flex-col bg-gray-100 py-4 px-6 rounded-xl w-full md:w-1/3">
                <h1 class="text-xl font-bold">Customer Reviews</h1>
                
                <p class="text-lg">
                    @for ($i = round($reviews->avg('rating')); $i>0; $i--)
                    🥕
                    @endfor
                    @for ($i = round($reviews->avg('rating')); $i<5; $i++)
                    <span style="color: transparent; text-shadow: 0 0 darkgray">🥕</span>
                    @endfor
                </p> <!-- moon not stars :P -->
                <p class="text-lg">{{ round($reviews->avg('rating'), 1) }} out of 5</p> <!-- Make real ratings laters -->
                <p>{{ $reviews->count() }} global ratings</p>
                @for ($i=5; $i>0; $i--)

                <!-- If there is no rating on a star, there isn't a link for it | MUST ADD TO 100% -->
                <div class="flex items-center space-x-4 mt-4">
                    <p class="w-12">{{ $i }} star</p>
                    <!-- Rating -->
                    <div class="flex-1 h-4 bg-gray-300 rounded-md overflow-hidden">
                        <div class="h-full bg-primary" style="width: {{ $reviews->count() > 0 ? round(($reviews->groupBy('rating')->map->count()->get($i, 0) / $reviews->count()) * 100, 2) : 0 }}%;"></div>
                    </div>
                    <!-- Percent -->
                    <p class="w-12 text-right">{{ $reviews->count() > 0 ? round(($reviews->groupBy('rating')->map->count()->get($i, 0) / $reviews->count()) * 100, 2) : 0 }}%</p>
                </div>

                @endfor
                <!-- Write a review -->
                <div class="mt-4">
                    <h1 class="font-bold text-lg">Review this product</h1>
                    <p class="text-sm">Share your thoughts with other customers</p>
                    <div class="flex justify-center mt-2">
                        <a href="{{ url('/boxes/' . $box->id . '/review') }}" class="border border-primary text-primary text-center rounded-full w-[60%] p-2 hover:bg-orange-100">
                            Write a review
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col bg-gray-100 py-4 rounded-xl w-full md:w-2/3 max-h-[500px] overflow-y-auto">
                <!-- Filter reviews -->
                <div class="flex pl-4 mb-4">
                    <select name="review" id="review" class="rounded-md bg-gray-200 text-sm px-2 py-1">
                        <option value="top">Top reviews</option>
                        <option value="recent">Most recent</option>
                    </select>
                </div>
                <!-- Reviews -->
                <!-- Implement a for each loop after -->
                <div class="p-4">
                    <!-- 
                    Potential icon? | Name
                    Rating | Title
                    Reviewed in Birmingham on 2 January 2025
                    Verified Purchase
                    Comment Helpful | Report
                    -->
                    @if(!$reviews->isEmpty())
                        @foreach($reviews as $review)
                        <h1 class="text-lg font-bold">{{ $review->user->name }}</h1>
                        <div class="flex items-center space-x-2">
                            <p>
                            @for ($i = $review->rating; $i>0; $i--)
                            🥕
                            @endfor
                            @for ($i = $review->rating; $i<5; $i++)
                            <span style="color: transparent; text-shadow: 0 0 darkgray">🥕</span>
                            @endfor
                            </p>
                            <p class="font-bold">{{ $review->title }}</p>
                        </div>
                        <p class="text-xs">Reviewed on {{ $review->created_at }}</p>
                        <p class="font-bold text-primary text-xs">Verified Purchase</p>
                        <!-- Comment -->
                        <p class="text-sm mt-2">{{ $review->description }}</p>
                        <div class="flex items-center mt-2 space-x-4">
                            <button class="border border-primary text-primary rounded-full px-4 py-1 text-xs hover:bg-orange-100">
                                Helpful
                            </button>
                            <p class="text-xs">|</p>
                            <button class="text-xs">Report</button> <!-- Add report feature ig or keep it blank or scrap it -->
                        </div>
                        @endforeach
                    @else
                        <p>No reviews yet!</p>
                    @endif
                </div>

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
            border: 1px solid #000;
            border-radius: 50%;
            cursor: none;
            width: 250px;
            height: 250px;
            display: none; /* Is initially hidden */
            pointer-events: none; /* Stop interference with cursor */
        }
    </style>
</x-layout>
<!-- Update box price when choosing quantity -->
<script>
    function updatePrice(basePrice) {
        let quantity = document.getElementById("increment").value; // select value
        let totalPrice = basePrice * quantity; // box * select value
        document.getElementById("totalPrice").textContent = totalPrice.toFixed(2); // 2 dp
    }
</script>