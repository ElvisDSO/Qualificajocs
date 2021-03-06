<?php
/**
* Función encargada de la impresión del elemento navbar.
**/
function navbarPagsExtra(){
	include 'establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
	include_once 'recursosIdioma.php';//Arranca el array que contiene el texto traducido.
  	/* Se carga los textos traducidos de la base de datos. */
  	$arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>
<link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="registro.php" class="nav-link">
            <em class="material-icons">person_add</em> <?php echo $arrayRecursosIdioma['Registrarse']; ?>
          </a>
        </li>
        <li class="nav-item ">
          <a href="login.php" class="nav-link">
            <em class="material-icons">fingerprint</em> Login
          </a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<?php } ?>