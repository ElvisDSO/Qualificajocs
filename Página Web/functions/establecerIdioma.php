<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
/* Varaible de sesión que determina el idioma en el que está la página.
  ES - Español. EN - Inglés. PT - Portugués.
  */
  if (isset($_SESSION["idioma"])){  
    $idiomaActual = $_SESSION["idioma"];
  } else {
    $idiomaActual = "ES";
  }
?>