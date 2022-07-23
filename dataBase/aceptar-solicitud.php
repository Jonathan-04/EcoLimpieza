<?php

//Incluir conexión
//Esto es por medio de MYSQLI
session_start();
include_once 'conexiondb.php';

/* Sentencia SQL para cuando el Empleado acepte una Solicitud de un Cliente */
$sql = "UPDATE solicitudes 
        SET empleado_id = '" . $_SESSION['idEmpleado'] . "' , estado = 'En proceso' 
        WHERE solicitudes.id_sol = '" . $_GET['id_solicitud'] . "' ";

$ejecutar = mysqli_query($conexion, $sql);

$sql2 = "SELECT nombre, apellidos, email 
         FROM empleados 
         WHERE id = '" . $_SESSION['idEmpleado'] . "' ";

$ejecutar2 = mysqli_query($conexion, $sql2);
$empleado = mysqli_fetch_assoc($ejecutar2);

$sql3 = "SELECT * FROM solicitudes 
WHERE id_sol = '" . $_GET['id_solicitud'] . "' ";

$ejecutar3 = mysqli_query($conexion, $sql3);
$solicitud = mysqli_fetch_assoc($ejecutar3);


if (isset($_POST['Aceptar'])) {
    if ($ejecutar) {


        // Varios destinatarios
        $para  = $empleado['email'];

        // título
        $título = 'Confirmación de Solicitud';

        // mensaje
        $mensaje = "
<html>
<head>
  <title>Pruebas</title>
</head>
<body>
  <div>
    <div>
      <h1>Solicitud confirmada</h1>
      <p>" . $empleado['nombre'] . " " . $empleado['apellidos'] . " se envía información acerca de la solicitud que fue tomada.</p>
    </div>
    <div>
      <ul>
        <li>
          <p>Para el</p>
          <p>" . $solicitud['fecha_prestacion_servicio'] . "</p>
        </li>
        <li>
          <p>Detalles</p>
          <p>" . $solicitud['detalles_servicio'] . "</p>
        </li>
        <li>
          <p>Valor estimado</p>
          <p>" . $solicitud['valor_estimado'] . "</p>
        </li>
        <li>
          <p>Direccion</p>
          <p>Cra 44 #3 F2</p>
        </li>
      </ul>
    </div>
    <div>
      <p>Ante cualquier duda o reclamo porfavor comunicarse en los medios establecidos.</p>
    </div>
  </div>
</body>
</html>
";

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'From: jonathanvel84@gmail.com';

        // Enviarlo
        mail($para, $título, $mensaje, $cabeceras);

        echo '
            <script>
            alert("Has tomado la solicitud")
            window.location="../mapa.php"
            </script>    
        ';
    } else {
        echo '
        <script>
        alert("No se pudo procesar la Solicitud")
        window.location="../mapa.php"
        </script>    
    ';
    }

    $conexion->close();
}
