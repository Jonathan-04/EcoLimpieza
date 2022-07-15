<?php

session_start();

// Incluir la Conexión de la Base de Datos, funciones y componentes para utilizar
include_once 'dataBase/conexiondb.php';
include_once 'components/component.php';


//Verificar si existe una Sesión del Empleado
if (!isset($_SESSION['idEmpleado']) || !$_SESSION['idEmpleado']) {

  header("Location: login.php");
}

/*Sentencia SQL para traer todas solicitudes que tienen estado de 'Publicado' 
para mostrar las ubicaciones en el Mapa
*/
$sql = "SELECT id_sol,fecha_prestacion_servicio, valor_estimado, detalles_servicio, nombre, apellidos, direccion, latitud, longitud 
          FROM solicitudes 
          INNER JOIN cliente 
          ON cliente.id = solicitudes.cliente_id 
          WHERE solicitudes.cliente_id = cliente.id AND estado = 'Publicado';";

$ejecutar = mysqli_query($conexion, $sql);

//Array de PHP con la información de las Solicitudes
$ubicacion = array();

while ($row = mysqli_fetch_array($ejecutar)) {
  $ubicacion[] = array($row['id_sol'], $row['fecha_prestacion_servicio'], $row['valor_estimado'], $row['detalles_servicio'], $row['nombre'], $row['apellidos'], $row['direccion'], $row['latitud'], $row['longitud']);
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon">
  <title>Mapa</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <link rel="stylesheet" href="css/mapa.css" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/inicio.css">

</head>

<body>

  <!-- Se traen el Header y el Navbar por medio de Funciones en components -->
  <?php echo headerComponent(); ?>
  <?php echo navbarComponentEmpleado(); ?>

  <!-- Sección para mostrar la ventana modal de los detalles 
  de una Solicitud Seleccionada  -->
  <div id="map"></div>
  <div class="modal" id="modal">
    <div class="modal-detalles">
    </div>
    <p id="btn-cancelar">Cancelar</p>
  </div>

  <!-- No Borrar
  <div id="ubicacion"></div>
  <input type="text" id="lat" value="" disabled />
  <input type="text" id="lng" value="" disabled />
-->

  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/map.js"></script>

  <!-- Script para traer toda la información de las solicitudes y mostrarlo en el Mapa -->
  <script>
    //Se trae el Array del PHP para convertirlo en un Array de JavaScript
    let ubicaciones = <?php echo json_encode($ubicacion); ?>;
    let modal = document.getElementById('modal')
    let cerrarModal = document.getElementById('btn-cancelar').addEventListener('click', btnCerrarModal)


    /* A partir de aquí se llaman a los valores traidos por el Array
    que contienen la información de las Solicitudes
    */
    placeMarker = L.Marker.extend({
      options: {
        id: '',
        fecha_prestacion: '',
        detalles: '',
        valor: '',
        direccion: ''
      }
    });

    for (var i = 0; i < ubicaciones.length; i++) {

      new_location = new L.LatLng(ubicaciones[i][7], ubicaciones[i][8])

      id = ubicaciones[i][0]
      direccion = ubicaciones[i][6]
      valor = ubicaciones[i][2]

      marker = new placeMarker(new_location, {
          id: ubicaciones[i][0],
          fecha_prestacion: ubicaciones[i][1],
          detalles: ubicaciones[i][3],
          valor: ubicaciones[i][2],
          direccion: ubicaciones[i][6],
        }).on('click', abrirModal)

        /*
        .bindPopup(id + '</br>' + direccion + '</br>' + valor + '</br>')
        */
        .addTo(map);


    }

    //Función para abrir el Modal que contiene los detalles de la Solicitud
    function abrirModal() {

      let id = this.options.id
      let fecha_prestacion = this.options.fecha_prestacion
      let detalles = this.options.detalles
      let valor = this.options.valor
      let direccion = this.options.direccion

      //Imprimir el HTML con los detalles de la Solicitud seleccionada
      modal.style.display = "block"
      $(".modal-detalles").html(`
      <form action="dataBase/aceptar-solicitud.php?id_solicitud=${id}" method="post">
    <h1>Detalles del Servicio</h1>
      <ul>
        <li>
          <p id="titulo-servicios">Para el</p>
          <p>${fecha_prestacion}</p>
        </li>
        <li>
          <p id="titulo-servicios">Detalles</p>
          <p>${detalles}</p>
        </li>
        <li>
          <p id="titulo-servicios">Valor estimado</p>
          <p>$${valor}</p>
        </li>
        <li>
          <p id="titulo-servicios">Direccion</p>
          <p>${direccion}</p>
        </li>
      </ul>
      <div class="btn-solicitudes">
        
        <input type="submit" value="Aceptar" name="Aceptar" />
      </div>
      </form>
    `)

    }

    map.on('click', btnCerrarModal)

    function btnCerrarModal() {
      modal.style.display = "none"
    }
  </script>

</body>

</html>