let slideIndex = 1;
let slideInterval;


function showSlides(n) {
    const slides = document.getElementsByClassName("slides");
    const dots = document.getElementsByClassName("dot");

    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}


function currentSlide(n) {
    clearInterval(slideInterval); 
    showSlides(slideIndex = n); 
    resetSlideInterval(); 
}


function autoShowSlides() {
    slideIndex++;
    showSlides(slideIndex);
}

function resetSlideInterval() {
    clearInterval(slideInterval); 
    slideInterval = setInterval(autoShowSlides, 5000); 
}

showSlides(slideIndex);
resetSlideInterval();

document.getElementById('menu-toggle').addEventListener('click', function () {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.classList.toggle('active');
});

const menuLinks = document.querySelectorAll('.mobile-menu a');

menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        const mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.remove('active');
    });
});