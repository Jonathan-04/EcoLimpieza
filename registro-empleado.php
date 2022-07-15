<!-- Este formulario NO está en funcionamiento
el registro debería ser realizado por el Administrador 
con la información traida de las Hojas de Vida que envían los posibles empleados -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/iconos/iconEco.png" type="image/x-icon" />
  <title>Registro Empleado</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/registro-empleado.css" />
</head>

<body>
  <!-- Contenedor del Formulario -->
  <div class="container-formulario">
    <!-- Formulario -->
    <div class="formulario-registro">
      <h1>Registro</h1>
      <form action="" method="POST">
        <div class="titulo-form">
          <p>Datos Básicos</p>
        </div>
        <!-- Items del Formulario -->
        <div class="items-form">
          <div class="items">
            <p>Tipo Documento</p>
            <select name="" id="" required>
              <option value="">Seleccione tipo</option>
              <option value="">C.C</option>
              <option value="">Pasaporte</option>
              <option value="">Cédula Extranjero</option>
            </select>
          </div>
          <!-- Items del Formulario -->
          <div class="items">
            <p>Número Documento</p>
            <input type="text" name="" id="" required />
          </div>
          <div class="items">
            <p>Nombre:</p>
            <input type="text" name="" id="" required />
          </div>
          <div class="items">
            <p>Apellidos:</p>
            <input type="text" name="" id="" required />
          </div>
          <div class="items">
            <p>Email</p>
            <input type="email" name="" id="" required />
          </div>
          <div class="items">
            <p>Contraseña</p>
            <input type="password" name="" id="" required />
          </div>
        </div>
        <!-- Items del Formulario -->
        <div class="titulo-form">
          <p>Datos Complementarios</p>
        </div>
        <div class="items-form-2">
          <div class="items">
            <p>Número Celular:</p>
            <input type="text" name="" id="" required />
          </div>
          <div class="items">
            <p>EPS:</p>
            <input type="text" name="" id="" required />
          </div>
          <div class="items">
            <p>Meses Experiencia:</p>
            <input type="number" name="" id="" required />
          </div>
          <div class="items">
            <p>Direccion:</p>
            <input type="text" name="" id="" required />
          </div>
        </div>
        <div class="check-form">
          <input type="checkbox" name="" id="" required />
          <p>Acepto los <a href="">Terminos y Condiciones</a></p>
        </div>
        <input type="submit" value="Registrarme" />
      </form>
    </div>

    <!-- Sección Secundaria -->
    <div class="opciones-registro">
      <h1>BIENVENIDO!!</h1>
      <ul>
        <li>Empezar</li>
        <li>Inicia Sesión con</li>
        <li>
          <a href=""><img src="img/iconos/icon-google.png" alt="" /></a>
          <a href=""><img src="img/iconos/icon-facebook.png" alt="" /></a>
        </li>
        <li>
          ¿Ya tienes una Cuenta?
          <a href="login.php"> Inicia Sesión aquí!!</a>
        </li>
      </ul>
    </div>
  </div>
</body>

</html>