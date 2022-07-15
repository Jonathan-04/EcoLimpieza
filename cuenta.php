<?php
session_start();

// Incluir la Conexión de la Base de Datos, funciones y componentes para utilizar
include_once 'dataBase/conexiondb.php';
include_once 'dataBase/funciones.php';
include_once 'components/component.php';


/*Validar la Session creada, si es un Cliente o Empleado 
mostrar respectivamente su Vista */

// Vista Cliente
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
        <title>Mi Cuenta</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/cuenta-usuario.css">
    </head>

    <body>
        <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
        <?php echo headerComponent(); ?>
        <?php echo navbarComponent(); ?>

        <!-- Sección datos del cliente -->
        <div class="article-menu">
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
                                <!-- Traer los datos basicos del cliente | Funciones -->
                                <?php
                                getDatosBasicosCuenta();
                                ?>
                        </div>

                        <div class="datos-hogar-usuario" id="datos-hogar">
                            <!-- Traer los datos hogar del cliente | Funciones -->
                            <?php
                            getDatosHogarCuenta();
                            ?>
                        </div>
                    </div>

                </section>
            </article>
        </div>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/opciones-datos-usuario.js"></script>
    </body>

    </html>

<?php

    //Vista Empleado
} else if (isset($_SESSION['idEmpleado'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
        <title>Mi Cuenta</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/cuenta-usuario.css">
    </head>

    <body>
        <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
        <?php echo headerComponent(); ?>
        <?php echo navbarComponentEmpleado(); ?>

        <!-- Sección datos del empleado -->
        <div class="article-menu">
            <article class="article-menu-usuario" id="mi-cuenta">
                <section class="section-menu-usuario mi-cuenta-usuario">
                    <div class="items-cuenta-usuario btn-datos-usuario">

                        <a class="desActive2" href="#datos-basicos">Datos Basicos</a>
                        <a class="desActive2" href="">Metodos de Pago</a>

                    </div>
                    <div class="container-datos-usuario">
                        <div class="datos-basicos-usuario" id="datos-basicos">
                            <ul>
                                <!-- Traer los datos del empleado | Funciones -->
                                <?php
                                getDatosBasicosCuentaEmpleado();
                                ?>
                        </div>
                    </div>
                </section>
            </article>
        </div>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/opciones-datos-usuario.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
?>