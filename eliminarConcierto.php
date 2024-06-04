<?php
session_start();
// Si el usuario no ha iniciado sesión va a la página de inicio de sesión.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
// Si el usuario no tiene el rol de administrador va a la página de usuario.
if ($_SESSION['rol'] != 1) {
    header("Location: usuario.php");
    exit;
}

// Conexión a la base de datos.
require 'conexion.php';

// Variable para almacenar mensajes de error y la redirección.
$error_msg = "";
$redirect = false;

// Comprueba si el método de la solicitud es POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge ID del concierto enviado desde el formulario.
    $id_concierto = $_POST['id_concierto'];

    // Consulta SQL para eliminar el evento en la tabla Conciertos.
    $stmt = $conexion->prepare("DELETE FROM conciertos WHERE Id_Concierto = ?");
    if ($stmt) {
        // Vincula el parámetro de la consulta con la variable.
        $stmt->bind_param("i", $id_concierto);

        // Ejecuta la consulta y comprueba si es correcta.
        if ($stmt->execute()) {
            // Si la consulta está bien, redirección.
            $redirect = true;
        } else {
            // Almacena el mensaje de error.
            $error_msg = "Error al eliminar el evento: " . $stmt->error;
        }
        // Cerrar la declaración.
        $stmt->close();
    } else {
        $error_msg = "Error en la declaración: " . $conexion->error;
    }
}

// Cerrar la conexión.
$conexion->close();

// Redirigir 
if ($redirect) {
    header("Location: admin.php");
}

// Mostrar el mensaje de error. 
if ($error_msg) {
    echo "<div class='error'>$error_msg</div>";
}
?>