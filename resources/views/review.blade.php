<x-layout>
    <div class="min-h-[calc(100vh-200px)] bg-gray-50">
        <!-- Image background with parallax!!!!-->
        <section class="relative w-full h-96 md:h-[500px] bg-cover bg-center bg-fixed" style="background-image: url('images/SiteReview.jpeg');">
            <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center">
                <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Farm to Fork</h1>
                <p class="text-white/90 text-lg md:text-xl max-w-2xl px-6">Your thoughts matter!</p>
            </div>
        </section>

        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-xl shadow-md p-6 mb-8 max-w-3xl mx-auto">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                    What do you think of our site?
                </h2>

                <!-- Star/moon rating -->
                <div class="rounded-lg p-4 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <h3 class="text-gray-700 font-medium mr-3">Your Rating</h3>
                            <div class="flex space-x-1 text-gray-400" id="rating-container">
                                <!-- Moons will be dynamically generated -->
                            </div>
                        </div>
                        <!-- Clear Button -->
                        <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium" id="clear-rating">Reset Rating</a>
                    </div>
                </div>

                <!-- Review form -->
                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <input hidden id="rating-input" name="rating" value="0">
                    
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Review Title</label>
                        <input type="text" id="title" name="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" placeholder="Write a catchy title" minlength="1" maxlength="80" required>
                    </div>
                    
                    <!-- Review paragraph -->
                    <div>
                        <label for="reviewtext" class="block text-sm font-medium text-gray-700 mb-1">Review Details</label>
                        <textarea id="reviewtext" name="description" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none" placeholder="What should other customers know about our site?" rows="5" minlength="10" maxlength="280" required></textarea>
                    </div>
                    
                    <!-- Submit -->
                    <div class="flex justify-center gap-4 pt-2">
                        <a href="/" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                            Cancel
                        </a>
                        <button type="submit" class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

<<script>
    const container = document.getElementById("rating-container");
    const clearButton = document.getElementById("clear-rating");
    const ratingInput = document.getElementById("rating-input");
    let selectedRating = 1;
    const grayOut = "color: transparent; text-shadow: 0 0 darkgray"

    function renderMoons(rating) {
        container.innerHTML = "";
        ratingInput.value = rating;
        for (let i = 1; i <= 5; i++) {
            const moon = document.createElement("span");
            moon.textContent = "🥕";
            
            moon.style = rating >= i ? "" : grayOut;
            
            moon.dataset.value = i;
            moon.style.cursor = "pointer";
            moon.addEventListener("mouseover", () => renderMoons(i));
            container.appendChild(moon);
        }
    }
    
    clearButton.addEventListener("click", (e) => {
        e.preventDefault();
        selectedRating = 1;
        ratingInput.value = selectedRating;
        renderMoons(selectedRating);
    });
    
    renderMoons(selectedRating);
</script>