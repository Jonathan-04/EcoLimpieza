<?php

function getUserName()
{
    /*
    require 'conexiondb.php';

    $sql = "SELECT nombre, apellidos FROM cliente WHERE id = '" . $_SESSION["id"] . "' ";
    $ejecutar = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($ejecutar);
    //Convertir el Array a un String
    $filaString = implode(' ', $fila);

    return $filaString;

    $ejecutar->free();
    $conexion->close();
    */

    require 'conexiondbPDO.php';

    $query = "SELECT nombre, apellidos 
              FROM cliente 
              WHERE id= '" . $_SESSION["id"] . "'  ";

    $ejecutar = $conexion->prepare($query);

    $ejecutar->execute();

    $row = $ejecutar->fetch(PDO::FETCH_OBJ);
    echo $row->nombre . " " . $row->apellidos;


    $conexion = null;
}


function getSolicitudes()
{

    require 'conexiondb.php';

    $sql1 = "SELECT * FROM solicitudes 
              INNER JOIN cliente ON cliente.id = solicitudes.cliente_id
              WHERE '" . $_SESSION["id"] . "' = solicitudes.cliente_id ";

    $ejecutar1 = mysqli_query($conexion, $sql1);


    if ($ejecutar1->num_rows > 0) {
        while ($filas1 = $ejecutar1->fetch_assoc()) {

?>

            <tr>
                <td><?php echo $filas1["fecha_solicitud"]; ?></td>
                <td><?php echo $filas1["estado"]; ?></td>
                <td><?php echo $filas1["detalles_servicio"]; ?></td>
                <td><a href="#"><i class="gg-search"></i></a></td>
            </tr>
        <?php
        }
    } else {
        echo '<tr><td>Aún no tiene Solicitudes </td> </tr>';
    }

    $ejecutar1->free();
    $conexion->close();
}

function getDatosBasicosCuenta()
{
    require 'conexiondb.php';

    if (isset($_SESSION['id'])) {

        $sql2 = "SELECT * FROM cliente 
               WHERE id = '" . $_SESSION["id"] . "' ";
        $ejecutar2 = mysqli_query($conexion, $sql2);

        $filas2 = mysqli_fetch_array($ejecutar2);

        ?>
        <li>Tipo Documento: <p><?php echo $filas2["tipo_documento"]; ?></p>
        </li>
        <li>Número Documento: <p><?php echo $filas2["numero_documento"]; ?></p>
        </li>
        <li>Nombre: <p><?php echo $filas2["nombre"]; ?></p>
        </li>
        <li>Apellidos: <p><?php echo $filas2["apellidos"]; ?></p>
        </li>
        <li>Email: <p><?php echo $filas2["email"]; ?></p>
        </li>
        <li>Celular: <p><?php echo $filas2["numero_celular"]; ?></p>
        </li>
        <li>Dirección: <p><?php echo $filas2["direccion"]; ?></p>
        </li>
        </ul>
        <a id="btn-modal" href="#">Editar</a>
    <?php
    }
    $ejecutar2->free();
    $conexion->close();
}

function getDatosHogarCuenta()
{
    require 'conexiondb.php';

    $sql3 = "SELECT * FROM cliente_hogar 
             INNER JOIN cliente 
             WHERE '" . $_SESSION["id"] . "' = cliente_hogar.cliente_id ";

    $ejecutar3 = mysqli_query($conexion, $sql3);

    if ($ejecutar3->num_rows > 0) {
        $filas3 = $ejecutar3->fetch_assoc();


    ?>
        <ul>
            <li>
                <img src="img/iconos/hogar.png" alt="">
                <p>Mt2: <?php echo $filas3["hogar_en_mt2"]; ?></p>
            </li>
            <li>
                <img src="img/iconos/habitacion.png" alt="">
                <p>N° Habitaciones: <?php echo $filas3["numero_habitaciones"]; ?></p>
            </li>
            <li>
                <img src="img/iconos/baño.png" alt="">
                <p>N° Baños: <?php echo $filas3["numero_bathing"]; ?></p>
            </li>
            <li>
                <img src="img/iconos/personas.png" alt="">
                <p>N° Personas: <?php echo $filas3["numero_personas"]; ?></p>
            </li>
            <li>
                <img src="img/iconos/mascotas.png" alt="">
                <p>Mascotas: <?php echo $filas3["mascotas"]; ?></p>
            </li>
        </ul>

    <?php
    } else {
        echo '<p id="else-while">Sin datos, por favor de click en el Botón de "Editar" para agregar la información de su Hogar</p>';
    }
    $ejecutar3->free();
    $conexion->close();
    ?>
    <a id="btn-modal" href="#">Editar</a>
<?php

}
