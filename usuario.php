<?php
// Iniciar sesión
session_start();
// Comprueba que no haya un logueo
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    return;
}
// Comprueba que no sea administrador
if ($_SESSION['rol'] == 1) {
    header("Location: admin.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="usuario.css">
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
    <?php
    require 'conexion.php';

    // Comprobar si hay una sesión de usuario activa
    if (isset($_SESSION['username'])) {
        // Obtener el nombre de usuario de la sesión
        $username = $_SESSION['username'];

        // Consulta SQL para obtener todas las compras del usuario
        $query = "SELECT compras.Id_Compra, usuarios.Nombre, usuarios.Apellido, conciertos.Grupo, compras.Lugar, compras.Localidad, compras.Numero_Entradas, compras.Precio_Total, compras.Metodo_Pago
                  FROM compras
                  JOIN conciertos ON compras.Id_Concierto = conciertos.Id_Concierto
                  JOIN usuarios ON compras.Usuario = usuarios.Usuario
                  WHERE compras.Usuario = ?";
        $statement = $conexion->prepare($query);
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();

        // Consulta SQL para obtener la información del usuario
        $queryUser = "SELECT Id_Usuario, Nombre, Apellido, Telefono, Correo FROM usuarios WHERE Usuario = ?";
        $statementUser = $conexion->prepare($queryUser);
        $statementUser->bind_param("s", $username);
        $statementUser->execute();
        $statementUser->bind_result($id_usuario, $nombre, $apellido, $telefono, $correo);
        $statementUser->fetch();
        $statementUser->close();
    }
    ?>
    <div id="contTabla">
        <h1>Información de Compras</h1>
        <table>
            <tr>
                <th>Id Compra</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Grupo</th>
                <th>Lugar</th>
                <th>Localidad</th>
                <th>Número de Entradas</th>
                <th>Precio Total</th>
                <th>Método de Pago</th>
            </tr>
            <?php
            // Iterar sobre los resultados y mostrarlos en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Id_Compra'] . "</td>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['Apellido'] . "</td>";
                echo "<td>" . $row['Grupo'] . "</td>";
                echo "<td>" . $row['Lugar'] . "</td>";
                echo "<td>" . $row['Localidad'] . "</td>";
                echo "<td>" . $row['Numero_Entradas'] . "</td>";
                echo "<td>" . $row['Precio_Total'] . "</td>";
                echo "<td>" . $row['Metodo_Pago'] . "</td>";
                echo "</tr>";
            }
            $statement->close();
            ?>
        </table>
    </div>
    <div id="contTabla">
        <h1>Información del Usuario</h1>
        <table>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
            <tr>
                <td><?php echo $id_usuario; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $apellido; ?></td>
                <td><?php echo $telefono; ?></td>
                <td><?php echo $correo; ?></td>
            </tr>
        </table>
    </div>
    <h1>Modificar Información</h1>
    <form action="modificarUsuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required><br>
        <button type="submit">Actualizar Información</button>
    </form>
    <footer>
        <div id="containerFoot">
            <img src="img/logo.png" alt="Logo de la empresa" id="ImagenPortada">
        </div>
        <div id="container2Footer">
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
