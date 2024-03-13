<?php
	$conexion = new mysqli("localhost","root","","proyeccionesgfs"); 
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫";
	}
?>