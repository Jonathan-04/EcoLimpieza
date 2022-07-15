<?php

session_start();

//Conexión Msqli
include_once 'conexiondb.php';

//Traer los datos del Input
$fecha_prestacion_servicio = $_POST["fecha_prestacion_servicio"];
$detalles_servicio = $_POST["tipo-servicio"];

if ($_POST["Solicitar"]) {

    //SQL
    $sql = "INSERT INTO solicitudes (cliente_id, fecha_solicitud, fecha_prestacion_servicio, estado, valor_estimado, detalles_servicio)
            VALUES ('" . $_SESSION['id'] . "', NOW(), '$fecha_prestacion_servicio', 'Publicado', '120000', '$detalles_servicio')";

    //Ejecutar el SQL en la BD
    $ejecutar = mysqli_query($conexion, $sql);

    if ($ejecutar) {
        //Creación exitosa
        header("Location: ../inicio.php?createdService=1");
    } else {
        //Algún error al crearla
        header("Location: ../inicio.php?errorCreated=1");
    }
}

$conexion->close();
