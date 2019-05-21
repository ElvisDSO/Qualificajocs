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

/*
SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, genero.NOMBRE_GENERO_ES, videojuegos.RATING, videojuegos.FECHA_LANZAMIENTO 
FROM videojuegos JOIN compañia ON videojuegos.COMPAÑIA = compañia.ID_COMPAÑIA LEFT JOIN genero_videojuego ON videojuegos.ID_VIDEOJUEGO = genero_videojuego.ID_VIDEOJUEGO LEFT JOIN genero ON genero_videojuego.ID_GENERO = genero.ID_GENERO LEFT JOIN plataforma_videojuego ON plataforma_videojuego.ID_VIDEOJUEGO = videojuegos.ID_VIDEOJUEGO LEFT JOIN plataforma ON plataforma.ID_PLATAFORMA = plataforma_videojuego.ID_PLATAFORMA LEFT JOIN empresa ON empresa.ID_EMPRESA = plataforma.ID_EMPRESA
WHERE 1 AND NOMBRE LIKE '%NOM%' AND NOMBRE_COMPAÑIA LIKE '%MAX%' AND NOMBRE_GENERO_ES  LIKE '%AVEN%' AND plataforma.PLATAFORMA LIKE '%P%' AND empresa.NOMBRE_EMPRESA LIKE '%P%';
*/


$sqlVideojuegos =  "SELECT videojuegos.NOMBRE, compañia.NOMBRE_COMPAÑIA, genero.NOMBRE_GENERO_". $idiomaActual .", videojuegos.RATING, videojuegos.FECHA_LANZAMIENTO"; 
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

if (isset($_POST["plataforma"])){//Si ha introducido una plataforma
	if ($_POST["plataforma"] <> "undefined"){
		$plataforma = $_POST["plataforma"];
		$sqlVideojuegos .= " AND plataforma.PLATAFORMA LIKE '%".$plataforma."%'";

	}
}
if (isset($_POST["empresa"])){//Si ha introducido una empresa.
	if ($_POST["empresa"] <> "undefined"){
        $empresa = $_POST["empresa"];
        $sqlVideojuegos .= " AND empresa.NOMBRE_EMPRESA LIKE '%".$empresa."%'";

	}
}
if (isset($_POST["compañia"])){//Si ha introducido una compañía.
    $compañia = $_POST["compañia"];
    $sqlVideojuegos .= " AND NOMBRE_COMPAÑIA LIKE '%".$compañia."%'";
}

$sqlVideojuegos .= " GROUP BY NOMBRE ORDER BY NOMBRE";

//Limitar la búsqueda de juegos a 200.
$sqlVideojuegos .= " LIMIT 200";
//echo $sqlVideojuegos;

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
	$arrayResultados[] = $videojuegos;
}
/*
$resultadoFinal = [];
$max = sizeof($arrayResultados);
for ( $i = 0; $i < $max; $i++ ) {
	$generosMismoNombre = [];
	for ( $j; $j < $max; $j++ ) {
		if ( $i != $j ) {
			if ( $arrayResultados[0][i] == $arrayResultados[0][j]) {
				$generosMismoNombre .=
			}
		}
	}
}*/

mysqli_free_result($resultVideojuegos);
mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>