<?php
//Establece conexión con la base de datos.
include '../config/connection.php';
//Arranca la variable de sesión que contiene al idioma.
include 'establecerIdioma.php'; 
connect();

$sqlTraduccion =  "SELECT textos.ID_TEXTO, textos.TEXTO_". $idiomaActual ." FROM textos";
$sqlTraduccion .= " WHERE ID_TEXTO = 'ResultadoBusqueda' OR ID_TEXTO = 'Nombre' OR ID_TEXTO = 'Compañia' OR ID_TEXTO = 'Genero' OR ID_TEXTO = 'FechaLanzamiento' OR ID_TEXTO = 'Acciones' OR ID_TEXTO = 'UnResultado' OR ID_TEXTO = 'ResultadosObtenidos' OR ID_TEXTO = 'ConsultaDoscientos' ORDER BY ID_TEXTO";

//Resultado de la consulta en este orden: Acciones - Compañia - ConsultaDoscientos - FechaLanzamiento - Genero - Nombre - ResultadoBusqueda - ResultadosObtenidos - UnResultado.

$resultTraduccion = mysqli_query($connection, $sqlTraduccion);
$traduccionReturn = array();

$arrayTraducciones = [];
while ($filaTraducciones = mysqli_fetch_assoc($resultTraduccion)) {
	$traducciones = array();
	$traducciones[] = $filaTraducciones['ID_TEXTO'];
	$traducciones[] = $filaTraducciones['TEXTO_'. $idiomaActual];
	$arrayTraducciones[] = $traducciones;
}

mysqli_free_result($resultTraduccion);
mysqli_close($connection);
echo json_encode($arrayTraducciones);
?>