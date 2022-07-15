<?php

//Funciones utilizadas para traer información de la Base de Datos



/* ----------------------------- CLIENTE ------------------------------ */

/* Traer el Nombre y Apellidos del Cliente para el Nabvar cuando Inicia Sesión */
function getUserName()
{
    //Conexión por PDO
    require 'conexiondbPDO.php';

    //Consulta SQL
    $sql = "SELECT nombre, apellidos 
              FROM cliente 
              WHERE id= '" . $_SESSION["id"] . "'  ";

    //Preparar la consulta SQL
    $ejecutar = $conexion->prepare($sql);

    //Ejecutar la consulta SQL en la BD
    $ejecutar->execute();

    //Traer los datos de la consulta
    $row = $ejecutar->fetch(PDO::FETCH_OBJ);
    echo $row->nombre . " " . $row->apellidos;

    //Cerrar la conexión
    $conexion = null;
}

/* Obtener las Solicitudes que ha realizado el Cliente */
function getSolicitudes()
{
    //Conexión por PDO
    require 'conexiondbPDO.php';

    //Consulta SQL
    $sql = "SELECT * FROM solicitudes 
              INNER JOIN cliente ON cliente.id = solicitudes.cliente_id
              WHERE '" . $_SESSION["id"] . "' = solicitudes.cliente_id ";

    //Preparar la consulta SQL
    $ejecutar = $conexion->prepare($sql);

    //Ejecutar la consulta SQL en la BD
    $ejecutar->execute();

    //Traer los datos de la consulta
    if ($ejecutar->rowCount() > 0) {

        while ($filas = $ejecutar->fetch(PDO::FETCH_OBJ)) {

?>
            <!-- Mediante el WHILE se traen las Solicitudes que haya realizado el Cliente  -->
            <a href="detalles-solicitud.php?idSolicitud=<?php echo $filas->id_sol; ?>">
                <div class="items-solicitudes" id="items-solicitudes">
                    <ul>
                        <?php

                        /* Consulta para saber el Estado de la Solicitud y cambiar el Color */
                        $estatus = $filas->estado;

                        if ($estatus === "Publicado") {
                            echo '<li id="estatusOn"></li>';
                        } else if ($estatus === "Cancelado") {
                            echo '<li id="estatusOff"></li>';
                        } else {
                            echo '<li id="estatusOther"></li>';
                        }

                        ?>
                        <li>
                            <p class=" titulo-solicitud"><?php echo $filas->estado; ?></p>
                            <p><?php echo $filas->fecha_solicitud; ?></p>
                        </li>
                        <li id="detalles-solicitud">
                            <p class="titulo-solicitud">Detalles</p>
                            <p><?php echo $filas->detalles_servicio; ?></p>
                        </li>
                        <li>
                            <p class="titulo-solicitud">Realizado por</p>
                            <?php

                            /* Traer el Nombre y Apellidos del Empleado que haya tomado la Solicitud */

                            $sql2 = "SELECT nombre, apellidos FROM empleados INNER JOIN solicitudes
                         ON empleados.id = solicitudes.empleado_id WHERE empleados.id = '" . $filas->empleado_id . "' ";

                            $ejecutar2 = $conexion->prepare($sql2);
                            $ejecutar2->execute();


                            if ($ejecutar2->rowCount() > 0) {
                                $filas2 = $ejecutar2->fetch(PDO::FETCH_OBJ);
                            ?>
                                <p><?php echo $filas2->nombre, " ", $filas2->apellidos; ?></p>
                            <?php
                            } else {
                                /* Si no se ha tomado la Solicitud por un Empleado */
                                echo '
                            <p>N/a</p>
                            ';
                            }
                            ?>

                        </li>
                        <li>
                            <p class="titulo-solicitud">Valor</p>
                            <p><?php echo $filas->valor_estimado; ?></p>
                        </li>
                    </ul>

                </div>
            </a>
        <?php
        }
        //Si el Cliente NO ha realizado alguna solicitud
    } else {
        echo '<div class="title-sin-servicios"><h1>Aún no tiene Servicios</h1></div>';
    }

    $conexion = null;
}

/* Obtener los Detalles de la solicitud que ha realizado el Cliente */
function getDetallesSolicitudes()
{
    //Conexión PDO
    require 'conexiondbPDO.php';

    //SQL
    $sql = "SELECT * FROM solicitudes 
            WHERE id_sol = '" . $_GET['idSolicitud'] . "' ";

    //Preparar la consulta SQL
    $ejecutar = $conexion->prepare($sql);

    //Ejecutar el SQL en la BD
    $ejecutar->execute();

    //Traer la información de la consulta
    if ($ejecutar->rowCount() > 0) {

        while ($filas = $ejecutar->fetch(PDO::FETCH_OBJ)) {

        ?>
            <!-- Detalles de la Solicitud que fue seleccionada -->
            <div class="detalles-solicitud">
                <a href="inicio.php" id="btn-volver">Volver</a>
                <ul class="seccion-solicitud seccion-solicitud">
                    <li>
                        <h2>Detalles del Servicio</h2>
                    </li>
                    <li>
                        <p>Publicado</p>
                        <p><?php echo $filas->fecha_solicitud; ?></p>
                    </li>
                    <li>
                        <p>Detalles</p>
                        <p><?php echo $filas->detalles_servicio; ?></p>
                    </li>
                    <li>
                        <p>Valor</p>
                        <p><?php echo $filas->valor_estimado; ?></p>
                    </li>
                    <li>
                        <a href="" id="download-pdf">Generar Factura <img src="img/iconos/icon-download.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="dataBase/cancelar-solicitud.php" id="cancelar-servicio">Cancelar el Servicio</a>
                    </li>
                </ul>

                <?php

                // Traer la información del Empleado que haya tomado dicha solicitud

                require_once 'conexiondbPDO.php';

                //SQL
                $sql2 = "SELECT nombre, apellidos, numero_celular, foto_perfil 
                        FROM empleados 
                        INNER JOIN solicitudes 
                        ON solicitudes.empleado_id = empleados.id 
                        WHERE solicitudes.id_sol = $filas->id_sol  ";

                $ejecutar = $conexion->prepare($sql2);
                $ejecutar->execute();

                if ($ejecutar->rowCount() > 0) {

                    while ($filas2 = $ejecutar->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <!-- Traer la información del empleado -->
                        <ul class="seccion-empleado seccion-solicitud">
                            <li>
                                <h2>Realizado Por</h2>
                            </li>
                            <li>
                                <p><?php echo $filas2->nombre, " ", $filas2->apellidos; ?></p>
                            </li>
                            <li>
                                <p><?php echo $filas2->numero_celular; ?></p>
                            </li>
                            <li><img src="dataBase/fotoPerfil/<?php echo $filas2->foto_perfil; ?>" alt="" /></li>
                            <li>
                                <a href="">Reportar</a>
                            </li>
                        </ul>
                <?php
                    }
                } else {

                    //Si Ningún empleado a tomado la Solicitud
                    echo '
                    <ul class="seccion-empleado seccion-solicitud">
                        <li>
                            <h2>Tu solicitud no ha sido aceptada por uno de nuestros empleados, por favor espera a que sea aceptado.</h2>
                        </li>
                    </ul>
                    ';
                }
                ?>
            </div>

        <?php
        }
    }
    $conexion = null;
}

/* Traer toda la información Básica del Cliente */
function getDatosBasicosCuenta()
{
    //Conexión PDO
    require 'conexiondbPDO.php';

    if (isset($_SESSION['id'])) {

        //SQL
        $sql = "SELECT * FROM cliente 
               WHERE id = '" . $_SESSION["id"] . "' ";

        //Preparar el SQL
        $ejecutar = $conexion->prepare($sql);

        //Ejecutar la consulta SQL en la BD
        $ejecutar->execute();

        $filas = $ejecutar->fetch(PDO::FETCH_OBJ);

        ?>
        <!-- Traer los datos básicos del Cliente que tenga iniciada la $_SESSION -->
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

/* Traer la información del Hogar | Cliente */
function getDatosHogarCuenta()
{
    //Conexión PDO
    require 'conexiondbPDO.php';

    //SQL
    $sql = "SELECT * FROM cliente_hogar 
             INNER JOIN cliente 
             WHERE '" . $_SESSION["id"] . "' = cliente_hogar.cliente_id ";

    //Preparar el SQL
    $ejecutar = $conexion->prepare($sql);

    //Ejecutar la consulta SQL en la BD
    $ejecutar->execute();

    if ($ejecutar->rowCount() > 0) {
        $filas = $ejecutar->fetch(PDO::FETCH_OBJ);
    ?>
        <!-- Traer la información del Hogal | Cliente -->
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

        //Si el Cliente aún NO ha registrado la información del Hogar
    } else {
        echo '<p id="else-while">Sin datos, por favor de click en el Botón de "Editar" para agregar la información de su Hogar</p>';
    }
    $conexion = null;
    ?>
    <a id="btn-modal" href="#">Editar</a>
    <?php

}


/* ---------------------------------------------------------------- */





/* ----------------------------- EMPLEADO ------------------------------ */

/* Traer el Nombre y Apellidos del Empleado para el Nabvar cuando Inicia Sesión */
function getUserNameEmpleado()
{
    require 'conexiondbPDO.php';

    $sql = "SELECT nombre, apellidos
            FROM empleados 
            WHERE id = '" . $_SESSION['idEmpleado'] . "' ";

    $ejecutar = $conexion->prepare($sql);

    $ejecutar->execute();

    $row = $ejecutar->fetch(PDO::FETCH_OBJ);
    echo $row->nombre . " " . $row->apellidos;

    $conexion = null;
}

/* Traer toda la información Básica del Empleado */
function getDatosBasicosCuentaEmpleado()
{
    require 'conexiondbPDO.php';

    if (isset($_SESSION['idEmpleado'])) {

        $sql = "SELECT * FROM empleados 
               WHERE id = '" . $_SESSION["idEmpleado"] . "' ";
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
