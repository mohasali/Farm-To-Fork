<x-layout>
    <div class="flex flex-col justify-content-start mt-8 min-h-[calc(100vh-200px)]">
        <div class="flex flex-col md:flex-row mx-auto space-x-6 p-8">
            <a class="md:hidden text-3xl mb-2 font-light italic underline hover:text-accent2" href="/boxes?type={{ urlencode($box->type) }}">{{ $box->type }}</a> <!-- Type (mobile) -->
            <div class="md:hidden text-4xl mb-3 font-medium"> {{ $box->title }}</div> <!-- Title (mobile) -->
            
            <!-- image container -->
            <div class="flex justify-center md:block pt-7 img-magnifier-container">
                <img 
                    class="w-[100%] md:w-[450px] rounded-lg" 
                    id="myimage" 
                    src="{{ $box->imagePath }}" 
                    alt="Box Image">
            </div>
            
            <div>
                <a class="hidden md:inline-block text-xl mb-2 font-light italic hover:underline hover:text-accent2" href="/boxes?type={{ urlencode($box->type) }}">{{ $box->type }}</a>
                <div class="hidden md:block text-3xl mb-3 font-medium">{{ $box->title }}</div> <!-- Title -->
                <div class="text-xl md:text-lg mt-3 md:mt-0 space-x-2 mb-2 font-light underline md:no-underline italic">
                    @foreach ($tags as $tag)
                    <a class="hover:underline hover:text-accent2" href="/boxes?tags%5B%5D={{$tag->id}}">{{ $tag->name }}</a>
                    @endforeach
                </div>
                <!-- Description -->
                <div class="max-w-[500px] mb-7">{{ $box->description }}</div>

                <x-add-cart-form value="{{ $box->id }}">
                    <select class="rounded-md border-2 border-primary mr-4 px-4 py-2 h-full" name="increment" id="increment">
                        <!-- Amount dropdown -->
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select> 
                    <!-- Add to cart button -->
                    <button class="bg-primary p-4 text-white rounded-xl text-center text-xl font-bold hover:bg-accent1 transition duration-300 ease-in-out">
                        Add to cart {{ $box->price }}
                    </button> 
                </x-add-cart-form>
                <x-success-alert :boxId="$box->id" />
            </div>
        </div>
        
        <!-- Comment section -->
        <hr class="hrline"/>
        <div class="flex justify-start items-start h-full pl-96 ">
            <div class="flex flex-col bg-gray-100 py-2 rounded-xl mt-4 w-1/3 sm:w-[33%] md:h-[375px]">      
                <h1 class="text-xl pl-4 font-bold">Customer Reviews</h1>
                <p class="text-l pl-4">🌕🌕🌕🌕🌗</p> <!-- moon not stars :P -->
                <p class="text-l pl-4">4.5 out of 5</p> <!-- Make real ratings later -->
                <p class="pl-4">100 global ratings<p>
                <!-- If there is no rating on a star, there isn't a link for it | MUST ADD TO 100% -->
                <div class="flex items-center space-x-4 pl-4 mt-4">
                    <!-- Rating -->
                    <p>5 star</p>
                    <!-- Add a percent bar later -->
                    <div class="w-[75%] h-8 bg-gray-300 rounded-md"></div>
                    <!-- Percent -->
                    <p>60%</p>
                </div>
                <div class="flex items-center space-x-4 pl-4 mt-4">
                    <!-- Rating -->
                    <p>4 star</p>
                    <!-- Add a percent bar later -->
                    <div class="w-[75%] h-8 bg-gray-300 rounded-md"></div>
                    <!-- Percent -->
                    <p>20%</p>
                </div>
                <div class="flex items-center space-x-4 pl-4 mt-4">
                    <!-- Rating -->
                    <p>3 star</p>
                    <!-- Add a percent bar later -->
                    <div class="w-[75%] h-8 bg-gray-300 rounded-md"></div>
                    <!-- Percent -->
                    <p>0%</p>
                </div>
                <div class="flex items-center space-x-4 pl-4 mt-4">
                    <!-- Rating -->
                    <p>2 star</p>
                    <!-- Add a percent bar later -->
                    <div class="w-[75%] h-8 bg-gray-300 rounded-md"></div>
                    <!-- Percent -->
                    <p>10%</p>
                </div>
                <div class="flex items-center space-x-4 pl-4 mt-4">
                    <!-- Rating -->
                    <p>1 star</p>
                    <!-- Add a percent bar later -->
                    <div class="w-[75%] h-8 bg-gray-300 rounded-md"></div>
                    <!-- Percent -->
                    <p>10%</p>
                </div>
            </div>
            <div class="flex flex-col bg-gray-100 py-2 mb-2 rounded-xl ml-4 mt-4 w-1/3 sm:w-[41%] md:h-[675px]">      
                <!-- Filter reviews -->
                <div class="pl-4 rounded-md">
                    <select name="review" id="review" class="rounded-md bg-gray-200 p-0.5 text-sm">
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
                    Comment
                    Helpful | Report
                    -->
                    <h1 class="text-lg font-bold">Jane Doe</h1>
                    <div class="flex items-center">
                        <p>🌕🌕🌕🌕🌑</p>
                        <p class="pl-2 font-bold">I love this box!</p>
                    </div>
                    <p class="text-xs">Reviewed in Manchester on 15 January 2025</p>
                    <p class="font-bold text-primary text-xs">Verified Purchase</p>
                    <!-- Comment -->
                    <div>
                        <p class="text-sm" style="word-wrap: break-word;">
                            This offering was a delightful surprise! The flavors were vibrant, and the ingredients were exceptionally fresh. 
                            A true treat for anyone seeking a delicious and healthy culinary adventure.
                        </p>
                    </div>
                    <div class="flex items-center mt-2">
                        <button class="border border-primary text-xs text-primary rounded-full px-4 py-1 mr-2">
                            Helpful
                        </button>
                        <p class="pr-2">|</p>
                        <p class="text-xs">Report</p> <!-- Add report feature ig or keep it blank or scrap it -->
                    </div>
                </div>
                <div class="p-4 mt-2">
                    <h1 class="text-lg font-bold">John Doe</h1>
                    <div class="flex items-center">
                        <p>🌕🌕🌕🌕🌑</p>
                        <p class="pl-2 font-bold">Tasty!</p>
                    </div>
                    <p class="text-xs">Reviewed in Birmingham on 14 January 2025</p>
                    <p class="font-bold text-primary text-xs">Verified Purchase</p>
                    <!-- Comment -->
                    <div>
                        <p class="text-sm" style="word-wrap: break-word;">
                            Listening to Radiohead and starving on a Tuesday night, I purchased this box thinking of all the delicious ingredients
                            and flavours that will enter my mouth when it arrives. AND IT DIDN'T DISAPPOINT! I absolutely love Farm to Fork!
                        </p>
                    </div>
                    <div class="flex items-center mt-2">
                        <button class="border border-primary text-xs text-primary rounded-full px-4 py-1 mr-2">
                            Helpful
                        </button>
                        <p class="pr-2">|</p>
                        <p class="text-xs">Report</p>
                    </div>
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
            width: 100px;
            height: 100px;
            display: none; /* Is initially hidden */
            pointer-events: none; /* Stop interference with cursor */
        }
    </style>
</x-layout>
