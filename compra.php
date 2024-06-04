<?php
// Establece conexión.
require 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtener los datos del formulario.
    $idConcierto = $_POST['concierto'];
    $numEntradas = $_POST['entradas'];
    $metodoPago = $_POST['metodo_pago'];
    $usuario = $_SESSION['username'];

    // Consultar la tabla de conciertos.
    $sqlConcierto = "SELECT Grupo, Localidad, Lugar, Precio FROM conciertos WHERE Id_Concierto = ?";
    $stmtConcierto = $conexion->prepare($sqlConcierto);
    $stmtConcierto->bind_param("i", $idConcierto);
    $stmtConcierto->execute();
    $resultConcierto = $stmtConcierto->get_result();

    // Verificar si el concierto existe.
    if ($resultConcierto->num_rows > 0) {
        $concierto = $resultConcierto->fetch_assoc();
        $precioTotal = $concierto['Precio'] * $numEntradas;
    } else {
        // Mensaje de error si el concierto no se encuentra.
        header("Location: carrito.php?error=concierto_no_encontrado");
        // Cerrar recursos abiertos.
        $stmtConcierto->close();
        $conexion->close();
        // Finalizar script.
        return;
    }

    // Consultar los datos del usuario.
    $sqlUsuario = "SELECT Id_Usuario, Nombre, Apellido, Correo FROM usuarios WHERE Usuario = ?";
    $stmtUsuario = $conexion->prepare($sqlUsuario);
    $stmtUsuario->bind_param("s", $usuario);
    $stmtUsuario->execute();
    $resultUsuario = $stmtUsuario->get_result();

    // Verificar si el usuario existe.
    if ($resultUsuario->num_rows > 0) {
        $user = $resultUsuario->fetch_assoc();
    } else {
        // Mensaje de error si el usuario no se encuentra.
        header("Location: carrito.php?error=usuario_no_encontrado");
        // Cerrar recursos abiertos.
        $stmtConcierto->close();
        $stmtUsuario->close();
        $conexion->close();
        // Finalizar script.
        return;
    }

    // Insertar los datos en la tabla Compras.
    $sqlCompra = "INSERT INTO compras (Id_Usuario, Nombre, Apellido, Correo, Usuario, Id_Concierto, Grupo, Lugar, Localidad, Metodo_Pago, Numero_Entradas, Precio_Total) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtCompra = $conexion->prepare($sqlCompra);
    $stmtCompra->bind_param("issssiisssid", $user['Id_Usuario'], $user['Nombre'], $user['Apellido'], $user['Correo'], $usuario, $idConcierto, $concierto['Grupo'], $concierto['Lugar'], $concierto['Localidad'], $metodoPago, $numEntradas, $precioTotal);

    // Comprueba compra se realizó correctamente.
    if ($stmtCompra->execute()) {
        header("Location: carrito.php?success=compra_realizada");
    } else {
        header("Location: carrito.php?error=compra_fallida");
    }

    // Cerrar recursos.
    $stmtConcierto->close();
    $stmtUsuario->close();
    $stmtCompra->close();
    $conexion->close();
} else {
    // Redireccionar si no se accede mediante POST.
    header("Location: carrito.php");
}
?>