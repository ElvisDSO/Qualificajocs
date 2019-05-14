<?php

function recursosIdioma($idiomaActual) {
    //Iniciar variables de sesión.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //Establece conexión con la base de datos.
    global $connection;
    connect();

	$arrayRecursosIdioma = [];
    //Genera consulta a través del idioma seleccionado
    $sql = "SELECT ID, TEXTO_".$idiomaActual." FROM texto";
    $sql_result = mysqli_query($connection, $sql); //Lanza la consulta en la base de datos.

    //Obtiene todos los textos traducidos y los guarda en un array.
    while($filaTexto = mysqli_fetch_assoc($sql_result)){
            $arrayRecursosIdioma[$filaTexto['ID']] = $filaTexto['TEXTO_'.$idiomaActual];
    }
    mysqli_free_result($sql_result);
    mysqli_close($connection);
    // Después de trabajar con la bd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)

    return $arrayRecursosIdioma;//Devuelve el array con las traducciones.
  }
?>