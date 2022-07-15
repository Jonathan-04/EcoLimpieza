<?php

//Conexión a la Base de Datos utilizando Mysqli
//Algunas funciones se está utilizando con Mysqli
$server = "localhost";
$user = "root";
$password = "";
$database = "ecolimpieza";

//La variable $conexion se utiliza para poder ejecutar la sentencia SQL en la BD
$conexion = mysqli_connect($server, $user, $password, $database);
