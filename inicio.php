<?php
session_start();

// Incluir la Conexión de la Base de Datos, funciones y componentes para utilizar
include_once 'dataBase/conexiondb.php';
include_once 'dataBase/funciones.php';
include_once 'components/component.php';

//Verificar si existe una Sesión del Cliente
if (!isset($_SESSION['id']) || !$_SESSION['id']) {

  header("Location: login.php");
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
  <title>Inicio</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/inicio.css">
  <link rel="stylesheet" href="css/servicios-user.css">
  <link rel="stylesheet" href="css/modal-solicitudes.css">

</head>

<body>
  <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
  <?php echo headerComponent(); ?>
  <?php echo navbarComponent(); ?>

  <!-- Contenedor de las Solicitudes -->
  <div class="article-menu">
    <article class="article-menu-usuario" id="mis-servicios">
      <section class="section-menu-usuario servicios-usuario">

        <!-- Traer las solicitudes realizadas por el Cliente - Components -->
        <?php
        getSolicitudes();
        ?>
      </section>
    </article>

  </div>

  <!-- Se crea un valor por URL para mostrar la Alerta de 'Servicio creado' -->
  <?php
  $createdService = $_GET['createdService'];

  ?>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Alerta mostrando el registro correcto del servicio -->
  <script type="text/javascript">
    let $success = <?php echo json_encode($createdService) ?>

    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    if ($success === '1') {
      Toast.fire({
        icon: 'success',
        title: 'Solicitud Publicada'
      })
    }
  </script>


</body>

</html>