document.addEventListener("DOMContentLoaded", () => {
    // Carrusel
    const slides = document.querySelectorAll(".carousel-slide");
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? "block" : "none";
        });
    }

    showSlide(currentIndex);

    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }, 3000);

    // Cambio de color en los botones "Ver más" o "Pasar el curso"
    const botones = document.querySelectorAll(".btn-ver-mas");

    botones.forEach((boton) => {
        boton.addEventListener("click", () => {
            boton.classList.toggle("clicked");
        });
    });
});
