<?php

require 'conexion.php';
session_start();

// Comprobar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Comprobar contraseña
    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden";
    } else {
        // Encriptar la contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Crear nuevo usuario en la base de datos
        $sql = "INSERT INTO Usuarios (Nombre, Apellido, Telefono, Correo, Usuario, Password)
                VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$username', '$hashedPassword')";

        // Consulta
        if ($conexion->query($sql) === TRUE) {
            // Iniciar sesión
            // Por defecto todos los usuarios son rol 0, dejando el 1 para administrador
            $_SESSION['username'] = $username;
            $_SESSION['rol'] = 0; 
            header("Location: usuario.php");
        } else {
            if ($conexion->errno == 1062) { // Muestra que el usuario ya existe
                echo "El nombre de usuario ya está registrado";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        }
    }

    // Cerrar la conexión
    $conexion->close();
}
?>