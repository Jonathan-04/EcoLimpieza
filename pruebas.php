<?php
include_once 'dataBase/conexiondb.php';

$sql = "SELECT id_sol, valor_estimado, direccion, latitud, longitud 
          FROM solicitudes 
          INNER JOIN cliente 
          ON cliente.id = solicitudes.cliente_id 
          WHERE solicitudes.cliente_id = cliente.id AND estado = 'Publicado';";

$ejecutar = mysqli_query($conexion, $sql);


$ubicacion = array();

while ($row = mysqli_fetch_array($ejecutar)) {
  $ubicacion[] = array($row['id_sol'], $row['valor_estimado'], $row['direccion'], $row['latitud'], $row['longitud']);
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mapa</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <link rel="stylesheet" href="css/pruebas.css" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/inicio.css">
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

  <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <header class="header-inicio">
    <!-- Contenedor del Header -->
    <div class="items logo">
      <ul>
        <!-- Logo y Nombre -->
        <li><img src="img/iconos/iconEco.png" alt="" /></li>
        <li>
          <h1>EcoLimpieza</h1>
        </li>
      </ul>
    </div>
    <!-- Opción para ir al Login-->
    <div class="items items-opciones">
      <a href="dataBase/logout.php">Cerrar Sesión</a>

    </div>
  </header>

  <nav class="nav-inicio">
    <div class="title-inicio">
      <p>Bienvenid@!</p>
      <h1>Empleado</h1>
    </div>
    <div class="items-inicio">
      <ul class="btn-options">
        <li><a class="desActive" href="#mis-servicios">Servicios</a> </li>
        <li><a class="desActive" href="#mi-cuenta">Mi Cuenta</a> </li>
      </ul>
    </div>
  </nav>



  <div id="map">

  </div>
  <div class="modal" id="modal">
    <h1>Solicitud</h1>
    <div class="modal-detalles">
      <p id="id-solicitud"></p>
    </div>
    <p id="cerrar-modal">Cerrar</p>

  </div>


  <div id="ubicacion"></div>
  <input type="text" id="lat" value="" disabled />
  <input type="text" id="lng" value="" disabled />

  <script src="js/map.js"></script>
  <script>
    var ubicaciones = <?php echo json_encode($ubicacion); ?>;
    let modal = document.getElementById('modal')
    let cerrarModal = document.getElementById('cerrar-modal').addEventListener('click', btnCerrarModal)

    placeMarker = L.Marker.extend({
      options: {
        id: '',
        direccion: ''
      }
    });

    for (var i = 0; i < ubicaciones.length; i++) {
      new_location = new L.LatLng(ubicaciones[i][3], ubicaciones[i][4])
      id = ubicaciones[i][0]
      direccion = ubicaciones[i][2]
      valor = ubicaciones[i][1]
      marker = new placeMarker(new_location, {
          id: ubicaciones[i][0],
          direccion: ubicaciones[i][2],
        }).on('click', abrirModal)


        .bindPopup(id + '</br>' + direccion + '</br>' + valor + '</br>')
        .addTo(map);


    }



    function abrirModal() {

      let id = this.options.id
      let direccion = this.options.direccion

      modal.style.display = "block"
      $(".modal-detalles").html(`<p>ID: ${id} </p>` + `<p>Direccion: ${direccion}</p><form action="dataBase/aceptar-solicitud.php?id_solicitud=${id}" method="post">
      <input type="submit" value="Aceptar" name="Aceptar">
    </form>`)

    }

    map.on('click', btnCerrarModal)

    function btnCerrarModal() {
      modal.style.display = "none"
    }
  </script>

</body>

</html>