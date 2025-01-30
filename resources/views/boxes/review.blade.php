<x-layout>
    <div class="flex flex-col justify-start mt-8 mb-6 ">
        <div class="flex flex-col bg-gray-100 rounded-lg w-2/3 mx-auto space-y-6 md:space-y-0 p-4">
            <!-- Title -->
            <h1 class="text-3xl font-medium">{{ $box->title }}</h1>
            <!-- Type -->
            <a class="text-2xl mb-2 font-light italic underline hover:text-accent2" href="/boxes?type={{ urlencode($box->type) }}">{{ $box->type }}</a>
            <div class="text-xl md:text-lg mt-3 space-x-2 font-light underline md:no-underline italic">
                <!-- Tags -->
                @foreach ($tags as $tag)
                    <a class="hover:underline hover:text-accent2" href="/boxes?tags%5B%5D={{$tag->id}}">{{ $tag->name }}</a>
                @endforeach
            </div>
            <!-- Star/moon rating -->
            <div class="justify-start mt-6 inline-flex">
                <div class="flex space-x-1 text-gray-400">
                    <p class="text-lg">🌕🌕🌕🌕🌕</p>
                    <!-- Clear button -->
                    <a href="" class="text-secondary pl-2"><u>Clear</u></a>
                </div>
            </div>
            
            <!-- image container -->
            <div class="flex justify-center items-center pt-7 pb-4 img-magnifier-container">
                <img 
                    class="w-full max-w-xs sm:max-w-md md:w-[450px] rounded-lg opacity-80" 
                    id="myimage" 
                    src="{{ $box->imagePath }}" 
                    alt="Box Image">
            </div>
            
            <!-- Review form -->
            <form action="" method="">
                <p class="text-lg font-bold">Write a review</p>
                <!-- Title -->
                <div class="mb-4">
                    <label class="text-sm font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full p-2 rounded-lg" placeholder="Write a catchy title" required>
                </div>
                <!-- Review paragraph -->
                <div class="mb-4">
                    <label class="text-sm font-medium mb-2">Review</label>
                    <textarea type="text" id="reviewtext" name="reviewtext" class="w-full p-2 rounded resize-none" placeholder="What should other customers know?" rows="5" required></textarea>
                </div>
                <!-- Submit  -->
                <div class="text-center flex-inline flex-col space-y-4">
                    <a href="{{ url('/boxes/' . $box->id) }}" class="bg-gray-300 text-gray-70 text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>