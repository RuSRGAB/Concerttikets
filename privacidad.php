<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacidad</title>
    <link rel="stylesheet" href="privacidad.css">
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

        
        <article>
            <h1>1. Identificación</h1>
            
                <p><strong>Títular: </strong>Concerttickets S.L.</p>
                <p><strong>NIF:</strong>A99999999</p>
                <p><strong>Correo electronico:</strong>atencionalcliente@concerttickets.com.</p>
                
            
        </article>
        <article>
        <h1>2. Información y consentimiento</h1>
        <p>Mediante la lectura de la presente Política de Privacidad, el usuario queda informado sobre la forma en la que MediaMarkt recaba, trata y protege los datos de carácter personal que le son facilitados a través de los formularios dispuestos a través del sitio web ConcertTickets
            
             (en adelante, el “Sitio Web”), así como los datos derivados de su navegación y aquellos otros datos que pueda facilitar en un futuro a ConcertTickets.</p>

             <p>El usuario debe leer con atención esta Política de Privacidad, que ha sido redactada de forma clara y sencilla, para facilitar su comprensión, determinando libre y voluntariamente si desea facilitar sus datos personales.</p>

           


        </article>
        <article>
          <h1>3. Obligatoriedad de facilitar los datos</h1>
          <p>Los datos solicitados en los formularios dispuestos en el Sitio Web son, con carácter general,obligatorios (salvo que en el campo requerido se especifique lo contrario) para cumplir con lasfinalidades establecidas.</p>
          <p>Por lo tanto, si no se facilitan dichos datos o estos no son correctos no podrán atenderse lasmismas.</p>


        </article>
         <article>
         <h1>4. ¿Con qué finalidad tratará ConcertTickets los datos personales del usuario y durante cuánto tiempo?
        </h1>
         <p>Los datos personales recabados serán tratados por ConcertTickets conforme a las siguientesfinalidades:</p>
         
            <p>Gestionar sus solicitudes de contacto a través de los canales dispuestos para ello en el Sitio Web</p>
            <p>Gestionar las compras efectuadas en el marco del Sitio Web, incluyendo la gestión del pago y la remisión del pedido.</p>
            <p>Efectuar análisis sobre la utilización del Sitio Web y comprobar las preferencias y comportamiento de los usuarios.</p>
            </ul>
            <p>Los datos se conservarán durante el tiempo necesario para la realización de las finalidades para las que fueron recabados, y, durante el plazo de prescripción de las acciones legales que se puedan derivar de la misma. No obstante, lo anterior, el usuario puede solicitar su baja</p>
        </article>
            <article>
            <h1>5. ¿Qué datos del usuario tratará ConcertTickets?</h1>
           
                <p>Datos identificativos: nombre, apellidos.</p>
                <p>Datos de contacto: teléfono móvil, dirección de correo electrónico.</p>
               

           
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
</body>
</html>