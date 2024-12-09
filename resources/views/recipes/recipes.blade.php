<x-layout>
    <!-- Header -->
    <section class="relative w-full bg-cover transform bg-center md:bg-top md:min-h-[280px]" style="background-image: url('images/bg1.jpg');">
        <div class="flex flex-col items-center">
            <h1 class="m-auto text-4xl md:text-5xl font-bold p-4 pt-8 text-center text-secondary">Recipes</h1>
        </div>
    </section>

    <!-- Recipes  -->
    <div class="flex flex-wrap justify-center w-full py-12 mt-16 lg:mt-32 mb-16 lg:mb-32 md:gap-8 items-stretch overflow-x-auto px-4">
        <!-- Go through the recipes -->
        @foreach ($recipes as $recipe)
            <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full sm:w-[45%] lg:w-[20%] max-w-[300px] min-h-[450px] shadow-md mb-12">
                <!-- Title -->
                <h1 class="text-lg font-bold mt-4 text-center">{{ $recipe->title }}</h1>
                <!-- Image -->
                <img class="border-solid rounded-lg border-2 w-[90%] max-h-[200px] object-cover" src="{{ $recipe->imagePath }}">
                <!-- Description -->
                <p class="h-16 text-center px-4 text-sm leading-tight">{{ $recipe->description }}</p>
                <!-- View Recipe -->
                <a href="{{ url('recipes/' . $recipe->id) }}" class="bg-primary mb-4 text-white px-4 py-2 rounded font-semibold hover:bg-orange-600 transition">View</a>
            </div>
        @endforeach
    </div>
    <div class="my-6 mx-8">{{ $recipes->links() }}</div>
</x-layout>
