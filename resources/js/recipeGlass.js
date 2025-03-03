function magnify(imgID, zoom) {
    var img, glass, bw;

    img = document.getElementById(imgID);

    // Create magnifier glass
    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");

    // Insert magnifier glass
    img.parentElement.insertBefore(glass, img);

    // Set background properties for the magnifier glass
    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
    bw = 3;

    // Show magnifier glass when cursor enters the image 
    img.addEventListener("mouseenter", function () {
        glass.style.display = "block";
    });

    // Hide magnifier glass when cursor leaves the image 
    img.addEventListener("mouseleave", function () {
        glass.style.display = "none";
    });

    // Execute function when cursor is moved over image
    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);

    /* For touch screens: */
    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);

    function moveMagnifier(e) {
        var pos, x, y, w, h;
        // Stop any other actions when hovering over the image
        e.preventDefault();
        // Get x and y pos of cursor
        pos = getCursorPos(e);
        x = pos.x;
        y = pos.y;
    
        // Get the width and height of the magnifier glass
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 3;
    
        // Prevent the magnifier glass from being positioned outside the image
        if (x > img.width - w / zoom) { x = img.width - w / zoom; }
        if (x < w / zoom) { x = w / zoom; }
        if (y > img.height - h / zoom) { y = img.height - h / zoom; }
        if (y < h / zoom) { y = h / zoom; }
    
        // Set position of the magnifying glass
        glass.style.left = (x - w) + "px";
        glass.style.top = (y - h) + "px";
    
        // Display what the magnifier glass see
        glass.style.backgroundPosition = "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
    }
    
    function getCursorPos(e) {
        var a, x = 0, y = 0;
        // Get x and y positions of image
        a = img.getBoundingClientRect();
        // Calculate cursor's x and y coordinates relative to image
        x = e.clientX - a.left;
        y = e.clientY - a.top;
        // Consider any page scrolling, attempted....
        return { x: x, y: y };
    }
    
    
    
}

/* Initialise magnify function on page load */
document.addEventListener("DOMContentLoaded", function() {
    magnify("myimage", 3); // Zoom level
});