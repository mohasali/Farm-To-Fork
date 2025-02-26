document.getElementById('mobile-nav-button').addEventListener('click', function () {
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


(function() {
    var tidioScript = document.createElement("script");
    tidioScript.src = "//code.tidio.co/wdoityvtearzrtco9yijzazul9ojf51u.js";
    tidioScript.async = true;
    document.body.appendChild(tidioScript);
})();
