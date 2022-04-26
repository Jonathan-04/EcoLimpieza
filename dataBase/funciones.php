<?php

function getUserName()
{

    require 'conexiondb.php';

    $sql = "SELECT nombre, apellidos FROM cliente WHERE id = '" . $_SESSION["id"] . "' ";
    $ejecutar = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($ejecutar);

    //Convertir el Array a un String
    $filaString = implode(' ', $fila);

    return $filaString;

    $conexion->close();
}

function getDatosUser()
{

    require 'conexiondb.php';

    $sql2 = "SELECT * FROM cliente WHERE id = '" . $_SESSION["id"] . "' ";
    $ejecutar2 = mysqli_query($conexion, $sql2);

    $fila2 = mysqli_fetch_assoc($ejecutar2);

    //Convertir el Array a un String
    $filaString2 = implode(' ', $fila2);

    return $filaString2;

    $conexion->close();
}
