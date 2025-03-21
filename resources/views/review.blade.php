<x-layout>
    <div class="flex flex-col justify-start mt-8 mb-6 ">
        <div class="flex flex-col bg-gray-100 rounded-lg w-2/3 mx-auto space-y-6 md:space-y-0 p-4">
            <!-- Title -->
            <h1 class="text-3xl font-medium">What do you think of our site?</h1>
            <!-- Star/moon rating -->
            <div class="justify-start mt-6 inline-flex">
                <div class="flex space-x-1 text-gray-400" id="rating-container">
                    <!-- Moons will be dynamically generated -->
                </div>
                <!-- Clear button -->
                <a href="#" class="text-secondary pl-2" id="clear-rating"><u>Clear</u></a>
            </div>


            
            <!-- Review form -->
            <form action="" method="POST">
                @csrf
                <input hidden id="rating-input" name="rating" value="0">
                <p class="text-lg font-bold">Write a review</p>
                <!-- Title -->
                <div class="mb-4">
                    <label class="text-sm font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full p-2 rounded-lg" placeholder="Write a catchy title" minlength="1" maxlength="80" required>
                </div>
                <!-- Review paragraph -->
                <div class="mb-4">
                    <label class="text-sm font-medium mb-2">Review</label>
                    <textarea type="text" id="reviewtext" name="description" class="w-full p-2 rounded resize-none" placeholder="What should other customers know?" rows="5" minlength="10" maxlength="280"></textarea>
                </div>
                <!-- Submit  -->
                <div class="text-center flex-inline flex-col space-y-4">
                    <a href='/' class="bg-gray-300 text-gray-70 text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-600">Submit</button>
                </div>
            </form>
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