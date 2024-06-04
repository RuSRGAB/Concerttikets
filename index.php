<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConcertTikets</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="slider" id="Siderprincipal">
    <img src="img/portada.png" alt="Nombre de la empresa" id="ImagenPortada">
  </div>
  <NAV class="nav">
        <ul>
        <li><a href="index.php"><button id="iniciButton">Inicio</button></a></li>
            <li><a href="logueo.php"><button id="loginButton">Login/Registro</button></a></li>
            <li><a href="conciertos.php"><button id="conciertosButton">Conciertos</button></a></li>
            <li><a href="contacto.php"><button id="contactoButton">Contacto</button></a></li>
            <li><a href="privacidad.php"><button id="privacidadButton">Privacidad</button></a></li>
            <?php session_start(); ?>
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="<?php echo $_SESSION['rol'] == 1 ? 'admin.php' : 'usuario.php'; ?>"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="cierreSesion.php"><button>Logout</button></a></li>
                <li><a href="carrito.php"><img src="img/logocarrito.png" alt="Logo del carrito de la compra" id="LgCompra"></a></li>
            <?php endif; ?>
            </ul>

    <section>
      <article>

        
        <h1>¿Quienes somos?</h1>
        <p>En ConcertTickets, creemos que cada concierto es una oportunidad para crear recuerdos inolvidables. Fundada por un equipo de entusiastas de la música y expertos en tecnología, nuestra misión es llevarte más cerca de tus artistas favoritos y asegurarte un lugar en los eventos más esperados. Nuestra juventud y energía se reflejan en cada aspecto de nuestro negocio, desde nuestra interfaz moderna y fácil de usar hasta nuestro enfoque innovador en la venta de entradas.</p>
      </article>
      <article>
        <h1>Nuestra visión</h1>
        <P>Nuestra visión es redifinir la manera en que los fanáticos compran entradas para conciertos. Queremos ser más que una simple plataforma de venta; aspiramos a ser tu socio de confianza en cada paso del camino, asegurándonos de que nuca te pierdas un momento de la magia en vivo. Nos esfrozamos por ofrecer un servicio al cliente excepcional y una experiencia de usiario insuperable, siempre buscando nuevas formas de mejorar y crecer.</P>
      </article>
      <article>
        <H1>Lo que ofrecemos</H1>
        <ul>
          <li><strong>Facilidad de Uso:</strong>Nuestro sitio web está diseñado para que encuentres y compres tus entradas favoritas con unos pocos clics.
          </li>
          <li><strong>Seguridad y Confianza:</strong>
            Garantizamos la autenticidad de todas nuestras entradas y ofrecemos múltiples métodos de pago seguros para tu tranquilidad.</li>
          <li><strong>Atención al Cliente:</strong>Nuestro equipo de soporte está disponible 24/7 para asistirte con cualquier pregunta o problema que puedas tener.</li>
          <li><strong>Actualizaciones Constantes:</strong>Mantente al día con los últimos anuncios de conciertos y eventos especiales, para que siempre seas el primero en enterarte.</li>
        </ul>
      </article>
      <article>
        <h1>Únete a nosotros</h1>
        <p>En ConcertTickets, no solo vendemos entradas, sino que creamos experiencias. Únete a nostros y forma parte de una comunidad de amantes de la música que comparten tu entusiasmo por los conciertos en vivo. Ya sea que te guste el rock, el pop, la música clásica o el inde, tenemos algo para todos.</p>
        <p>Explora nuestra plataforma, descubre próximos eventos y prepárate para vivir momentos inolvidables con ConcertTickets. ¡Tu próxima gran aventura musical está a un clic de distancia!</p>
      </article>
      <footer>
        <div id="containerFoot" >
          <img src="img/logo.png" alt="Logo de la empresa" id="ImagenPortada">
        </div>
        <div  id="container2Footer">
          <ul>
            <li><img src="img/bizum.png" alt="Logo de bizum" id="logoBizum"></li>
            <li><img src="img/master.png" alt="Logo de mastercard" inputmode="logoMaster"></li>
            <li><img src="img/Paypal.png" alt="Logo de paypal" id="logoPay"></li>
            <li><img src="img/insta.png" alt="Logo de instagram" id="logoInsta"></li>
            <li><img src="img/x.png" alt="Logo de x" id="logoX"></li>
            <li><img src="img/whatsapp.png" alt="Logo de whatsapp" id="logoWhat"></li>
          </ul>
        </div>
</footer>
    </section>


</body>

</html>