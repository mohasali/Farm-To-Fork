<x-layout>
    <div class="flex flex-col justify-content-start mt-8 min-h-[calc(100vh-200px)]">
        <div class="flex flex-col md:flex-row mx-auto space-x-6 p-8">
            <a class="md:hidden text-3xl mb-2 font-light italic underline hover:text-accent2" href="/boxes?type={{ $box->type }}">{{ $box->type }}</a> <!-- Type (mobile) -->
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
                <a class="hidden md:inline-block text-xl mb-2 font-light italic hover:underline hover:text-accent2" href="/boxes?type={{ $box->type }}">{{ $box->type }}</a>
                <div class="hidden md:block text-3xl mb-3 font-medium">{{ $box->title }}</div> <!-- Title -->
                <div class="text-xl md:text-lg mt-3 md:mt-0 space-x-2 mb-2 font-light underline md:no-underline italic">
                    <a class="hover:underline hover:text-accent2" href="#">Summer</a>
                    <a class="hover:underline hover:text-accent2" href="#">Greens</a>
                    <a class="hover:underline hover:text-accent2" href="#">Low Fat</a>
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
