<?php
session_start();
// Si el usuario no ha iniciado sesión redirige a la página de inicio de sesión.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
// Si el usuario no tiene el rol de administrador redirige a la página de usuario.
if ($_SESSION['rol'] != 1) {
    header("Location: usuario.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
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
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="<?php echo $_SESSION['rol'] == 1 ? 'admin.php' : 'usuario.php'; ?>"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="cierreSesion.php"><button>Logout</button></a></li>
                <li><a href="carrito.php"><img src="img/logocarrito.png" alt="Logo del carrito de la compra" id="LgCompra"></a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <h1>Información de Compras (Admin)</h1>
    <?php
    require 'conexion.php';
    $query = "SELECT * FROM compras";
    $result = $conexion->query($query);
    ?>
    <table border="1">
        <tr>
            <th>ID de Compra</th>
            <th>ID de Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>ID de Concierto</th>
            <th>Grupo</th>
            <th>Lugar</th>
            <th>Localidad</th>
            <th>Número de Entradas</th>
            <th>Precio Total</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id_Compra']; ?></td>
                <td><?php echo $row['Id_Usuario']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Apellido']; ?></td>
                <td><?php echo $row['Correo']; ?></td>
                <td><?php echo $row['Usuario']; ?></td>
                <td><?php echo $row['Id_Concierto']; ?></td>
                <td><?php echo $row['Grupo']; ?></td>
                <td><?php echo $row['Lugar']; ?></td>
                <td><?php echo $row['Localidad']; ?></td>
                <td><?php echo $row['Numero_Entradas']; ?></td>
                <td><?php echo $row['Precio_Total']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Información de Usuarios</h1>
    <?php
    $query = "SELECT Id_Usuario, Nombre, Apellido, Telefono, Correo, Usuario, Rol FROM usuarios";
    $result = $conexion->query($query);
    ?>
    <table border="1">
        <tr>
            <th>ID de Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Rol</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id_Usuario']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Apellido']; ?></td>
                <td><?php echo $row['Telefono']; ?></td>
                <td><?php echo $row['Correo']; ?></td>
                <td><?php echo $row['Usuario']; ?></td>
                <td><?php echo $row['Rol']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Eliminar Usuario</h1>
    <form action="eliminarUsuario.php" method="post">
        <label for="id_usuario">ID de Usuario:</label>
        <input type="number" id="id_usuario" name="id_usuario" required><br>
        <button type="submit">Eliminar Usuario</button>
    </form>

    <h1>Información de Conciertos</h1>
    <?php
    $query = "SELECT * FROM conciertos";
    $result = $conexion->query($query);
    ?>
    <table border="1">
        <tr>
            <th>ID de Concierto</th>
            <th>Grupo</th>
            <th>Localidad</th>
            <th>Lugar</th>
            <th>Precio</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id_Concierto']; ?></td>
                <td><?php echo $row['Grupo']; ?></td>
                <td><?php echo $row['Localidad']; ?></td>
                <td><?php echo $row['Lugar']; ?></td>
                <td><?php echo $row['Precio']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Nuevo Concierto</h1>
    <form action="nuevoConcierto.php" method="post">
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo" required><br>
        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" required><br>
        <label for="lugar">Lugar:</label>
        <input type="text" id="lugar" name="lugar" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>
        <button type="submit">Agregar Evento</button>
    </form>

    <h1>Eliminar Concierto</h1>
    <form action="eliminarConcierto.php" method="post">
        <label for="id_concierto">ID de Concierto:</label>
        <input type="number" id="id_concierto" name="id_concierto" required><br>
        <button type="submit">Eliminar Evento</button>
    </form>

    <footer>
        <div class="slider" id="SliderFooter">
            <img src="img/logo.png" alt="Logo de la empresa" id="ImagenPortada">
        </div>
        <nav class="nav" id="navFooter">
            <ul>
                <li><img src="img/bizum.png" alt="Logo de bizum" id="logoBizum"></li>
                <li><img src="img/master.png" alt="Logo de mastercard" id="logoMaster"></li>
                <li><img src="img/Paypal.png" alt="Logo de paypal" id="logoPay"></li>
                <li><img src="img/insta.png" alt="Logo de instagram" id="logoInsta"></li>
                <li><img src="img/x.png" alt="Logo de x" id="logoX"></li>
                <li><img src="img/whatsapp.png" alt="Logo de whatsapp" id="logoWhat"></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
