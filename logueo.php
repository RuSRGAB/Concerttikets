<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueo</title>
    <link rel="stylesheet" href="logueo.css">
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
    <div class="container">
        <div class="left-container">
            <div class="top-section">
                <img src="img/login.png" alt="Logo de login" id="LogoLogin">
            </div>
            <div class="bottom-section">
                <h2>Login</h2>
                <!-- Formulario de login -->
                <form id="loginForm" action="login.php" method="post">
                    <label for="loginUsername">Usuario:</label>
                    <input type="text" id="loginUsername" name="username" required>
                    <label for="loginPassword">Contraseña:</label>
                    <input type="password" id="loginPassword" name="password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
            <div class="right-container">
            <div class="top-section">
                <img src="img/unete.png" alt="Logo de registro" id="logoRegistro">
            </div>
            <div class="bottom-section">
                <h2>Registro</h2>
                <!-- Formulario de registro -->
                <form id="registerForm" action="registro.php" method="post">
                    <label for="registerNombre">Nombre:</label>
                    <input type="text" id="registerNombre" name="nombre" required>
                    <label for="registerApellido">Apellido:</label>
                    <input type="text" id="registerApellido" name="apellido" required>
                    <label for="registerTelefono">Teléfono:</label>
                    <input type="text" id="registerTelefono" name="telefono" required>
                    <label for="registerCorreo">Correo:</label>
                    <input type="email" id="registerCorreo" name="correo" required>
                    <label for="registerUsername">Nombre de Usuario:</label>
                    <input type="text" id="registerUsername" name="username" required>
                    <label for="registerPassword">Contraseña:</label>
                    <input type="password" id="registerPassword" name="password" required>
                    <label for="registerConfirmPassword">Confirmar Contraseña:</label>
                    <input type="password" id="registerConfirmPassword" name="confirmPassword" required>
                    <button type="submit">Registrar</button>
                </form>
            </div>
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
</body>
</html>
