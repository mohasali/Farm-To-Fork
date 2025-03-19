<x-layout>
    <!-- Add New Product -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>              
            <x-success-alert/>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Edit Product</h1>
        </div>
    </section>
    <!-- Form -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class=" bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col items-center">
            <form action="" method="POST" class="flex flex-col gap-4 w-full items-center" enctype="multipart/form-data">
                @csrf
                <!-- Product Name -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Product Name</strong></p></div>
                    <input name="title" type="text" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" value="{{ $box->title }}" placeholder="Enter the product name..." required>
                    <x-form-error name="title"/>
                </div>
                <!-- Stock Level -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Stock Level</strong></p></div>
                    <input name="stock" type="number" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" value="{{ $box->stock }}" placeholder="0" min="1" max="100" required>
                    <x-form-error name="stock"/>
                </div>
                <!-- Product Price -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Price</strong></p></div>
                    <input name="price" type="number" step="0.01" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" value="{{ $box->price }}" placeholder="£0" min="1" max="100" required>
                    <x-form-error name="price"/>
                </div>
                <!-- Box Contents | title | type | price | description | image 
                
                Categories - Seasonal, meat & diary, dynamic pricing, locally sourced, cultural recipe
                Filter options - summer, green, low fat, high fat, fiber rich, fruit, veggies, british
                -->
                <!-- Categories -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Category</strong></p></div>
                    <select id="category" name="type" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" required>
                        @foreach ($types as $type)
                        @if ($type == $box->type)
                        <option selected value="{{ $type }}">{{ $type }}</option>
                        @else
                        <option value="{{ $type }}">{{ $type }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-form-error name="type"/>
                </div>
                <!-- Tags -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Tags</strong></p></div>
                    <div class="w-full bg-gray-100 rounded-md px-3 py-2 text-center">
                        @foreach ($tags as $tag )
                        <label class="flex items-center gap-2">
                            <input {{ $box->tags->contains($tag) ? 'checked' : '' }} type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }} 
                        </label>
                        @endforeach
                        <x-form-error name="tags"/>
                    </div>
                </div>
                <!-- Description -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Description</strong></p></div>
                    <textarea id="description" name="description" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center" rows="5" placeholder="Enter the product description here..." required>{{ $box->description }}</textarea>
                    <x-form-error name="description"/>
                </div>
                <!-- Media -->
                <div class="w-1/2">
                    <div class="w-full flex items-center"><p><strong>Media</strong></p></div>
                    <input name="cover" type="file" accept="image/*" href="" id="media" name="media" class="w-full px-3 py-2 bg-gray-100 rounded-md text-center"></input>
                    <x-form-error name="cover"/>
                </div>
                <!-- Submit -->
                <div class="w-1/2">
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-accent1">Submit</button>
                </div>
            </form>

            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white p-3 rounded hover:bg-red-500 mt-5">Delete</button>
            </form>
        </div>
    </section>
</x-layout>