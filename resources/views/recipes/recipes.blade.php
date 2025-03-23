<x-layout title="Recipes">
    <!-- Hero Header -->
    <section class="relative w-full bg-cover bg-center py-16 md:py-24" style="background-image: url('images/bg1.jpg');">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center">Recipes</h1>
                <p class="mt-4 text-lg md:text-xl text-center max-w-2xl">Discover delicious dishes to make with our farm-fresh ingredients</p>
            </div>
        </div>
    </section>
    
    <div class="absolute left-4 top-48 md:left-8 md:top-52 lg:left-12 animate-bounce">
        <x-egg :value="4"/>
    </div>
    
    <!-- Search and Filter Bar -->
    <div class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex flex-wrap justify-center gap-2 w-full md:w-auto">
                    <!-- FIX THIS -->
                    <!-- LOOP THROUGH ALL RECIPES TAGS  AND ADD A LINK FOR EACH TAG WHICH WILL FILTER IT OUT -->
                    <a href="{{ route('recipes.index') }}" class="px-4 py-2 {{ request()->routeIs('recipes.index') && !request()->query('tag') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' }} rounded-full text-sm hover:bg-primary/90  hover:text-white transition">All Recipes</a>
                    <a href="{{ route('recipes.index', ['tag' => 'vegetarian']) }}" class="px-4 py-2 {{ request()->query('tag') === 'vegetarian' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' }} rounded-full text-sm hover:bg-primary/90 hover:text-white transition">Vegetarian</a>
                    <a href="{{ route('recipes.index', ['tag' => 'quick-easy']) }}" class="px-4 py-2 {{ request()->query('tag') === 'quick-easy' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' }} rounded-full text-sm hover:bg-primary/90 hover:text-white transition">Quick & Easy</a>
                    <a href="{{ route('recipes.index', ['tag' => 'seasonal']) }}" class="px-4 py-2 {{ request()->query('tag') === 'seasonal' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' }} rounded-full text-sm hover:bg-primary/90 hover:text-white transition">Seasonal</a>
                </div>
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Search recipes..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute right-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipes -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($recipes as $recipe)
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative overflow-hidden">
                        <a href="{{ url('recipes/' . $recipe->id) }}" class="block relative h-48 sm:h-56 w-full">
                            <img class="w-full h-full object-cover transition duration-300 group-hover:scale-105" src="{{ $recipe->imagePath }}" alt="{{ $recipe->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        </a>
                        <div class="absolute bottom-0 left-0 p-3 w-full">
                            <span class="inline-block px-3 py-1 bg-primary text-white text-xs rounded-full opacity-0 group-hover:opacity-100 transition duration-300">Click to view recipe</span>
                        </div>
                    </div>
                    
                    <!-- Card -->
                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="px-2 py-1 bg-gray-100 text-xs text-gray-600 rounded-full">{{ $recipe->tag }}</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $recipe->title }}</h2>
                        <p class="text-gray-600 text-sm flex-grow">{{ $recipe->description }}</p>
                        
                        <!-- Recipe Info -->
                        <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                            <div class="flex items-center">
                                <!-- Time -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs text-gray-500">{{ $recipe->cooking_time ?? '0' }} mins</span>
                                <!-- Serving -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <span class="text-xs text-gray-500">{{ $recipe->serving ?? '0' }} servings</span>
                            </div>
                            <div class="flex items-center">
                                <!-- Rating -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z" />
                                </svg>
                                <span class="text-xs text-gray-500">{{ number_format($recipe->rating ?? 0, 1) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>