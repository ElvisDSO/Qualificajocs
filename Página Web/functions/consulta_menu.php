<!--- FUNCIÓN PARA AUTOCOMPLETAR MENÚ --->
<?php

function obtenerSectores() {
  global $connection;
  //Variable que contendrá el resultado de la búsqueda
  $text = '';
  connect();
  $codigoHTML = "";
  //Contulta para recoger la información de todas las actividades
  $sqlSector = "SELECT ID_SECTOR, NOMBRE_SECTOR FROM sector";
  $resultSector = mysqli_query($connection, $sqlSector); //Ejecución de la consulta
  $sectoresReturn = array();
  //Si hay resultados...
  while($filaSector = mysqli_fetch_assoc($resultSector)){
    // se recoge la información según la vamos a pasar a la variable de javascript
    $sectores = array();
    $sectores[] = $filaSector['ID_SECTOR'];
    $sectores[] = $filaSector['NOMBRE_SECTOR'];
    $sectoresReturn[] = $sectores;
  }

  mysqli_free_result($resultSector);
  mysqli_close($connection);
  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
  return $sectoresReturn;
}

/**
* Obtiene las plataformas que se encuentran almacenadas en la base de datos 
*
* @return plataformasReturn. Array que contiene el nombre de las plataformas junto con su ID
**/
function obtenerEmpresa() {
  global $connection;

  //Variable que contendrá el resultado de la búsqueda
  $text = '';
  connect();
  $codigoHTML = "";
  //Consulta para recoger la información de todas las plataformas
  $sqlEmpresa = "SELECT ID_EMPRESA, NOMBRE_EMPRESA FROM empresa ORDER BY NOMBRE_EMPRESA";
  $resultEmpresa = mysqli_query($connection, $sqlEmpresa); //Ejecución de la consulta
  $empresaReturn = array();
  //Si hay resultados...
  while($filaEmpresa = mysqli_fetch_assoc($resultEmpresa)){
    // se recoge la información según la vamos a pasar a la variable de javascript
    $empresa = array();
    $empresa[] = $filaEmpresa['ID_EMPRESA'];
    $empresa[] = $filaEmpresa['NOMBRE_EMPRESA'];
    $empresaReturn[] = $empresa;
  }

  mysqli_free_result($resultEmpresa);
  mysqli_close($connection);
  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
  return $empresaReturn;
}

/**
* Obtiene las plataformas que se encuentran almacenadas en la base de datos 
*
* @return plataformasReturn. Array que contiene el nombre de las plataformas junto con su ID
**/
function obtenerPlataforma() {
  global $connection;

  //Variable que contendrá el resultado de la búsqueda
  $text = '';
  connect();
  $codigoHTML = "";
  //Consulta para recoger la información de todas las plataformas
  $sqlPlataforma = "SELECT ID_PLATAFORMA, ID_EMPRESA, PLATAFORMA FROM plataforma ORDER BY PLATAFORMA";
  $resultPlataforma = mysqli_query($connection, $sqlPlataforma); //Ejecución de la consulta
  $plataformaReturn = array();
  //Si hay resultados...
  while($filaPlataforma = mysqli_fetch_assoc($resultPlataforma)){
    // se recoge la información según la vamos a pasar a la variable de javascript
    $plataforma = array();
	  $plataforma[] = $filaPlataforma['ID_PLATAFORMA'];
    $plataforma[] = $filaPlataforma['ID_EMPRESA'];
	  $plataforma[] = $filaPlataforma['PLATAFORMA'];
    $plataformaReturn[] = $plataforma;
  }

  mysqli_free_result($resultPlataforma);
  mysqli_close($connection);
  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
  return $plataformaReturn;
}

/**
* Obtiene las compañías que se encuentran almacenadas en la base de datos 
*
* @return compañiasReturn. Array que contiene el nombre de las compañías junto con su ID
**/
function obtenerCompañia() {
  global $connection;

  //Variable que contendrá el resultado de la búsqueda
  $text = '';
  connect();
  $codigoHTML = "";
  //Consulta para recoger la información de todas las plataformas
  $sqlCompañia = "SELECT ID_COMPAÑIA, NOMBRE_COMPAÑIA FROM compañia ORDER BY NOMBRE_COMPAÑIA";
  $resultCompañia = mysqli_query($connection, $sqlCompañia); //Ejecución de la consulta
  $compañiaReturn = array();
  //Si hay resultados...
  while($filaCompañia = mysqli_fetch_assoc($resultCompañia)){
    // se recoge la información según la vamos a pasar a la variable de javascript
    $compañia = array();
    $compañia[] = $filaCompañia['ID_COMPAÑIA'];
    $compañia[] = $filaCompañia['NOMBRE_COMPAÑIA'];
    $compañiaReturn[] = $compañia;
  }

  mysqli_free_result($resultCompañia);
  mysqli_close($connection);
  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
  return $compañiaReturn;
}

/**
* Obtiene los géneros que se encuentran almacenados en la base de datos 
* en base al idioma en el que se encuentre la página web.
*
* @return generoReturn. Array que contiene el nombre de los géneros junto con su ID
**/
function obtenerGenero() {
  global $connection;
  //Arranca la variable de sesión que contiene al idioma.
  include 'functions/establecerIdioma.php'; 

  //Variable que contendrá el resultado de la búsqueda
  $text = '';
  connect();
  $codigoHTML = "";
  //Contulta para recoger la información de todas las actividades
  $sqlGenero = "SELECT ID_GENERO, NOMBRE_GENERO_". $idiomaActual ." FROM genero ORDER BY NOMBRE_GENERO_". $idiomaActual;
  $resultGenero = mysqli_query($connection, $sqlGenero); //Ejecución de la consulta
  $generoReturn = array();
  //Si hay resultados...
  while($filaGenero = mysqli_fetch_assoc($resultGenero)){
    // se recoge la información según la vamos a pasar a la variable de javascript
    $genero = array();
    $genero[] = $filaGenero['ID_GENERO'];
    $genero[] = $filaGenero['NOMBRE_GENERO_'. $idiomaActual];
    $generoReturn[] = $genero;
  }

  mysqli_free_result($resultGenero);
  mysqli_close($connection);
  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
  return $generoReturn;
}
?>