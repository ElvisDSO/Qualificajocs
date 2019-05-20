<?php
include '../config/connection.php';
include 'consulta_menu.php';

//Iniciar variables de sesión.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//Almacenar el sector en que se está actualmente.
if (isset($_POST["idSector"])){
  $sectorActual = $_POST["idSector"];
}

$arrayEmpresa = obtenerEmpresa();//Almacenará todos las empresas.
$arrayPlataformas = obtenerPlataforma();//Almacenará todos las plataformas.
$arrayGenero = obtenerGenero(); //Almacenará todos los generos.
$arrayCompañia = obtenerCompañia(); //Almacenará todas las compañias.

$contenidoHTML = '<input type="hidden" id="sectorAbierto" name="sectorAbierto" value="'.$sectorActual.'"/><div class="row" style="border-radius: 4px;">';
$numeroGrupo = 0;

if ($sectorActual == 1){ //Si el sector es plataformas, el desplegable será de plataformas
  //Se recorrerán todos los grupos y se generará un código HTML personalizado para cada sector.
  foreach ($arrayEmpresa as &$empresa) {
    $empresaActual = $empresa[0];
    
    if($empresa[1]){
      $contenidoHTML .= '<div class="col-md-4">';
      $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputPlataforma\').value=\'\';realizarBusquedaEmpresa('.$numeroGrupo.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
      $contenidoHTML .= '<h4><span id="spanEmpresa'.$numeroGrupo.'">'.$empresa[1]."</span></h4>";
      $numeroPlataforma = 1;
      $contenidoHTML .= '</a>';

      foreach ($arrayPlataformas as &$plataformas) {
        if($plataformas[1] == $empresa[0]){
          $contenidoHTML .= '<span style="font-size:14px; line-height:0.9">';
          $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputEmpresa\').value=\'\';realizarBusquedaPlataforma('.$numeroPlataforma.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
          $contenidoHTML .= '<span class="sidebar-normal" id="spanPlataforma'.$numeroPlataforma.'">'.$plataformas[2].'</span>';
          $contenidoHTML .= '</a></span>';
        }
        $numeroPlataforma ++;
      }
      $numeroGrupo ++;
      $contenidoHTML .= '<hr></div>';
    }
  }
} else if ($sectorActual == 2) { //Si el sector es compañía, el desplegable será con las compañías.
  //Se recorrerán todos los grupos y se generará un código HTML personalizado para cada sector.
  foreach ($arrayCompañia as &$compañia) {
    $compañiaActual = $compañia[0];

    if($compañia[1]){
      $contenidoHTML .= '<div class="col-md-4">';
      $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputCompañia\').value=\'\';realizarBusquedaCompañia('.$numeroGrupo.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
      $contenidoHTML .= '<h4><span id="spanCompañia'.$numeroGrupo.'">'.$compañia[1]."</span></h4>";
      $numeroActividad = 1;
      $contenidoHTML .= '</a>';

      $numeroGrupo ++;
      $contenidoHTML .= '<hr></div>';
    }
  }
} else if ($sectorActual == 3) { //Si el sector es genero, el desplegable será con el género.
  //Se recorrerán todos los grupos y se generará un código HTML personalizado para cada sector.
  foreach ($arrayGenero as &$genero) {
    $generoActual = $genero[0];

    if($genero[1]){
      $contenidoHTML .= '<div class="col-md-4">';
      $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputGenero\').value=\'\';realizarBusquedaGenero('.$numeroGrupo.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
      $contenidoHTML .= '<h4><span id="spanGenero'.$numeroGrupo.'">'.$genero[1]."</span></h4>";
      $numeroActividad = 1;
      $contenidoHTML .= '</a>';

      $numeroGrupo ++;
      $contenidoHTML .= '<hr></div>';
    }
  }
}

$contenidoHTML .= '</div>';
echo $contenidoHTML; //Envía el código HTML.
?>