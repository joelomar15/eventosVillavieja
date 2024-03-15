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


    function insertarCliente()
    {
        $cliente = $_POST['cliente'] ?? null;
        $tipoEvento = $_POST['tipoEvento'] ?? null;
        $lugar = $_POST['lugar'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $numAsistentes = $_POST['numAsistentes'] ?? null;
        $costoPersona = $_POST['costoPersona'] ?? null;
        $confirmacion = $_POST['confirmacion'] ?? null;
        $observacion = $_POST['observacion'] ?? null;

        $mostrar = "INSERT INTO eventos VALUES (0,1,$cliente,$tipoEvento,$lugar,'$fecha',$hora,$numAsistentes,$costoPersona,'$confirmacion','$observacion','1')";
        mysqli_query($this->db, $mostrar);
        header("location:../tablas/tablaEventos.php");
    }

    
    function actualizarCliente()
    {
        $idEvento = $_POST['idEvento'] ?? null;
        $cliente = $_POST['cliente'] ?? null;
        $tipoEvento = $_POST['tipoEvento'] ?? null;
        $lugar = $_POST['lugar'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $numAsistentes = $_POST['numAsistentes'] ?? null;
        $costoPersona = $_POST['costoPersona'] ?? null;
        $confirmacion = $_POST['confirmacion'] ?? null;
        $observacion = $_POST['observacion'] ?? null;

        $mostrar = "UPDATE eventos 
        SET id_usuario='1',id_cliente='$cliente',id_tipos='$tipoEvento',
        id_lugar='$lugar',fecha='$fecha',horas='$hora',asistentes='$numAsistentes',
        costoPersona='$costoPersona',confirmacion='$confirmacion',observacion='$observacion' WHERE id=$idEvento";
        mysqli_query($this->db, $mostrar);
        header("location:../tablas/tablaEventos.php");
    }
}
