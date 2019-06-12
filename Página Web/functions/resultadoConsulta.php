<?php
//Establece conexión con la base de datos.
include '../config/connection.php';
//Arranca la variable de sesión que contiene al idioma.
include 'establecerIdioma.php'; 
connect();

//Declaración de variables
$nombre = "";
$genero = "";
$plataforma = "";
$empresa = "";
$compañia = "";

//Variable que contendrá el resultado de la búsqueda
$text = '';
$codigoHTML = "";

$sqlVideojuegos =  "SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, genero.NOMBRE_GENERO_". $idiomaActual .", videojuegos.RATING, videojuegos.FECHA_LANZAMIENTO, videojuegos.ID_VIDEOJUEGO"; 
$sqlVideojuegos .= " FROM videojuegos JOIN compañia ON videojuegos.COMPAÑIA = compañia.ID_COMPAÑIA";
$sqlVideojuegos .= " LEFT JOIN genero_videojuego ON videojuegos.ID_VIDEOJUEGO = genero_videojuego.ID_VIDEOJUEGO";
$sqlVideojuegos .= " LEFT JOIN genero ON genero_videojuego.ID_GENERO = genero.ID_GENERO";
$sqlVideojuegos .= " LEFT JOIN plataforma_videojuego ON plataforma_videojuego.ID_VIDEOJUEGO = videojuegos.ID_VIDEOJUEGO";
$sqlVideojuegos .= " LEFT JOIN plataforma ON plataforma.ID_PLATAFORMA = plataforma_videojuego.ID_PLATAFORMA";
$sqlVideojuegos .= " LEFT JOIN empresa ON empresa.ID_EMPRESA = plataforma.ID_EMPRESA";

$sqlVideojuegos .= " WHERE 1";

if (isset($_POST["nombre"])){ //Si el usuario ha introducido un nombre.
    $nombre = $_POST["nombre"];
    $sqlVideojuegos .= " AND NOMBRE LIKE '%".$nombre."%'";

}
if (isset($_POST["genero"])){//Si ha introducido un género.
    $genero = $_POST["genero"];
    $sqlVideojuegos .= " AND NOMBRE_GENERO_". $idiomaActual ." LIKE '%".$genero."%'";
}

$p = "plataforma";
if (isset($_POST[$p]) && $_POST[$p] <> "undefined"){//Si ha introducido una plataforma
	$plataforma = $_POST[$p];
	$sqlVideojuegos .= " AND plataforma.PLATAFORMA LIKE '%".$plataforma."%'";
}

$e = "empresa";
if (isset($_POST[$e]) && $_POST[$e] <> "undefined"){//Si ha introducido una empresa.
    $empresa = $_POST[$e];
    $sqlVideojuegos .= " AND empresa.NOMBRE_EMPRESA LIKE '%".$empresa."%'";
}

$c = "compañia";
if (isset($_POST[$c])){//Si ha introducido una compañía.
    $compañia = $_POST[$c];
    $sqlVideojuegos .= " AND NOMBRE_COMPAÑIA LIKE '%".$compañia."%'";
}

$sqlVideojuegos .= " GROUP BY ID_VIDEOJUEGO ORDER BY NOMBRE";

//Limitar la búsqueda de juegos a 200.
$sqlVideojuegos .= " LIMIT 200";

$resultVideojuegos = mysqli_query($connection, $sqlVideojuegos); //Ejecución de la consulta
$videojuegosReturn = array();
//Si hay resultados...
$codigoHTML = "";
$arrayResultados = [];
while($filaVideojuegos = mysqli_fetch_assoc($resultVideojuegos)){
	$videojuegos = array();
	$videojuegos[] = $filaVideojuegos['NOMBRE'];
	$videojuegos[] = $filaVideojuegos['NOMBRE_COMPAÑIA'];
	$videojuegos[] = $filaVideojuegos['NOMBRE_GENERO_'. $idiomaActual];
	$videojuegos[] = $filaVideojuegos['RATING'];
	$videojuegos[] = $filaVideojuegos['FECHA_LANZAMIENTO'];
	$videojuegos[] = $filaVideojuegos['ID_VIDEOJUEGO'];
	$arrayResultados[] = $videojuegos;
}

mysqli_free_result($resultVideojuegos);
mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>