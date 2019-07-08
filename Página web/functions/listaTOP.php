<?php
include '../config/connection.php';
include 'establecerIdioma.php'; 
connect();

//Iniciar variables de sesión.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//Almacenar la variable de sesión que contiene el idioma.
if (isset($_SESSION["idioma"])){
  $idiomaActual = $_SESSION["idioma"];
} else {
  $idiomaActual = "ES";
}
//Variable que contendrá el resultado de la búsqueda.
$text = '';
$codigoHTML = '';
//Consulta para recoger la información del videojuego.

if (isset($_SESSION["id_usuario"])){
  $idUser = $_SESSION["id_usuario"];
}

$sql = "SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, videojuegos.FECHA_LANZAMIENTO";
$sql .= " FROM top JOIN videojuegos ON top.ID_VIDEOJUEGO = videojuegos.ID_VIDEOJUEGO";
$sql .= " LEFT JOIN compañia ON videojuegos.COMPAÑIA = compañia.ID_COMPAÑIA";
$resultSQL = mysqli_query($connection, $sql);
$datos = array();

$arrayResultados = [];
while ($filaDatos = mysqli_fetch_assoc($resultSQL)) {
	$datos = array();
	$datos[] = $filaDatos['NOMBRE'];
	$datos[] = $filaDatos['NOMBRE_COMPAÑIA'];
	$datos[] = $filaDatos['FECHA_LANZAMIENTO'];
	
	$arrayResultados[] = $datos;
}
mysqli_free_result($resultSQL);
mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>