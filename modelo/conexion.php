<?php
	$conexion = new mysqli("localhost","root","","eventosVillavieja"); 
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫"; 
	}
?>