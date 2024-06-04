<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>
  <link rel="stylesheet" href="carrito.css">
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
      <?php session_start(); ?>
      <?php if(isset($_SESSION['username'])): ?>
        <li><a href="<?php echo $_SESSION['rol'] == 1 ? 'admin.php' : 'usuario.php'; ?>"><?php echo $_SESSION['username']; ?></a></li>
        <li><a href="cierreSesion.php"><button>Logout</button></a></li>
        <li><a href="carrito.php"><img src="img/logocarrito.png" alt="Logo del carrito de la compra" id="LgCompra"></a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <?php
  if (isset($_GET['success'])) {
      echo '<p>Compra realizada con éxito.</p>';
  } elseif (isset($_GET['error'])) {
      switch ($_GET['error']) {
          case 'concierto_no_encontrado':
              echo '<p>Error: Concierto no encontrado.</p>';
              break;
          case 'usuario_no_encontrado':
              echo '<p>Error: Usuario no encontrado.</p>';
              break;
          case 'compra_fallida':
              echo '<p>Error: La compra no se pudo realizar.</p>';
              break;
      }
  }
  ?>

  <div id="formuCompra">
    <form action="compra.php" method="post" id="formuVertical">
      <label for="concierto">Seleccionar Concierto:</label>
      <select name="concierto" id="concierto" required>
        <?php
        // Conexión a la base de datos.
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Proyecto";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para la tabla conciertos.
        $sql = "SELECT Id_Concierto, Grupo, Localidad, Lugar, Precio FROM conciertos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['Id_Concierto'].'" data-precio="'.$row['Precio'].'">'.$row['Grupo'].' - '.$row['Lugar'].' - '.$row['Localidad'].'</option>';
            }
        } else {
            echo '<option value="">No hay conciertos disponibles</option>';
        }
        $conn->close();
        ?>
      </select>

      <label for="entradas">Número de Entradas:</label>
      <select name="entradas" id="entradas" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>

      <label for="metodo_pago">Método de Pago:</label>
      <div id="pagos">
        <label>
          <input type="radio" name="metodo_pago" value="Bizum" required>
          <img src="img/bizum.png" alt="Bizum">
          Bizum
        </label>
        <label>
          <input type="radio" name="metodo_pago" value="MasterCard" required>
          <img src="img/master.png" alt="MasterCard">
          MasterCard
        </label>
        <label>
          <input type="radio" name="metodo_pago" value="PayPal" required>
          <img src="img/paypal.png" alt="PayPal">
          PayPal
        </label>
      </div>

      <input type="submit" value="Comprar">
    </form>
  </div>

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
