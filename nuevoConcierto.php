<?php
// Conexión a la base de datos.
require 'conexion.php';

// Comprueba si el método de la solicitud es POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos del formulario.
    $grupo = $_POST['grupo'];
    $localidad = $_POST['localidad'];
    $lugar = $_POST['lugar'];
    $precio = $_POST['precio'];

    // Insertar un nuevo evento en la tabla Conciertos.
    $stmt = $conexion->prepare("INSERT INTO conciertos (Grupo, Localidad, Lugar, Precio) VALUES (?, ?, ?, ?)");
    // Vincula los parámetros de la consulta con las variables.
    $stmt->bind_param("sssd", $grupo, $localidad, $lugar, $precio);

    // Ejecuta la consulta y comprueba si es correcta.
    if ($stmt->execute()) {
        // Si la consulta está bien, configurar la redirección
        $redirect = true;
    } else {
        // Si hubo un error, almacena el mensaje 
        $error_msg = "Error al agregar el evento: " . $stmt->error;
    }
    // Cerrar la declaración
    $stmt->close();
} else {
    $error_msg = "Error al preparar la declaración: " . $conexion->error;
}
// Cerrar la conexión
$conexion->close();

// Redirigir 
if ($redirect) {
header("Location: admin.php");
}

// Mostrar el mensaje de error
if ($error_msg) {
echo "<div class='error'>$error_msg</div>";
}
?>
