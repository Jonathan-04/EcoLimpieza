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

          $i = 0;
          while ($i < 7) {
            echo '<tr>
          <td>25/04/2022</td>
          <td>Realizado</td>
          <td>Limpieza Total al Hogar</td>
          <td><a href="#"><i class="gg-search"></i></a></td>
        </tr>';
            $i++;
          }

          ?>

        </table>
      </section>
    </article>

    <article id="solicitar">
      <h2>sdsad</h2>
    </article>


    <article class="article-menu-usuario" id="mi-cuenta">
      <section class="section-menu-usuario mi-cuenta-usuario">
        <div class="items-cuenta-usuario">

          <a class="active2" href="">Datos Basicos</a>
          <a class="desActive2" href="">Datos del Hogar</a>
          <a class="desActive2" href="">Metodos de Pago</a>

        </div>

        <div class="datos-basicos-usuario container-datos-usuario">
          <ul>
            <?php

            if (isset($_SESSION['id'])) {

              $sql2 = "SELECT * FROM cliente WHERE id = '" . $_SESSION["id"] . "' ";
              $ejecutar2 = mysqli_query($conexion, $sql2);

              $fila2 = mysqli_fetch_array($ejecutar2);

            ?>
              <li>Tipo Documento: <p><?php echo $fila2["tipo_documento"]; ?></p>
              </li>
              <li>Número Documento: <p><?php echo $fila2["numero_documento"]; ?></p>
              </li>
              <li>Nombre: <p><?php echo $fila2["nombre"]; ?></p>
              </li>
              <li>Apellidos: <p><?php echo $fila2["apellidos"]; ?></p>
              </li>
              <li>Email: <p><?php echo $fila2["email"]; ?></p>
              </li>
              <li>Celular: <p><?php echo $fila2["numero_celular"]; ?></p>
              </li>
              <li>Dirección: <p><?php echo $fila2["direccion"]; ?></p>
              </li>
          </ul>
          <a href="#">Editar</a>
        <?php
            } ?>
        </div>

        <div class="datos-hogar-usuario container-datos-usuario">
          <ul>
            <li>
              <img src="img/iconos/hogar.png" alt="">
              <p>Mt2: 40m</p>
            </li>
            <li>
              <img src="img/iconos/habitacion.png" alt="">
              <p>N° Habitaciones: 3</p>
            </li>
            <li>
              <img src="img/iconos/baño.png" alt="">
              <p>N° Baños: 1</p>
            </li>
            <li>
              <img src="img/iconos/personas.png" alt="">
              <p>N° Personas: 4</p>
            </li>
            <li>
              <img src="img/iconos/mascotas.png" alt="">
              <p>Mascotas: Si</p>
            </li>
          </ul>
          <a href="#">Editar</a>

        </div>
      </section>
    </article>


  </div>



  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/opciones-menu-usuario.js"></script>
</body>

</html>