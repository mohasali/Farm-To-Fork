document.getElementById('menu').addEventListener('click', function () {
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