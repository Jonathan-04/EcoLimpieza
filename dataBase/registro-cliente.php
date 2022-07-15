<?php

//Conexión Mysqli
include_once 'conexiondb.php';

//Capturar los datos del formulario desde el Input
$tipo_documento   =  $_POST["tipo_documento"];
$numero_documento = $_POST["numero_documento"];
$nombre           =  $_POST["nombre"];
$apellidos        =  $_POST["apellidos"];
$email            =  $_POST["email"];
$clave            =  $_POST["clave"];
$numero_celular   =  $_POST["numero_celular"];
$direccion        =  $_POST["direccion"];

//Se trae la clave introducida en el Input para encriptarla por el método HASH
$password_hash = password_hash($clave, PASSWORD_DEFAULT);

//SQL
$sql = "INSERT INTO cliente
        (tipo_documento, numero_documento,nombre, apellidos, email, clave, numero_celular, direccion) 
        VALUES ('$tipo_documento', '$numero_documento','$nombre', '$apellidos', '$email', '$password_hash', '$numero_celular', '$direccion') ";

//Ejecutar el SQL en la BD
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    header('Location: ../login.php');
} else {
    echo '
    <script>
    alert("No se pudo registrar");
    </script>

';
}

//Cerrar conexión
$conexion->close();
