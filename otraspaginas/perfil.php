<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Siel usuario no ha iniciado, lo redirige a la home
    header("Location: ../home.php");
    exit();
}

// Conecta a la base de datos (esto lo pongo para testear, remplazalo con lo que sea necesario)
$db = new mysqli("localhost", "root", "", "blogg");

if ($db->connect_error) {
    die("Error al conectar a la base de datos: " . $db->connect_error);
}

// Obtén el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Consulta SQL para obtener la información del usuario (de nuevo, si es nesesario remplasarlo remplasalo)
$sql = "SELECT * FROM usuarios WHERE username = '$username'";
$result = $db->query($sql);


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc(); //obtengo los datos del usuario en un array

    // Para la imagen de perfil
    $userId = $row['id']; //obtengo el id del usuario
    $sqlImg = "SELECT * FROM imagenes_perfil WHERE usuario_id = '$userId'";
    $resultImg = $db->query($sqlImg); //consigo los datos de la tabla de imagenes de perfil

    if ($resultImg->num_rows === 1) {
        $resultImgArr = $resultImg->fetch_assoc(); //consigo la data de la tabla de imagenes de perfil  en un array
        $imgUrl = "../utilidades/" . $resultImgArr['ruta_imagen']; //obtengo la ruta de la image y le agrego lo necesario para que funcione desde esta pagina
    }
} else {
    $row = array(); //retorna un array vacio
}

$db->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../utilidades/css/estilosPerfil.css">
</head>

<body>
    <!----------------------------------------->
    <!--        >cambiar imagen de perfil<   -->
    <!----------------------------------------->
    <div class="contenedor contenedor-cambio-pfp" id="contenedor-cambio-pfp">
        <h1>Seleccione una nueva imagen de perfil o precione ESC para volver </h1>
        <div id="contenedor-imagen">
            <a href="#" class="link-img" data-img="img/pfp/pfp-0.png">
                <img src="../utilidades/img/pfp/pfp-0.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-1.png">
                <img src="../utilidades/img/pfp/pfp-1.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-2.png">
                <img src="../utilidades/img/pfp/pfp-2.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-3.png">
                <img src="../utilidades/img/pfp/pfp-3.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-4.png">
                <img src="../utilidades/img/pfp/pfp-4.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-5.png">
                <img src="../utilidades/img/pfp/pfp-5.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-6.png">
                <img src="../utilidades/img/pfp/pfp-6.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-7.png">
                <img src="../utilidades/img/pfp/pfp-7.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-8.png">
                <img src="../utilidades/img/pfp/pfp-8.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-9.png">
                <img src="../utilidades/img/pfp/pfp-9.png" alt="Imagen 1">
            </a>
            <a href="#" class="link-img" data-img="img/pfp/pfp-10.png">
                <img src="../utilidades/img/pfp/pfp-10.png" alt="Imagen 1">
            </a>
        </div>
        <div id="imagen-selec">
            <!-- Aquí se mostrará el valor seleccionado -->
        </div>
    </div>

     <!------------------------------------------------------>
    <!--        >Esta seguro de que quiere eliminar<      -->
    <!------------------------------------------------------>
    <div class="esta-seguro" id="esta-seguro">
        <div class="subcontenedor-eliminar">
            <h1 class="eliminar-tx" id="eliminar-text"> Esta por eliminar su cuenta, si esta seguro que quiere continuar ingrese su contraseña: </h1>
            <form action="../utilidades/php/router.php"  method="post"  class="formulario-eliminar">
                <label for="contrasena">Ingrese su contraseña:</label>
                <input type="password" name="Contrasena" class="contrasena" id="contrasena" placeholder="contraseña ">
                <label for="contrasena">Confirme su contraseña:</label>
                <input type="password" name="Contrasena-conf" class="contrasena-conf" id="contrasena-conf" placeholder="contraseña ">
                <input type="hidden" name="eliminar_cuenta" value="1">
                <button type="submit" class="btn btn-formulario-eliminar">
                    Eliminar mi cuenta
                </button>
            </form>

        </div>
        <button class="btn btn-cerrar centrar-items" id="btn-cerrar">
            <i class="ri-close-line"></i>
        </button>
    </div>

     <!------------------------------>
    <!--        >CAMBIAR MAILr<      -->
    <!---------------------------------->
    <div class="cambiar-mail" id="cambiar-mail">
        <div class="subcontenedor-cambiar">
            <h1 class="cambiar-tx" id="cambiar-text"> Esta por cambiar la direccion de correo asociada, ingrese su contraseña para confirmar: </h1>
            <form action="../utilidades/php/router.php" method="post" class="formulario-cambiar">
                <label for="contrasena">Ingrese su contraseña:</label>
                <input type="password" name="Contrasena" class="contrasena" id="contrasena" placeholder="contraseña ">
                <label for="contrasena">Confirme su contraseña:</label>
                <input type="password" name="Contrasena-conf" class="contrasena-conf" id="contrasena-conf" placeholder="contraseña ">
                <label for="nuevo-mail">Nueva direccion de correo:</label>
                <input type="email" name="nuevo-mail" class="nuevo-mail" id="nuevo-mail" placeholder="correo@mail.com ">
                <input type="hidden" name="cambiar_mail" value="1">
                <button type="submit" class="btn btn-formulario-cambiar">
                    Actualizar mi email!
                </button>
            </form>

        </div>
        <button class="btn btn-cerrar centrar-items" id="btn-cerrar-mail">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <!------------------------------>
    <!--        >Encabezado<      -->
    <!------------------------------>
    <header class="header">
        <nav class="navbar">
            <button class="btn centrar-items" id="btn-modo"><!--Botones para cambiar de modo obscuro/claro-->
                <i class="ri-sun-line icono-sol"></i>
                <i class="ri-moon-line icono-luna"></i>
            </button>
            <a href="../home.php" class="go-back borde-g" id="go-back">Volver al inicio</a>
            <a href="../utilidades/php/router.php?accion=cerrar_sesion" class="cerra-sesion borde-g"
                id="cerrar-sesion">Cerrar Sesion</a>
        </nav>
    </header>

    <!------------------------------------------------------------------>
    <!--        >Cuerpo con los datos del usuario y los botones<      -->
    <!------------------------------------------------------------------>
    <section class="perfil_usuario">
        <div class="contenedor contenedor-perfil-usuario">

            <div class="pfp borde-g">
                <h2>
                    <a href="#">
                        <?php echo '@' . $username; ?>
                    </a>
                </h2>
                <img src="<?php echo $imgUrl; ?>" alt="" srcset="">
                <button class="pfp-cambio borde-g btn" id="pfp-cambio">
                    Cambiar Imagen De Perfil
                </button>
            </div>

            <div class="datos_usuario borde-g">
                <div class="emai">
                    <h1 class="email-txt"> Email: </h1>
                    <h1 class="user-email">
                        <?php echo $row['email']; ?>
                    </h1>
                </div>
                <div class="btns">
                    <button class="cambiar-correo borde-g" id="cambiar-correo">
                        Cambiar mi correo
                    </button>
                    <button class="eliminar-cuenta borde-g" id="eliminar-cuenta">
                        Eliminar mi cuenta
                    </button>
                </div>
            </div>

            <div class="post_usuario borde-g">
                <h1 class="borde-g"> Mis Posts: </h1>
                <div class="no-post">
                    <p> No hay post publicados por este usuario...</p>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../utilidades/js/perfilJs.js"></script>
</body>

</html>