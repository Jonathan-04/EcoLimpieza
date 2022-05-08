<?php

function getUserName()
{

    require 'conexiondbPDO.php';

    $sql = "SELECT nombre, apellidos 
              FROM cliente 
              WHERE id= '" . $_SESSION["id"] . "'  ";

    $ejecutar = $conexion->prepare($sql);

    $ejecutar->execute();

    $row = $ejecutar->fetch(PDO::FETCH_OBJ);
    echo $row->nombre . " " . $row->apellidos;


    $conexion = null;
}


function getSolicitudes()
{

    require 'conexiondbPDO.php';

    $sql = "SELECT * FROM solicitudes 
              INNER JOIN cliente ON cliente.id = solicitudes.cliente_id
              WHERE '" . $_SESSION["id"] . "' = solicitudes.cliente_id ";

    $ejecutar = $conexion->prepare($sql);
    $ejecutar->execute();

    if ($ejecutar->rowCount() > 0) {

        while ($filas = $ejecutar->fetch(PDO::FETCH_OBJ)) {

?>
            <tr>
                <td><?php echo $filas->fecha_solicitud; ?></td>
                <td><?php echo $filas->estado; ?></td>
                <td><?php echo $filas->detalles_servicio; ?></td>
                <td><a href="#"><i class="gg-search"></i></a></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td>Aún no tiene Servicios</td></tr>";
    }

    $conexion = null;
}

function getDatosBasicosCuenta()
{
    require 'conexiondbPDO.php';

    if (isset($_SESSION['id'])) {

        $sql = "SELECT * FROM cliente 
               WHERE id = '" . $_SESSION["id"] . "' ";
        $ejecutar = $conexion->prepare($sql);
        $ejecutar->execute();

        $filas = $ejecutar->fetch(PDO::FETCH_OBJ);

        ?>
        <li>Tipo Documento: <p><?php echo $filas->tipo_documento; ?></p>
        </li>
        <li>Número Documento: <p><?php echo $filas->numero_documento; ?></p>
        </li>
        <li>Nombre: <p><?php echo $filas->nombre; ?></p>
        </li>
        <li>Apellidos: <p><?php echo $filas->apellidos; ?></p>
        </li>
        <li>Email: <p><?php echo $filas->email; ?></p>
        </li>
        <li>Celular: <p><?php echo $filas->numero_celular; ?></p>
        </li>
        <li>Dirección: <p><?php echo $filas->direccion; ?></p>
        </li>
        </ul>
        <a id="btn-modal" href="#">Editar</a>
    <?php
    }

    $conexion = null;
}

function getDatosHogarCuenta()
{
    require 'conexiondbPDO.php';

    $sql = "SELECT * FROM cliente_hogar 
             INNER JOIN cliente 
             WHERE '" . $_SESSION["id"] . "' = cliente_hogar.cliente_id ";

    $ejecutar = $conexion->prepare($sql);
    $ejecutar->execute();

    if ($ejecutar->rowCount() > 0) {
        $filas = $ejecutar->fetch(PDO::FETCH_OBJ);


    ?>
        <ul>
            <li>
                <img src="img/iconos/hogar.png" alt="">
                <p>Mt2: <?php echo $filas->hogar_en_mt2; ?></p>
            </li>
            <li>
                <img src="img/iconos/habitacion.png" alt="">
                <p>N° Habitaciones: <?php echo $filas->numero_habitaciones; ?></p>
            </li>
            <li>
                <img src="img/iconos/baño.png" alt="">
                <p>N° Baños: <?php echo $filas->numero_bathing; ?></p>
            </li>
            <li>
                <img src="img/iconos/personas.png" alt="">
                <p>N° Personas: <?php echo $filas->numero_personas; ?></p>
            </li>
            <li>
                <img src="img/iconos/mascotas.png" alt="">
                <p>Mascotas: <?php echo $filas->mascotas; ?></p>
            </li>
        </ul>

    <?php
    } else {
        echo '<p id="else-while">Sin datos, por favor de click en el Botón de "Editar" para agregar la información de su Hogar</p>';
    }
    $conexion = null;
    ?>
    <a id="btn-modal" href="#">Editar</a>
<?php

}
