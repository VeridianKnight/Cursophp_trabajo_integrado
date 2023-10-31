<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedor-formulario-login " id="contenedor-formulario-login">
        
        <div class="subcontenedor-formulario-login borde-g">

            <form action="./utilidades/php/router.php" method="post" class="formulario-login">
                <h4>Iniciar Seccion</h4>
                <label for="username-txt">
                    Nombre de usuario: 
                </label>
                <input type="text" name="Username" class="username-txt" id="username-txt-lg">
                <label for="username-txt">
                    Contraseña: 
                </label>
                <input type="password" name="Password" class="password-txt" id="password-txt-lg">
                <input type="hidden" name="formulario_login" value="1">
                <button type="submit" class="btn btn-formulario-login borde-g">
                    Ingresar!
                </button>
            </form>

        </div>
        <button class="btn btn-lg-cerrar centrar-items" id="btn-lg-cerrar">
            <i class="ri-close-line"></i>
        </button>

    </div>
    
</body>
</html>