<?php

session_start();
include_once 'conexiondb.php';

$fecha_prestacion_servicio = $_POST["fecha_prestacion_servicio"];
$detalles_servicio = $_POST["tipo-servicio"];

if ($_POST["Solicitar"]) {


    $sql = "INSERT INTO solicitudes (cliente_id, fecha_solicitud, fecha_prestacion_servicio, estado, valor_estimado, detalles_servicio)
            VALUES ('" . $_SESSION['id'] . "', NOW(), '$fecha_prestacion_servicio', 'Publicado', '120000', '$detalles_servicio')";

    $ejecutar = mysqli_query($conexion, $sql);

    if ($ejecutar) {
        echo '
            <script>
                alert("Solicitud Publicada");
                window.location = "../inicio.php";        
            </script>
        ';
    } else {
        echo '
        <script>
            alert("No se pudo realizar la Solicitud");         
        </script>
    ';
    }
}

$conexion->close();
