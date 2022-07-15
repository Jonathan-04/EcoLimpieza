    let modal = document.getElementById('modalSolicitud');
    let solicitud = document.getElementById('items-solicitudes');
    let btnCerrarModal = document.getElementById('CerrarModal');
    let dataSolicitud = document.getElementById('contentSolicitud')


    function abrirModal(){

        modal.style.display = 'block';

        $(".content-solicitud").html(`
        
        <ul class="seccion-solicitud">
        <li><h1>id: </h1></li>
        <li>
          <h2>Detalles del Servicio</h2>
        </li>
        <li>
          <p>Publicado</p>
          <p>22/22/2022</p>
        </li>
        <li>
          <p>Detalles</p>
          <p>Lorem ipsum dolor sit amet.</p>
        </li>
        <li>
          <p>Valor</p>
          <p>$120.000</p>
        </li>
        <li>
          <a href="">Generar Factura</a>
        </li>
        <li>
          <a href="dataBase/cancelar-solicitud.php">Cancelar el Servicio</a>
        </li>
      </ul>
      <ul class="seccion-empleado">
        <li>
          <h2>Realizado Por:</h2>
        </li>
        <li>
          <p>Maid Prueba</p>
        </li>
        <li>
          <p>123331323</p>
        </li>
        <li><img src="img/FOTO CARNET.png" alt="" /></li>
        <li>
          <a href="">Reportar</a>
        </li>
      </ul>
      <button id="CerrarModal">Cerrar</button>
        
        `)
    };


