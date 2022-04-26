<?php

session_start();
include_once 'conexiondb.php';

if ($_POST['Ingresar']) {

    $email = $_POST["email"];
    $clave = $_POST["clave"];

    $sql = "SELECT id, clave FROM cliente WHERE email = '" . $email . "' ";
    $ejecutar = mysqli_query($conexion, $sql);

    $filas = mysqli_fetch_assoc($ejecutar);

    $password_hash = $filas["clave"];

    if (password_verify($clave, $password_hash)) {

        $_SESSION['id'] = $filas['id'];

        header("Location: ../inicio.php");
    } else {

        echo '
            <script>
                alert("Email y/o Contraseña incorrecto");
                window.location = "../login.php";
            </script>
        ';
    }

    $ejecutar->free();
    $conexion->close();
}
