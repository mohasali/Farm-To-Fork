<x-layout>
    <!-- Edit product -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.inventory') }}" :active="request()->routeIs('admin.inventory')">Back</x-account-nav-link>              
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Edit Product</h1>
            <x-success-alert/>
        </div>
    </section>
    
    <!-- Edit -->
    <section class="gap-4 p-6 max-w-4xl mx-auto">
        <div class="max-h-[800px] space-y-4 p-4 bg-gray-50 rounded-lg shadow-md">
            <form action="{{ route('admin.inventory.edit', $box) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-8">
                    <!-- Image -->
                    <div class="w-full sm:w-80 md:w-60 lg:w-80 flex flex-col space-y-4">
                        <div class="h-40 md:h-40 lg:h-60 rounded-md overflow-hidden flex-shrink-0">
                            <img src="{{ $box->getImages()[0] }}" alt="{{ $box->title }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        <div class="w-full">
                            <input name="cover" type="file" accept="image/*" class="w-full text-sm px-3 py-2 bg-gray-100 rounded-md">
                            <x-form-error name="cover"/>
                        </div>
                        <div class="w-full mt-auto">
                            <button type="submit" class="w-full mb-2 bg-primary text-white px-4 py-2 rounded-lg font-bold hover:bg-accent1 transition-colors">Save Changes</button>
                            <button type="submit" form="delete-form" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-accent1 transition-colors">Delete Product</button>
                        </div>
                    </div>
                    
                    <!-- Form -->
                    <div class="w-full space-y-4">
                        <!-- Title -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Title</div>
                            <input name="title" type="text" value="{{ $box->title }}" 
                                placeholder="Enter product name..." required
                                class="w-full px-3 py-2 bg-gray-100 rounded-md">
                            <x-form-error name="title"/>
                        </div>
                        
                        <!-- Price -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Price</div>
                            <div class="relative w-full">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2">£</span>
                                <input name="price" type="number" step="0.01" value="{{ $box->price }}" placeholder="0.00" min="1" max="100" required class="w-full px-3 py-2 pl-8 bg-gray-100 rounded-md">
                            </div>
                            <x-form-error name="price"/>
                        </div>
                        
                        <!-- Tags -->
                        <div class="flex items-start w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0 pt-2">Tags</div>
                            <div class="flex flex-wrap gap-2 w-full">
                                @foreach ($tags as $tag)
                                <div class="relative flex-shrink-0">
                                    <input type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ $box->tags->contains($tag) ? 'checked' : '' }} class="absolute opacity-0 w-0 h-0 peer">
                                    <label for="tag-{{ $tag->id }}" class="flex-shrink-0 px-2 py-1 text-xs bg-gray-200 text-black rounded-md cursor-pointer block transition-colors duration-200 peer-checked:bg-primary peer-checked:text-white">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <x-form-error name="tags"/>
                        </div>
                        
                        <!-- Type -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Type</div>
                            <select name="type" class="w-full px-3 py-2 bg-gray-100 rounded-md" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ $type == $box->type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            <x-form-error name="type"/>
                        </div>
                        
                        <!-- Stock -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Stock</div>
                            <input name="stock" type="number" value="{{ $box->stock }}" placeholder="0" min="0" max="100" required class="w-full px-3 py-2 bg-gray-100 rounded-md">
                            <x-form-error name="stock"/>
                        </div>
                        
                        <!-- Description -->
                        <div class="flex flex-col w-full gap-2">
                            <div class="font-semibold text-left">Description</div>
                            <textarea name="description" rows="4" placeholder="Enter product description..." required class="w-full px-3 py-2 bg-gray-100 rounded-md resize-none" minlength="10" maxlength="280">{{ $box->description }}</textarea>
                            <x-form-error name="description"/>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Delete form-->
            <form id="delete-form" action="{{ route('admin.inventory.delete', $box) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </section>
</x-layout>