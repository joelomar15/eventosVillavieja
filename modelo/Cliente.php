<?php
class Cliente
{
    private $db;

    public function __construct()
    {
        include "conexion.php";
        $this->db = $conexion;
    }

    function listarCliente()
    {
        $mostrar = "SELECT *
    FROM
       clientes order by nombre;";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }
    function buscarCliente($id)
    {
        $mostrar = "SELECT *
    FROM
       clientes where id=$id;";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }


    function insertarCliente()
    {
        $nombre = $_POST['nombre'] ?? null;
        $telefono = $_POST['telefono'] ?? null;
        $correo = $_POST['correo'] ?? null;

        $mostrar = "INSERT INTO clientes VALUES (0,'$nombre','$telefono','$correo','1')";
        mysqli_query($this->db, $mostrar);
        header("location:../tablas/tablaCliente.php");
    }

    
    function actualizarCliente()
    {
        $idCliente = $_POST['idCliente'] ?? null;
        $nombre = $_POST['nombre'] ?? null;
        $telefono = $_POST['telefono'] ?? null;
        $correo = $_POST['correo'] ?? null;

        $mostrar = "UPDATE clientes 
        SET nombre='$nombre',telefono='$telefono',correo='$correo' WHERE id=$idCliente";
        mysqli_query($this->db, $mostrar);
        header("location:../tablas/tablaCliente.php");
    }
}
