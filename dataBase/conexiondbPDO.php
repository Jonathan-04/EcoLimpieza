<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "ecolimpieza";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
