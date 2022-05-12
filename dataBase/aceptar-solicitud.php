<?php

include_once 'conexiondb.php';

$sql = "UPDATE solicitudes 
        SET estado = 'En proceso' 
        WHERE solicitudes.id_sol = '" . $_GET['id_solicitud'] . "' ";

$ejecutar = mysqli_query($conexion, $sql);

if ($ejecutar) {
    echo '
        <script>
        alert("Has tomado la solicitud")
        window.location="../pruebas.php"
        </script>    
    ';
} else {
    echo '
    <script>
    alert("No se pudo procesar la Solicitud")
    window.location="../pruebas.php"
    </script>    
';
}

$ejecutar->free();
$conexion->close();
