<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conciertos</title>
    <link rel="stylesheet" href="conciertos.css">

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
         <div class="container">
            <div class="left">
                <img src="img/ginebras.png" alt="Foto concierto las ginebras" id="cartelGinebras" class="concert-image">

            </div>

            <div class="right">
        <article>
            <p><strong>GINEBRAS </strong>son pop, son buen rollo, son locura, son lo próximo. Crean un universo pop festivalero con tintes del indie nacional y acompañado siempre de letras autobiográficas contadas con mucho humor y con rollito.</p>
            <p>Su impacto está siendo arrollador en la industria musical, en un público ávido de nuevas propuestas, y en una prensa que quiere hablar del futuro. Las cuatro componentes del grupo han tenido la destreza de conectar inmediatamente con todo eso, pero de una manera asombrosamente natural.</p>
            <p>¡¡¡¡No te pierdas a las Ginebras en concierto, en la <strong>sala Razzmatazz en barcelona</strong>!!!!</p>
            <p><strong>Precio: 20 Euros</strong></p>
             <!-- Miniatura del mapa -->
             <div id="mapa">
                <!-- Mapa de Google Maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.9111308874726!2d2.188535875534504!3d41.397736295354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a3190e0640b5%3A0x40f9d8fe93a98ca!2sSala%20Razzmatazz!5e0!3m2!1ses!2ses!4v1717351396120!5m2!1ses!2ses"></iframe>
            </div>
        </article>
    </div>
        </div>

        <div class="container">
            <div class="left">
                <img src="img/blackkeys.jpg" alt="Foto concierto the black keys" id="cartelBlackKeys" class="concert-image">

            </div>
            <div class="right">
            <article>
            <p>El rock de <strong>the black keys </strong>retumbará en Madrid.</p>
            <p>El dúo formado por Dan Auerbach y Patrick Carney tocaran para los fans de Madrid y alrededores. </p>
            <p>En esta ocasión estarán presentando el álbum “Dropout Boogie”. El álbum contiene diez canciones nuevas y colaboraciones de Billy F. Gibbons (ZZ Top), Greg Cartwright (Reigning Sound) y Angelo Petraglia (Kings of Leon). Algunos de los temas más destacados son “Wild Child”, “It Ain’t Over” y "Good Love". El álbum tiene influencias del rock, el blues y el glam.</p>
            <p>¡¡¡¡No te pierdas a the black keys en concierto, en el <strong>WiZink Center</strong>!!!!</p>
            <p><strong>Precio: 90 Euros</strong></p>
             <!-- Miniatura del mapa -->
             <div id="mapa">
                <!-- Mapa de Google Maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.3213519912692!2d-3.674326124516627!3d40.423882655204864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228a559a82bfd%3A0x824fe75010a905e3!2sWiZink%20Center!5e0!3m2!1ses!2ses!4v1717352765984!5m2!1ses!2ses" ></iframe>
            </div>
        </article>
    </div>
        </div>
        <div class="container">
            <div class="left">
                <img src="img/fatboy.png" alt="Foto concierto fat boy slim" id="cartelFat" class="concert-image">
            </div>
            <div class="right">
            <article>
            <p><strong>Fatboy Slim </strong></p>
            <p>Es un plan de temática Dance/Electrónica en la categoría de Conciertos que se celebra en Ocho y Medio (Madrid).El Dj y productor británico Fatboy Slim actúa en Madrid dentro del primer Aniversario de Ocho y Medio.</p>
            <p>Fatboy Slim está considerado un pionero en mezclar hip hop, breakbeat, rock y rhythm and blues (big beat).</p>
            <p>¡¡¡¡No te pierdas a Fatboy Slim en concierto, en la <strong>sala Ocho y Medio en Madrid</strong>!!!!</p>
            <p><strong>Precio: 40 Euros</strong></p>
             <!-- Miniatura del mapa -->
             <div id="mapa">
                <!-- Mapa de Google Maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3611.839257444478!2d-3.702668609119914!3d40.426953542792866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228890c479503%3A0xb0152f4866a413e8!2sOchoymedio!5e0!3m2!1ses!2ses!4v1717353345116!5m2!1ses!2ses"></iframe>
            </div>
        </article>
    </div>
        </div>
        <div class="container">
            <div class="left">
                <img src="img/redhot.jpg" alt="Foto concierto Red Hot Chili Peppers" id="logoRedHot" class="concert-image">
            </div>
            <div class="right"><article>
            <p><strong>Red Hot Chilli Peppers</strong>en el Estadio Santiago Bernabeu en Madrid.La actuación es parte de una gira mundial por estadios en la que tocarán temas de toda su carrera y alguno inédito.</p>
            <p>Vibra con cada tema musical de la banda y no dejes que te lo cuenten.</p>
            <p>¡¡¡¡No te pierdas a Red Hot  Chilli Peppers, en <strong>El estadio Santiago Bernabeu en madrid.</strong>!!!!</p>
            <p><strong>Precio: 120 Euros</strong></p>
             <!-- Miniatura del mapa -->
             <div id="mapa">
                <!-- Mapa de Google Maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6072.008513680861!2d-3.6909086245150986!3d40.4530427534292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228e23705d39f%3A0xa8fff6d26e2b1988!2sEstadio%20Santiago%20Bernab%C3%A9u!5e0!3m2!1ses!2ses!4v1717353844346!5m2!1ses!2ses"></iframe>
            </div>
        </article>
    </div>
        </div>
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
      <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <div class="popup-left">
                <img id="popup-image" src="" alt="Concert Image">
            </div>
            <div class="popup-right">
                <h2 id="popup-title"></h2>
                <p id="popup-description"></p>
                <a id="popup-link" href="" target="_blank">Escucha al grupo en youtube</a>
            </div>
        </div>
    </div>
    <script src="script/popUp.js"></script>



    
</body>
</html>