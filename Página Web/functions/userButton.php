<?php
/* Variable de sesión que contiene el idioma. */
function userButton(){
	include 'establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
	$arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>	
	<link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
	<ul class="nav-item dropdown">
		<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  		<em class="material-icons">person</em>
	  		<p class="d-lg-none d-md-block">
				Account
	  		</p>
		</a>
		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
			<a class="dropdown-item" href="./perfilUsuario.php"><?php echo $arrayRecursosIdioma['Perfil']; ?></a>
			<a class="dropdown-item" href="./perfilUsuario.php"><?php echo $arrayRecursosIdioma['Configuracion']; ?></a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="functions/cerrar_sesion.php"><?php echo $arrayRecursosIdioma['CerrarSesion']; ?></a>
    	</div>
	</ul>


<?php 
	}
?>
