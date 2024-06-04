<?php
session_start();
// Si el usuario no ha iniciado sesión a la página de inicio de sesión.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} elseif ($_SESSION['rol'] != 1) {
    // Si el usuario no tiene el rol de administrador a a la página de usuario.
    header("Location: usuario.php");
} else {
    // Conexión a la base de datos.
    require 'conexion.php';

    // Inicializar una variable para almacenar mensajes de error y la redirección
    $error_msg = "";
    $redirect = false;

    // Comprueba si el método de la solicitud es POST.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera el ID del usuario.
        $id_usuario = $_POST['id_usuario'];

        // Consulta SQL para eliminar el usuario en la tabla Usuarios.
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE Id_Usuario = ?");
        if ($stmt) {
            // Vincula el parámetro de la consulta con la variable.
            $stmt->bind_param("i", $id_usuario);

            // Ejecuta la consulta y comprueba si es correcta.
            if ($stmt->execute()) {
                // Si la consulta está bien, redirección.
                $redirect = true;
            } else {
                // Almacena el mensaje de error.
                $error_msg = "Error al eliminar el usuario: " . $stmt->error;
            }
        } else {
            // Si hubo un error en laconsulta.
            $error_msg = "Error al preparar la consulta: " . $conexion->error;
        }

        // Redirigir a admin.php.
        if ($redirect) {
            header("Location: admin.php");
        }
    }
}
?>