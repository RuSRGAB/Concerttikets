<?php
// Datos de conexión a la base de datos
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "proyecto"; 

// Crear conexión
$conexion = new mysqli($hostname, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>