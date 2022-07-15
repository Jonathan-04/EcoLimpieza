<?php

include_once 'dataBase/funciones.php';

// HEADER GLOBAL
function headerComponent()
{

?>
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

<?php
}

// NAVBAR PARA EL CLIENTE
function navbarComponent()
{

?>
    <nav class="nav-inicio">
        <div class="title-inicio">
            <p>Bienvenid@!</p>
            <!-- Traer el Nombre y Apellidos -->
            <h1><?php echo getUserName() ?></h1>
        </div>
        <div class="items-inicio">
            <ul class="btn-options">
                <li><a class="desActive" href="inicio.php">Mis Servicios</a> </li>
                <li><a class="desActive" href="solicitar.php">Solicitar</a> </li>
                <li><a class="desActive" href="cuenta.php">Mi Cuenta</a> </li>
            </ul>
        </div>
    </nav>
<?php
}

// NAVBAR PARA EL EMPLEADO
function navbarComponentEmpleado()
{

?>
    <nav class="nav-inicio">
        <div class="title-inicio">
            <p>Bienvenid@!</p>
            <!-- Traer el Nombre y Apellidos -->
            <h1><?php echo getUserNameEmpleado() ?></h1>
        </div>
        <div class="items-inicio">
            <ul class="btn-options">
                <li><a class="desActive" href="mapa.php">Buscar Servicio</a> </li>
                <li><a class="desActive" href="mis-servicios.php">Mis Servicios</a> </li>
                <li><a class="desActive" href="cuenta.php">Mi Cuenta</a> </li>
            </ul>
        </div>
    </nav>
<?php
}
?>