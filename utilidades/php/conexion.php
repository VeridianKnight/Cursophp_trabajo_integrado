<?php
class Conexion {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $db = "blogg";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->usuario, $this->contrasena, $this->db);
        if ($this->conn->connect_error) {
            die("Error al conectar a la base de datos: " . $this->conn->connect_error);
        }
    }
}
?>
