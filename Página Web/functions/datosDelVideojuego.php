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

$sqlDatos = "SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, videojuegos.FECHA_LANZAMIENTO, videojuegos.N_JUGADORES, videojuegos.RATING, videojuegos.ID_VIDEOJUEGO";
$sqlDatos .= " FROM videojuegos JOIN compañia ON videojuegos.COMPAÑIA = compañia.ID_COMPAÑIA";
$sqlDatos .= " WHERE";

$sqlGenero = "SELECT videojuegos.ID_VIDEOJUEGO, genero.NOMBRE_GENERO_". $idiomaActual;
$sqlGenero .= " FROM videojuegos JOIN genero_videojuego ON videojuegos.ID_VIDEOJUEGO = genero_videojuego.ID_VIDEOJUEGO";
$sqlGenero .= " LEFT JOIN genero ON genero_videojuego.ID_GENERO = genero.ID_GENERO WHERE";


$sqlPlataforma = "SELECT videojuegos.ID_VIDEOJUEGO, plataforma.PLATAFORMA";
$sqlPlataforma .= " FROM videojuegos JOIN plataforma_videojuego ON videojuegos.ID_VIDEOJUEGO = plataforma_videojuego.ID_VIDEOJUEGO";
$sqlPlataforma .= " LEFT JOIN plataforma ON plataforma_videojuego.ID_PLATAFORMA = plataforma.ID_PLATAFORMA WHERE";

if (isset($_POST["inputID"])){
	$id = $_POST["inputID"];
	$sqlDatos .= " ID_VIDEOJUEGO = $id";
	$sqlGenero .= " videojuegos.ID_VIDEOJUEGO = $id";
	$sqlPlataforma .= " videojuegos.ID_VIDEOJUEGO = $id";
}





//Si hay resultados...
$codigoHTML = "";
$arrayResultados = [];
$resultDatos = mysqli_query($connection, $sqlDatos);
$datosReturn = array();
$datos = array();

while($filaDatos = mysqli_fetch_assoc($resultDatos)){
	$datos['data'][0] = $filaDatos['NOMBRE'];
	$datos['data'][1] = $filaDatos['NOMBRE_COMPAÑIA'];
	$datos['data'][2] = $filaDatos['FECHA_LANZAMIENTO'];
	$datos['data'][3] = $filaDatos['N_JUGADORES'];
	$datos['data'][4] = $filaDatos['RATING'];
	$datos['data'][5] = $filaDatos['ID_VIDEOJUEGO'];
	//$arrayResultados[] = $datos;
}
mysqli_free_result($resultDatos);
$resultGenero = mysqli_query($connection, $sqlGenero);
$generoReturn = array();

$i = 0;
while($filaGenero = mysqli_fetch_assoc($resultGenero)){
	$datos['gender'][$i] = $filaGenero['NOMBRE_GENERO_'. $idiomaActual];
	$i = $i + 1;
	//$arrayResultados[] = $datos;
}
mysqli_free_result($resultGenero);
$resultPlataforma = mysqli_query($connection, $sqlPlataforma);
$plataformaReturn = array();

$i = 0;
while($filaPlataforma = mysqli_fetch_assoc($resultPlataforma)){
	$datos['platform'][$i] = $filaPlataforma['PLATAFORMA'];
	$i = $i + 1;
	//$arrayResultados[] = $datos;
}
$arrayResultados[] = $datos;

mysqli_free_result($resultPlataforma);

mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>