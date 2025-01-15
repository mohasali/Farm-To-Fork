<x-layout>
    <div class="flex flex-col justify-content-start mt-8 min-h-[calc(100vh-200px)]">
        <div class="flex flex-col md:flex-row mx-auto space-x-6 p-8">
            <!-- Mobile -->
            <div class="md:hidden text-4xl mb-3 font-medium">{{ $recipe->title }}</div> <!-- Title (mobile) -->
            
            <!-- Image -->
            <div class="flex justify-center md:block pt-7 img-magnifier-container">
                <img class="border-solid rounded-lg border-2 w-[100%] md:w-[450px] object-cover" id="myimage" src="{{ $recipe->imagePath }}">
            </div>
            
            <div>
                <!-- Title -->
                <div class="hidden md:block text-3xl mb-3 mt-8 font-medium">{{ $recipe->title }}</div> <!-- Title -->
                <!-- Description -->
                <div class="max-w-[500px] mb-7">{{ $recipe->description }}</div>

                <!-- Ingredients -->
                <strong>Instructions:</strong>
                <div class="max-w-[500px] mb-7">
                    <!-- Check if ingredients > 0 -->
                    @if($recipe->ingredients->count() > 0)
                        <ul>
                            <!-- Loop through ingredients -->
                            @foreach($recipe->ingredients as $ingredient)
                                <li>{{ $ingredient->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No ingredients available.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Steps -->
        <div class="flex flex-col mx-auto mt-8 p-8">
            <strong>Steps:</strong>
            <div class="max-w-[900px] mb-7">
                <!-- Check if steps > 0 -->
                @if($recipe->steps->count() > 0)
                    <ol>
                        <!-- Loop through steps -->
                        @foreach($recipe->steps as $index => $step)
                            <li><strong>{{ $index + 1 }}</strong>. {{ $step->description }}</li>
                        @endforeach
                    </ol>
                @else
                    <p>No steps available.</p>
                @endif
            </div>
        </div>
        
        <div class="flex justify-center mt-4 mb-4">
            <a class="bg-primary p-3 text-white rounded-lg text-center text-l font-bold hover:bg-orange-600 transition" href="{{ url('/recipes') }}">Back to recipes</a>
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
