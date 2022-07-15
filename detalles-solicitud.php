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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Solicitud</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/modal-solicitudes.css">
</head>

<body>

    <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
    <?php echo headerComponent(); ?>
    <?php echo navbarComponent(); ?>

    <!-- Traer los detalles de la solicitud seleccionada -->
    <?php echo getDetallesSolicitudes(); ?>

</body>

</html>