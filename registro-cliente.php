<?php

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
  <title>Registro Cliente</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/registro-cliente.css" />
</head>

<body>
  <!-- Contenedor del Formulario -->
  <div class="container-formulario">
    <!-- Formulario -->
    <div class="formulario-registro">
      <h1>Registro</h1>
      <form method="POST" enctype="multipart/form-data" action="dataBase/registro-cliente.php">
        <div class="titulo-form">
          <p>Datos Básicos</p>
        </div>
        <!-- Items del Formulario -->
        <div class="items-form">
          <div class="items">
            <p>Tipo Documento</p>
            <select name="tipo_documento" id="" required>
              <option value="">Seleccione tipo</option>
              <option value="CC">C.C</option>
              <option value="Pas">Pasaporte</option>
              <option value="CEX">Cédula Extranjero</option>
            </select>
          </div>
          <!-- Items del Formulario -->
          <div class="items">
            <p>Número Documento</p>
            <input type="text" name="numero_documento" id="" required />
          </div>
          <div class="items">
            <p>Nombre:</p>
            <input type="text" name="nombre" id="" required />
          </div>
          <div class="items">
            <p>Apellidos:</p>
            <input type="text" name="apellidos" id="" required />
          </div>
          <div class="items">
            <p>Email</p>
            <input type="email" name="email" id="" required />
          </div>
          <div class="items">
            <p>Contraseña</p>
            <input type="password" name="clave" id="" required />
          </div>
        </div>
        <!-- Items del Formulario -->
        <div class="titulo-form">
          <p>Datos Complementarios</p>
        </div>
        <div class="items-form-2">
          <div class="items">
            <p>Número Celular:</p>
            <input type="text" name="numero_celular" id="" required />
          </div>
          <div class="items">
            <p>Dirección:</p>
            <input type="text" name="direccion" id="" required />
          </div>
        </div>
        <div class="check-form">
          <input type="checkbox" name="" id="" required />
          <p>Acepto los <a href="">Terminos y Condiciones</a></p>
        </div>
        <input type="submit" value="Registrarme" />
      </form>
    </div>

    <!-- Sección Secundaria -->
    <div class="opciones-registro">
      <h1>BIENVENIDO!!</h1>
      <ul>
        <li>Empezar</li>
        <li>Inicia Sesión con</li>
        <li>
          <a href=""><img src="img/iconos/icon-google.png" alt="" /></a>
          <a href=""><img src="img/iconos/icon-facebook.png" alt="" /></a>
        </li>
        <li>
          ¿Ya tienes una Cuenta? <a href="login.php">Inicia Sesión aquí!!</a>
        </li>
      </ul>
    </div>
  </div>


  <script src="js/jquery-3.6.0.min.js"></script>


</body>

</html>