<x-layout title="Recipes | {{ $recipe->title }}">
    <div class="min-h-[calc(100vh-200px)] bg-gray-50">
        <!-- Image background header -->
        <div class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden">
            <div class="absolute inset-0 bg-black/50 z-10"></div>
            <img src="{{ $recipe->imagePath }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $recipe->title }}">
            <div class="absolute inset-0 z-20 flex items-center justify-center p-6">
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-2">{{ $recipe->title }}</h1>
                    <div class="flex items-center justify-center gap-3 text-white">
                        <a class="text-white/90 hover:text-white transition italic font-light hover:underline">{{ $recipe->tag }}</a>
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <span class="ml-1 font-medium">{{ $recipe->rating }}</span>
                        </div>
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="ml-1 font-medium">{{ $recipe->cooking_time }} mins</span>
                        </div>
                        <span class="h-4 w-px bg-white/30"></span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="ml-1 font-medium">{{ $recipe->serving }} servings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Description Card -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">About This Recipe</h2>
                <p class="text-gray-600 leading-relaxed">{{ $recipe->description }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Ingredients -->
                <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-1">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                    </svg>
                        Ingredients
                    </h2>
                    <div class="divide-y divide-gray-100">
                        @if($recipe->ingredients->count() > 0)
                            @foreach($recipe->ingredients as $ingredient)
                                <div class="py-3 flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-accent2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700">{{ $ingredient->name }}</span>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 italic py-3">No ingredients available.</p>
                        @endif
                    </div>
                </div>

                <!-- Steps -->
                <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Preparation Steps
                    </h2>
                    @if($recipe->steps->count() > 0)
                        <div class="space-y-4">
                            @foreach($recipe->steps as $index => $step)
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white font-medium">
                                            {{ $index + 1 }}
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4 flex-grow">
                                        <p class="text-gray-700">{{ $step->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No steps available.</p>
                    @endif
                </div>
            </div>

            <!-- Image Magnifier -->
            <div class="mt-8 mb-8 bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Get a Closer Look
                </h2>
                <p class="text-gray-600 mb-4 text-center">Hover over the image to get a magnified view of this delicious meal.</p>
                <div class="flex justify-center">
                    <div class="max-w-[30%] img-magnifier-container">
                        <img id="myimage" class="rounded-lg max-w-full h-auto object-cover" src="{{ $recipe->imagePath }}" alt="{{ $recipe->title }}">
                    </div>
                </div>
            </div>

            <!-- Back -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <a href="{{ url('/recipes') }}" class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Recipes
                </a>
            </div>
        </div>
    </div>

    <!-- import the javascript -->
    @vite(['resources/js/recipeGlass.js'])
    <style>
        /* Magnifying glass CSS */
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
    </style>
</x-layout>