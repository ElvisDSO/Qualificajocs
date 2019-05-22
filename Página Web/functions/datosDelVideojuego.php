<?php
include '.../config/connection.php';
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

$sqlDatos = "SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, videojuegos.FECHA_LANZAMIENTO, videojuegos.N_JUGADORES, videojuegos.RATING, videojuegos.ID_VIDEOJUEGO";
$sqlDatos .= " FROM videojuegos JOIN compañia ON videojuegos.COMPAÑIA = compañia.ID_COMPAÑIA";
$sqlDatos .= " WHERE";

if (isset($_POST["id"])){
	$id = $_POST["id"];
	$sqlDatos .= " ID_VIDEOJUEGO = ".$id;
}

$sqlGenero = "SELECT videojuegos.ID_VIDEOJUEGO, genero.NOMBRE_GENERO". $idiomaActual;
$sqlGenero .= " FROM videojuegos JOIN genero_videojuego ON videojuegos.ID_VIDEOJUEGO = genero_videojuego.ID_VIDEOJUEGO";
$sqlGenero .= " LEFT JOIN genero ON genero_videojuego.ID_GENERO = genero.ID_GENERO";
$sqlGenero .= " WHERE ID_VIDEOJUEGO = ".$id;

$sqlPlataforma = "SELECT videojuegos.ID_VIDEOJUEGO, plataforma.NOMBRE_PLATAFORMA";
$sqlPlataforma .= " FROM videojuegos JOIN plataforma_videojuego ON videojuegos.ID_VIDEOJUEGO = plataforma_videojuego.ID_VIDEOJUEGO";
$sqlPlataforma .= " LEFT JOIN plataforma ON plataforma_videojuego.ID_PLATAFORMA = plataforma.ID_PLATAFORMA";
$sqlPlataforma .= " WHERE ID_VIDEOJUEGO = ".$id;


$resultDatos = mysqli_query($connection, $sqlDatos); //Ejecución de la consulta
$datosReturn = array();
$resultGenero = mysqli_query($connection, $sqlGenero);
$generoReturn = array();
$resultPlataforma = mysqli_query($connection, $sqlPlataforma);
$plataformaReturn = array();

//Si hay resultados...
$codigoHTML = "";
$arrayResultados = [];
$datos = array();

while($filaDatos = mysqli_fetch_assoc($resultDatos)){
	$datos['data'] = $filaDatos['NOMBRE'];
	$datos['data'] = $filaDatos['NOMBRE_COMPAÑIA'];
	$datos['data'] = $filaDatos['FECHA_LANZAMIENTO'];
	$datos['data'] = $filaDatos['RATING'];
	$datos['data'] = $filaDatos['RATING'];
	$datos['data'] = $filaDatos['ID_VIDEOJUEGO'];
	$arrayResultados[] = $datos;
}

while($filaGenero = mysqli_fetch_assoc($resultGenero)){
	$datos['gender'] = $filaGenero['NOMBRE_GENERO_'. $idiomaActual];
	$arrayResultados[] = $datos;
}

while($filaPlataforma = mysqli_fetch_assoc($resultPlataforma)){
	$datos['platform'] = $filaPlataforma['NOMBRE_PLATAFORMA'];
	$arrayResultados[] = $datos;
}

mysqli_free_result($resultDatos);
mysqli_free_result($resultGenero);
mysqli_free_result($resultPlataforma);
mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>