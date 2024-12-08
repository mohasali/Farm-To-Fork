<x-layout>
    <div class="flex flex-col justify-content-start mt-8 min-h-[calc(100vh-200px)]">
        <div class="flex flex-col md:flex-row mx-auto space-x-6 p-8">
            <!-- Mobile Title -->
            <div class="md:hidden text-4xl mb-3 font-medium">{{ $recipe->title }}</div> <!-- Title (mobile) -->
            
            <!-- Image Section -->
            <div class="flex justify-center md:block pt-7 img-magnifier-container">
                <img class="border-solid rounded-lg border-2w-[100%] md:w-[450px] object-cover" id="myimage" src="{{ $recipe->image_path }}">
            </div>
            
            <div>
                <!-- Title -->
                <div class="hidden md:block text-3xl mb-3 mt-8 font-medium">{{ $recipe->title }}</div> <!-- Title -->
                <!-- Description -->
                <div class="max-w-[500px] mb-7">{{ $recipe->description }}</div>
                <a class="bg-primary p-4 text-white rounded-xl text-center text-xl font-bold hover:bg-accent1 transition duration-300 ease-in-out" href="{{ url('/recipes') }}">Back to recipes</a> 
            </div>
        </div>
    </div>
    <!-- JavaScript Import -->
    <script src="resources/js/glass.js"></script>
    <style>
        /* Magnifying glass effect */
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
            display: none;
            pointer-events: none;
        }
    </style>
</x-layout>
