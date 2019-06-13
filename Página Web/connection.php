<?php 
	$host = "localhost";
	$db = "qualificajocs";
	$user = "root";
	$pass = "";
	$link = mysqli_connect($host, $user, $pass, $db);

	if(!link) {
		echo "Error: no se pudo conectar a MySQL." . PHP_EOL;
		echo "Errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "Error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
?>