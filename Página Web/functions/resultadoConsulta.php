<?php
//Establece conexión con la base de datos.
include '../config/connection.php';
//Arranca la variable de sesión que contiene al idioma.
include 'establecerIdioma.php'; 
connect();

//Declaración de variables
$nombre = "";
$genero = "";
$categoria = "";
$grupo = "";
$compañia = "";

//Variable que contendrá el resultado de la búsqueda
$text = '';
$codigoHTML = "";


$sqlVideojuegos = "SELECT videojuegos.NOMBRE FROM videojuegos" ;

$sqlVideojuegos .= " WHERE 1";

if (isset($_POST["nombre"])){ //Si el usuario ha introducido un nombre.
    $nombre = $_POST["nombre"];
    $sqlComercios .= " AND NOMBRE LIKE '%".$nombre."%'";

}
if (isset($_POST["genero"])){//Si ha introducido un género.
    $genero = $_POST["genero"];

}
if (isset($_POST["compañia"])){//Si ha introducido una compañía.
    $compañia = $_POST["compañia"];

}

if (isset($_POST["plataforma"])){//Si ha introducido una plataforma
	if ($_POST["plataforma"] <> "undefined"){
		$plataforma = $_POST["plataforma"];

	}
}
if (isset($_POST["empresa"])){//Si ha introducido una empresa.
	if ($_POST["empresa"] <> "undefined"){
        $empresa = $_POST["empresa"];

	}
}

 

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
    $arrayResultados[] = $videojuegos;
}

mysqli_free_result($resultVideojuegos);
mysqli_close($connection);
// Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
echo json_encode($arrayResultados);
?>