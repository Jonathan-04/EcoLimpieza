<?php

include_once 'conexiondb.php';

$tipo_documento   =  $_POST["tipo_documento"];
$numero_documento = $_POST["numero_documento"];
$nombre           =  $_POST["nombre"];
$apellidos        =  $_POST["apellidos"];
$email            =  $_POST["email"];
$clave            =  $_POST["clave"];
$numero_celular   =  $_POST["numero_celular"];
$direccion        =  $_POST["direccion"];

$password_hash = password_hash($clave, PASSWORD_DEFAULT);

$sql = "INSERT INTO cliente
        (tipo_documento, numero_documento,nombre, apellidos, email, clave, numero_celular, direccion) 
        VALUES ('$tipo_documento', '$numero_documento','$nombre', '$apellidos', '$email', '$password_hash', '$numero_celular', '$direccion') ";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {

    echo '
        <script>
        alert("Se ha registrado exitosamente!");
        window.location="../login.php";
        </script>

    ';
} else {

    echo '
    <script>
    alert("No se pudo registrar");
    </script>

';
}

$resultado->free();
$conexion->close();
