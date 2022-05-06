<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "ecolimpieza";

$conexion = mysqli_connect($server, $user, $password, $database);


/*
try {
    $conexion = new PDO("mysql: host = $server, dbname = $database", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conectado a la Base de Datos';
} catch (PDOException $e) {
    echo "La conexión ha fallado: " . $e->getMessage();
}

$conexion = null;
*/