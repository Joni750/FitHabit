document.addEventListener("DOMContentLoaded", function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel-slide");
    const dots = document.querySelectorAll(".dot");

    // Mostrar la primera imagen al cargar la página
    showSlide(currentSlide);

    // Manejar clics en las flechas
    document.querySelector(".left-arrow").addEventListener("click", function() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    });

    document.querySelector(".right-arrow").addEventListener("click", function() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    });

    // Manejar clics en los puntos
    dots.forEach(function(dot, index) {
        dot.addEventListener("click", function() {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Función para mostrar la imagen actual
    function showSlide(index) {
        slides.forEach(function(slide) {
            slide.style.display = "none";
        });

        dots.forEach(function(dot) {
            dot.style.backgroundColor = "transparent";
        });

        slides[index].style.display = "block";
        dots[index].style.backgroundColor = "white";
    }
});