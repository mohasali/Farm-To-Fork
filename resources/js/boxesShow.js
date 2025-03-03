// Slideshow
let slideIndex = 1;
showSlides(slideIndex); // First slide

// Change slides when button is clicked
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Set to a slide when dot is clicked
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slides"); // Get all slides
    let dots = document.getElementsByClassName("dot"); // Get all dots
    
    // If current slide is greater than number of slides, go back to 1
    if (n > slides.length) {slideIndex = 1}
    // If current slide is less than 1, go to last slide
    if (n < 1) {slideIndex = slides.length}
    
    // Hide all sides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    // Remove the active class from dots
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    // Show current slide and set the dot as active as well
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    
    // Reinitialize magnifying glass for the current slide -- THIS DOESN'T WORK FOR MULTIPLE IDK WHY AND HOW TO FIX
    if (typeof initMagnifier === 'function') {
        setTimeout(function() {
            initMagnifier(".img-magnifier-image");
        }, 100);
    }
}

// Change every 5 seconds
let slideInterval = setInterval(function() {
    plusSlides(1);
}, 5000); // 5 seconds

// Pause when mouse enter
document.querySelector('.slideshow-container').addEventListener('mouseenter', function() {
    clearInterval(slideInterval);
});

// Resume when mouse leave
document.querySelector('.slideshow-container').addEventListener('mouseleave', function() {
    slideInterval = setInterval(function() {
        plusSlides(1);
    }, 5000);
});