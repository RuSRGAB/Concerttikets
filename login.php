<?php
var_dump($_POST); // Verifica los datos recibidos del formulario
require 'conexion.php';
// Iniciar la sesión
session_start();
// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Variable para almacenar mensajes de error
$error_msg = "";

// Comprobar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Obtiene el usuario correspondiente
    $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Comprueba si el usuario existe
    if ($result->num_rows > 0) {
        // Datos del usuario
        $user = $result->fetch_assoc();

        //Compara la contraseña
        if (password_verify($password, $user['Password'])) {
            // Establecer las variables de sesión
            $_SESSION['username'] = $user['Usuario'];
            $_SESSION['rol'] = $user['Rol'];

            // Segun el rol abre una y otra direccion
            if ($user['Rol'] == 1) {
                header("Location: admin.php");
            } else {
                header("Location: usuario.php");
            }
        } else {
            // Contraseña incorrecta
            $error_msg = "Contraseña incorrecta";
        }
    } else {
        // Usuario no encontrado
        $error_msg = "Usuario no encontrado";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>