<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
  <title>Tipo Usuario</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/opcion-usuario.css" />
</head>

<body>
  <!-- Contenedor -->
  <div class="container">
    <!-- Contenedor del Header -->
    <div class="header-tipo-usuario">
      <div class="items logo">
        <ul>
          <!-- Logo y Nombre -->
          <li><img src="img/iconos/iconEco.png" alt="" /></li>
          <li>
            <h1>EcoLimpieza</h1>
          </li>
        </ul>
      </div>
      <!-- Opción para ir al Login-->
      <div class="items items-opciones">
        <a id="item-inicio" href="index.html">Inicio</a>
        <a href="login.php">Login</a>
      </div>
    </div>
    <!-- Título de Selección-->
    <div class="title-tipo-usuario">
      <h1>Seleccione el tipo de Usuario</h1>
    </div>
    <!-- Contenedor de las Opciones -->
    <div class="options-tipo-usuario">
      <!-- Opción Cliente -->
      <div class="option-tipo">
        <a href="registro-cliente.php">
          <img src="img/ilustraciones/ilustracion-cliente.svg" alt="" />
          <p>Cliente</p>
        </a>
      </div>
      <!-- Opción Personal de aseo -->
      <div class="option-tipo">
        <a href="registro-empleado.php">
          <img src="img/ilustraciones/ilustracion-empleado.svg" alt="" />
          <p>Personal de aseo</p>
        </a>
      </div>
    </div>
  </div>
</body>

</html>