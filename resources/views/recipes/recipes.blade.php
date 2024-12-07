<x-layout>
    <!-- Header  -->
    <section class="relative w-full bg-cover transform bg-center md:bg-top md:min-h-[280px]" style="background-image: url('images/bg1.jpg');">
        <div class="flex flex-col items-center">
            <h1 class="m-auto text-4xl md:text-5xl font-bold p-4 pt-8 text-center text-white">Recipes</h1>
        </div>
    </section>

    <div class="flex flex-wrap justify-center w-full py-12 mt-16 lg:mt-32 mb-16 lg:mb-32 md:gap-[500px] items-stretch overflow-x-auto px-4">
        <!-- Card 1-->
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full sm:w-[45%] lg:w-[20%] max-w-[300px] min-h-[450px] shadow-md mb-12">
            <h1 class="text-lg font-bold mt-4">Recipe 1</h1>
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[200px] object-cover" src="images/Placeholder.jpeg">
            <p class="h-16 text-center px-4 text-sm leading-tight">Short description about the recipe</p>
            <a href="" class="bg-primary mb-4 text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">View Recipe</a>
        </div>

        <!-- Card 2 -->
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full sm:w-[45%] lg:w-[20%] max-w-[300px] min-h-[450px] shadow-md mb-12">
            <h1 class="text-lg font-bold mt-4">Recipe 2</h1>
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[200px] object-cover" src="images/Placeholder.jpeg">
            <p class="h-16 text-center px-4 text-sm leading-tight">Short description about the recipe</p>
            <a href="" class="bg-primary mb-4 text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">View Recipe</a>
        </div>
    </div>
</x-layout>
