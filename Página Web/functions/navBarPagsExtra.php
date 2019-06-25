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

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container-fluid">
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a href="registro.php" class="nav-link">
            <em class="material-icons">person_add</em> <?php echo $arrayRecursosIdioma['Registrarse']; ?>
          </a>
        </li>
        <li class="nav-item ">
          <a href="login.php" class="nav-link">
            <em class="material-icons">fingerprint</em> Login
          </a>
        </li>
        <div class="navbar-collapse collapse justify-content-end">
          <ul class="navbar-nav">
	  		   <!-- Imprime las banderas. -->
           <?php flags();?>
		      </ul>
  	    </div>
      </ul>
    </div>
  </div>
</nav>
<?php } ?>