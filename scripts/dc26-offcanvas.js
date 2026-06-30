// Load offcanvas scripts

// Scroll lock — position:fixed sur le body (fix iOS Safari où overflow:hidden ne bloque pas le scroll).
function dc26LockScroll() {
    const scrollY = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollY}px`;
    document.body.style.width = '100%';
    document.body.dataset.scrollY = scrollY;
}

function dc26UnlockScroll() {
    const scrollY = parseInt(document.body.dataset.scrollY || '0', 10);
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';
    delete document.body.dataset.scrollY;
    window.scrollTo(0, scrollY);
}

document.addEventListener("DOMContentLoaded", function () {
    var burgerIcon = document.getElementById("burger-icon");
    var offCanvas = document.getElementById("offcanvas");
    var overlay = document.getElementById("overlay");
    var body = document.body;
    var menuContainer = document.getElementById("menu-container");

    // Check if all required elements exist before proceeding
    if (!burgerIcon || !offCanvas || !overlay || !menuContainer) {
        console.log("Offcanvas elements not found, skipping offcanvas initialization");
        return;
    }

    function toggleOffCanvas() {
        const isOpening = !offCanvas.classList.contains("right-0");

        menuContainer.classList.toggle("overflow-visible");
        offCanvas.classList.toggle("-right-[500px]");
        offCanvas.classList.toggle("right-0");
        overlay.classList.toggle("hidden");

        if (isOpening) {
            dc26LockScroll();
        } else {
            dc26UnlockScroll();
        }

        // Toggle the aria-expanded state
        var expanded = burgerIcon.getAttribute("aria-expanded") === "true";
        burgerIcon.setAttribute("aria-expanded", !expanded);
        burgerIcon.classList.toggle("close-mode");
    }

    // Add click event listener to burger icon
    burgerIcon.addEventListener("click", toggleOffCanvas);

    // Add click event listener to overlay
    overlay.addEventListener("click", toggleOffCanvas);
});

// Close offcanvas pressing Escape
document.addEventListener("keyup", function (event) {
    if (event.code === "Escape") {
        var offcanvasMenu = document.getElementById("offcanvas");
        var overlayOffcanvas = document.getElementById("overlay");

        if (offcanvasMenu && overlayOffcanvas && offcanvasMenu.classList.contains("open")) {
            offcanvasMenu.classList.remove("open");
            overlayOffcanvas.classList.remove("open");
            dc26UnlockScroll();
        }
    }
});
