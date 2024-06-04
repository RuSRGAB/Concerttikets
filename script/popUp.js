// Espera a que el DOM se haya cargado completamente
document.addEventListener("DOMContentLoaded", function () {
  // Selecciona  las imágenes de los conciertos
  var images = document.querySelectorAll(".concert-image");

  // Selecciona los elementos del pop-up
  var popup = document.getElementById("popup");
  var popupImage = document.getElementById("popup-image");
  var popupTitle = document.getElementById("popup-title");
  var popupDescription = document.getElementById("popup-description");
  var popupLink = document.getElementById("popup-link");
  var span = document.getElementsByClassName("close")[0];

  // Datos de los conciertos
  var concertsData = {
    cartelGinebras: {
      title: "Las Ginebras",
      description:
        "Ginebras es una banda musical española de indie rock formada en 2018. Sus componentes son cuatro mujeres: Magüi Berto (voz y guitarra), Sandra Sabater (guitarra solista), Raquel López (bajo) y Juls Acosta (batería).",
      link: "https://www.youtube.com/channel/UCkfk_xg-VwTdY2Yrs8hO2XQ",
    },
    cartelBlackKeys: {
      title: "The Black Keys",
      description:
        "The Black Keys es un banda de rock estadounidense formada en Akron (Ohio) en 2001 y compuesta por Dan Auerbach (voz y guitarra) y Patrick Carney (batería). ",
      link: "https://www.youtube.com/channel/UCJL3h2-wEOB6EigQOBZ3ryg",
    },
    cartelFat: {
      title: "Fatboy Slim",
      description:
        "Norman Quentin Cook (nacido como Quentin Leo Cook; Bromley, Londres, Inglaterra, 31 de julio de 1963), más conocido como Fatboy Slim, es un DJ y productor británico. Fue pionero en el género big beat, el cual es una combinación de hip hop, breakbeat, rock y rhythm and blues.",
      link: "https://www.youtube.com/channel/UCCbP5cOWp9s75x_r6xq7LcQ",
    },
    logoRedHot: {
      title: "Red Hot Chili Peppers",
      description:
        "Red Hot Chili Peppers es un grupo de California fundado en 1983 que combina funk y rock. Es otro de los grupos de rock que despuntaron en los 90, atravesaron varias barreras musicales y fueron muy originales, creando su propio estilo de música de rock explosivo.",
      link: "https://www.youtube.com/channel/UCEuOwB9vSL1oPKGNdONB4ig",
    },
  };

  // Añade un event listener a cada imagen
  images.forEach(function (image) {
    image.addEventListener("click", function () {
      // Obtiene el ID de la imagen seleccionada
      var concertId = this.id;

      // Obtiene los datos del concierto
      var concertData = concertsData[concertId];

      if (concertData) {
        // Actualiza  con los datos del concierto
        popupImage.src = this.src;
        popupTitle.textContent = concertData.title;
        popupDescription.textContent = concertData.description;
        popupLink.href = concertData.link;

        // Muestra el pop-up
        popup.style.display = "block";
      }
    });
  });

  // Añade un event listener al botón de cerrar para ocultar el pop-up
  span.onclick = function () {
    popup.style.display = "none";
  };

  // Añade un event listener al window para cerrar el pop-up si se hace clic fuera de él
  window.onclick = function (event) {
    if (event.target == popup) {
      popup.style.display = "none";
    }
  };
});
