<?php include "header.php" ?>
<div class="titulo">
  <h1 class="text-center">Gestión de Incidencias</h1>
</div>
<div class="container mt-5">
  <h3 class="text-center"> IES Antonio Machado</h3>
  <div class="formulario">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control">
      </div>
      <div class="mb-3">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" name="contrasena" class="form-control">
      </div>
      <div class="mb-2">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </form>
  </div>
</div>


<?php
if ($_POST) {
  $usuario = htmlspecialchars($_POST["usuario"]);
  $contrasena = htmlspecialchars($_POST["contrasena"]);
  // Intentamos la conexión con MySQL
  $enlace = mysqli_connect("sql307.thsite.top", "thsi_35748566", "GKSmx027", "thsi_35748566_personas");

  if ($enlace) {
    //$query = "SELECT * FROM usuarios WHERE username='".$_POST['usuario']."' AND password='".$_POST['contrasena']."'";
    $query = "SELECT * FROM usuarios WHERE username='" . mysqli_real_escape_string($enlace, $usuario) . "' AND password='" . mysqli_real_escape_string($enlace, $contrasena) . "'";
    $result = mysqli_query($enlace, $query);
    if (mysqli_num_rows($result) == 1) {
      header("location: includes/home.php");
      //echo "<p>Bienvenido " . $usuario . "</p>";
      session_start();
      $_SESSION["user"]=$usuario;
    } else {
      echo "<div class='container2'><div class='custom-alert alert alert-primary d-flex align-items-center' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
          <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
        </svg>
        <div>
          Acceso denegado
        </div>
      </div>
      </div>";
    }
  } else {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
  }
  
}
?>

<style>
  /*-------------Formulario-----------*/
  .formulario {
    width: 90%;
    margin: 0 auto;
  }

  .form-control {
    width: 100%;
    /* Ocupa todo el ancho del contenedor */
    height: 40px;
    padding: 10px;
    /* Ajusta el relleno según tus necesidades */
    border-radius: 10px;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .custom-alert {
    display: flex;
    align-items: center;
    background-color: #e2f1ff;
    /* Cambia el color de fondo según tus preferencias */
    border: 1px solid #4b85bb;
    /* Borde ligero */
    border-radius: 5px;
    /* Bordes redondeados */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Sombra con color transparente */
    padding: 10px;
    /* Relleno interno */
    max-width: 250px;
    /* Ancho máximo del contenedor */
    animation: fadeIn 0.5s ease-out;
    /* Aplica la animación */
  }

  .custom-alert svg {
    width: 20px;
    /* Tamaño del icono */
    height: 20px;
    margin-right: 8px;
    /* Espacio entre el icono y el texto */
    fill: #1c5a91;
    /* Color del icono */
  }

  .custom-alert div {
    font-size: 14px;
    /* Tamaño del texto */
    color: #1c5a91;
    /* Color del texto */
  }

  /*------------body-------------*/
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    /* background-color: #534859; */
    background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1)
  }

  /*----------Contenedor--------*/
  .container {
    width: 100%;
    max-width: 300px;
    padding: 30px;
    border-radius: 7px;
    /* Bordes redondeados */
    box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.3);
    margin: 20px;
    background-color: #f3f4f5;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .container2 {
    position: absolute;
    top: 53%;
    left: 51%;
    transform: translate(-50%, -50%);
    height: 5px;
  }

  /*------------Titulo------------*/
  .titulo {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  h1 {
    font-family: 'Paytone One', sans-serif;
    color: #fff;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    letter-spacing: 1px;
    text-align: center;
    margin-bottom: 20px;
  }

  h3 {
    font-family: 'Norican', cursive;
    color: #25424c;
    margin-bottom: 30px;
  }

  /*----------Boton------------*/
  .mb-2 {
    text-align: center;
  }

  .btn {
    background-color: #b2bfcf;
    border: 0px;
    padding: 10px;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    /* Estilos específicos para pantallas pequeñas (por ejemplo, dispositivos móviles) */
}
</style>
<?php include "footer.php" ?>