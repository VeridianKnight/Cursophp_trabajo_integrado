<?php
session_start(); // Iniciar la sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<script>console.log('Nombre de usuario: $username');</script>";
        echo "<script>var sessionStarted = true;</script>";
    } else {
        echo "<script>var sessionStarted = false;</script>";
    }
} else {
    echo "<script>var sessionStarted = false;</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogg | Home</title>
    <!-- Libreria Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.min.css" rel="stylesheet">

    <!-- Importacionde css -->
    <link rel="stylesheet" href="./utilidades/css/estilosHome.css">
    
</head>
<body>

    <!------------------------------------------>
    <!--        >Search bar en modo cel<      -->
    <!------------------------------------------>
    <div class="contenedor-sb-cel contenedor" id="contenedor-sb-cel">
            <div class="subcontenedor-sb">
        
                <form action="" class="formulario-sb">
                    <input type="text" name="formulario buscar" class="input-formulario-sb" placeholder=" Buscar... ">
                    <button type="submit" class="btn btn-formulario-sb">
                        <i class="ri-search-line"></i>
                    </button>
                </form>
        
            </div>
            <button class="btn btn-sb-cerrar centrar-items" id="btn-sb-cerrar">
                <i class="ri-close-line"></i>
            </button>

    </div>
    <!------------------------------------------------->
    <!--        >formulario de registro y login<      -->
    <!-------------------------------------------------->
    <?php include('./utilidades/php/formulario-registro.php') ?>
    <?php include('./utilidades/php/formulario-login.php') ?>
<!------------------------------>
<!--        >Encabezado<      -->
<!------------------------------>
    <header class="header" id="encabezado">
        <nav class="navbar contenedor">

            <!-- Logo de la pagina-->
            <a href="./home.php">
                <h1 class="logo">Blogg</h1>
            </a>
    <!------------------------------------------>
    <!--        >Search bar en modo desktop<      -->
    <!------------------------------------------>
            <div class="lista lista-iconos">

                <div class="contenedor-sb-dt oculto-en-cel">
                    <form action="" class="formulario-sb-dt centrar-items">
                        <input type="text" name="formulario-buscar-dt" class="input-formulario-sb-dt" placeholder=" Buscar... ">
                        <button type="submit" class="btn btn-formulario-sb-dt">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Menu Dropdown-->
            <div class="menu" id="menu">

                <ul class="lista">
                    <li class="item-lista">
                        <a href="" class="link-lista">
                            Crear Post
                        </a>
                    </li>
                    <li class="item-lista">
                        <a href="" class="link-lista ">
                            Categorias
                        </a>
                    </li>
                    <li class="item-lista">
                        <a href="" class="link-lista ">
                            Guardados
                        </a>
                    </li>
                    <li class="item-lista oculto-en-desktop" id="btn-login-menu">
                        <a href="" class="link-lista ">
                            Login
                        </a>
                    </li>
                    <li class="item-lista oculto-en-desktop" id="btn-registro-menu">
                        <a href="" class="link-lista ">
                            Registrarme
                        </a>
                    </li>
                    <li class="item-lista oculto-en-desktop oculto" id="btn-perfil-menu">
                        <a href="./otraspaginas/perfil.php" class="link-lista ">
                            Mi perfil
                        </a>
                    </li>
                    <li class="item-lista oculto-en-desktop oculto" id="btn-cerrar-sesion-menu">
                        <a href="" class="link-lista ">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>

        <!-- Iconos de la derecha -->
            <div class="lista lista-iconos">
                
                <button class="btn centrar-items oculto-en-desktop" id="btn-buscar">
                    <i class="ri-search-line icono-buscar"></i><!--Todo lo que tiene ri al principio es importado de remix icons-->
                </button>
                <button class="btn centrar-items oculto-en-desktop" id="btn-menu">
                <i class="ri-menu-3-line icono-abrir-menu"></i>
                    <i class="ri-close-line icono-cerrar-menu"></i>
                </button>
                <button class="btn centrar-items" id="btn-modo"><!--Botones para cambiar de modo obscuro/claro-->
                    <i class="ri-sun-line icono-sol"></i>
                    <i class="ri-moon-line icono-luna"></i>
                </button>
                <a href="" class="link-lista btn btn-login oculto-en-cel" id="btn-login"><span class="borde-g" >Log-in</span></a>
                <a href="" class="link-lista btn btn-registro oculto-en-cel" id="btn-registro"><span class="borde-g">Registrarme</span</a>
                <a href="./otraspaginas/perfil.php" class="link-lista btn btn-perfil oculto-en-cel oculto" id="btn-perfil"><span class="borde-g">Perfil</span</a>
                <a href="./utilidades/php/router.php?accion=cerrar_sesion" class="link-lista btn btn-cerrar-sesion oculto-en-cel oculto" id="btn-cerrar-sesion"><span class="borde-g">Cerrar Sesión</span</a>
            </div>

        
        </nav>
    </header>



<!-------------------------->
<!--        >Footer<      -->
<!-------------------------->

<!-------------------------------->
<!--      >Importar Scripts<    -->
<!-------------------------------->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./utilidades/js/homeJs.js"></script>
</body>
</html>