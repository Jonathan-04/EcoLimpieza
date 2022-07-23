<?php

session_start();
require 'conexiondb.php';

$sql = "UPDATE solicitudes
        SET estado = 'Cancelado'
        WHERE id_sol = '" . $_GET['idSolicitud'] . "' ";

$ejecutar = mysqli_query($conexion, $sql);

if ($ejecutar) {

    echo '
        <script>
            alert("Has cancelado la solicitud");
            window.location = "../inicio.php";
        </script>
    ';
} else {

    echo '
        <script>
            alert("Se ha producido un error, intentelo nuevamente");
            window.location = "../inicio.php";
        </script>
    ';
}
