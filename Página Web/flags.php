<?php
//session_start();
/* Variable de sesión que contiene el idioma. */
function flags(){
	include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
?>	

<link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
<li class="nav-item dropdown">
	<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php //Impresión de bandera en la parte superior de la página dependiendo del idioma seleccionado.
		if ($idiomaActual == "ES"){ //Bandera España.
			?>
			<img src="images/es.png" width="25" height="25" alt="Castellano"></a>
			<?php
		} elseif ($idiomaActual == "EN"){ //Bandera Reino Unido.
			?>
			<img src="images/uk.png" width="25" height="25" alt="Inglés"></a>
			<?php
		} elseif ($idiomaActual == "PT"){ //Bandera Portugal.
			?>
			<img src="images/pt.png" width="25" height="25" alt="Portugués"></a>
			<?php
		} else { //Por defecto, si no encuentra ninguna que muestre la de España.
			?>
			<img src="images/es.png" width="25" height="25" alt="Castellano"></a>
			<?php
		}
		?>
	</a>
	<!-- Desplegable de  banderas. Al hacer click cambia el idioma de la página. --->
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
		<a class="dropdown-item" onclick="definirIdioma('ES');"><img src="images/es.png" width="25" height="25" alt="Castellano">&nbsp;ES</a>
        <a class="dropdown-item" onclick="definirIdioma('EN');"><img src="images/uk.png" width="25" height="25" alt="Inglés">&nbsp;UK</a>
        <a class="dropdown-item" onclick="definirIdioma('PT');"><img src="images/pt.png" width="25" height="25" alt="Portugués">&nbsp;PT</a>
    </div>
</li>
<?php 
	}
?>

<script> 
	/**
	* Función que define el idioma en el que se presentará la página web.
	*
	* @param idioma. Variable dada por el botón que se presenta en cada una de las banderas del menú desplegable.
	**/
	function definirIdioma(idioma){
		$.ajax({
			type: "POST",
			url: "functions/definirIdioma.php",
			data: {idioma: idioma},
			success: function (data) {
				window.location.href = "index.php";
			}
		});
	}

</script>