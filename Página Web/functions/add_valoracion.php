<?php 
include '../config/connection.php';

function addValoracion($idJuego, $idUsuario, $idNota) {
  global $connection;
  //Variable que contendrá el resultado de la búsqueda
  connect();
  echo "Entra hasta aqui: ";
  echo $idJuego;echo $idUsuario; echo $idNota;
  $sql = "UPDATE `lista_jugados` SET `VALORACION`= '".$idNota."' WHERE `ID_VIDEOJUEGO`= '".$idJuego."' AND `ID_USUARIO`= '".$idUsuario."' ";
  $resultSQL = mysqli_query($connection, $sql);
  mysqli_free_result($resultSQL);
/*
  $comprobarPendientes = "SELECT * FROM `lista_pendientes` WHERE `ID_VIDEOJUEGO` = ". $idJuego ." AND `ID_USUARIO` = ". $idUsuario;
  $stmt = mysqli_prepare($connection, $comprobarPendientes);
  mysqli_stmt_store_result($stmt);
  if (mysqli_stmt_num_rows($stmt) == 1) {
  	echo "numero de row mayor que 1";
  	$deletePendientes = "DELETE FROM `lista_pendientes` WHERE `ID_VIDEOJUEGO` = ". $idJuego ." AND `ID_USUARIO` = ". $idUsuario;
  	$resultDelete = mysqli_query($connection, $resultDelete);
  	mysqli_free_result($resultDelete);
  }
  mysqli_free_result($resultComprobar);*/

  //md.showNotification('top','right');  	
  mysqli_close($connection);
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

//Almacenar el sector en que se está actualmente.
if (isset($_POST["inputVideojuego"])){
  $idGame = $_POST["inputVideojuego"];
}
if (isset($_SESSION["id_usuario"])){
  $idUser = $_SESSION["id_usuario"];
}
echo "Imprime algo, por dios: ";
echo $_POST["inputNota"];
echo $notaInsert;

if (isset($_POST["inputNota"])){
  $idValoracion = $_POST["inputNota"];
  unset($_POST["inputNota"]);
}

echo "Aqui imprime otra cosa: ";
echo $_POST["inputNota"];
echo $idValoracion;

addValoracion($idGame, $idUser, $idValoracion);
?>