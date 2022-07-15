<?php

//Validación en el Inicio de Sesión

session_start();

//Conexión Mysqli
include_once 'conexiondb.php';


if ($_POST['Ingresar']) {

    //Validar que tipo de usuario va iniciar la Sesión, si es un CLIENTE o EMPLEADO

    //Se comprueba si el valor de la variable por URL 'tipo' es CLIENTE
    if ($_GET['tipo'] === 'cliente') {

        //Capturar los datos del Input
        $email = $_POST["email"];
        $clave = $_POST["clave"];

        //SQL
        $sql = "SELECT id, clave FROM cliente WHERE email = '" . $email . "' ";

        //Ejecutar el SQL en la BD
        $ejecutar = mysqli_query($conexion, $sql);

        $filas = mysqli_fetch_assoc($ejecutar);

        //Traer la clave del Cliente | Hash
        $password_hash = $filas["clave"];

        //Comprobar la clave del Cliente si es la misma introducida en el Input
        if (password_verify($clave, $password_hash)) {

            //Crear el Session del Cliente
            $_SESSION['id'] = $filas['id'];

            header("Location: ../inicio.php");
        } else {
            header("Location: ../login.php?errorLogin=1");
        }

        //Liberar la consulta y cerrar la conexión
        $ejecutar->free();
        $conexion->close();

        //Se comprueba si el valor de la variable por URL 'tipo' es EMPLEADO
    } else if ($_GET['tipo'] === 'empleado') {

        //Capturar los datos del Input
        $email = $_POST["email"];
        $clave = $_POST["clave"];

        //SQL
        $sql = "SELECT id, clave FROM empleados WHERE email = '" . $email . "' ";

        //Ejecutar el SQL en la BD
        $ejecutar = mysqli_query($conexion, $sql);

        $filas = mysqli_fetch_assoc($ejecutar);

        //Traer la clave del Empleado | Hash
        $password_hash = $filas["clave"];

        //Comprobar la clave del Empleado si es la misma introducida en el Input
        if (password_verify($clave, $password_hash)) {

            //Crear el Session del Empleado
            $_SESSION['idEmpleado'] = $filas['id'];

            header("Location: ../mapa.php");
        } else {
            header("Location: ../login.php?errorLogin=1");
        }

        //Liberar la consulta y cerrar la conexión
        $ejecutar->free();
        $conexion->close();
    }
}
