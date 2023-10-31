<?php
session_start();

require './manejo-de-sesion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $configSesion = new sessionManagment();

    if (isset($_POST['formulario_login'])) {
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $configSesion->iniciarSesion($username, $password);
    } elseif (isset($_POST['formulario_registro'])) {
        $username = $_POST['Username'];
        $email = $_POST['email'];
        $password = $_POST['Password'];
        
        // Registra al usuario
        $configSesion->registrarUsuario($username, $email, $password);
    }elseif (isset($_POST['dataImg'])) {
        $username = $_SESSION['username'];
        $dataImg = $_POST['dataImg'];
        $configSesion->actualizarImagenPerfil($username, $dataImg);
    }elseif(isset($_POST['eliminar_cuenta'])) {
        $username = $_SESSION['username'];
        $password = $_POST['Contrasena'];
        $passwordConf = $_POST['Contrasena-conf'];
        $configSesion->eliminarUsuario($username,$password, $passwordConf);
     }elseif(isset($_POST['cambiar_mail'])) {
        $username = $_SESSION['username'];
        $password = $_POST['Contrasena'];
        $passwordConf = $_POST['Contrasena-conf'];
        $nuevoEmail = $_POST['nuevo-mail'];
        $configSesion->editarEmail($username,$password,$passwordConf,$nuevoEmail);
     }else {
        echo '<script>console.log("errro al principi en router");</script>';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion'])) {
    $configSesion = new sessionManagment();
    
    if ($_GET['accion'] === "cerrar_sesion") {
        $configSesion->cerrarSesion();
    } else {
        // Manejar cualquier otra acción de tipo GET
    }
}
?>
