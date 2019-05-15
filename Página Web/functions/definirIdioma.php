<?php
//Inicio variables de sesión.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Almacenar la variable de sesión que contiene el idioma.
if (isset($_POST["idioma"])){
	$_SESSION["idioma"] = $_POST["idioma"];
}
?>