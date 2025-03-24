<x-layout title="Admin | Products">
    <!-- Add New Product -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Add New Product</h1>
            <x-success-alert/>
        </div>
    </section>

    <!-- Form -->
    <section class="gap-4 p-6 max-w-4xl mx-auto">
        <div class="max-h-[800px] space-y-4 p-4 bg-gray-50 rounded-lg shadow-md">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-8">
                    <!-- Image -->
                    <div class="w-full sm:w-80 md:w-60 lg:w-80 flex flex-col space-y-4">
                        <div class="h-40 md:h-40 lg:h-60 rounded-md overflow-hidden flex-shrink-0 bg-gray-200 flex items-center justify-center">
                            <img id="imagePreview" src="/images/Placeholder.jpeg" alt="Placeholder image" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="w-full">
                            <input name="cover" type="file" accept="image/*" onchange="previewImage(this)" class="w-full px-3 py-2 bg-gray-100 rounded-md border text-sm border-gray-300">
                            <x-form-error name="cover"/>
                        </div>
                        <div class="w-full mt-auto">
                            <button type="submit" class="w-full bg-primary text-white px-4 py-2 rounded-lg font-bold hover:bg-accent1 transition-colors">Create Product</button>
                        </div>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="w-full space-y-4">
                        <!-- Title -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Title</div>
                            <input name="title" type="text" placeholder="Enter product name..." required class="w-full px-3 py-2 bg-gray-100 rounded-md border border-gray-300">
                            <x-form-error name="title"/>
                        </div>
                        
                        <!-- Price -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Price</div>
                            <div class="relative w-full">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2">£</span>
                                <input name="price" type="number" step="0.1" placeholder="0.00" min="1" max="100" required class="w-full px-3 py-2 pl-8 bg-gray-100 rounded-md border border-gray-300">
                            </div>
                            <x-form-error name="price"/>
                        </div>
                        
                        <!-- Tags -->
                        <div class="flex items-start w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0 pt-2">Tags</div>
                            <div class="flex flex-wrap gap-2 w-full">
                                @foreach ($tags as $tag)
                                <div class="relative flex-shrink-0">
                                    <input type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" class="absolute opacity-0 w-0 h-0 peer">
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
                            <select name="type" class="w-full px-3 py-2 bg-gray-100 rounded-md border border-gray-300" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <x-form-error name="type"/>
                        </div>
                        
                        <!-- Stock -->
                        <div class="flex items-center w-full gap-2">
                            <div class="w-16 font-semibold flex-shrink-0">Stock</div>
                            <input name="stock" type="number" placeholder="0" min="1" max="100" required class="w-full px-3 py-2 bg-gray-100 rounded-md border border-gray-300">
                            <x-form-error name="stock"/>
                        </div>
                        
                        <!-- Description -->
                        <div class="flex flex-col w-full gap-2">
                            <label class="font-semibold text-left">Description</label>
                            <textarea name="description" rows="4" placeholder="Enter product description..." required class="w-full min-h-[120px] h-32 md:h-40 px-3 py-2 bg-gray-100 rounded-md border border-gray-300 resize-none" minlength="10" maxlength="280" ></textarea>
                            <x-form-error name="description"/>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layout>

<script>
    // Preview Image
function previewImage(input) {
    // Check if input has files
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        // Set image source to file
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>