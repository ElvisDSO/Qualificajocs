<?php 
include '../config/connection.php';

function addJuego($idJuego, $idUsuario) {
  global $connection;
  //Variable que contendrá el resultado de la búsqueda
  connect();
  $sql = "INSERT INTO `lista_jugados`(`ID_VIDEOJUEGO`, `ID_USUARIO`) VALUES (". $idJuego .",".$idUsuario.")";
  $resultSQL = mysqli_query($connection, $sql);
  mysqli_free_result($resultSQL);
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
addJuego($idGame,$idUser);
?>