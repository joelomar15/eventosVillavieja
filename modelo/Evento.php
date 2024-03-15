<?php
class Evento
{
    private $db;

    public function __construct()
    {
        include "conexion.php";
        $this->db = $conexion;
    }

    function buscarEvento($id) {
        $mostrar="select * from eventos where id=$id";
        $enviar=mysqli_query($this->db,$mostrar);
        return $enviar;
    }
    function listarEvento()
    {
        $mostrar = "SELECT
        ev.id AS idEvento,
        ev.fecha,
        ev.horas,
        ev.asistentes,
        ev.costoPersona,
        ev.confirmacion,
        ev.observacion,
         ev.estado,
        c.nombre AS nombreCliente,
        l.nombre AS nombreLugar,
        t.nombre AS nombreTipo
    FROM
        eventos ev
        JOIN clientes c ON ev.id_cliente = c.id
        JOIN lugar l ON ev.id_lugar = l.id
        JOIN tipos t ON ev.id_tipos = t.id;";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }

    function listarTipo()
    {
        $mostrar = "SELECT * FROM  tipos order by nombre";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }

    function listarLugar()
    {
        $mostrar = "SELECT * FROM lugar order by nombre";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }

    function insertarEvento()
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

    
    function actualizarEvento()
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
