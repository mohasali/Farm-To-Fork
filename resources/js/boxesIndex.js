document.addEventListener('DOMContentLoaded', function() {

    // Slideshow for box
    document.querySelectorAll('.box-image-container').forEach(container => {
        let slides = container.querySelectorAll('.slides'); // Get all elements
        let index = 0; /// Current
        // If greater than 1 slide
        if (slides.length > 1) {
            setInterval(() => {
                // Switch slides every 5 seconds,
                slides.forEach(slide => slide.style.display = "none"); // Hides all slides in container
                index = (index + 1) % slides.length; // Next slide
                slides[index].style.display = "block"; // Current
            }, 5000);
        }
    });
});