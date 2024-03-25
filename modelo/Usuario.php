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
        $password = md5($_POST['password']) ?? null;
        $mostrar = "SELECT *
    FROM
    usuarios where nombre='$usuario' and clave='$password';";
        $enviar = mysqli_query($this->db, $mostrar);
        return $enviar;
    }

    function cambiarContrasenia()
    {
        $usuId = $_SESSION['usuarioId'];
        $password = $_POST['password'] ?? null;
        if ($password !== null) {
            $password_md5 = md5($password);
            // Usa $password_md5 como la contraseña codificada en MD5
        }
        $mostrar = "UPDATE usuarios SET clave='$password_md5' WHERE id = $usuId";
        $enviar = mysqli_query($this->db, $mostrar);
        echo '<script> alert("Su contraseña fue actualizada correctamente.")</script>';
    }
}
