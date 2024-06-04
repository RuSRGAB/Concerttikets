<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="contacto.css">
</head>
<body>
    <div class="slider" id="Siderprincipal">
        <img src="img/portada.png" alt="Nombre de la empresa" id="ImagenPortada">
    </div>
    <nav class="nav">
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
    </nav>
    <div id="formContainer">
        <div id="formuConsulta">
            <form id="formuVertical" onsubmit="event.preventDefault(); this.reset(); alert('Formulario enviado con éxito');">
                <label for="asunto">Asunto:</label>
                <input type="text" id="asunto" name="asunto" required>
                
                <label for="emailCliente">Correo del Cliente:</label>
                <input type="email" id="emailCliente" name="emailCliente" required>
                
                <label for="emailEmpresa">Correo de la Empresa:</label>
                <input type="email" id="emailEmpresa" name="emailEmpresa" value="atencionalcliente@concerttickets.com" readonly>
                
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" maxlength="400" required></textarea>
                
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    <footer>
        <div id="containerFoot">
            <img src="img/logo.png" alt="Logo de la empresa" id="ImagenPortada">
        </div>
        <div id="container2Footer">
            <ul>
                <li><img src="img/bizum.png" alt="Logo de bizum" id="logoBizum"></li>
                <li><img src="img/master.png" alt="Logo de mastercard" id="logoMaster"></li>
                <li><img src="img/Paypal.png" alt="Logo de paypal" id="logoPay"></li>
                <li><img src="img/insta.png" alt="Logo de instagram" id="logoInsta"></li>
                <li><img src="img/x.png" alt="Logo de x" id="logoX"></li>
                <li><img src="img/whatsapp.png" alt="Logo de whatsapp" id="logoWhat"></li>
            </ul>
        </div>
    </footer>
</body>
</html>
