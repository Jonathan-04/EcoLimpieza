<?php

//Conexión a la Base de Datos utilizando PDO
//Algunas funciones se está utilizando con PDO
$server = "localhost";
$user = "root";
$password = "";
$database = "ecolimpieza";

try {
    //La variable $conexion se utiliza para poder ejecutar la sentencia SQL en la BD
    $conexion = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
