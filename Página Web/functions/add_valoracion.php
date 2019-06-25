<?php 
include '../config/connection.php';

function addValoracion($idJuego, $idUsuario, $idNota) {
  global $connection;
  //Variable que contendrá el resultado de la búsqueda
  connect();
  $sql = "UPDATE `lista_jugados` SET `VALORACION`= '".$idNota."' WHERE `ID_VIDEOJUEGO`= '".$idJuego."' AND `ID_USUARIO`= '".$idUsuario."' ";
  $resultSQL = mysqli_query($connection, $sql);
  mysqli_free_result($resultSQL);
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

if (isset($_POST["inputNota"])){
  $idValoracion = $_POST["inputNota"];
  unset($_POST["inputNota"]);
}

addValoracion($idGame, $idUser, $idValoracion);
?>