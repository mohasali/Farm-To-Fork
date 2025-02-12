<x-layout>
    <!-- Add New Product -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Add New Product</h1>
        </div>
    </section>
    <!-- Form -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="h-[800px] bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col items-center">
            <form action="/addproduct" method="GET" class="flex flex-col gap-4 w-full items-center">
                <!-- Product Name -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Product Name</strong></p></div>
                    <input type="text" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" placeholder="Enter the product name..." required>
                </div>
                <!-- Initial Stock Level -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Initial Stock Level</strong></p></div>
                    <input type="number" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" placeholder="0" min="1" max="100" required>
                </div>
                <!-- Product Price -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Price</strong></p></div>
                    <input type="number" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" placeholder="£0" min="1" max="100" required>
                </div>
                <!-- Box Contents | title | type | price | description | image 
                
                Categories - Seasonal, meat & diary, dynamic pricing, locally sourced, cultural recipe
                Filter options - summer, green, low fat, high fat, fiber rich, fruit, veggies, british
                -->
                <!-- Categories -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Categories</strong></p></div>
                    <select id="categories" name="categories" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" required>
                        <option value="seasonal">Seasonal</option>
                        <option value="meatanddiary">Meat & Diary</option>
                        <option value="dynamicpricing">Dynamic Pricing</option>
                        <option value="locallysourced">Locally Sourced</option>
                        <option value="cultural">Cultural Recipe</option>
                    </select>
                </div>
                <!-- Types ? -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Types</strong></p></div>
                    <select id="types" name="types" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" required>
                        <option value="summer">Summer</option>
                        <option value="green">Green</option>
                        <option value="lowfat">Low Fat</option>
                        <option value="highfat">High Fat</option>
                        <option value="fiberrich">Fiber Rich</option>
                        <option value="fruit">Fruit</option>
                        <option value="veggies">Veggies</option>
                        <option value="british">British</option>
                    </select>
                </div>
                <!-- Description -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Description</strong></p></div>
                    <textarea id="description" name="description" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" rows="5" placeholder="Enter the product description here..." required></textarea>
                </div>
                <!-- Media -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Media</strong></p></div>
                    <a href="" id="media" name="media" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center">Upload media</a>
                </div>
                <!-- Submit -->
                <div class="w-1/2">
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-accent1">Submit</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>