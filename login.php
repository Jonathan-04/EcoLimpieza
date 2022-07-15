<?php

session_start();

//Incluir la conexion a la Base de Datos
include_once 'dataBase/conexiondb.php';

//Validar si una Session está creada, ya sea Cliente o Empleado

//Cliente
if (isset($_SESSION['id'])) {

  header("Location: inicio.php");

  //Empleado
} else if (isset($_SESSION['idEmpleado'])) {

  header("Location: mapa.php");
}

error_reporting(0);

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
      <form method="POST" enctype="multipart/form-data" action="dataBase/login-validacion.php?tipo=<?php echo $_GET['tipo']; ?>" class="form">
        <!-- Items del Formulario -->
        <label for="Email" class="label">Email</label>
        <input type="email" name="email" class="input" required>
        <label for="password" class="label">Contraseña</label>
        <input type="password" name="clave" class="input" required>

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

    <?php
    /* Traer el error por si el Usuario ingresa una contraseña Incorrecta */
    $errorLogin = $_GET['errorLogin'];
    $tipoUsuario = $_GET['tipo'];

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
      /* Si hay 1 error traido por la contraseña Incorrecta se ejecuta la Ventana de Alerta */
      let $error = <?php echo json_encode($errorLogin) ?>

      if ($error === '1') {
        Swal.fire({
          icon: 'error',
          title: 'Contraseña Incorrecta',
          confirmButtonText: 'Reintentar',
          footer: '<a href="#">¿Has olvidado tu contraseña?</a>'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "login.php?tipo=<?php echo $tipoUsuario; ?>"
          }
        })
      }
    </script>
</body>

</html>