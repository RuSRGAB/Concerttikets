<?php
// Iniciar sesión.
session_start();

// Comprueba que no haya un logueo.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    return;
}

// Comprueba que no sea administrador.
if ($_SESSION['rol'] == 1) {
    header("Location: admin.php");
    return;
}

// Conexión a la base de datos.
require 'conexion.php';

// Inicializar variables.
$error_msg = "";
$redirect = false;

// Formulario de actualización.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $new_nombre = $_POST['nombre'];
    $new_apellido = $_POST['apellido'];
    $new_telefono = $_POST['telefono'];
    $new_correo = $_POST['correo'];

    // Consulta SQL para actualizar la información del usuario.
    $update_query = "UPDATE Usuarios SET Nombre = ?, Apellido = ?, Telefono = ?, Correo = ? WHERE Id_Usuario = ?";
    $update_statement = $conexion->prepare($update_query);
    $update_statement->bind_param("ssssi", $new_nombre, $new_apellido, $new_telefono, $new_correo, $id_usuario);

    if ($update_statement->execute()) {
        $redirect = true;
    } else {
        $error_msg = "Error al actualizar los datos: " . $update_statement->error;
    }

    $update_statement->close();
}

// Redirigir a usuario.php.
if ($redirect) {
    header("Location: usuario.php");
} else {
    echo $error_msg;
}
?>
