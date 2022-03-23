const scrollToTop = document.querySelector(".scroll-to-top");

scrollToTop.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
});

window.addEventListener("scroll", function() {
    if (window.pageYOffset >= 100) {
        scrollToTop.classList.add("active");
    } else {
        scrollToTop.classList.remove("active");
    }
});