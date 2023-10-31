<?php
require 'conexion.php';

class sessionManagment
{
    private $conexion;


    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function iniciarSesion($username, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
        $result = $this->conexion->conn->query($sql);

        if ($result->num_rows === 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $this->conexion->conn->close();
            header("Location: ../../home.php");
            exit;
        } else {
            echo "Nombre de usuario no encontrado.";
            sleep(2);
            $this->conexion->conn->close();
            header("Location: ../../home.php");
            exit;
        }
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        $this->conexion->conn->close();
        header("Location: ../../home.php");
        exit;
    }

    public function registrarUsuario($username, $email, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email'";
        $result = $this->conexion->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "El nombre de usuario o la dirección de correo electrónico ya están en uso.";
            sleep(2);
            $this->conexion->conn->close();
            header("Location: ../../home.php");
            exit;
        } else {
            $insert_sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($this->conexion->conn->query($insert_sql) === true) {
                echo "Registro exitoso.";
                $this->pfp_defaul($username);
                $this->iniciarSesion($username, $password);
            } else {
                echo "Error en el registro: " . $this->conexion->conn->error;
                $this->conexion->conn->close();
                exit;
            }
        }
    }

    public function eliminarUsuario($username, $password, $passwordConf)
    {
        if ($password == $passwordConf) {
            $sql = "SELECT * FROM usuarios WHERE username = '$username'";
            $result = $this->conexion->conn->query($sql);
            $resultArray = $result->fetch_assoc();
            $resultPswrd = $resultArray['password'];
            $resultId = $resultArray['id'];
            if (trim($password) == trim($resultPswrd)) {
                $sqlDltImg = "DELETE FROM imagenes_perfil WHERE usuario_id = '$resultId'";
                $result = $this->conexion->conn->query($sqlDltImg);
                $sqlDltUsuario = "DELETE FROM usuarios WHERE id = '$resultId'";
                $result = $this->conexion->conn->query($sqlDltUsuario);
                $this->cerrarSesion();
            } else {
                echo "contraseña incorrecta";
                $this->conexion->conn->close();
                exit;
            }
        } else {
            echo "las contraseñas no coinciden";
            $this->conexion->conn->close();
            exit;
        }
    }

    public function editarEmail($username, $password, $passwordConf, $nuevoEmail)
    {
        if ($password == $passwordConf) {
            $sql = "SELECT * FROM usuarios WHERE username = '$username'";
            $result = $this->conexion->conn->query($sql);
            $resultArray = $result->fetch_assoc();
            $resultPswrd = $resultArray['password'];
            $resultId = $resultArray['id'];
            if (trim($password) == trim($resultPswrd)) {
                $sqlEditar = "UPDATE usuarios SET email = '$nuevoEmail' WHERE id = '$resultId'";
                $result = $this->conexion->conn->query($sqlEditar);
                $this->conexion->conn->close();
                header("Location: ../../home.php");
                exit;
            } else {
                echo "contraseña incorrecta";
                echo ($password);
                echo ($resultPswrd);
                $this->conexion->conn->close();
                exit;
            }
        } else {
            echo "las contraseñas no coinciden";
            $this->conexion->conn->close();
            exit;
        }
    }

    private function editarImagenPerfil($id, $rutaImagen)
    {
        // verifica si el usuario ya tiene una imagen de perfil
        $sql = "SELECT * FROM imagenes_perfil WHERE usuario_id = '$id'";
        $result = $this->conexion->conn->query($sql);

        if ($result->num_rows === 1) { //si tiene
            $updateSql = "UPDATE imagenes_perfil SET ruta_imagen = '$rutaImagen' WHERE usuario_id = '$id'";
            if ($this->conexion->conn->query($updateSql) === true) {
                echo "Imagen de perfil actualizada con éxito.";
                header("Location: ../../otraspaginas/perfil.php");
            } else {
                echo 'Error al actualizar la imagen de perfil:' . $this->conexion->conn->error;
            }
        } else { // Si no
            $insertSql = "INSERT INTO imagenes_perfil (usuario_id, ruta_imagen) VALUES ('$id', '$rutaImagen')";
            if ($this->conexion->conn->query($insertSql) === true) {
                echo 'Imagen de perfil agregada con éxito.';
            } else {
                echo 'Error al agregar la imagen de perfil:' . $this->conexion->conn->error;
            }
        }
    }

    public function actualizarImagenPerfil($username, $rutaImagen)
    {
        $sql = "SELECT id FROM usuarios WHERE username = '$username'";
        $result = $this->conexion->conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $this->editarImagenPerfil($id, $rutaImagen);
        } else {
            echo 'no funcion actualizarImagenPerfil';
        }
    }


    private function pfp_defaul($username)
    {
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $this->conexion->conn->query($sql);
        $get_array = $result->fetch_assoc();
        $userId = $get_array['id'];
        if ($userId) {
            $insert_sql = "INSERT INTO imagenes_perfil (usuario_id, ruta_imagen) VALUES ('$userId', '/img/pfp/pfp-0.png')";
            if ($this->conexion->conn->query($insert_sql) === true) {
                echo "Imagen de perfil por defecto establecida.";
            } else {
                echo "Error al establecer la imagen de perfil por defecto: " . $this->conexion->conn->error;
            }
        } else {
            echo "Error inesperado, inténtelo de nuevo más tarde.";
        }
    }
}
?>