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


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
    <title>Solicitar</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/cuenta-usuario.css">
</head>

<body>
    <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
    <?php echo headerComponent(); ?>
    <?php echo navbarComponent(); ?>

    <!-- Container para el Formulario de crear una solicitud -->
    <div class="article-menu">
        <article class="article-menu-usuario" id="solicitar">
            <section class="section-menu-usuario solicitar-servicio">
                <h1 id="title-servicio">Solicitar Servicio</h1>
                <form method="POST" enctype="multipart/form-data" action="dataBase/solicitar-servicio.php" class="form">
                    <div class="rb-tipo-servicio">
                        <!-- Opciones para elegir el tipo de Servicio -->
                        <input type="radio" id="control_01" name="tipo-servicio" value="Barrer, trapear, lavado de ropa, limpieza de polvo">
                        <label class="lb-rb-tipo-servicio" for="control_01">
                            <h2>Servicio Básico</h2>
                            <p>Barrer, trapear, lavado de ropa, limpieza de polvo</p>
                        </label>
                        <!-- Opciones para elegir el tipo de Servicio -->
                        <input type="radio" id="control_02" name="tipo-servicio" value="Incluye los Servicios Básicos más limpieza a todo el hogar (Sala - Habitaciones - Baños )">
                        <label class="lb-rb-tipo-servicio" for="control_02">
                            <h2>Servicio Personalizado</h2>
                            <p>Incluye los Servicios Básicos más limpieza a todo el hogar (Sala - Habitaciones - Baños )</p>
                        </label>
                    </div>
                    <!-- Input para indicar el Día y la Hora del servicio -->
                    <div class="info-complementaria-servicio">
                        <div class="items-servicio">
                            <h1>Día y Hora:</h1>
                            <input type="datetime-local" name="fecha_prestacion_servicio">
                        </div>

                        <!-- Valor del servicio a prestar -->
                        <div class="items-servicio">
                            <h1>Valor Estimado:</h1>
                            <p>$120.000</p>
                        </div>
                    </div>
                    <input type="submit" value="Solicitar" name="Solicitar">
                </form>
            </section>
        </article>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>