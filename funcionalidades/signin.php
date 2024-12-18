<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Bienevenido</h1>
      <p class="sign-up__subtitle">Ingresa tus datos para continuar</p>
      <form class="sign-up-form form" action="signin.php" method="post">
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" type="email" placeholder="Ingresa tu correo" required name="correo">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Contraseña</p>
          <input class="form-input" type="password" placeholder="Ingresa tu contraseña" required name="password">
        </label>
        <button class="form-btn primary-default-btn transparent-btn">Ingresar</button>
      </form>
    </article>
  </main>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>

<?php
error_reporting(0);
require "Programas/conexionDB.php";

$correo = $_POST["correo"];
$password = $_POST["password"];

$sql = "select nombre_usuario, contraseña_usuario, id_usuario from usuarios where nombre_usuario='$correo'";
$result = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_assoc($result);

if (isset($usuario)) {
  header("Location: dashboard.php");
  echo '<script>
          alert("Has ingresado con exito");
          </script>';
  session_start();
  $_SESSION["id_usuario"] = $usuario["id_usuario"];
  $_SESSION["session_id"] = session_id();
} else {
  echo "<script>
      alert('Por favor ingrese un usuario o contraseña validos');
      </script>";
}


?>