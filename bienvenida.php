<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav class="nav">
        <ul>
            <li><a href="index.html"><button id="iniciButton">Inicio</button></a></li>
            <li><a href="login.html"><button id="loginButton">Login/Registro</button></a></li>
            <li><a href="conciertos.html"><button id="conciertosButton">Conciertos</button></a></li>
            <li><a href="contacto.html"><button id="contactoButton">Contacto</button></a></li>
            <li><a href="privacidad.html"><button id="privacidadButton">Privacidad</button></a></li>
            <li><a href="carrito.html"><img src="img/logocarrito.png" alt="Logo del carrito de la compra" id="LgCompra"></a></li>
            <li><button id="backButton">Volver</button>
              <script src="script/BotonDeAt.js"></script></li>
            <!-- Mostrar nombre del usuario conectado -->
            <li><span id="userGreeting">Bienvenido, <?php echo $username; ?>!</span></li>
        </ul>
    </nav>
    <div class="content">
        <h1>Bienvenido, <?php echo $username; ?>!</h1>
        <p>Has iniciado sesión correctamente.</p>
        <a href="logout.php">Cerrar sesión</a>
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
</body>
</html>
