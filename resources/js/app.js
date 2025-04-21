document.getElementById('mobile-nav-button').addEventListener('click', function () {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.classList.toggle('enable');
});

const menuLinks = document.querySelectorAll('.mobile-menu a');

menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        const mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.remove('enable');
    });
});