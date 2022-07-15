<?php

//Incluir conexión
//Esto es por medio de MYSQLI
include_once 'conexiondb.php';

/* Sentencia SQL para cuando el Empleado acepte una Solicitud de un Cliente */
$sql = "UPDATE solicitudes 
        SET empleado_id = '" . $_SESSION['idEmpleado'] . "' , estado = 'En proceso' 
        WHERE solicitudes.id_sol = '" . $_GET['id_solicitud'] . "' ";

$ejecutar = mysqli_query($conexion, $sql);

if (isset($_POST['Aceptar'])) {
    if ($ejecutar) {
        echo '
            <script>
            alert("Has tomado la solicitud")
            window.location="../mapa.php"
            </script>    
        ';
    } else {
        echo '
        <script>
        alert("No se pudo procesar la Solicitud")
        window.location="../mapa.php"
        </script>    
    ';
    }


    $ejecutar->free();
    $conexion->close();
}
