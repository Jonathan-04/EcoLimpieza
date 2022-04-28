<?php
session_start();
include_once 'dataBase/conexiondb.php';
require 'dataBase/funciones.php';

if (!isset($_SESSION['id']) || !$_SESSION['id']) {

  header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
  <title>Inicio</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/inicio.css">
  <link rel="stylesheet" href="css/servicios-user.css">
  <link rel="stylesheet" href="css/preloader.css">
  <link rel="stylesheet" href="css/cuenta-usuario.css">
  <link href='https://css.gg/css' rel='stylesheet'>
</head>

<body class="hidden">
  <div class="preloader" id="preloader">
  </div>
  <header class="header-inicio">
    <!-- Contenedor del Header -->
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
      <a href="dataBase/logout.php">Cerrar Sesión</a>

    </div>
  </header>

  <nav class="nav-inicio">
    <div class="title-inicio">
      <p>Bienvenid@!</p>
      <h1><?php echo getUserName() ?></h1>
    </div>
    <div class="items-inicio">
      <ul class="btn-options">
        <li><a class="desActive" href="#mis-servicios">Mis Servicios</a> </li>
        <li><a class="desActive" href="#solicitar">Solicitar</a> </li>
        <li><a class="desActive" href="#mi-cuenta">Mi Cuenta</a> </li>
      </ul>
    </div>
  </nav>

  <div class="article-menu">
    <article class="article-menu-usuario" id="mis-servicios">
      <section class="section-menu-usuario servicios-usuario">
        <table class="table-servicios">
          <tr class="title-tr">
            <th>Fecha</th>
            <th>Estado</th>
            <th>Detalles</th>
            <th></th>
          </tr>
          <?php

          $sql1 = "SELECT * FROM solicitudes 
                    INNER JOIN cliente 
                    WHERE '" . $_SESSION["id"] . "' = solicitudes.cliente_id ";

          $ejecutar1 = mysqli_query($conexion, $sql1);

          while ($filas1 = mysqli_fetch_array($ejecutar1)) {


          ?>

            <tr>
              <td><?php echo $filas1["fecha_solicitud"]; ?></td>
              <td><?php echo $filas1["estado"]; ?></td>
              <td><?php echo $filas1["detalles_servicio"]; ?></td>
              <td><a href="#"><i class="gg-search"></i></a></td>
            </tr>
          <?php
          };
          ?>
        </table>
      </section>
    </article>

    <article class="article-menu-usuario" id="solicitar">
      <section class="section-menu-usuario solicitar-servicio">
        <h1 id="title-servicio">Solicitar Servicio</h1>
        <form method="POST" enctype="multipart/form-data" action="dataBase/solicitar-servicio.php" class="form">
          <div class="rb-tipo-servicio">
            <input type="radio" id="control_01" name="tipo-servicio" value="Barrer, trapear, lavado de ropa, limpieza de polvo">
            <label class="lb-rb-tipo-servicio" for="control_01">
              <h2>Servicio Básico</h2>
              <p>Barrer, trapear, lavado de ropa, limpieza de polvo</p>
            </label>
            <input type="radio" id="control_02" name="tipo-servicio" value="Incluye los Servicios Básicos más limpieza a todo el hogar (Sala - Habitaciones - Baños )">
            <label class="lb-rb-tipo-servicio" for="control_02">
              <h2>Servicio Personalizado</h2>
              <p>Incluye los Servicios Básicos más limpieza a todo el hogar (Sala - Habitaciones - Baños )</p>
            </label>
          </div>
          <div class="info-complementaria-servicio">
            <div class="items-servicio">
              <h1>Día y Hora:</h1>
              <input type="datetime-local" name="fecha_prestacion_servicio">
            </div>
            <div class="items-servicio">
              <h1>Valor Estimado:</h1>
              <p>$120.000</p>
            </div>
          </div>
          <input type="submit" value="Solicitar" name="Solicitar">
        </form>
      </section>
    </article>


    <article class="article-menu-usuario" id="mi-cuenta">
      <section class="section-menu-usuario mi-cuenta-usuario">
        <div class="items-cuenta-usuario btn-datos-usuario">

          <a class="desActive2" href="#datos-basicos">Datos Basicos</a>
          <a class="desActive2" href="#datos-hogar">Datos del Hogar</a>
          <a class="desActive2" href="">Metodos de Pago</a>

        </div>
        <div class="container-datos-usuario">
          <div class="datos-basicos-usuario" id="datos-basicos">
            <ul>
              <?php

              if (isset($_SESSION['id'])) {

                $sql2 = "SELECT * FROM cliente 
                         WHERE id = '" . $_SESSION["id"] . "' ";
                $ejecutar2 = mysqli_query($conexion, $sql2);

                $filas2 = mysqli_fetch_array($ejecutar2);

              ?>
                <li>Tipo Documento: <p><?php echo $filas2["tipo_documento"]; ?></p>
                </li>
                <li>Número Documento: <p><?php echo $filas2["numero_documento"]; ?></p>
                </li>
                <li>Nombre: <p><?php echo $filas2["nombre"]; ?></p>
                </li>
                <li>Apellidos: <p><?php echo $filas2["apellidos"]; ?></p>
                </li>
                <li>Email: <p><?php echo $filas2["email"]; ?></p>
                </li>
                <li>Celular: <p><?php echo $filas2["numero_celular"]; ?></p>
                </li>
                <li>Dirección: <p><?php echo $filas2["direccion"]; ?></p>
                </li>
            </ul>
            <a href="#">Editar</a>
          <?php
              } ?>
          </div>

          <div class="datos-hogar-usuario" id="datos-hogar">
            <?php

            $sql3 = "SELECT * FROM cliente_hogar 
                     INNER JOIN cliente 
                     WHERE '" . $_SESSION["id"] . "' = cliente_hogar.cliente_id ";

            $ejecutar3 = mysqli_query($conexion, $sql3);

            $filas3 = mysqli_fetch_assoc($ejecutar3);

            ?>
            <ul>
              <li>
                <img src="img/iconos/hogar.png" alt="">
                <p>Mt2: <?php echo $filas3["hogar_en_mt2"]; ?></p>
              </li>
              <li>
                <img src="img/iconos/habitacion.png" alt="">
                <p>N° Habitaciones: <?php echo $filas3["numero_habitaciones"]; ?></p>
              </li>
              <li>
                <img src="img/iconos/baño.png" alt="">
                <p>N° Baños: <?php echo $filas3["numero_bathing"]; ?></p>
              </li>
              <li>
                <img src="img/iconos/personas.png" alt="">
                <p>N° Personas: <?php echo $filas3["numero_personas"]; ?></p>
              </li>
              <li>
                <img src="img/iconos/mascotas.png" alt="">
                <p>Mascotas: <?php echo $filas3["mascotas"]; ?></p>
              </li>
            </ul>
            <a href="#">Editar</a>

          </div>
        </div>

      </section>
    </article>
  </div>



  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/opciones-menu-usuario.js"></script>
  <script src="js/opciones-datos-usuario.js"></script>
</body>

</html>