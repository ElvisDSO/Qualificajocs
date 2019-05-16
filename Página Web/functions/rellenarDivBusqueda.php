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
$arrayPlataformas = obtenerPlataformas();//Almacenará todos las plataformas.
$arrayGenero = obtenerGenero(); //Almacenará todos los generos.
$arrayCompañia = obtenerCompañia(); //Almacenará todas las compañias.

$contenidoHTML = '<input type="hidden" id="sectorAbierto" name="sectorAbierto" value="'.$sectorActual.'"/><div class="row" style="border-radius: 4px;">';
$numeroGrupo = 0;
//Se recorrerán todos los grupos y se generará un código HTML personalizado para cada sector.
foreach ($arrayEmpresa as &$empresa) {
  $empresaActual = $empresa[0];
  
  if($empresa[1]){
    $contenidoHTML .= '<div class="col-md-4">';
    $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputActividad\').value=\'\';realizarBusquedaGrupo('.$numeroGrupo.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
    $contenidoHTML .= '<h4><span id="spanGrupo'.$numeroGrupo.'">'.$empresa[1]."</span></h4>";
    $numeroActividad = 1;
    $contenidoHTML .= '</a>';

    foreach ($arrayPlataformas as &$plataformas) {
      if($plataformas[1]){
        $contenidoHTML .= '<span style="font-size:14px; line-height:0.9">';
        $contenidoHTML .= '<a class="nav-link" href="#" style="color: inherit;" onclick="document.getElementById(\'inputGrupo\').value=\'\';realizarBusquedaActividad('.$numeroActividad.',window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\')+1));">';
        $contenidoHTML .= '<span class="sidebar-normal" id="spanActividad'.$numeroActividad.'">'.$plataformas[1].'</span>';
        $contenidoHTML .= '</a></span>';
      }

      $numeroActividad ++;
    }

    $numeroGrupo ++;
    $contenidoHTML .= '<hr></div>';
  }
}

$contenidoHTML .= '</div>';
echo $contenidoHTML; //Envía el código HTML.
?>