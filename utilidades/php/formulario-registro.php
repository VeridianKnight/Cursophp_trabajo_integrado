<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedor-formulario-registro contenedor" id="contenedor-formulario-registro">
        
        <div class="subcontenedor-formulario-registro borde-g">

            <form action="./utilidades/php/router.php" class="formulario-registro" method="post">
                <h4>Formulario Registro</h4>
                <label for="username-txt">
                    Nombre de usuario: 
                </label>
                <input type="text" name="Username" class="username-txt" id="username-txt" placeholder="nombre de usuario">
                <label for="email-txt">
                    Direccion de email: 
                </label>
                <input type="email" name="email" class="email-txt" id="email-txt" placeholder="correo@mail.com">
                <label for="username-txt">
                    Contraseña: 
                </label>
                <input type="password" name="Password" class="password-txt" id="password-txt" placeholder="Password">
                <p>Estoy de acuerdo con <a href="">los terminos y condiciones</a></p>
                <input type="hidden" name="formulario_registro" value="1">
                <button type="submit" class="btn btn-formulario-registro borde-g">
                    Registrarme!
                </button>
                <p id="go2login"><a href="">Ya tengo cuenta</a></p>
            </form>

        </div>
        <button class="btn btn-rg-cerrar centrar-items" id="btn-rg-cerrar">
            <i class="ri-close-line"></i>
        </button>

    </div>
    
</body>
</html>