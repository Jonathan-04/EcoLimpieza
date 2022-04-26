<?php

session_start();
include_once 'dataBase/conexiondb.php';

if (isset($_SESSION['id'])) {

  header("Location: inicio.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
  <title>Iniciar Sesión</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <!-- Contenedor del Formulario -->
  <div class="container-login">
    <div class="container-form-login">
      <div class="title-login">
        <h1>Login</h1>
      </div>
      <form method="POST" enctype="multipart/form-data" action="dataBase/login-validacion.php" class="form">
        <!-- Items del Formulario -->
        <label for="Email" class="label">Email</label>
        <input type="email" name="email" id="" class="input" required>
        <label for="password" class="label">Contraseña</label>
        <input type="password" name="clave" id="" class="input" required>

        <input type="submit" name="Ingresar" value="Ingresar" class="btn-ingresar">

        <!-- Opciones del Formulario -->
        <div class="options-login">
          <ul>
            <li>Inicia Sesión con</li>
            <li><img src="img/iconos/icon-google.png" alt=""><img src="img/iconos/icon-facebook.png" alt=""></li>
            <li><a href="">¿Olvidaste tu Contraseña?</a></li>

          </ul>
        </div>
      </form>

    </div>
</body>

</html>