document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".slide");
  let currentSlideIndex = 0;

  // Función para mostrar el slide actual
  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });
  }

  // Mostrar el primer slide inicialmente
  showSlide(currentSlideIndex);

  // Función para el botón "Volver"
  document.getElementById("backButton").addEventListener("click", function () {
    history.back();
  });

  // Manejar el evento de cambio de estado del historial
  window.addEventListener("popstate", function (event) {
    if (event.state && event.state.slide !== undefined) {
      currentSlideIndex = event.state.slide;
      showSlide(currentSlideIndex);
    }
  });

  // Inicializar el estado del historial
  history.replaceState(
    { slide: currentSlideIndex },
    "",
    `#slide${currentSlideIndex + 1}`
  );
});
