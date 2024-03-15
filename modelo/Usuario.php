<?php
class Usuario
{
    private $db;

    public function __construct()
    {
        include "conexion.php";
        $this->db = $conexion;
    }

    function listarUsuario()
    {
        $mostrar = "SELECT *
    FROM
    usuarios order by nombre;";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }
    function buscarUsuario()
    {
        $usuario = $_POST['usuario'] ?? null;
        $password = $_POST['password'] ?? null;
        $mostrar = "SELECT *
    FROM
    usuarios where nombre='$usuario' and clave='$password';";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }


    function insertarCliente()
    {
    }


    function actualizarCliente()
    {
    }
}
